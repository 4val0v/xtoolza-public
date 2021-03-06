<?
header('Content-Type: text/html; charset=utf-8');
$num=mt_rand(2000,10000);
header('Last-Modified: '.gmdate('D, d M Y H:i:s \G\M\T', time()-$num));
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Специальные символы HTML</title>
	<meta name="description" content="Таблица специальных символов html. Здесь можно посмотреть как вывести тот или иной символ html" />
	<meta name="keywords" content="символы html, как ввести копирайт, как ввести знак R" />
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width" />
	<meta name="robots" content="index, follow" />
	<link href="/q/style.css" rel="stylesheet"/>
	<link href="/q/css.css" rel="stylesheet"/>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script src="/js/topbutton.js"></script>
	<link href="http://xtoolza.info/newcss4.css" rel="stylesheet"/>
	<style>
	.tbl_symbol tr {
		height: 25px;
	}
	TABLE.tbl {
		width: 100%;
	}
	.center table {
		max-width: 650px;
	}
	.tbl_symbol th {
		font-weight: bold;
	}
	.tbl th {
		border: 1px solid #000;
		background-color: #EEEEEE;
		color: #000000;
		font-size: 12px;
		font-weight: normal;
		text-align: center;
	}
	th {
		padding: 5px;
		overflow: hidden;
	}
	.tbl_symbol tr {
		height: 25px;
	}
	table {
		text-align: left;
		min-width: 162px;
		max-width: 1024px;
		border-collapse: collapse;
	}
	.tbl_symbol tr td:first-child {
		font-size: 20px;
		vertical-align: top;
		text-align: center;
	}
	.tbl td {
		padding: 1px 5px;
		border: 1px solid #000;
	}
	tr {
		display: table-row;
		vertical-align: inherit;
		border-color: inherit;
	}
	</style>
</head>
<body id="linearBg1">

<div style="align:left;">
	<table style="width: 100%; max-width: 650px; text-align: left; min-width: 162px; border-collapse: collapse;">
		<tbody style="display: table-row-group; vertical-align: middle; border-color: inherit;">
			<tr>
				<td>
					<div class="TmgWrae">
						<a href="http://xtoolza.info" rel="nofollow"><img class="image UE" src="http://xtoolza.info/q/images/logo.png" width="120px" border="0" width="120px"><img class="image Dowe" src="http://xtoolza.info/q/images/logo_new.png" width="120px" /></a>
					</div>
				</td>
				<td>
					<table>
						<tbody>
							<tr>
								<td><h1 class="jumbotron">Специальные символы HTML</h1></td>
							</tr>
							<tr>
								<td><img src="http://xtoolza.info/q/images/htmlchars.png" width="80" alt="Конвертер HTML кода в символьные сущности"></td>
							</tr> 
						</tbody>
					</table>
				</td>
			</tr>
		</tbody>
	</table>
</div>
<p>Таблица специальных символов html. Здесь можно посмотреть как вывести тот или иной символ html</p>

<table class="tbl tbl_symbol">
<tr>
<th>символ</th>
<th>html-код</th>
<th>десятичный<br />код</th>
<th>описание</th>
</tr>
<tr><td><span style="background:gray">&nbsp;</span>	</td><td>&amp;nbsp;	</td><td>&amp;#160;</td><td>неразрывный пробел</td></tr>
<tr><td><span style="background:gray">&#8194;</span>	</td><td>&amp;ensp;	</td><td>&amp;#8194;</td><td>узкий пробел (еn-шириной в букву n)</td></tr>
<tr><td><span style="background:gray">&#8195;</span>	</td><td>&amp;emsp;	</td><td>&amp;#8195;</td><td>широкий пробел (em-шириной в букву m)</td></tr>
<tr><td>&#8211;</td><td>&amp;ndash;</td><td>&amp;#8211;</td><td>узкое тире (en-тире)</td></tr>
<tr><td>&#8212;</td><td>&amp;mdash;</td><td>&amp;#8212;</td><td>широкое тире (em -тире)</td></tr>
	<tr><td>&#173;</td><td>&amp;shy;</td><td>&amp;#173;</td><td>мягкий перенос</td></tr>
	<tr><td >а&#769;</td><td>&nbsp;</td><td>&amp;#769;</td><td>ударение, ставится после "ударной" буквы</td></tr>

