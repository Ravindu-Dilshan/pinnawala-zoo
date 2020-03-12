<?php
require_once('class/message.cls.php');
if(isset($_REQUEST['btnSend']))
{
  $name =$_REQUEST['txtName'];
  $email =$_REQUEST['txtEmail'];
  $message = $_REQUEST['txtMessage'];
  if (empty($name)) {
    echo '<div class="alert alert-danger float-right w-100 text-center" role="alert">Please Enter your name</div>';
  }
  elseif (empty($email)) {
    echo '<div class="alert alert-danger float-right w-100 text-center" role="alert">Please Enter your Email</div>';
  }
  elseif (empty($message)) {
    echo '<div class="alert alert-danger float-right w-100 text-center" role="alert">Please Enter your Message</div>';
  }
  else{
    $msg = new Message();
    $add = $msg->addMsg($name,$email,$message);
    if($add==1){
      echo '<div class="alert alert-success float-right w-100 text-center" role="alert">Message Successfully Sent</div>';
      exit();
    }
    else{
      echo '<div class="alert alert-danger float-right w-100 text-center" role="alert">Something went wrong</div>';
      exit();
    }
  }

}


if(isset($_GET['btnDelete']))
{
  $id =$_GET['id'];
  $msg = new Message();
    $delete = $msg->deleteMsg($id);
  if($delete==1){
    echo '<script>window.location = "../admin/admin.php?page=messages.php&"</script>';
    exit();
  }
  else{
      echo '<script>window.location = "../admin/admin.php?page=messages.php&error"</script>';
      exit();
    }
}



?>
