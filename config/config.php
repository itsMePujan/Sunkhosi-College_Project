<?php
	ob_start();
	session_start();
	define('SITE_URL', $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST']); //https://localhost
	define('PROJECT_PATH',$_SERVER['DOCUMENT_ROOT']);

	define('CMS_CSS',PROJECT_PATH.'/includes/backend/main_cs.php');
	define('CMS_JS', PROJECT_PATH.'/includes/backend/main_js.php');
	define('SIDE_TOP',PROJECT_PATH.'/includes/backend/slidebar.php');
	define('HEADER', PROJECT_PATH.'/includes/backend/header.php');

	define('FONTEND_HEADER',PROJECT_PATH.'/includes/fontend/header.php');
	define('FONTEND_CSS',PROJECT_PATH.'/includes/fontend/main_cs.php');
	define('FONTEND_JS',PROJECT_PATH.'/includes/fontend/main_js.php');
	define('FONTEND_PATH',SITE_URL.'/includes/fontend');

	define('ASSETS', SITE_URL.'/assets');
	define('UPLOAD_DIR', SITE_URL.'/uploads');
	define('CMS_URL', SITE_URL.'/cms');
	define('Company_Name', 'Sunkoshi');
	define('TITLE', '<title>Sunkoshi Rural Municipality</title>');


	define('DB_HOST', 'localhost');
	define('DB_NAME', 'sunkoshi');
	define('DB_USER', 'root');
	define('DB_PASSWORD', '');
	//define('admin','Pujan Poudel');
	//define('admin_email','pujanpoudelofficial@gmail.com');



	define('ERROR_LOG', $_SERVER['DOCUMENT_ROOT'].'/error/error.log');

    define('IMAGE_EXTENSIONS', array('jpg','jpeg','png','bmp','svg'));

    define('COPYRIGHT',' Sunkoshi Rural Municipality');
