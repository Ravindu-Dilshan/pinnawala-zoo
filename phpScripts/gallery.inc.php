<?php
require_once('class/gallery.cls.php');
if(isset($_POST['btnUpload'])){
	$location = 'uploads/';
	$maxSize = 800000;
	
	//$image = $_POST['image'];

	$name = $_FILES['image']['name'];
	$temp_name = $_FILES['image']['tmp_name'];
	$size = $_FILES['image']['size'];
	$type = $_FILES['image']['type'];
	
	
	if(!empty($name)){
		if($size > $maxSize){
		//echo '<h1 style=color:red;>File is too Large</h1>';
		echo '<script>window.location = "../admin/admin.php?page=gallery.php&file=large"</script>';
		}
		else{
			$ext = explode('.',$name);
			$ex = end($ext);
			if($ex=='jpg'){
				$uniquesavename=time().uniqid(rand());
				$path = $location . $uniquesavename . '.jpg';		
				if(move_uploaded_file($temp_name,'../'.$path)){
					$gal = new Gallery();
					  $add = $gal->addImage($name,$path);
					  if($add==1){
					    echo '<script>window.location = "../admin/admin.php?page=gallery.php"</script>';
					    exit();
					  }
					  else{
					      echo '<script>window.location = "../admin/admin.php?page=gallery.php&error"</script>';
					      exit();
					    }
				}
				else{
					//echo '<h1 style=color:red;>Can not Upload</h1>';
					echo '<script>window.location = "../admin/admin.php?page=gallery.php&file=upload"</script>';
				}
			}
			else{
				//echo '<h1 style=color:red;>File type must be .jpg</h1>';
				echo '<script>window.location = "../admin/admin.php?page=gallery.php&file=ext"</script>';
			}
		}
	}
	else{
		//echo '<h1 style=color:red;>Please select a file</h1>';
		echo '<script>window.location = "../admin/admin.php?page=gallery.php&file=noinput"</script>';
	}
}



if(isset($_GET['btnDelete']))
{
  $id =$_GET['id'];
  $gal = new Gallery();
    $delete = $gal->deleteImg($id);
  if($delete==1){
    echo '<script>window.location = "../admin/admin.php?page=gallery.php"</script>';
    exit();
  }
  if($delete==2){
    echo '<script>window.location = "../admin/admin.php?page=gallery.php&nofile"</script>';
    exit();
  }
  else{
      echo '<script>window.location = "../admin/admin.php?page=gallery.php&error"</script>';
      exit();
    }
}



?>
