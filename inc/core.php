<?php

class Kodesonen{
	protected $name, $contact, $sql;
	function __construct(){
		$this->name = "Kodesonen";
		$this->contact = "kontakt@kodesonen.no";
		$this->sql = new sqlCommunication;
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
		//$usr = new user;
		//$usr->login();
	}

	public function userRegister(){
		//$usr = new user;
		//$usr->register();
	}
}

?>