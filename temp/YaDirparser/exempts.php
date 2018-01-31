<?php
	require_once(dirname(__FILE__) . "/include/common.php");
	if(isset($_GET['delete'])&&is_numeric($_GET['delete'])) {
		$db->execute("DELETE FROM `exempts` WHERE Id= " .$_GET['delete']);
	}
	$db->execute("SET CHARACTER SET cp1251");
	$db->execute("SET NAMES cp1251");
	$db->execute("SET CHARACTER_SET_RESULTS=cp1251");
	if(isset($_GET['word'])&&trim($_GET['word'])!='') {
		$data = array();
		$data['word'] = $db->escapestr(($_GET['word']));
		$db->insert('exempts',$data);
	}
	$result = $db->execute("SELECT * FROM `exempts`");
	$Data = array();
	while ($row = mysql_fetch_assoc($result)) {
		$Data[] = $row;
	}
	$smarty->assign("Data", $Data);
	$smarty->display('exempts.tpl');
?>
