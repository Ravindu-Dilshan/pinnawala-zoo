<?php
require_once('database.cls.php');


class Reservation extends Database
{

	public function createTemp(){
		$connection = $this -> DBconnect();
		$TableSql = "CREATE TABLE IF NOT EXISTS temp_res(
						idPack int not null,
					    namePack varchar(500) not null,
					    quantity int not null,
					    price int not null,
					    total int not null
					)";
		mysqli_query($connection, $TableSql);
	}

	public function dropTemp(){
		$connection = $this -> DBconnect();
		$TableSql = "DROP TABLE IF EXISTS temp_res";
		mysqli_query($connection, $TableSql);
	}
	

	public function checkItem($id)
	{
		$connection = $this -> DBconnect();
		$sql = "SELECT * FROM temp_res WHERE idPack = ?";
		$stmt = mysqli_stmt_init($connection);
		if(!mysqli_stmt_prepare($stmt,$sql)){
			return -1;
		}
		else{
			mysqli_stmt_bind_param($stmt,'s',$id);
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);
			if(mysqli_num_rows($result)>0){
				return true;
			}
			else{
			return false;
		    }
		}
		
	}

	public function addItem($id,$name,$quantity,$price,$total)
	{
		$this->createTemp();
		$check = $this->checkItem($id);
		if ($check==false) {
			$connection = $this -> DBconnect();
			$sql = "INSERT INTO temp_res VALUES (?,?,?,?,?)";
			$stmt = mysqli_stmt_init($connection);
			if(!mysqli_stmt_prepare($stmt,$sql)){
				return -1;
			}
			else{
				mysqli_stmt_bind_param($stmt,'sssss',$id,$name,$quantity,$price,$total);
				mysqli_stmt_execute($stmt);
				return 1;
			}
			mysqli_stmt_close($stmt);
		}
		else{
			return 2;
		}
			
	}

	public function updateItem($id,$quantity,$total)
	{
		$connection = $this -> DBconnect();
		$sql = "UPDATE `temp_res` SET `quantity`=?,`total`=? WHERE `idPack`=?";
		$stmt = mysqli_stmt_init($connection);
		if(!mysqli_stmt_prepare($stmt,$sql)){
			return -1;
		}
		else{
			mysqli_stmt_bind_param($stmt,'sss',$quantity,$total,$id);
			mysqli_stmt_execute($stmt);
			return 1;
		}
		mysqli_stmt_close($stmt);
	}

	public function deleteItem($id)
	{
		$connection = $this -> DBconnect();
		$sql = "DELETE FROM `temp_res` WHERE idPack = ?";
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

	public function getAllItem()
	{
		$this->createTemp();
		$connection = $this -> DBconnect();
		$sql = "SELECT * FROM temp_res";
		$result = mysqli_query($connection,$sql);
		if(mysqli_num_rows($result)>0){
				return $result;
			}
		else{
			return false;
		    }
		
	}

	public function addReservation($id,$netTotal)
	{
		$connection = $this -> DBconnect();
		$sql = "INSERT INTO `reservation`(`idUser`, `NetTotal`, `date`) VALUES (?,?,?)";
		$stmt = mysqli_stmt_init($connection);
		if(!mysqli_stmt_prepare($stmt,$sql)){
			return flase;
		}
		else{
			$date = date("d/m/Y");
			mysqli_stmt_bind_param($stmt,'sss',$id,$netTotal,$date);
			mysqli_stmt_execute($stmt);
			$last_id = mysqli_insert_id($connection);
			return $last_id ;
		}
		mysqli_stmt_close($stmt);		
	}

	public function moveItem($id,$netTotal)
	{
		$isRes = $this->addReservation($id,$netTotal);
			$connection = $this -> DBconnect();
			$sql = "INSERT INTO `res_pack`(`idRes`, `idPack`, `quantity`, `total`) SELECT ?, idPack, quantity, total FROM temp_res";
			$stmt = mysqli_stmt_init($connection);
			if(!mysqli_stmt_prepare($stmt,$sql)){
				return -1;
			}
			else{
				mysqli_stmt_bind_param($stmt,'s',$isRes);
				mysqli_stmt_execute($stmt);
				$this->dropTemp();
				return 1;
			}
			mysqli_stmt_close($stmt);
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


	public function getAllres($id)
	{
		$connection = $this -> DBconnect();
		$sql = "SELECT * FROM `reservation` WHERE idUser = ? AND purchased IS NULL ORDER BY idRes DESC";
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

	public function viewResDetails($id)
	{
		$connection = $this -> DBconnect();
		$sql = "SELECT package.imgPack,package.namePack,package.pricePack,res_pack.quantity,res_pack.total,reservation.NetTotal,reservation.date FROM reservation,res_pack,package WHERE (reservation.idRes=res_pack.idRes AND res_pack.idPack=package.idPack) AND reservation.idRes = ? ";
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


	public function viewResDetails2($id)
	{
		$connection = $this -> DBconnect();
		$sql = "SELECT package.namePack,package.pricePack,res_pack.quantity,res_pack.total,reservation.NetTotal FROM reservation,res_pack,package WHERE (reservation.idRes=res_pack.idRes AND res_pack.idPack=package.idPack) AND reservation.idRes = ".$id;
		$result = mysqli_query($connection,$sql);
		if(mysqli_num_rows($result)>0){
				return $result;
		}
		else{
		return false;
	    }
			return $result;
	}		


	public function getRes()
	{
		$connection = $this -> DBconnect();
		$sql = "SELECT * FROM `reservation` ORDER BY idRes DESC ";
		$result = mysqli_query($connection,$sql);
		if(mysqli_num_rows($result)>0){
				return $result;
			}
		else{
			return false;
		    }
	}

	public function deleteRes($id)
	{
		$connection = $this -> DBconnect();
		$sql = "UPDATE `reservation` SET `purchased`=? WHERE idRes = ?";
		$stmt = mysqli_stmt_init($connection);
		if(!mysqli_stmt_prepare($stmt,$sql)){
			return -1;
		}
		else{
			$date=date("d/m/Y");
			mysqli_stmt_bind_param($stmt,'ss',$date,$id);
			mysqli_stmt_execute($stmt);
			return 1;
		}
		mysqli_stmt_close($stmt);
	}

}
 ?>