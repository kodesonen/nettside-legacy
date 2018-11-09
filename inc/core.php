<?php

class Kodesonen{
	public $name = "Kodesonen";

	public function betaAccess(){
		echo "Her kommer det noe spennende snart! ;-)";
	}

	public function checkSession(){
		if(isset($_SESSION['UID'])) $UID = $_SESSION['UID'];
	}

	public function validPage(){
		if(!isset($_GET['side'])) header("Location: /?side=hjem");
	}
}

?>
