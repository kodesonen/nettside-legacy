<?php
// Utviklet av Sirajuddin Asjad og Daniel Skryseth
// GitHub: https://github.com/kodesonen
// E-post: kontakt@kodesonen.no

session_start(); ob_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);

require($_SERVER['DOCUMENT_ROOT'].'/inc/core.php');
require($_SERVER['DOCUMENT_ROOT'].'/inc/sql.class.php');
require($_SERVER['DOCUMENT_ROOT'].'/inc/user.class.php');
require($_SERVER['DOCUMENT_ROOT'].'/inc/admin.class.php');

$core = new Kodesonen;
$core->validPage();
$core->checkSession();
$core->betaAccess();
//GetTimezone();

switch($_GET['side']){
    case 'hjem': include("pages/home.php"); break;
    case 'medlem': include("pages/medlem.php"); break;
	case 'kurskatalog': include("pages/kurskatalog.php"); break;
    case 'admin': include("pages/admin.php"); break;
    case 'endre-medlemmer': include("pages/endre-medlemmer.php"); break;
    case 'kursbehandler': include("pages/kursbehandler.php"); break;
    case 'kapittelbehandler': include("pages/kapittelbehandler.php"); break;
    case 'nytt-kurs': include("pages/nytt-kurs.php"); break;
    default: include("pages/home.php"); break;
}

?>