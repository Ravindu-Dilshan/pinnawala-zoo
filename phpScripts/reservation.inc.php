<?php
require_once('class/reservation.cls.php');
if(isset($_POST['btnBook']))
{
  $name =$_POST['txtname'];
  $price =$_POST['txtprice'];
  $id = $_POST['txtid'];
  $quantity = $_POST['txtQuantity'];
  $total = $price*$quantity;
    $res = new Reservation();
    $add = $res->addItem($id,$name,$quantity,$price,$total);
    if($add==1){
      // echo '<script>alert("Succsessfully Added");</script>';
      echo '<script>window.location = "../reservation.php"</script>';
      exit();
    }
    if($add==2){
      echo '<script>alert("Item already Added");</script>';
      echo '<script>window.location = "../ticket.php"</script>';
      exit();
    }
    else{
      echo '<script>window.location = "../ticket.php?error"</script>';
      exit();
    }

}

if(isset($_POST['btnUpdate']))
{
  $quantity =$_POST['txtQuantity'];
  $price =$_POST['txtPrice'];
  $id = $_POST['txtID'];
  $total = $price*$quantity;
    $res = new Reservation();
    $update = $res->updateItem($id,$quantity,$total);
    if($update==1){
      // echo '<script>alert("Succsessfully Updated");</script>';
      echo '<script>window.location = "../reservation.php"</script>';
      exit();
    }
    else{
      echo '<script>window.location = "../reservation.php?error"</script>';
      exit();
    }
  
}

if(isset($_GET['btnDelete']))
{
  $id =$_GET['id'];
  $res = new Reservation();
    $delete = $res->deleteItem($id);
  if($delete==1){
    echo '<script>window.location = "../reservation.php"</script>';
    exit();
  }
  else{
      echo '<script>window.location = "../reservation.php?error"</script>';
      exit();
    }
}


if(isset($_GET['btnDeletRese']))
{
  $id =$_GET['id'];
  $res = new Reservation();
  $delete = $res->deleteRes($id);
  if($delete==1){
    echo '<script>window.location = "../admin/admin.php?page=bookings.php"</script>';
    exit();
  }
  else{
      echo '<script>window.location = "../admin/admin.php?page=bookings.php&move=error"</script>';
      exit();
    }
}

if(isset($_GET['btnConfirmBook']))
{
  $netTotal = $_GET['netTotal'];
  session_start();
  $id = $_SESSION['ID'];
  $res = new Reservation();
    $move = $res->moveItem($id,$netTotal);
  if($move==1){
    echo '<script>window.location = "../viewreservations.php?move=success"</script>';
    exit();
  }
  else{
      echo '<script>window.location = "../reservation.php?error"</script>';
      exit();
    }
}

else{
  echo '<script>window.location = "../index.php?msg=errorLog"</script>';
  exit();
}
?>