<tr><th colspan="4">&nbsp;</th></tr>
<tr><td>&copy;</td><td>&amp;copy;</td><td>&amp;#169;</td><td>копирайт</td></tr>
<tr><td>&reg;</td><td>&amp;reg;</td><td>&amp;#174;</td><td>знак зарегистрированной торговой марки</td></tr>
<tr><td>&trade;</td><td>&amp;trade;</td><td>&amp;#8482;</td><td>знак торговой марки</td></tr>
<tr><td>&#186;</td><td>&amp;ordm;</td><td>&amp;#186;</td><td>копье Марса</td></tr>
<tr><td>&#170;</td><td>&amp;ordf;</td><td>&amp;#170;</td><td>зеркало Венеры</td></tr>
<tr><td>&permil;</td><td>&amp;permil;</td><td>&amp;#8240;</td><td>промилле</td></tr>
<tr><td style="font-size:23pt;font-family:Times New Roman,serif;">&pi;</td><td>&amp;pi;</td><td>&amp;#960;</td><td>пи (используйте Times New Roman)</td></tr>
<tr><td>&#166;</td><td>&amp;brvbar;</td><td>&amp;#166;</td><td>вертикальный пунктир	</td></tr>
<tr><td>&sect;</td><td>&amp;sect;</td><td>&amp;#167;</td><td>параграф</td></tr>
<tr><td>&deg;</td><td>&amp;deg;</td><td>&amp;#176;</td><td>градус</td></tr>
<tr><td>&micro;</td><td>&amp;micro;</td><td>&amp;#181;</td><td>знак "микро"</td></tr>
<tr><td>&para;</td><td>&amp;para;</td><td>&amp;#182;</td><td>знак абзаца</td></tr>
<tr><td>&#8230;</td><td>&amp;hellip;</td><td>&amp;#8230;</td><td>многоточие		</td></tr>
<tr><td>&#8254;</td><td>&amp;oline;</td><td>&amp;#8254;</td><td>надчеркивание		</td></tr>
<tr><td>&#180;</td><td>&amp;acute;</td><td>&amp;#180;</td><td>знак ударения		</td></tr>
<tr><td>&#8470;</td><td>&nbsp;</td><td>&amp;#8470;</td><td>знак номера</td></tr>
	<tr><td>&#128269;</td><td>&nbsp;</td><td>&amp;#128269;</td><td>Лупа (наклонённая влево)</td></tr>
	<tr><td>&#128270;</td><td>&nbsp;</td><td>&amp;#128270;</td><td>Лупа (наклонённая вправо)</td></tr>


