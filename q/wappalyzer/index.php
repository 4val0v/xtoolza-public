<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
require('WappalyzerException.php');
require('Wappalyzer.php');

$url = 'http://xtoolza.info';
$wappalyzer = new Wappalyzer($url);

$detectedApps = $wappalyzer->analyze();