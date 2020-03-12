<?php 
require_once('class/user.cls.php');
 if(isset($_POST['btnReg']))
{
  $name =$_POST['txtName'];
  $address = $_POST['txtAddress'];
  $email = $_POST['txtEmail'];
  $pw = $_POST['txtPassword'];
  $repPw = $_POST['txtRepPassword'];
  $user = new User();
  
  if (empty($name)) {
    echo '<div class="alert alert-danger float-right w-100 text-center" role="alert">Please Enter a Username</div>';
    exit();
  }
  elseif (empty($email)) {
    echo '<div class="alert alert-danger float-right w-100 text-center" role="alert">Please Enter a Email</div>';
    exit();
  }
  elseif (empty($address)) {
    echo '<div class="alert alert-danger float-right w-100 text-center" role="alert">Please Enter a Address</div>';
    exit();
  }
  elseif (empty($pw)) {
    echo '<div class="alert alert-danger float-right w-100 text-center" role="alert">Please Enter a Password</div>';
    exit();
  }
  elseif($pw != $repPw){
    echo '<div class="alert alert-danger float-right w-100 text-center" role="alert">Password do not match</div>';
    exit();
  }
  else{
    $register = $user->adduser($name,$address,$email,$pw);
      if($register==1){
      session_start();
      $_SESSION['ID']='true';
      echo '<div class="alert alert-success float-right w-100 text-center" role="alert">Successfully registered</div>';
      //echo '<script>window.location = window.location+"?msg=successLog"</script>';
      exit();
      }
      elseif($register==-0){
        echo '<div class="alert alert-danger float-right w-100 text-center" role="alert">Username or Email already in use</div>';
        exit();
      }
      else{
        echo '<div class="alert alert-danger float-right w-100 text-center" role="alert">Something went wrong</div>';
        exit();
      }
  }
}
else{
  echo '<script>window.location = window.location+"?msg=errorLog"</script>';
  exit();
}
