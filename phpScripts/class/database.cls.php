<?php
class Database
{
	protected function DBconnect()
	{
		$server = "localhost";
		$user = "root";
		$password = "";
		$database = "php_pinnawala";
		$connection = mysqli_connect($server,$user,$password,$database);
		if(!$connection){
			echo '<h4>Connection error</h4>'.$connection->connect_error;
		}
		return $connection;
	}
}

?>