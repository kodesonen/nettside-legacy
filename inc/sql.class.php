<?php

class sqlCommunication{
	private $dbHost, $dbUser, $dbPass, $dbName;
	function __construct(){
		/*
		$this->dbHost = $config['host'];
		$this->dbName = $config['name'];
		$this->dbUser = $config['user'];
		$this->dbPass = $config['pass'];	
		
		try{
			$pdo = new PDO("mysql:host=$this->dbHost;dbname=$this->dbName", $this->dbUser, $this->dbPass);
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		catch(PDOException $e){
			echo "<strong>MySQL Error:</strong> " . $e->getMessage();
			die();
		}
		*/
	}

	public function sqlSelect(){
		//
	}

	public function sqlUpdate(){
		//
	}

	public function sqlInsert(){
		//
	}
}

?>