<tr><th colspan="4">знаки арифметических и математических операций</th></tr>
<tr><td>&#215;</td><td>&amp;times;</td><td>&amp;#215;</td><td>умножить</td></tr>
<tr><td>&divide;</td><td>&amp;divide;	</td><td>&amp;#247;</td><td>разделить</td></tr>
<tr><td>&lt;</td><td>&amp;lt;	</td><td>&amp;#60;</td><td>меньше</td></tr>
<tr><td>&gt;</td><td>&amp;gt;	</td><td>&amp;#62;</td><td>больше</td></tr>
<tr><td>&#177;</td><td>&amp;plusmn;	</td><td>&amp;#177;</td><td>плюс/минус</td></tr>
<tr><td>&sup1;</td><td>&amp;sup1;	</td><td>&amp;#185;</td><td>степень 1</td></tr>
<tr><td>&sup2;</td><td>&amp;sup2;	</td><td>&amp;#178;</td><td>степень 2</td></tr>
<tr><td>&sup3;</td><td>&amp;sup3;	</td><td>&amp;#179;</td><td>степень 3</td></tr>
<tr><td>&not;</td><td>&amp;not;	</td><td>&amp;#172;</td><td>отрицание</td></tr>
<tr><td>&frac14;</td><td>&amp;frac14;	</td><td>&amp;#188;</td><td>одна четвертая</td></tr>
<tr><td>&frac12;</td><td>&amp;frac12;	</td><td>&amp;#189;</td><td>одна вторая</td></tr>
<tr><td>&frac34;</td><td>&amp;frac34;	</td><td>&amp;#190;</td><td>три четверти</td></tr>
<tr><td>&#8260;</td><td>&amp;frasl;	</td><td>&amp;#8260;</td><td>дробная черта</td></tr>
<tr><td>&#8722;</td><td>&amp;minus;	</td><td>&amp;#8722;</td><td>минус</td></tr>
<tr><td>&#8804;</td><td>&amp;le;	</td><td>&amp;#8804;</td><td>меньше или равно</td></tr>
<tr><td>&#8805;</td><td>&amp;ge;	</td><td>&amp;#8805;</td><td>больше или равно</td></tr>
<tr><td>&#8776;</td><td>&amp;asymp;	</td><td>&amp;#8776;</td><td>приблизительно (почти) равно</td></tr>
<tr><td>&#8800;</td><td>&amp;ne;	</td><td>&amp;#8800;</td><td>не равно</td></tr>
<tr><td>&#8801;</td><td>&amp;equiv;	</td><td>&amp;#8801;</td><td>тождественно</td></tr>
<tr><td>&#8730;</td><td>&amp;radic;	</td><td>&amp;#8730;</td><td>квадратный корень (радикал)	</td></tr>
<tr><td>&#8734;</td><td>&amp;infin;	</td><td>&amp;#8734;</td><td>бесконечность		</td></tr>
<tr><td>&#8721;</td><td>&amp;sum;	</td><td>&amp;#8721;</td><td>знак суммирования		</td></tr>
<tr><td>&#8719;</td><td>&amp;prod;	</td><td>&amp;#8719;</td><td>знак произведения		</td></tr>
<tr><td>&#8706;</td><td>&amp;part;	</td><td>&amp;#8706;</td><td>частичный дифференциал	</td></tr>
<tr><td>&#8747;</td><td>&amp;int;	</td><td>&amp;#8747;</td><td>интеграл			</td></tr>
<tr><td>&forall;</td><td>&amp;forall;	</td><td>&amp;#8704;</td><td>для всех (видно только если жирным шрифтом)</td></tr>
<tr><td>&exist;</td><td>&amp;exist;	</td><td>&amp;#8707;</td><td>существует</td></tr>
<tr><td>&empty;</td><td>&amp;empty;	</td><td>&amp;#8709;</td><td>пустое множество</td></tr>
<tr><td>&Oslash;</td><td>&amp;Oslash;	</td><td>&amp;#216;</td><td>диаметр</td></tr>
<tr><td>&isin;</td><td>&amp;isin;	</td><td>&amp;#8712;</td><td>принадлежит</td></tr>
<tr><td>&notin;	</td><td>&amp;notin;	</td><td>&amp;#8713;</td><td>не принадлежит</td></tr>
<tr><td>&ni;</td><td>&amp;ni;	</td><td>&amp;#8727;</td><td>содержит</td></tr>
<tr><td>&sub;</td><td>&amp;sub;	</td><td>&amp;#8834;</td><td>является подмножеством</td></tr>
<tr><td>&sup;</td><td>&amp;sup;	</td><td>&amp;#8835;</td><td>является надмножеством</td></tr>
<tr><td>&nsub;</td><td>&amp;nsub;	</td><td>&amp;#8836;</td><td>не является подмножеством</td></tr>
<tr><td>&sube;</td><td>&amp;sube;	</td><td>&amp;#8838;</td><td>является подмножеством либо равно</td></tr>
<tr><td>&supe;</td><td>&amp;supe;	</td><td>&amp;#8839;</td><td>является надмножеством либо равно</td></tr>
<tr><td>&oplus;</td><td>&amp;oplus;	</td><td>&amp;#8853;</td><td>плюс в кружке</td></tr>
<tr><td>&otimes;</td><td>&amp;otimes;	</td><td>&amp;#8855;</td><td>знак умножения в кружке </td></tr>
<tr><td>&perp;</td><td>&amp;perp;	</td><td>&amp;#8869;</td><td>перпендикулярно</td></tr>
<tr><td>&ang;</td><td>&amp;ang;	</td><td>&amp;#8736;</td><td>угол</td></tr>
<tr><td>&and;</td><td>&amp;and;	</td><td>&amp;#8743;</td><td>логическое И</td></tr>
<tr><td>&or;</td><td>&amp;or;	</td><td>&amp;#8744;</td><td>логическое ИЛИ</td></tr>
<tr><td>&cap;</td><td>&amp;cap;	</td><td>&amp;#8745;</td><td>пересечение</td></tr>
<tr><td>&cup;</td><td>&amp;cup;	</td><td>&amp;#8746;</td><td>объединение</td></tr>

