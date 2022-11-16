<?php
class Database{
	public $host,$user,$pass,$name;
	public function __construct($host,$user,$pass,$name){
		$db = mysqli_connect($host,$user,$pass,$name);
		if ($db){
			$this->db = $db;
			return $db;
		}else{
			die("Error connecting to database!");
		}
	}
	public function query($query){
		$result = mysqli_query($this->db, $query);
		if ($result){
			return $result;
		}else{
			die("Error executing query!");
		}
	}
}