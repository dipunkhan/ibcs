<?php
class Database{
	private $conn;
	
	public function __construct($dbhost,$dbuser,$dbpass,$dbname){
		$this->conn=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
		
		if(mysqli_connect_errno()){
			die("Connection Fail! ".mysqli_connect_error());
		}
	}
	
	public function getAll($table,$cols){
		$sql="SELECT $cols FROM $table";
		$result=mysqli_query($this->conn,$sql);
		if(mysqli_num_rows($result)>0){
			return mysqli_fetch_all($result,MYSQLI_ASSOC);
		}
		else{
			return false;	
		}
	}
	
	public function getById($table,$cols,$condition){
		$sql="SELECT $cols FROM $table WHERE $condition";
		//echo $sql;
		$result=mysqli_query($this->conn,$sql);
		if(mysqli_num_rows($result)>0){
			return mysqli_fetch_assoc($result);
		}
		else{
			return false;	
		}
	}
	
		public function getByCatId($table,$cols,$condition){
		$sql="SELECT $cols FROM $table WHERE $condition";
		//echo $sql;
		$result=mysqli_query($this->conn,$sql);
		if(mysqli_num_rows($result)>0){
			return mysqli_fetch_all($result,MYSQLI_ASSOC);
		}
		else{
			return false;	
		}
	}
	
	public function Update($table,$cols,$condition){
		$sql="UPDATE $table SET $cols WHERE $condition";
		//echo $sql;
		$result=mysqli_query($this->conn,$sql);
		if(mysqli_affected_rows($this->conn)){
			return true;
		}
		else{
			return false;
		}
	}
	
	public function Insert($table,$cols){
		$sql="INSERT INTO $table SET $cols";
		//echo $sql;
		$result=mysqli_query($this->conn,$sql);
		if(mysqli_affected_rows($this->conn)){
			return true;
		}
		else{
			return false;
		}
	}
	
	public function Delete($table,$condition){
		$sql="DELETE FROM $table WHERE $condition";
		//echo $sql;
		$result=mysqli_query($this->conn,$sql);
		if(mysqli_affected_rows($this->conn)>0){
			return true;
		}
		else{
			return false;	
		}
	}
	
}

$obj=new Database("localhost","root","","php70");

//echo "<pre>";
//print_r($obj->getAll("students","*"));
//print_r($obj->getById("students","*","id=3"));
//print_r($obj->Update("students","name='abir',email='abir@nomail.com'","id=3"));
//echo $obj->Update("students","email='shorna@mail.com',mobile='01855669977'","id=7")?"Update Success":"Update FAil";
//echo $obj->Insert("students","name='Shorna',address='dhaka,bangladesh'")?"Insert Success":"Insert FAil";
//echo $obj->Delete("students","id=3")?"Delete Success":"Delete FAil";
//echo "</pre>";