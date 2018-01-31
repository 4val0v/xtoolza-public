<!DOCTYPE html>
<html>
<head>
<title>Калькулятор онлайн</title>
<meta name="description" content="Посчитать с помощью калькулятора онлайн">
<meta name="viewport" content="width=device-width" /> 
<meta name="W3Techs-verification" content="uWt0v7rsJIitpuOh" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta http-equiv="content-language" content="ru" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<link rel="shortcut icon" type="image/ico" href="http://xtoolza.info/favicon.ico" />
<link href="http://xtoolza.info/newcss2.css" rel="stylesheet"/>
<link rel="apple-touch-icon" href="http://xtoolza.info/favicon.png" />
<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script language="LiveScript">
<!--
function addChar(input, character)
{if(input.value == null || input.value == "0")
	input.value = character
 else
	input.value += character
}
function cos(form)
{form.display.value = Math.cos(form.display.value);}

function sin(form)
{form.display.value = Math.sin(form.display.value);}

function tan(form)
{form.display.value = Math.tan(form.display.value);}

function sqrt(form)
{form.display.value = Math.sqrt(form.display.value);}

function ln(form)
{form.display.value = Math.log(form.display.value);}

function exp(form)
{form.display.value = Math.exp(form.display.value);}

function sqrt(form)
{form.display.value = Math.sqrt(form.display.value);}

function deleteChar(input)
{input.value = input.value.substring(0, input.value.length - 1);}

function changeSign(input)
{// could use input.value = 0 - input.value, but let's show off substring
 if(input.value.substring(0, 1) == "-")
		 input.value = input.value.substring(1, input.value.length)
 else
		 input.value = "-" + input.value
}

function compute(form) 
{form.display.value = eval(form.display.value);}

function square(form) 
{form.display.value = eval(form.display.value) * eval(form.display.value);}

function checkNum(str) 
{       for (var i = 0; i < str.length; i++) {
								var ch = str.substring(i, i+1)
								if (ch < "0" || ch > "9") {
												if (ch != "/" && ch != "*" && ch != "+" && ch != "-" && ch != "."
																&& ch != "(" && ch!= ")") {
																alert("invalid entry!")
																return false
												}
								}
				}
				return true
}
//-->
</script>
</head>
<BODY id="linearBg1">
<center>
<h1 style="color:white">xToolza Calculator</h1>
<span style="color:white"></span>
<hr>
<form>
<input name="display" value="0" size=25></td>
<br><br><br>

<input type="button" value="   exp  "
	onClick="if (checkNum(this.form.display.value)){ exp(this.form) }">

<input type="button" value="    7    "
	onClick="addChar(this.form.display, '7')">
<input type="button" value="    8    "
	onClick="addChar(this.form.display, '8')">
<input type="button" value="    9    "
	onClick="addChar(this.form.display, '9')">
<input type="button" value="    /    "
	onClick="addChar(this.form.display, '/')">
<br>

<input type="button" value="    ln    "
	onClick="if (checkNum(this.form.display.value)){ ln(this.form) }">

<input type="button" value="    4    "
	onClick="addChar(this.form.display, '4')">
<input type="button" value="    5    "
	onClick="addChar(this.form.display, '5')">
<input type="button" value="    6    "
	onClick="addChar(this.form.display, '6')">
<input type="button" value="    *    "
	onClick="addChar(this.form.display, '*')">
<br>

<input type="button" value="   sqrt  "
	onClick="if (checkNum(this.form.display.value))
{ cos(this.form) }">
<input type="button" value="    1    "
	onClick="addChar(this.form.display, '1')">
<input type="button" value="    2    "
	onClick="addChar(this.form.display, '2')">
<input type="button" value="    3    "
	onClick="addChar(this.form.display, '3')">
<input type="button" value="    -    " 
	onClick="addChar(this.form.display, '-')">
<br>

<input type="button" value="    sq   "
	onClick="if (checkNum(this.form.display.value)) { square(this.form) }">
<input type="button" value="    0    "
	onClick="addChar(this.form.display, '0')"> 
<input type="button" value="    .     "
	onClick="addChar(this.form.display, '.')"> 
<input type="button" value="   +/-  "
	onClick="changeSign(this.form.display)">
<input type="button" value="   +    "
	onClick="addChar(this.form.display, '+')">

<br>
<input type="button" value="  (    "
	onClick="addChar(this.form.display, '(')"> 
 
<input type="button" value="   cos   "
	onClick="if (checkNum(this.form.display.value)){ cos(this.form) }">

<input type="button" value="    sin    "
	onClick="if (checkNum(this.form.display.value)){ sin(this.form) }">

<input type="button" value="    tan    "
	onClick="if (checkNum(this.form.display.value)){ tan(this.form) }">

<input type="button" value="   ) "
	onClick="addChar(this.form.display, ')')"> 

<br>

<input type="button" value="    Очистить     "
	onClick="this.form.display.value = 0 ">

<input type="button" value="   Стереть   "
	onClick="deleteChar(this.form.display)">

<input type="button" value="   Ввод    " name="enter"
	onClick="if (checkNum(this.form.display.value)) { compute(this.form) }">
</form>
<br><br>
<a class="btn-success btn" href="http://xtoolza.info">На главную</a>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</HTML>