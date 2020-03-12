
<div class="container mt-5">
<div class="text-center">
  <h4 class="dark-text w-100 font-weight-bold">MESSAGES</h4>
</div>
<?php 
include('../phpScripts/class/message.cls.php');
$package = new Message();
$noMsg = '';
$result = $package->getAllMsg();
if($result==false){
  $noMsg = '<div class="alert alert-danger float-right w-100 text-center" role="alert">No Messages</div>';
}
else{
?>

    <?php 
    while($row = mysqli_fetch_assoc($result))
    {
    ?>
      <div class="container-fluid z-depth-2 my-3 px-5 py-3">
        <div>
          <h4><?php echo $row['name']?></h4>
          <h5><?php echo $row['email']?></h5>
        </div>
        <div>
          <p><?php echo $row['message']?></p>
        </div>
        <div class="d-flex row">
        <div class="col-md-11">
          <p><?php echo $row['date']?></p>
        </div>
          <a type="button" class="btn btn-danger btn-sm mt-2 confirm_dialog" style="margin-top:1.5px;" href="../phpScripts/message.inc.php?btnDelete=&id=<?php echo $row['idMsg'];?>"><i class="fas fa-trash-alt"></i></a>
        </div>
      </div>
<?php }
  }
 ?>
<?php echo $noMsg; ?> 

</div>