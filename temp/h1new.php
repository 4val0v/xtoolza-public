<?
error_reporting( E_ALL );
ini_set('display_errors', 1);
foreach ($plist as $arraylist) {
	$narray = preg_replace('~^(?!https??://)~i', 'http://', $arraylist, 1);
	echo "<tr><td style=\"word-break: break-all;\">".'<a href="http://'. $arraylist . '" target="_blank" >'.$arraylist.'</a>'. "</td>";
	$getpage = getpage($narray);
	foreach ($getpage as $pagecontent){
		preg_match_all ('|<h1(.*)</h1>|isU', $pagecontent, $contenth1, PREG_SET_ORDER);
		preg_match_all ('|<h2(.*)</h2>|isU', $pagecontent, $contenth2, PREG_SET_ORDER);
		preg_match_all ('|<h3(.*)</h3>|isU', $pagecontent, $contenth3, PREG_SET_ORDER);
		preg_match_all ('|<h4(.*)</h4>|isU', $pagecontent, $contenth4, PREG_SET_ORDER);
		preg_match_all ('|<h5(.*)</h5>|isU', $pagecontent, $contenth5, PREG_SET_ORDER);
		preg_match_all ('|<h6(.*)</h6>|isU', $pagecontent, $contenth6, PREG_SET_ORDER);
		foreach ($contenth1 as $contentlisth1) {
			echo "<td>&lt;h1".encoding($contentlisth1['1']) . "&lt;/h1&gt;</td>";
			echo "</tr>";
		}
		foreach ($contenth2 as $contentlisth2) {
			echo "<td>&lt;h2".encoding($contentlisth2['1']) . "&lt;/h2&gt;</td>";
			echo "</tr>";
		}
		foreach ($contenth3 as $contentlisth3) {
			echo "<td>&lt;h3".encoding($contentlisth3['1']) . "&lt;/h3&gt;</td>";
			echo "</tr>";
		}
		foreach ($contenth4 as $contentlisth4) {
			echo "<td>&lt;h4".encoding($contentlisth4['1']) . "&lt;/h4&gt;</td>";
			echo "</tr>";
		}
		foreach ($contenth5 as $contentlisth5) {
			echo "<td>&lt;h5".encoding($contentlisth5['1']) . "&lt;/h5&gt;</td>";
			echo "</tr>";
		}
		foreach ($contenth6 as $contentlisth6) {
			echo "<td>&lt;h6".encoding($contentlisth6['1']) . "&lt;/h6&gt;</td>";
			echo "</tr>";
		}
	}
}
?>