<?php

class sqlCommunication{
	public $config, $dbHost, $dbName, $dbUser, $dbPass, $pdo;

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

	public function selectNoData($table){
		$query = $this->pdo->prepare("SELECT * FROM $table");
        $query->execute();
        return $query;
	}

	public function selectWithData($table, $column, $data){
		$query = $this->pdo->prepare("SELECT * FROM $table WHERE $column = :data");
        $query->execute(array(':data' => $data));
        return $query;
	}

	/* Needs to be completed: 
	public function selectAuthorData(){
		$query = $this->pdo->prepare("SELECT id, tittel 
									  FROM kurskapitler 
									  INNER JOIN dato, innhold ON kurskapitler.id =  
									  WHERE id = $_GET['id]");
	}
	*/

	public function grabData($table, $column, $data, $request){
		$query = $this->selectWithData($table, $column, $data);
        if($query->rowCount() != 0){
            $row = $query->fetch(PDO::FETCH_ASSOC);
            return $row[$request];
        }
	}
}

?>