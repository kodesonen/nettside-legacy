<!-- Kodesonen @ https://github.com/kodesonen -->

<?php
session_start(); ob_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);

require($_SERVER['DOCUMENT_ROOT'].'/inc/core.php');

// Global sessions
if(isset($_SESSION['UID'])) { $UID = $_SESSION['UID']; }

// Global functions
$core = new Kodesonen;
$core->betaAccess();
$core->validPage();
$core->checkSession();

//GetTimezone();

// All pages
switch($_GET['side']){
	case 'hjem': include("pages/home.php"); break;
	default: include("pages/home.php"); break;
}

?>
