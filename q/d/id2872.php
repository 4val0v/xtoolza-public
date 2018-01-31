<?php
/*******************************************************************
Concentration by Eric Hanson
By Eric Hanson, eric@cornado.com, http://www.cornado.com/
May 2, 1999

- Requires PHPlib Sessions.  PHPlib is available from
  http://phplib.shonline.de/.
- Refers to images as
  pics/pic1.jpg
  pics/pic2.jpg
  ...
  Place your images in the "pics" directory use the same naming convention.


This code can be used for anything you'd like.

Example available at 
http://www.cornado.com/fun/memory/

Music of choice while programming:
  Pedro the Lion, Ben Folds Five, Propellerheads
********************************************************************/ 

/****************************************************************************
class concentration (x_size, y_size)
*****************************************************************************/

/* defines */
$MATCHED = 1;
$SELECTED = 2;
$UNMATCHED = 0;

/* config */
$image_width = 60;
$image_height = 100;

class concentration {
  var $board;                     ## 2d array of card pairs
  var $match;                     ## 2d bool array that keeps track of which
                                  ## cards have been matched
  var $x;                         ## the width of the playing board
  var $y;                         ## the height of the playing board
  
  var $state;                     ## internal state machine
  var $choice1_x = -1;            ## history keepers
  var $choice1_y = -1;
  var $choice2_x = -1;
  var $choice2_y = -1;
  
  var $move_count;                ## total moves
  
  var $classname="concentration"; ## phplib serialization helper
  var $persistent_slots = array
  ("board","match","x","y","state","choice1_x","choice1_y","move_count",
   "choice2_x","choice2_y");

  function init ($x, $y) {
    $this->x = $x;
    $this->y = $y;
    $this->initGameBoard ();
    $this->initMatchArray ();
    $this->move_count = 0;
    
    $this->state = 1;
  }
  
/****************************************************************************
function initGameBoard ()
generates an x by y array of randomized pairs numbered from 0 to ((x*y)/2)-1.
*****************************************************************************/

  function initGameBoard () {
    $cards = array ();
 
/* fill in the array with unshuffled values, as pairs of 2 */
    $cards = $this->getPairsArray ($this->x * $this->y);

/* shuffle the array */
    $cardsRand = $this->betterRandomizeArray ($cards,4);
  
/* get the 2d array from the shuffled 1d array */
    $board = $this->get2dArray ($cardsRand,$this->x,$this->y);
  
    $this->board = $board;
  }
  
  function initMatchArray () {
    global $UNMATCHED;
    $this->match = array ();
    for ($i=0;$i<$this->x;$i++) {
      $this->match[$i] = array ();
      for ($j=0;$j<$this->y;$j++) {
        $this->match[$i][$j] = $UNMATCHED;
      }
    }
  }
  
/****************************************************************************
function makeMove (x,y)
makes a move at x y
*****************************************************************************/

  function gameOver () {
    global $MATCHED;
    for ($j=0;$j<$this->y;$j++) {
      for ($i=0;$i<$this->x;$i++) {
        if ($this->match[$i][$j] != $MATCHED) {
##      	  print "False on i=$i, j=$j";
      	  return false;
      	}
      }
    }
    return true;
  }
  
/****************************************************************************
function makeMove (x,y)
makes a move at x y
*****************************************************************************/

