<?php
// Utviklet av Sirajuddin Asjad og Daniel Skryseth
// GitHub: https://github.com/kodesonen
// E-post: kontakt@kodesonen.no

session_start(); ob_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);

require($_SERVER['DOCUMENT_ROOT'].'/inc/core.php');
require($_SERVER['DOCUMENT_ROOT'].'/inc/sql.class.php');

$core = new Kodesonen;
$core->validPage();
$core->checkSession();
$core->betaAccess();
$core->userLogin();

//GetTimezone();

switch($_GET['side']){
	case 'hjem': include("pages/home.php"); break;
	default: include("pages/home.php"); break;
}

?>
