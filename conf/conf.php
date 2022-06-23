<?php
define("PATH", $_SERVER['DOCUMENT_ROOT'] . '/login/');
define("ROOT", (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/login/');
define("_CLASS", PATH . "class/");
define("VIEW", PATH . "view/");
define("BLOCK", VIEW . "blocks/");
define("CONTROLLER", "../controller/");
define("CSS", "../view/css/");
define("JS", "../view/js/");
define("IMG", "../view/images/");

define("HOST_DB", "localhost");
define("USER_DB", "root");
define("PASSWORD_DB", "");
define("DATABASE_DB", "login");

define("PASSWORD", "NF#%=cU5LyGcE*?$]+BE%]u}J@qPrG(4");
define("COOKIE_NAME", "testLogin");
define("COOKIE_EXPIRE_TIME", 31622400);

require_once(_CLASS . 'main.class.php');
require_once(_CLASS . 'user.class.php');
require_once(_CLASS . 'session.class.php');

session_name(COOKIE_NAME);
session_start();

$main = new main();
$current_user = null;
	
if(isset($_COOKIE[COOKIE_NAME]))
{
	$session = new session($_COOKIE[COOKIE_NAME]);
	if(!is_null($session->id)){
		$current_user = new user($session->data);
	}
}
?>