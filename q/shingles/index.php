<?
header('Content-Type: text/html; charset=utf-8');
ignore_user_abort(true);
set_time_limit(0);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width" />
	<link href="/q/style.css" rel="stylesheet"/>
	<link href="/q/css.css" rel="stylesheet"/>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>Сравнение текстов на схожесть - алгоритм шинглов - уникальный контен - реврайт</title>
	<meta name="keywords" content="Сравнение, текстов, схожесть, уникальный, контен, реврайт, алгоритм шингл" />
	<meta name="description" content="Данный сервис позволяет сравнить два текста на уникальность после изменений." />
	<meta name="robots" content="index, follow" />
	<link href="http://xtoolza.info/newcss4.css" rel="stylesheet"/>
</head>
<body style="font-family: Tahoma;" id="linearBg1">
<div id="container" style="margin: 0 auto; width: 95%;">
<div style="align:left;">
	<table>
		<tbody>
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
								<td><h1 class="jumbotron">Сравнение текстов на схожесть</h1></td>
							</tr>

						</tbody>
					</table>
				</td>
			</tr>
		</tbody>
	</table>
</div>
<br />
<div>
Перед сравнением текст проходит минимальные чистки и изменения:<br />
- убираются html вставки такие как &lt;strong&gt;<br />
- символы преобразуются в нижний регистр<br />
- убираются запятые, точки, апострофы, знаки переноса строки, двойные пробелы, слешы.<br />
- максимальная длина 200000 знаков.<br />
<br />
<form method="post" action="<?=$_SERVER['PHP_SELF']?>">
	<table>
		<tr>
			<td><strong>Оригинальный текст</strong>:<br /></td>
			<td><strong>Переделанная (реврайт) копия</strong>:<br /></td>
		</tr>
		<tr>
			<td>
				<textarea id="text1" name="text1" style="width: 500px; height: 200px;"><?=isset($_POST['text1']) ? stripslashes(htmlspecialchars($_POST['text1'])) : ''?></textarea>
			</td>
			<td>
				<textarea id="text2" name="text2" style="width: 500px; height: 200px;"><?=isset($_POST['text2']) ? stripslashes(htmlspecialchars($_POST['text2'])) : ''?></textarea>
			</td>
		</tr>
	</table>
	<br />
	&nbsp;&nbsp;&nbsp;<input type="submit" class="btn-primary btn" value="Проверить" style="float:left; display: block; margin: 0 auto; font-weight: bold; width: 50%;" /></br />
</form>
	<p>
	<?php
	function get_shingle($text,$n=3) {
		$shingles = array();
		$text = clean_text($text);
		$elements = explode(" ",$text);
		for ($i=0;$i<(count($elements)-$n+1);$i++) {
			$shingle = '';
			for ($j=0;$j<$n;$j++){
				$shingle .= mb_strtolower(trim($elements[$i+$j]), 'UTF-8')." ";
			}
			if(strlen(trim($shingle)))
				$shingles[$i] = trim($shingle, ' -');
		}
		return $shingles;
	}

	function clean_text($text) {
		$new_text = eregi_replace("[\,|\.|\'|\"|\\|\/]","",$text);
		$new_text = eregi_replace("[\n|\t]"," ",$new_text);
		$new_text = preg_replace('/(\s\s+)/', ' ', trim($new_text));
		return $new_text;
	}

	function check_it($first, $second) {
		echo '<b>Шинглы</b> — выделенные из статьи подпоследовательности слов. Необходимо из сравниваемых текстов выделить подпоследовательности слов, идущих друг за другом по 10 штук (длина шингла). Выборка происходит внахлест, а не встык. Таким образом, разбивая текст на подпоследовательности, мы получим набор шинглов в количестве равному количеству слов минус длина шингла плюс один (кол_во_слов — длина_шингла + 1).<br><br>';
		if (!$first || !$second) {
			echo "Отсутствуют оба или один из текстов!";
			return 0;
		}

		if (strlen($first)>200000 || strlen($second)>200000) {
			echo "Длина обоих или одного из текстов превысила допустимую!";
			return 0;
		}

		for ($i=1;$i<5;$i++) {
			$first_shingles = array_unique(get_shingle($first,$i));
			$second_shingles = array_unique(get_shingle($second,$i));
		
			if(count($first_shingles) < $i-1 || count($second_shingles) < $i-1) {
				echo "Количество слов в тексте меньше чем длинна шингла<br />";
				continue;
			}
			$intersect = array_intersect($first_shingles,$second_shingles);
			$merge = array_unique(array_merge($first_shingles,$second_shingles));
			$diff = (count($intersect)/count($merge))/0.01;
			echo "Количество слов в шингле - $i. Процент схожести - ".round($diff, 2)."%<br />";
		}
	}

	if (isset($_POST['text1']) && isset($_POST['text2'])) {
		check_it(strip_tags($_POST['text1']), strip_tags($_POST['text2']));
	}
	?>
	</p>
	</div>
</div>
<br />
<br />
<input type="button" class="btn-success btn" border="0" value="Назад" onClick="history.back()">
<a class="btn-success btn" href="http://xtoolza.info">На главную</a>
<? include ('../../yandex_metrika.php'); ?>
</body>
</html>