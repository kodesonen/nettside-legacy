<?php

class sqlCommunication{
	private $config, $dbHost, $dbName, $dbUser, $dbPass;

	function __construct(){
		$this->config = parse_ini_file('config/sql_config.ini');
		$this->dbHost = $this->config['hostname'];
		$this->dbName = $this->config['database'];
		$this->dbUser = $this->config['username'];
		$this->dbPass = $this->config['password'];	
		
		try{
			$pdo = new PDO("mysql:host=$this->dbHost;dbname=$this->dbName", $this->dbUser, $this->dbPass);
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		catch(PDOException $e){
			echo "<strong>MySQL Error:</strong> " . $e->getMessage();
			die();
		}
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
