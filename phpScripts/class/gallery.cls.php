<?php
require_once('database.cls.php');


class Gallery extends Database
{

	public function getAllImg()
	{
		$connection = $this -> DBconnect();
		$sql = "SELECT * FROM gallery";
		$result = mysqli_query($connection,$sql);
		if(mysqli_num_rows($result)>0){
				return $result;
			}
		else{
			return false;
		    }
		
	}


	public function getPath($id)
	{
		$connection = $this -> DBconnect();
		$sql = "SELECT `path` FROM gallery WHERE idGal = ?";
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
				return $row['path'];
			}
			else{
			return false;
		    }
		}
		
	}


	public function addImage($name,$path)
	{
		$connection = $this -> DBconnect();
		$sql = "INSERT INTO `gallery`(`nameGal`, `path`, `date`) VALUES (?,?,?)";
		$stmt = mysqli_stmt_init($connection);
		if(!mysqli_stmt_prepare($stmt,$sql)){
				return -1;
			}
			else{
				$date = date("d/m/Y");
				mysqli_stmt_bind_param($stmt,'sss',$name,$path,$date);
				mysqli_stmt_execute($stmt);
				return 1;
			}
			mysqli_stmt_close($stmt);
	}

	public function deleteImg($id)
	{
		$connection = $this -> DBconnect();
		$path = $this->getPath($id);
		$sql = "DELETE FROM `gallery` WHERE idGal= ?";
		$stmt = mysqli_stmt_init($connection);
		if(!mysqli_stmt_prepare($stmt,$sql)){
			return -1;
		}
		else{
			mysqli_stmt_bind_param($stmt,'s',$id);
			mysqli_stmt_execute($stmt);
			$file_delete = dirname(__FILE__, 3) . '\\'.$path;
			if (unlink(trim($file_delete))) 
            {
                return 1; 
             }
             else
             {
              return 2; 
             }
			
		mysqli_stmt_close($stmt);
		}
	}
	
}
 ?>