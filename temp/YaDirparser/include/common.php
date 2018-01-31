<?php
	/**
	 * Common file for include everething
	 */
	
	/**
	 * Include magpierss - rss parser class
	 */
	require_once (dirname ( __FILE__ ) . "/smarty/Smarty.class.php");

	/**
	 * Include config class
	 */
	require_once (dirname ( __FILE__ ) . "/setting.php");
	
	/**
	 * Include Mysql wrapper
	 */
	require_once (dirname ( __FILE__ ) . "/classMysqlDB.php");
	
	/**
	* connect DB
	*/
	$db = new classMysqlDB(false);
	if (!$db->connect(DBHOST, DBUSER, DBPASS, DBNAME, "result/sql.log", "result/error.log")) {
		die("Can't connect to MySQL server!");
	}

	/**
	 * initialize smarty
	 */
	$smarty = new Smarty();
	$smarty->compile_check = true;
	$smarty->debugging = false;

?>