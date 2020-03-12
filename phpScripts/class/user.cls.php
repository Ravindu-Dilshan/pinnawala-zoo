<?php
require_once('database.cls.php');


class User extends Database
{
	public function login($user,$pass)
	{
		$connection = $this -> DBconnect();
		$sql = "SELECT * FROM user WHERE (nameUser = ? OR email = ?)";
		$stmt = mysqli_stmt_init($connection);
		if(!mysqli_stmt_prepare($stmt,$sql)){
			return -1;
		}
		else{
			mysqli_stmt_bind_param($stmt,'ss',$user,$user);
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);
			if($row = mysqli_fetch_assoc($result)){
				$pwCheck = password_verify($pass,$row['password']);
				if ($pwCheck == true) {
					session_start();
					$_SESSION['ID'] = $row['idUser'];
					$_SESSION['TYPE'] = $row['type'];
					return 1;
				}
				elseif ($pwCheck == false) {
					return 0;
				}
				else{
					return -1;
				}
			}
			else{
				return 0;
			}
		}
		
	}

	
	private function getUserByName($user,$email)
	{
		$connection = $this -> DBconnect();
		$sql = "SELECT * FROM user WHERE nameUser = ? OR email = ?";
		$stmt = mysqli_stmt_init($connection);
		if(!mysqli_stmt_prepare($stmt,$sql)){
			return -1;
		}
		else{
			mysqli_stmt_bind_param($stmt,'ss',$user,$email);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);
			$result = mysqli_stmt_num_rows($stmt);
			if($result>0){
				return 1;
			}
			else{
				return 0;
			}
		}
		mysqli_stmt_close($stmt);
		
	}

	public function getAllUsers()
	{
		$connection = $this -> DBconnect();
		$sql = "SELECT * FROM user";
		$result = mysqli_query($connection,$sql);
		if(mysqli_num_rows($result)>0){
				return $result;
			}
		else{
			return false;
		    }
		
	}

	public function addUser($name,$address,$email,$password)
	{
		$connection = $this -> DBconnect();
		$exists = $this->getUserByName($name,$email);
		if($exists!=1){
			$sql = "INSERT INTO `user`(`nameUser`, `email`, `address`, `password`, `type`) VALUES (?,?,?,?,?)";
			$stmt = mysqli_stmt_init($connection);
			if(!mysqli_stmt_prepare($stmt,$sql)){
				return -1;
			}
			else{
				$hashPass = password_hash($password,PASSWORD_BCRYPT);
				$type = 'user';
				mysqli_stmt_bind_param($stmt,'sssss',$name,$email,$address,$hashPass,$type);
				mysqli_stmt_execute($stmt);
				return 1;
			}
		}
		else{
				return 2;
			}
		mysqli_stmt_close($stmt);
	}


	public function updateUser($id,$name,$address,$email,$type)
	{
		$connection = $this -> DBconnect();
		$sql = "UPDATE `user` SET `nameUser`=?,`email`=?,`address`=?, type=? WHERE idUser = ?";
		$stmt = mysqli_stmt_init($connection);
		if(!mysqli_stmt_prepare($stmt,$sql)){
			return -1;
		}
		else{
			mysqli_stmt_bind_param($stmt,'sssss',$name,$email,$address,$type,$id);
			mysqli_stmt_execute($stmt);
			return 1;
		}
		mysqli_stmt_close($stmt);
	}

	public function deleteUser($id)
	{
		$connection = $this -> DBconnect();
		$sql = "DELETE FROM `user` WHERE idUser = ?";
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

	public function getProfile($id)
	{
		$connection = $this -> DBconnect();
		$sql = "SELECT * FROM user WHERE idUser = ?";
		$stmt = mysqli_stmt_init($connection);
		if(!mysqli_stmt_prepare($stmt,$sql)){
			return -1;
		}
		else{
			mysqli_stmt_bind_param($stmt,'s',$id);
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);
			if(mysqli_num_rows($result)>0){
				return $result;
			}
			else{
			return false;
		    }
		}
		
	}

	public function updateProfile($id,$name,$address,$email)
	{
		$connection = $this -> DBconnect();
		$sql = "UPDATE `user` SET `nameUser`=?,`email`=?,`address`=? WHERE idUser = ?";
		$stmt = mysqli_stmt_init($connection);
		if(!mysqli_stmt_prepare($stmt,$sql)){
			return -1;
		}
		else{
			mysqli_stmt_bind_param($stmt,'ssss',$name,$email,$address,$id);
			mysqli_stmt_execute($stmt);
			return 1;
		}
		mysqli_stmt_close($stmt);
	}

	private function getPassword($id)
	{
		$connection = $this -> DBconnect();
		$sql = "SELECT password FROM user WHERE idUser = ?";
		$stmt = mysqli_stmt_init($connection);
		if(!mysqli_stmt_prepare($stmt,$sql)){
			return -1;
		}
		else{
			mysqli_stmt_bind_param($stmt,'s',$id);
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);
			if(mysqli_num_rows($result)>0){
				$row = mysqli_fetch_assoc($result);
				echo '<script>alert('.$row['password'].');</script>';
				return $row['password'];
				}
			else{
			return false;
		    }
		}
		mysqli_stmt_close($stmt);
		
	}

	public function changePw($id,$oPw,$nPw)
	{
		$pw= $this->getPassword($id);
		$connection = $this -> DBconnect();
		$sql = "UPDATE `user` SET `password`= ? WHERE idUser = ?";
		$stmt = mysqli_stmt_init($connection);
		$pwCheck = password_verify($oPw,$pw);
		echo '<script>alert('.$pw.');</script>';
		if ($pwCheck == true) {
			$hashPass = password_hash($nPw,PASSWORD_BCRYPT);
			if(!mysqli_stmt_prepare($stmt,$sql)){
				return -1;
			}
			else{
				mysqli_stmt_bind_param($stmt,'ss',$hashPass,$id);
				mysqli_stmt_execute($stmt);
				return 1;
			}
		}
		else{
			return 2;
		}
		mysqli_stmt_close($stmt);
	}

	
	
}
 ?>