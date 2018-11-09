<?php

class Database{
	private $hostname = "localhost";
	private $username = "";
	private $password = "";
	private $dbname = "";

	private function connectSql(){
		try{
			$pdo = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		catch(PDOException $e){
			echo "<strong>MySQL Error:</strong> " . $e->getMessage();
			die();
		}
	}
}

?>
