<?php
require_once('database.cls.php');


class Package extends Database
{
	
	public function updateImage($id,$image)
	{
		$connection = $this -> DBconnect();
		$sql = "UPDATE `package` SET `imgPack`=? WHERE idPack = ?";
		$stmt = mysqli_stmt_init($connection);
		if(!mysqli_stmt_prepare($stmt,$sql)){
			return -1;
		}
		else{
			mysqli_stmt_bind_param($stmt,'ss',$image,$id);
			mysqli_stmt_execute($stmt);
			return 1;
		}
		mysqli_stmt_close($stmt);
	}

	public function defaultImage($id)
	{
		$connection = $this -> DBconnect();
		$sql = "UPDATE `package` SET `imgPack`= null WHERE idPack = ?";
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

	public function getAllPacks()
	{
		$connection = $this -> DBconnect();
		$sql = "SELECT * FROM package";
		$result = mysqli_query($connection,$sql);
		if(mysqli_num_rows($result)>0){
				return $result;
			}
		else{
			return false;
		    }
		
	}

	public function searchPacks($search)
	{
		$connection = $this -> DBconnect();
		$sql = "SELECT * FROM package WHERE namePack LIKE ? OR discription LIKE ? OR pricePack LIKE ?";
		$stmt = mysqli_stmt_init($connection);
		if(!mysqli_stmt_prepare($stmt,$sql)){
			return -1;
		}
		else{
			$search = '%'.$search."%";
			mysqli_stmt_bind_param($stmt,'sss',$search,$search,$search);
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

	public function addPackage($name,$disc,$price,$img)
	{
		$connection = $this -> DBconnect();
		$sql = "INSERT INTO `package`(`namePack`, `discription`, `pricePack`, `imgPack`) VALUES (?,?,?,?)";
		$stmt = mysqli_stmt_init($connection);
		if(!mysqli_stmt_prepare($stmt,$sql)){
			return -1;
		}
		else{
			mysqli_stmt_bind_param($stmt,'ssss',$name,$disc,$price,$img);
			mysqli_stmt_execute($stmt);
			return 1;
		}
		mysqli_stmt_close($stmt);
	}


	public function updatePack($id,$name,$disc,$price)
	{
		$connection = $this -> DBconnect();
		$sql = "UPDATE `package` SET `namePack`=?,`discription`=?,`pricePack`=? WHERE `idPack`=?";
		$stmt = mysqli_stmt_init($connection);
		if(!mysqli_stmt_prepare($stmt,$sql)){
			return -1;
		}
		else{
			mysqli_stmt_bind_param($stmt,'ssss',$name,$disc,$price,$id);
			mysqli_stmt_execute($stmt);
			return 1;
		}
		mysqli_stmt_close($stmt);
	}

	public function deletePack($id)
	{
		$connection = $this -> DBconnect();
		$sql = "DELETE FROM `package` WHERE idPack = ?";
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