<tr><th colspan="4">знаки валют</th></tr>
<tr><td>&euro;	</td><td>&amp;euro;	</td><td>&amp;#8364;</td><td>Евро	</td></tr>
<tr><td>&cent;	</td><td>&amp;cent;	</td><td>&amp;#162;</td><td>Цент	</td></tr>
<tr><td>&pound;	</td><td>&amp;pound;	</td><td>&amp;#163;</td><td>Фунт	</td></tr>
<tr><td>&#164;	</td><td>&amp;current;	</td><td>&amp;#164;</td><td>Знак валюты	</td></tr>
<tr><td>&yen;	</td><td>&amp;yen;	</td><td>&amp;#165;</td><td>Знак йены и юаня</td></tr>
<tr><td>&#402;	</td><td>&amp;fnof;	</td><td>&amp;#402;</td><td>Знак флорина</td></tr>

<tr><th colspan="4">маркеры</th></tr>
<tr><td>&#8226;		</td><td>&amp;bull;	</td><td>&amp;#8226;</td><td>простой маркер	</td></tr>
<tr><td>&#9675;		</td><td>&nbsp; 	</td><td>&amp;#9675;</td><td>круг	</td></tr>
<tr><td>&#183;		</td><td>&amp;middot;	</td><td>&amp;#183;</td><td>средняя точка	</td></tr>
<tr><td>&#8224;		</td><td>&nbsp;		</td><td>&amp;#8224;</td><td>крестик		</td></tr>
<tr><td>&#8225;		</td><td>&nbsp;		</td><td>&amp;#8225;</td><td>двойной крестик	</td></tr>
<tr><td>&#9824;		</td><td>&amp;spades;	</td><td>&amp;#9824;</td><td>пики		</td></tr>
<tr><td>&#9827;		</td><td>&amp;clubs;	</td><td>&amp;#9827;</td><td>трефы		</td></tr>
<tr><td>&#9829;		</td><td>&amp;hearts;	</td><td>&amp;#9829;</td><td>червы		</td></tr>
<tr><td>&#9830;		</td><td>&amp;diams;	</td><td>&amp;#9830;</td><td>бубны		</td></tr>
<tr><td>&#9674;		</td><td>&amp;loz;	</td><td>&amp;#9674;</td><td>ромб		</td></tr>
<tr><td>&#9999;		</td><td>&nbsp;		</td><td>&amp;#9999;</td><td>карандаш		</td></tr>
<tr><td>&#9998;		</td><td>&nbsp;		</td><td>&amp;#9998;</td><td>карандаш		</td></tr>
<tr><td>&#10000;	</td><td>&nbsp;		</td><td>&amp;#10000;</td><td>карандаш		</td></tr>
<tr><td>&#9997;		</td><td>&nbsp;		</td><td>&amp;#9997;</td><td>рука		</td></tr>

