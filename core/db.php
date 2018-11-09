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

	function fetch_by_id($table, $where, $id){
		$query="SELECT 
		            *
		       FROM 
		          `".$table."`
		       WHERE 
		         (".$where."='".$id."')" ; 
					
		$result = $this->db->prepare($query);
		$result->execute();
		$data=$result->fetchAll(PDO::FETCH_ASSOC);
		return $data;
	}

	function fetch_by_two_id($table, $where1, $id1, $where2, $id2){
		$query="SELECT * FROM 
			`".$table."`
			WHERE 
			(".$where1."='".$id1."')
			AND
			(".$where2."='".$id2."')
			 "  ;  

		$result = $this->db->prepare($query);
		$result->execute();
		$data=$result->fetchAll(PDO::FETCH_ASSOC);
		return $data;
		
	}
}
	

?>