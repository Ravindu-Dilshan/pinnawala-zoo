<?php
require_once('database.cls.php');


class Message extends Database
{

	public function getAllMsg()
	{
		$connection = $this -> DBconnect();
		$sql = "SELECT * FROM messages";
		$result = mysqli_query($connection,$sql);
		if(mysqli_num_rows($result)>0){
				return $result;
			}
		else{
			return false;
		    }
		
	}


	public function addMsg($name,$email,$message)
	{
		$connection = $this -> DBconnect();
		$sql = "INSERT INTO `messages`(`name`, `email`, `message`, `date`) VALUES (?,?,?,?)";
		$stmt = mysqli_stmt_init($connection);
		if(!mysqli_stmt_prepare($stmt,$sql)){
				return -1;
			}
			else{
				$date = date("d/m/Y");
				mysqli_stmt_bind_param($stmt,'ssss',$name,$email,$message,$date);
				mysqli_stmt_execute($stmt);
				return 1;
			}
			mysqli_stmt_close($stmt);
	}

	public function deleteMsg($id)
	{
		$connection = $this -> DBconnect();
		$sql = "DELETE FROM `messages` WHERE idMsg= ?";
		$stmt = mysqli_stmt_init($connection);
		if(!mysqli_stmt_prepare($stmt,$sql)){
			return -1;
		}
		else{
			mysqli_stmt_bind_param($stmt,'s',$id);
			mysqli_stmt_execute($stmt);
			return 1;
		}
		mysqli_stmt_close($stmt);
	}
	
}
 ?>