<tr><th colspan="4">кавычки</th></tr>
<tr><td>&quot;		</td><td>&amp;quot;	</td><td>&amp;#34;</td><td>двойная кавычка</td></tr>
<tr><td>&amp;		</td><td>&amp;amp;	</td><td>&amp;#38;</td><td>амперсанд</td></tr>
<tr><td>&laquo;		</td><td>&amp;laquo;	</td><td>&amp;#171;</td><td>левая типографская кавычка (кавычка-елочка) </td></tr>
<tr><td>&raquo;		</td><td>&amp;raquo;	</td><td>&amp;#187;</td><td>правая типографская кавычка (кавычка-елочка)</td></tr>
<tr><td>&#8249;		</td><td>&nbsp;		</td><td>&amp;#8249;</td><td>одиночная угловая кавычка открывающая	</td></tr>
<tr><td>&#8250;		</td><td>&nbsp;		</td><td>&amp;#8250;</td><td>одиночная угловая кавычка закрывающая	</td></tr>
<tr><td>&#8242;		</td><td>&amp;prime;	</td><td>&amp;#8242;</td><td>штрих (минуты, футы)			</td></tr>
<tr><td>&#8243;		</td><td>&amp;Prime;	</td><td>&amp;#8243;</td><td>двойной штрих (секунды, дюймы)		</td></tr>
<tr><td>&#8216;		</td><td>&amp;lsquo;	</td><td>&amp;#8216;</td><td>левая верхняя одиночная кавычка		</td></tr>
<tr><td>&#8217;		</td><td>&amp;rsquo;	</td><td>&amp;#8217;</td><td>правая верхняя одиночная кавычка	</td></tr>
<tr><td>&#8218;		</td><td>&amp;sbquo;	</td><td>&amp;#8218;</td><td>правая нижняя одиночная кавычка		</td></tr>
<tr><td>&#8220;		</td><td>&amp;ldquo;	</td><td>&amp;#8220;</td><td>кавычка-лапка левая			</td></tr>
<tr><td>&#8221;		</td><td>&amp;rdquo;	</td><td>&amp;#8221;</td><td>кавычка-лапка правая верхняя		</td></tr>
<tr><td>&#8222;		</td><td>&amp;bdquo;	</td><td>&amp;#8222;</td><td>кавычка-лапка правая нижняя		</td></tr>
<tr><td>&#10075;	</td><td>&nbsp;		</td><td>&amp;#10075;</td><td>одиночная английская кавычка открывающая</td></tr>
<tr><td>&#10076;	</td><td>&nbsp;		</td><td>&amp;#10076;</td><td>одиночная английская кавычка закрывающая</td></tr>
<tr><td>&#10077;	</td><td>&nbsp;		</td><td>&amp;#10077;</td><td>двойная английская кавычка открывающая</td></tr>
<tr><td>&#10078;	</td><td>&nbsp;		</td><td>&amp;#10078;</td><td>двойная английская кавычка закрывающая</td></tr>