  function makeMove ($x, $y) {
    global $MATCHED, $SELECTED, $UNMATCHED;
    $this->move_count += .5;
    
    switch ($this->state) {
    
/* if this is the client's first choice of card for this turn */    
      case 1:
/* if the client's choice is an unmatched card */
        if ($this->match[$x][$y] == $UNMATCHED) {
/* mark the card as selected */
          $this->match [$x][$y] = $SELECTED;
/* advance to state 2 */
          $this->state = 2;
/* save this choice for comparison with next choice (in state 2) */
          $this->choice1_x = $x;
          $this->choice1_y = $y;
          $this->choice2_x = -1;
          $this->choice2_y = -1;
          return true;
        }
/* the client picked a card that was already flipped or matched */
        else {
          return false;
        }
      break;
       
       
/* if this is the client's second choice this turn, trying to match an
      already flipped card witht this choice */
      case 2:
      
/* if the client's choice is an unmatched card */
        if ($this->match[$x][$y] == $UNMATCHED) {
/* set up the history vars */
        	$this->choice2_x = $x;
        	$this->choice2_y = $y;
  
          if ($this->board[$x][$y] ==
           $this->board[$this->choice1_x][$this->choice1_y]) {
        	  $this->match[$x][$y] = $MATCHED;
        	  $this->match[$this->choice1_x][$this->choice1_y] = $MATCHED;
        	}
        	else {
        	  $this->match[$this->choice1_x][$this->choice1_y] = $UNMATCHED;
        	}
  
         $this->state = 1;
        	return true;
        }
        else {
          return false;
        }
      break;
      
/* unrecognized state */
      default: 
        print "Internal error: unrecognized state ".$this->state;
        return false;
      break;

    }
  }

/****************************************************************************
function printPlayBoard ()
prints the playboard
*****************************************************************************/

  function printPlayBoard () {
    global $SELECTED, $UNMATCHED, $MATCHED, $image_width, $image_height;
##    print "<p>State = ".$this->state;
    
    $table_width = $this->x * $image_width;
    
    print "<table width=\"". $table_width ."\" border=0 cellspacing=5>\n";
    for ($j = 0; $j < $this->y; $j ++) {
      print "  <tr>\n";
      for ($i = 0; $i < $this->x; $i ++) {
        print "    <td height=$image_height width=$image_width>\n";
      	if (($this->match[$i][$j]) ||
            ($i == $this->choice1_x && $j == $this->choice1_y) ||
            ($i == $this->choice2_x && $j == $this->choice2_y)
	         ){
          print "
            <img width=$image_width border=0 height=$image_height 
             src=\"pics/pic".( $this->board[$i][$j] + 1).".jpg\"><br>";
        }
        else {
          if ($this->match[$i][$j] == $UNMATCHED) {
            print "
              <a 
               href=\"?move=yes&x_move=".$i."&y_move=".$j."\"
              ><img 
               width=$image_width 
               height=$image_height 
               border=0 
               src=\"pics/1/cardback.gif\"
              ></a><br>\n";
      	  }
        	else {
        	  print "<br>";
        	}
        }
        print "</td>\n";
      }
      print "  </tr>\n";
    }
    print "</table>\n";
    return 1;
  }  

/* generate an array of numeric pairs of size $size */
  function getPairsArray ($size) {
    $a = array ();
    for ($i=0;$i < $size; $i ++) {
      $a[$i] = floor($i/2);
    }  
    return $a;
  }
  
/* push a 1d array into a 2d array */
  function get2dArray ($a,$x,$y) {
    for ($j = 0; $j < $y; $j ++) {
      for ($i = 0; $i < $x; $i ++) {
        $b[$i][$j] = $a[($x)*($j)+$i];
      }
    }
    return $b;
  }  
    
/* miserable array randomizer */
  function betterRandomizeArray ($array, $iterations = 1) {
    $size = sizeof($array);
    for ($count = 0; $count < $iterations; $count ++) {
      for ($i=0;$i<$size-1;$i++) {
/* swap element $i with another element in a random position */
        $swap_pos = rand () % $size;
        $temp = $array[$i];
        $array[$i] = $array[$swap_pos];
        $array[$swap_pos] = $temp;
      }
    }
    return $array;
  }
}


/****************************************************************************
example usage
*****************************************************************************/

/* phplib function */
page_open (array ("sess" => "Poe_Session"));

/* the dimensions of the game board */
$x = 5;
$y = 4;

if (!$concentration_game) {
  $concentration_game = new concentration;
  $concentration_game->init($x,$y);
/* phplib function */
  $sess->register ("concentration_game");
}

if ($move) {
  $concentration_game->makeMove ($x_move, $y_move);
}

if ($concentration_game->gameOver ()) {
  $sess->delete();
  $game_over = true;
}

require "cornado.inc";
print "<h3>So...how's your short-term memory?</h3>\n";

$concentration_game->printPlayBoard ();

print "<p><b>".$concentration_game->move_count." total moves</b>\n";

if ($game_over) {
  print "<h3><a href=\"\">New game?</a></h3>\n";
}

page_close ();
?>

