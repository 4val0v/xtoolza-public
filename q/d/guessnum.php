<? 

/*  guessnum.php     
    Marcus Kazmierczak, marcus@mkaz.com 
    November 05, 2000 

    Number guessing game picking number from 1-100 
    Example script written to demonstrate sessions. 

*/ 

/*  ==================================================================== 
*  Copyright (c) 2000 Marcus Kazmierczak, marcus@mkaz.com 
*  All rights reserved. 
* 
*  Redistribution and use in source and binary forms, with or without 
*  modification, are permitted provided that the following conditions 
*  are met: 
* 
*  1. Redistributions of source code must retain the above copyright 
*     notice, this list of conditions and the following disclaimer. 
* 
*  2. Redistributions in binary form must reproduce the above copyright 
*     notice, this list of conditions and the following disclaimer in the 
*     documentation and/or other materials provided with the distribution. 
* 
*  3. The name of the author may not be used to endorse or promote products 
*     derived from this software without specific prior written permission. 
* 
*  THIS SOFTWARE IS PROVIDED BY THE AUTHOR ``AS IS'' AND ANY EXPRESS OR 
*  IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES 
*  OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. 
*  IN NO EVENT SHALL THE AUTHOR BE LIABLE FOR ANY DIRECT, INDIRECT, 
*  INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT 
*  NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, 
*  DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY 
*  THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT 
*  (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF 
*  THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE. 
*  ==================================================================== 
*/ 


    // initialize session (starts session if there is none, 
    // or uses currently started session if there is) 
    session_start(); 

    /* SESSION VARIABLES USED 
        games -> tracks number of games played 
        tc    -> total count - tracks total number of guesses 
        c     -> count - tracks number of guesses for current game 
        num   -> number picked between 1-100 
    */ 


    // set guess to integer type so bad data is 
    // not passed in through the form. if so $guess=0 
    settype($guess,"integer"); 


    // check if games is already initialized 
    if (!session_is_registered("games")) 
    { 
        session_register("games"); 
        session_register("tc"); 
        session_register("num"); 
        session_register("c"); 
        $games = 0; 
        $tc = 0; 
        $num = 0; 
        $c =0; 
    } 

    // if sbtn is not defined, then it should 
    // be the first time here... 
    if (!$sbtn) $sbtn="Play Again"; 

    switch ($sbtn) 
    { 
    case "Play Again":      // starts new game 
        $num = getRandomNumber(); 

        // zero out current guess count 
        $c = 0; 
        break; 

    case "Guess":           // checks guess 
        $c++; $tc++; 
        if ($guess > $num) 
            $msg = "Guess #$c =&gt; &nbsp; <b>$guess</b>  - too <b>HIGH</b>. 
Guess Again."; 
        else if ($guess < $num) 
            $msg = "Guess #$c =&gt; &nbsp; <b>$guess</b>  - too <b>LOW</b>. 
Guess Again."; 
        else 
        { 
            $msg = "Guess #$c =&gt; &nbsp; <b>$guess</b> is <b>CORRECT!!</b>"; 
            $games++; 
            $correct = true; 
        } 
        break; 

    case "Reset Totals":    // resets totals and continues 
        $games = 0; 
        $tc = 0; 
        $num = 0; 
        $c = 0; 

    case "Get Totals":      // displays totals 
        $msg = formatTotals($games,$tc); 
        $correct = true; 
        break; 

    default: 
        $msg = "INVALID"; 
        break; 
    } 
?> 
<html> 
<head> 
    <title>Guess a Number</title> 
</head> 

<body bgcolor="#FFFFFF"> 

<table cellpadding="0" cellspacing="0" width="100%"> 
<tr><td><p><font size="+1"><b>Guess a Number (PHP)</b></font><br>Marcus 
Kazmierczak<br>Created On: 2000-11-05</p></td> 
    <td valign="top" align="right"><a href="javascript: self.close()"><font 
size="2">Close Window</font></a></td> 
</tr></table> 

<p><hr size=1 noshade></p> 

    <h3>Guess a number between 1 and 100.</h3> 

    <p><?=$msg?></p> 

    <form action="<?=$SCRIPT_NAME?>" METHOD="POST"> 
<?   
    if ($correct) 
    { 
        print "<br>\n"; 
        print '<input type="submit" name="sbtn" value="Play Again">&nbsp;&nbsp;' 
. "\n"; 
        print '<input type="submit" name="sbtn" value="Get Totals">&nbsp;&nbsp;' 
. "\n"; 
        print '<input type="submit" name="sbtn" value="Reset Totals">' . "\n"; 
    } 
    else 
    { 
        print 'Your Guess: <input type="text" name="guess" size="4" 
maxlength="3" value="">&nbsp; <input type="submit" name="sbtn" value="Guess">' . 
"\n"; 
    } 
?> 
    </form> 

<br> 

</body> 
</html> 
<? 
/*---------------------------------------------------------- 
    FUNCTIONS 
-----------------------------------------------------------*/ 

function getRandomNumber() 
{ 
    // seed rand number and guess 
    mt_srand ((double) microtime() * 1000000); 
    return mt_rand(1,100); 
} 


function formatTotals($g,$t) 
{ 
    // set to integer so "bad data" can't 
    // be displayed 
    settype($g,"integer"); 
    settype($t,"integer"); 

    if ($g != 0) $a = round( ($t/$g), 2); 
    else $a = 0; 

    $rstr  = '<table cellpadding="4" cellspacing="0" border="1">';         
    $rstr .= "<tr><td>Total Games Played: </td><td>$g </td></tr> \n"; 
    $rstr .= "<tr><td>Average Guesses per Game: </td><td>". $a ." </td></tr> 
\n"; 
    $rstr .= "</table><br>"; 

    return $rstr; 
} 
?> 

