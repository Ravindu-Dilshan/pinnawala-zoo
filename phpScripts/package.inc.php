<?php
require_once('class/package.cls.php');
if(isset($_POST['btnUpdate']))
{
  $name =$_POST['txtName'];
  $disc = $_POST['txtDiscrip'];
  $price =$_POST['txtPrice'];
  $id = $_POST['txtIdPack'];
  if (empty($name)) {
    echo '<div class="alert alert-danger float-right w-100 text-center" role="alert">Please Enter a Name</div>';
    exit();
  }
  elseif (empty($disc)) {
    echo '<div class="alert alert-danger float-right w-100 text-center" role="alert">Please Enter a Discription</div>';
    exit();
  }
  elseif (empty($price)) {
    echo '<div class="alert alert-danger float-right w-100 text-center" role="alert">Please Enter a Price</div>';
    exit();
  }
  else{
    $package = new Package();
    $update = $package->updatePack($id,$name,$disc,$price);
    if($update==1){
      echo '<script>alert("Succsessfully Updated");</script>';
      echo '<script>window.location = window.location</script>';
      exit();
    }
    else{
      echo '<div class="alert alert-danger float-right w-100 text-center" role="alert">Something went wrong</div>';
      exit();
    }
  }
}

if(isset($_POST['btnAddPack']))
{
  $name =$_POST['txtName'];
  $disc = $_POST['txtDiscrip'];
  $price =$_POST['txtPrice'];

  if (empty($name)) {
    echo '<div class="alert alert-danger float-right w-100 text-center" role="alert">Please Enter a Name</div>';
    exit();
  }
  elseif (empty($disc)) {
    echo '<div class="alert alert-danger float-right w-100 text-center" role="alert">Please Enter a Discription</div>';
    exit();
  }
  elseif (empty($price)) {
    echo '<div class="alert alert-danger float-right w-100 text-center" role="alert">Please Enter a Price</div>';
    exit();
  }
  else{
    $package = new Package();
    $img = null;
    $add = $package->addPackage($name,$disc,$price,$img);
    if($add==1){
      echo '<script>alert("Succsessfully Added");</script>';
      echo '<script>window.location = window.location</script>';
      exit();
    }
    else{
      echo '<div class="alert alert-danger float-right w-100 text-center" role="alert">Something went wrong</div>';
      exit();
    }
}
}

if(isset($_POST['btnUploadImage']))
{
  $id = $_POST['txtid'];
  $maxSize = 700000;
  
  $image = $_FILES['imageName']['tmp_name'];
  $imgName = $_FILES['imageName']['name'];
  $size = $_FILES['imageName']['size'];
  $type = $_FILES['imageName']['type'];
  
    if(!empty($imgName)){
      if($size > $maxSize){
        echo '<script>window.location = "../admin/admin.php?page=packages.php&imgError=size"</script>';
        exit();
        }
      else{
        $temp = explode('.',$imgName);
        $ex = end($temp);
        if($ex=='jpg' || $ex == 'jpeg'){      
          $image =file_get_contents($image);
          $image = base64_encode($image);
          $image = "data:image;base64,".$image;
          $package = new Package();
          $update = $package->updateImage($id,$image);
          if($update==1){
            echo '<script>alert("Succsessfully Uploaded");</script>';
            echo '<script>window.location = "../admin/admin.php?page=packages.php"</script>';
            exit();
          }
          else{
              echo '<script>window.location = "../admin/admin.php?page=packages.php&imgError=sql"</script>';
              exit();
            }
        }
        else{
          echo '<script>window.location = "../admin/admin.php?page=packages.php&imgError=ext"</script>';
          exit();
        }
      }
    }
    else{
      echo '<script>window.location = "../admin/admin.php?page=packages.php&imgError=select"</script>';
      exit();
    }
}

if(isset($_GET['btnDelete']))
{
  $id =$_GET['id'];
  $package = new Package();
  $delete = $package->deletePack($id);
  if($delete==1){
    echo '<script>window.location = "../admin/admin.php?page=packages.php"</script>';
    exit();
  }
  else{
      echo '<script>window.location = "../admin/admin.php?page=packages.php&delError"</script>';
      exit();
    }
}

if(isset($_GET['btnImageDefault']))
{
  $id =$_GET['idP'];
  $package = new Package();
  $delete = $package->defaultImage($id);
  if($delete==1){
    echo '<script>window.location = "../admin/admin.php?page=packages.php"</script>';
    exit();
  }
  else{
      echo '<script>window.location = "../admin/admin.php?page=packages.php&delError"</script>';
      exit();
    }
}

?>
