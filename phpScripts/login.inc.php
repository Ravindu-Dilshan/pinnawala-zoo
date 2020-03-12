<?php
require_once('class/user.cls.php');
if(isset($_POST['btnLogin']))
{
  $email =$_POST['txtEmail'];
  $pw = $_POST['txtPassword'];
  $user = new User();
  $login = $user->login($email,$pw);
  if (empty($email)) {
    echo '<div class="alert alert-danger float-right w-100 text-center" role="alert">Please Enter a Username or Email</div>';
    exit();
  }
  elseif (empty($pw)) {
    echo '<div class="alert alert-danger float-right w-100 text-center" role="alert">Please Enter a Password</div>';
    exit();
  }
  else{
    if($login==1){
      echo '<script>window.location = window.location+"?msg=successLog"</script>';
      exit();
    }
    elseif($login==-0){
      echo '<div class="alert alert-danger float-right w-100 text-center" role="alert">Incorrect Username or Password</div>';
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
?>
