<?php
	
	define('KEY', 'r9P+*p3CBT^qP^t@Y1|{~g9F[jOL)3_qlj>O)vPXymMyGiPQW(:aYkk^x?I63/.y');

	/************************************
	**************FILE PATH**************
	*************************************/

	define('ROOT', dirname(dirname(__FILE__)));
	define('ROOT_LIB', ROOT.'/lib/');
	define('ROOT_CONFIG', ROOT.'/config/');

	include ROOT_CONFIG.'setup.php';

	/************************************
	***************WEB PATH**************
	*************************************/

	define('WWW_ROOT', dirname(dirname(__FILE__)));

	$directory = basename(WWW_ROOT);
	$url = explode($directory, $_SERVER['REQUEST_URI']);

	if (count($url) == 1) {
		define('WEB_ROOT', DIRECTORY_SEPARATOR);
	} else{
		define('WEB_ROOT',  $url[0] . $directory . DIRECTORY_SEPARATOR);
	}

	define('IMAGES', WWW_ROOT . DIRECTORY_SEPARATOR . 'img');

	/************************************
	***************HTTP PATH*************
	*************************************/

	define('HTTP_ROOT', 'localhost:8080'.WEB_ROOT);
?>
