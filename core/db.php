<?php

/**
 * Database Interface
 */
class Database
{
	public $db;
	function __construct()
	{
		$host = "localhost";
		$dbname = "rcciit_outcome";
		$user = "root";
		$pass = "";
		$this->db = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
	}
	function insert($table, $data){
		$array_size=sizeof($data);
		$sql="INSERT INTO `".$table."` SET ";
		$i=0;
		foreach($data as $key => $value){
			++$i;	
			if($i==$array_size)
			$sql.="`".$key."`='".$value."' ; ";
			else
			$sql.="`".$key."`='".$value."' , ";
		}

		//echo $sql;
		$query = $this->db->prepare($sql);
		$query->execute();
		//print_r($query->errorInfo());
		//		return $query;
		return $this->db->lastInsertId();
	}
}
	

?>