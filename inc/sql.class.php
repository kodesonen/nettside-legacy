<?php

class sqlCommunication{
	private $config, $dbHost, $dbName, $dbUser, $dbPass, $pdo;

	function __construct(){
		$this->config = parse_ini_file('config/sql_config.ini');
		$this->dbHost = $this->config['hostname'];
		$this->dbName = $this->config['database'];
		$this->dbUser = $this->config['username'];
		$this->dbPass = $this->config['password'];	
		
		try{
			$this->pdo = new PDO("mysql:host=$this->dbHost;dbname=$this->dbName", $this->dbUser, $this->dbPass);
			$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		catch(PDOException $e){
			echo "<strong>MySQL Error:</strong> " . $e->getMessage();
			die();
		}
	}

	public function sqlSelect(){
		$query = $this->pdo->prepare("SELECT * FROM medlemmer");
		$query->execute();
		echo $query->rowCount();
	}

	public function sqlUpdate(){
		//
	}

	public function sqlInsert(){
		//
	}
}

?>
