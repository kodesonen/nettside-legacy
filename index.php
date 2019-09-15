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
//$core->betaAccess();

switch($_GET['side']){
    case 'hjem': include("pages/home.php"); break;
	case 'utfordringer': include("pages/utfordringer.php"); break;
	case 'kapitler': include("pages/kapitler.php"); break;
    case 'kurskatalog': include("pages/kurskatalog.php"); break;
	case 'medlemsliste': include("pages/medlemsliste.php"); break;
	case 'om-oss': include("pages/om-oss.php"); break;
	case 'medlem': include("pages/medlem.php"); break;
    case 'admin': include("pages/admin.php"); break;
    case 'login': include("pages/login.php"); break;
    case 'logout': $core->logout(); break;
    case 'endre-medlemmer': include("pages/endre-medlemmer.php"); break;
    case 'kursbehandler': include("pages/kursbehandler.php"); break;
    case 'kapittelbehandler': include("pages/kapittelbehandler.php"); break;
    case 'nytt-kurs': include("pages/nytt-kurs.php"); break;
    case 'nytt-kapittel': include("pages/nytt-kapittel.php"); break;
    case 'skriv-innlegg': include("pages/skriv-innlegg.php"); break;
    case 'les-innlegg': include("pages/les-innlegg.php"); break;
    case 'endre-kurs': include("pages/endre-kurs.php"); break;
    case 'endre-utfordringer': include("pages/endre-utfordringer.php"); break;
    case 'skjul-medlem': include("pages/skjul-medlem.php"); break;
    case 'ny-utfordring': include("pages/ny-utfordring.php"); break;
    case 'endre-utfordring': include("pages/endre-utfordring.php"); break;
    case 'endre-bruker': include("pages/endre-bruker.php"); break;
    case 'vilkar-og-personvern': include("pages/vilkar-og-personvern.php"); break;
    case 'sokemotoroptimalisering': include("pages/sokemotoroptimalisering.php"); break;
    case 'send-epost': include("pages/send-epost.php"); break;
    default: include("pages/404.php"); break;
}

?>