<?php

class Kodesonen{
	public $name, $contact, $facebook, $github, $instagram, $twitter, $linkedin;
	protected $sql;

	function __construct(){
		$this->name = "Kodesonen";
		$this->contact = "kontakt@kodesonen.no";
		$this->facebook = "https://facebook.com/kodesonen";
		$this->github = "https://github.com/kodesonen";
		$this->instagram = "https://instagram.com/kodesonen";
		$this->twitter = "https://twitter.com/kodesonen";
		$this->linkedin = "https://www.linkedin.com/company/kodesonen";
		$this->sql = new sqlCommunication;
	}

	public function betaAccess(){
		$whitelist = array(
			'2001:700:1b00:5b:144:97e7:e1e3:6c15', 
			'2001:700:1b00:5a:4fc0:862:44e4:bba', 
			'176.11.225.36', 
			'158.36.228.8', 
			'81.167.2.121', 
			'158.36.230.141', 
			'79.160.56.198');

		if(!in_array($this->GetIP(), $whitelist)){
			echo "<html><head><title>Kodesonen</title></head><body><strong>Kodesonen er under utvikling!</strong><br>
			Følg oss på Facebook og Instagram mens du venter! ;)</body></html>";
			die();
	    }
	}

	public function GetIP(){
		return $_SERVER['REMOTE_ADDR'];
	}

	public function checkSession(){
		if(isset($_SESSION['UID'])) $UID = $_SESSION['UID'];
	}

	public function validPage(){
		if(!isset($_GET['side'])) header("Location: /?side=hjem");
	}

	public function getHeader(){
		echo "
		<div class='navigation'>
			<ul class='nav'>
				<li><a href='/?side=hjem'>Hjemsiden</a></li>
				<li><a href='/?side=utfordringer'>Utfordringer</a></li>
				<li><a href='/?side=kurskatalog'>Kurskatalog</a></li>
				<li><a href='/?side=medlemsliste'>Medlemsliste</a></li>
				<li><a href='/?side=om-oss'>Om oss</a></li>
				<a href='/?side=medlem'><li><i class='fas fa-users'></i> Bli medlem</li></a>
			</ul>
		</div>
		";
	}

	public function newMember(){
		$usr = new user;
		$usr->register();
	}

	public function getCourses(){
		$usr = new user;
		$usr->listCourses();
	}
}

?>