<tr><th colspan="4">стрелки</th></tr>
<tr><td>&#8592;</td><td>&amp;larr;	</td><td>&amp;#8592;</td><td>стрелка влево	</td></tr>
<tr><td>&#8593;</td><td>&amp;uarr;	</td><td>&amp;#8593;</td><td>стрелка вверх 	</td></tr>
<tr><td>&#8594;</td><td>&amp;rarr;	</td><td>&amp;#8594;</td><td>стрелка вправо	</td></tr>
<tr><td>&#8595;</td><td>&amp;darr;	</td><td>&amp;#8595;</td><td>стрелка вниз  	</td></tr>
<tr><td>&#8596;</td><td>&amp;harr;	</td><td>&amp;#8596;</td><td>стрелка влево и вправо</td></tr>
<tr><td>&#8597;</td><td>&nbsp;		</td><td>&amp;#8597;</td><td>стрелка вверх и вниз</td></tr>
<tr><td>&crarr;</td><td>&amp;crarr;		</td><td>&amp;#8629;</td><td>возврат каретки</td></tr>
<tr><td>&lArr;</td><td>&amp;lArr;	</td><td>&amp;#8656;</td><td>двойная стрелка влево	</td></tr>
<tr><td>&uArr;</td><td>&amp;uArr;	</td><td>&amp;#8657;</td><td>двойная стрелка вверх 	</td></tr>
<tr><td>&rArr;</td><td>&amp;rArr;	</td><td>&amp;#8658;</td><td>двойная стрелка вправо	</td></tr>
<tr><td>&dArr;</td><td>&amp;dArr;	</td><td>&amp;#8659;</td><td>двойная стрелка вниз  	</td></tr>
<tr><td>&hArr;</td><td>&amp;hArr;	</td><td>&amp;#8660;</td><td>двойная стрелка влево и вправо</td></tr>
<tr><td>&#8661;</td><td>&nbsp;</td><td>&amp;#8661;</td><td>двойная стрелка вверх и вниз</td></tr>
<tr><td>&#9650;</td><td>&nbsp;</td><td>&amp;#9650;</td><td>треугольная стрелка вверх </td></tr>
<tr><td>&#9660;</td><td>&nbsp;</td><td>&amp;#9660;</td><td>треугольная стрелка вниз  </td></tr>
<tr><td>&#9658;</td><td>&nbsp;</td><td>&amp;#9658;</td><td>треугольная стрелка вправо</td></tr>
<tr><td>&#9668;</td><td>&nbsp;</td><td>&amp;#9668;</td><td>треугольная стрелка влево </td></tr>

<tr><th colspan="4">звездочки, снежинки</th></tr>
<tr><td>&#9731;		</td><td>&nbsp;	</td><td>&amp;#9731;</td><td>Снеговик</td></tr>
<tr><td>&#10052;	</td><td>&nbsp;	</td><td>&amp;#10052;</td><td>Снежинка</td></tr>
<tr><td>&#10053;	</td><td>&nbsp;	</td><td>&amp;#10053;</td><td>Зажатая трилистниками снежинка</td></tr>
<tr><td>&#10054;	</td><td>&nbsp;	</td><td>&amp;#10054;</td><td>Жирная остроугольная снежинка</td></tr>
<tr><td>&#9733;		</td><td>&nbsp;	</td><td>&amp;#9733;</td><td>Закрашенная звезда</td></tr>
<tr><td>&#9734;		</td><td>&nbsp;	</td><td>&amp;#9734;</td><td>Незакрашенная звезда</td></tr>
<tr><td>&#10026;	</td><td>&nbsp;	</td><td>&amp;#10026;</td><td>Незакрашенная звезда в закрашенном круге</td></tr>
<tr><td>&#10027;	</td><td>&nbsp;	</td><td>&amp;#10027;</td><td>Закрашенная звезда с незакрашенным кругом внутри</td></tr>
<tr><td>&#10031;	</td><td>&nbsp;	</td><td>&amp;#10031;</td><td>Вращающаяся звезда</td></tr>
<tr><td>&#9885;		</td><td>&nbsp;	</td><td>&amp;#9885;</td><td>Начерченная белая звезда</td></tr>
<tr><td>&#9898;		</td><td>&nbsp;	</td><td>&amp;#9898;</td><td>Средний незакрашенный круг</td></tr>
<tr><td>&#9899;		</td><td>&nbsp;	</td><td>&amp;#9899;</td><td>Средний закрашенный круг</td></tr>
<tr><td>&#9913;		</td><td>&nbsp;	</td><td>&amp;#9913;</td><td>Секстиле (типа снежинка)</td></tr>
<tr><td>&#10037;	</td><td>&nbsp;	</td><td>&amp;#10037;</td><td>Восьмиконечная вращающаяся звезда</td></tr>
<tr><td>&#10057;	</td><td>&nbsp;	</td><td>&amp;#10057;</td><td>Звёздочка с шарообразными окончаниями</td></tr>
<tr><td>&#10059;	</td><td>&nbsp;	</td><td>&amp;#10059;</td><td>Жирная восьмиконечная каплеобразная звёздочка-пропеллер</td></tr>
<tr><td>&#10042;	</td><td>&nbsp;	</td><td>&amp;#10042;</td><td>Шестнадцатиконечная звёздочка</td></tr>
<tr><td>&#10041;	</td><td>&nbsp;	</td><td>&amp;#10041;</td><td>Двенадцатиконечная закрашенная звезда</td></tr>
<tr><td>&#10040;	</td><td>&nbsp;	</td><td>&amp;#10040;</td><td>Жирная восьмиконечная прямолинейная закрашенная звезда</td></tr>
<tr><td>&#10038;	</td><td>&nbsp;	</td><td>&amp;#10038;</td><td>Шестиконечная закрашенная звезда</td></tr>
<tr><td>&#10039;	</td><td>&nbsp;	</td><td>&amp;#10039;</td><td>Восьмиконечная прямолинейная закрашенная звезда</td></tr>
<tr><td>&#10036;	</td><td>&nbsp;	</td><td>&amp;#10036;</td><td>Восьмиконечная закрашенная звезда</td></tr>
<tr><td>&#10035;	</td><td>&nbsp;	</td><td>&amp;#10035;</td><td>Восьмиконечная звёздочка</td></tr>
<tr><td>&#10034;	</td><td>&nbsp;	</td><td>&amp;#10034;</td><td>Звёздочка с незакрашенным центром</td></tr>
<tr><td>&#10033;	</td><td>&nbsp;	</td><td>&amp;#10033;</td><td>Жирная звёздочка</td></tr>
<tr><td>&#10023;	</td><td>&nbsp;	</td><td>&amp;#10023;</td><td>Заострённая четырёхконечная незакрашенная звезда</td></tr>
<tr><td>&#10022;	</td><td>&nbsp;	</td><td>&amp;#10022;</td><td>Заострённая четырёхконечная закрашенная звезда</td></tr>
<tr><td>&#9055;		</td><td>&nbsp;	</td><td>&amp;#9055;</td><td>Звезда в круге</td></tr>
<tr><td>&#8859;		</td><td>&nbsp;	</td><td>&amp;#8859;</td><td>Снежинка в круге</td></tr>

