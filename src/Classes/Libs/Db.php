<?php


namespace App\Classes\Libs;
use PDO;


class Db
{
	private $connection;

	public function findUsersByValue($value) {
 		 $results = Array();
  		 $this->connectDb();
 		 $sql = ("SELECT * FROM users WHERE firt_name LIKE :n OR last_name LIKE :n1 OR bdate LIKE :n2 ");
 		 $query = $this->connection->prepare($sql);
 		 if($query->execute(["n"=>$value,"n1"=>$value,"n2"=>$value]))
 		 while($row = $query->fetch(PDO::FETCH_ASSOC)){
 	  		 array_push($results,$row);
 		 }
 		 return $results;
	}

	private function connectDb() {
		if(is_null($this->connection)) {
		$this->connection =  new PDO('mysql:host=localhost;dbname=fp;charset=UTF8','root');
		}
			
	}

}