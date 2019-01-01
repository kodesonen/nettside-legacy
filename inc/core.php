<?php

class Kodesonen{
	protected $name, $contact, $devs = [], $sql;
	function __construct(){
		$this->sql = new sqlCommunication;
		$this->name = "Kodesonen";
		$this->contact = "kontakt@kodesonen.no";
		$this->devs[0] = "Sirajuddin Asjad";
		$this->devs[1] = "Daniel Skryseth";
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
		$user = new user;
		$user->login();
	}

	public function userRegister(){
		//$user = new user;
		//$user->register();
	}
}

?>