<tr><th colspan="4">часы, время</th></tr>
<tr><td>&#9200;		</td><td>&nbsp;	</td><td>&amp;#9200;</td><td>Часы</td></tr>
<tr><td>&#8986;		</td><td>&nbsp;	</td><td>&amp;#8986;</td><td>Часы</td></tr>
<tr><td>&#8987;		</td><td>&nbsp;	</td><td>&amp;#8987;</td><td>Песочные часы</td></tr>
<tr><td>&#9203;		</td><td>&nbsp;	</td><td>&amp;#9203;</td><td>Песочные часы</td></tr>


</table>
<table class="tbl tbl_symbol tbl_alpha">
<tr>
<tr><th colspan="6">Греческий алфавит</th></tr>
<tr><th colspan="2">строчные</th><th colspan="2">прописные</th><th rowspan="2">описание</th></tr>
<tr><th>символ</th><th>html-код</th><th>символ</th><th>html-код</th></tr>
<tr><td>&alpha;</td><td>&amp;alpha;</td><td>&Alpha;</td><td>&amp;Alpha;</td><td>альфа</td></tr>

<tr><td>&beta; 		</td><td>&amp;beta;	</td><td>&Beta;      </td><td>&amp;Beta;     </td><td>бета</td></tr>
<tr><td>&gamma;		</td><td>&amp;gamma;	</td><td>&Gamma;     </td><td>&amp;Gamma;    </td><td>гамма</td></tr>
<tr><td>&delta;		</td><td>&amp;delta;	</td><td>&Delta;	</td><td>&amp;Delta;	</td><td>дельта</td></tr>
<tr><td>&epsilon;	</td><td>&amp;epsilon;	</td><td>&Epsilon;	</td><td>&amp;Epsilon;	</td><td>эпсилон</td></tr>
<tr><td>&zeta;   	</td><td>&amp;zeta;   	</td><td>&Zeta;   	</td><td>&amp;Zeta;   	</td><td>дзета</td></tr>
<tr><td>&eta;    	</td><td>&amp;eta;    	</td><td>&Eta;    	</td><td>&amp;Eta;    	</td><td>эта</td></tr>
<tr><td>&theta;  	</td><td>&amp;theta;  	</td><td>&Theta;  	</td><td>&amp;Theta;  	</td><td>тета</td></tr>
<tr><td>&iota;   	</td><td>&amp;iota;   	</td><td>&Iota;   	</td><td>&amp;Iota;   	</td><td>йота</td></tr>
<tr><td>&kappa;  	</td><td>&amp;kappa;  	</td><td>&Kappa;  	</td><td>&amp;Kappa;  	</td><td>каппа</td></tr>
<tr><td>&lambda; 	</td><td>&amp;lambda; 	</td><td>&Lambda; 	</td><td>&amp;Lambda; 	</td><td>лямбда</td></tr>
<tr><td>&mu;     	</td><td>&amp;mu;     	</td><td>&Mu;     	</td><td>&amp;Mu;     	</td><td>мю</td></tr>
<tr><td>&nu;     	</td><td>&amp;nu;     	</td><td>&Nu;     	</td><td>&amp;Nu;     	</td><td>ню</td></tr>
<tr><td>&xi;     	</td><td>&amp;xi;     	</td><td>&Xi;     	</td><td>&amp;Xi;     	</td><td>кси</td></tr>
<tr><td>&omicron;	</td><td>&amp;omicron;	</td><td>&Omicron;	</td><td>&amp;Omicron;	</td><td>омикрон</td></tr>
<tr><td>&pi;     	</td><td>&amp;pi;     	</td><td>&Pi;     	</td><td>&amp;Pi;     	</td><td>пи</td></tr>
<tr><td>&rho;    	</td><td>&amp;rho;    	</td><td>&Rho;    	</td><td>&amp;Rho;    	</td><td>ро</td></tr>
<tr><td>&sigma;  	</td><td>&amp;sigma;  	</td><td>&Sigma;  	</td><td>&amp;Sigma;  	</td><td>сигма</td></tr>
<tr><td>&sigmaf; 	</td><td>&amp;sigmaf; 	</td><td></td></td><td><td>окончательная сигма</td></tr>
<tr><td>&tau;    	</td><td>&amp;tau;    	</td><td>&Tau;    	</td><td>&amp;Tau;    	</td><td>тау</td></tr>
<tr><td>&upsilon;	</td><td>&amp;upsilon;	</td><td>&Upsilon;	</td><td>&amp;Upsilon;	</td><td>ипсилон</td></tr>
<tr><td>&phi;    	</td><td>&amp;phi;    	</td><td>&Phi;    	</td><td>&amp;Phi;    	</td><td>фи</td></tr>
<tr><td>&chi;    	</td><td>&amp;chi;    	</td><td>&Chi;    	</td><td>&amp;Chi;    	</td><td>хи</td></tr>
<tr><td>&psi;    	</td><td>&amp;psi;    	</td><td>&Psi;    	</td><td>&amp;Psi;    	</td><td>пси</td></tr>
<tr><td>&omega;  	</td><td>&amp;omega;  	</td><td>&Omega;  	</td><td>&amp;Omega;  	</td><td>омега</td></tr>
</table><br>
<br />
<input class="btn-success btn" type="button" border="0" value="Назад" onClick="history.back()">
<a class="btn-success btn" href="http://xtoolza.info" rel="nofollow">На главную</a>
<script>
var obj = document.getElementById('dencoder');
function decode() {
 obj.value = obj.value.replace(/&/gi, '&amp;').replace(/</gi, '&lt;').replace(/>/gi, '&gt;');
}
function decode1() {
 obj.value = obj.value.replace(/\&lt;/gi, '<').replace(/\&gt;/gi, '>').replace(/\&amp;/gi, '&');
}
</script>
<? include ('../../../yandex_metrika.php'); ?>
</body>
</html>