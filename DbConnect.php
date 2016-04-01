<?php
/*
 * This connection of the database can be more simple by using this class pass four parameters in the constructor.
 
 * How to use -
 
 	new DbConnect("Server_name","User_name","Password","Database_Name");
		
	To chec wheather the connection is established or not use isConnect() function it returns boolean falue
	
	That's yet. Than you.
	
	
 * Dbconnect class contain another function that is selectAllData() which is used to fatch all the data stored in a
   spacific table. It takes a parameter as table name and takes the Database as previously given.
*/

class DbConnect {
	
	private $serverName;
	private $dbName;
	private $userName;
	private $passWord;
	
	public function __construct($host, $user_name, $password, $db_name){
		
		$serverName = $host;
		$userName = $user_name;
		$passWord = $password;
		$dbName = $db_name;
		
		$connect = mysqli_connect($serverName, $userName, $passWord, $dbName);
		$GLOBALS['connect'] = $connect;	
	}
	
	
	public function isConnect(){
		
		if($GLOBALS['connect']){
			$report = true;
		} else {
			$report = false;
		}
		return $report;
	}
	
	
	function selectAllData($tableName){
		
		$query = "select * from ".$tableName;
		$data = mysqli_query($GLOBALS['connect'], $query);
		$result = mysqli_fetch_assoc($data);
	
		return $result;
	}	
}
?>