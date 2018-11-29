<?php

class Kodesonen{
	private $name;
	private $version;
	private $contact;
	private $devs = [];
	
	function __construct(){
		$this->name = "Kodesonen";
		$this->version = "1.0";
		$this->contact = "kontakt@kodesonen.no";
		$this->devs[0] = "Sirajuddin Asjad";
		$this->devs[1] = "Daniel Skryseth";

		$sql = new sqlCommunication;
	}

	public function betaAccess(){
		echo "<html><head><title>Kodesonen</title></head>
		<body><strong>Kodesonen er under utvikling!</strong><br>Følg oss på Facebook og Instagram mens du venter! ;)</body></html>";
		die();
	}

	public function checkSession(){
		if(isset($_SESSION['UID'])) $UID = $_SESSION['UID'];
	}

	public function validPage(){
		if(!isset($_GET['side'])) header("Location: /?side=hjem");
	}
	
	public function userLogin(){
		$user->userLogin();
	}
}

?>
