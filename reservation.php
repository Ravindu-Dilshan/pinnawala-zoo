<!DOCTYPE html>
<html>
<head>
	<title></title>
  <link rel="icon" href="images/index/logo.png">
	<!--------------------css------------------------------------->
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="bootstrap/mdb_css/mdb.min.css" rel="stylesheet">
	<link href="fonts/css/fontawesome-all.min.css" rel="stylesheet">
	<link href="aos/aos.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	<!--------------------------------------------------------->
</head>
<body>
<?php
include("nav.php");
?>
<div class="py-5"></div>
<div class="container my-5">
<?php 
include('phpScripts/class/reservation.cls.php');
$res = new Reservation();
$noPacks = '';
$netTotal=0;
$result = $res->getAllItem();
if($result==false){
  $noPacks = '<div class="alert alert-danger float-right w-100 text-center mb-5" role="alert">No Bookings Added</div>
              <div class="text-center"><h4><a href="ticket.php"><i class="fas fa-ticket-alt px-3"></i>View Packages<i class="fas fa-ticket-alt px-3"></i></a></h4></div>';
}
else{
?>
<table class="table table-bordered text-center table-responsive-md">
  <thead class="table-dark">
    <tr>
      <th scope="col">NAME</th>
      <th scope="col">QUANTITY</th>
      <th scope="col">TOTAL(Rs.)</th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    <?php 
    while($row = mysqli_fetch_assoc($result))
    {
    ?>
    <tr>
      <td><b><?php echo $row['namePack'];?></b></td>
      <td><?php echo $row['quantity'];?></td>
      <td><?php echo $row['total'];?></td>
      <?php $netTotal += (int)$row['total'];?>
      <td>
      	<form method="post" action="phpScripts/reservation.inc.php">
      		<input type="number" name="txtID" value="<?php echo $row['idPack'];?>" hidden>
      		<input type="number" name="txtPrice" value="<?php echo $row['price'];?>" hidden>
            <input class="form-control-sm w-50 mx-auto" type="number" name="txtQuantity" value="<?php echo $row['quantity'];?>" required><br>
            <button name="btnUpdate" class="btn btn-primary btn-sm confirm_dialog">Update</button>
        </form>
      </td>
      <td><a type="button" class="btn btn-danger btn-sm mt-2 confirm_dialog" style="margin-top:1.5px;" href="phpScripts/reservation.inc.php?btnDelete=&id=<?php echo $row['idPack'];?>"><i class="fas fa-trash-alt"></i></a></td>
    </tr>
<?php 
}
 ?>
  </tbody>
</table>

<div class="row">
	<div class="col-md-9"></div>
	<div class="col-md-3">
		<a type="submit" class="btn btn-primary waves-effect confirm_dialog" href="phpScripts/reservation.inc.php?btnConfirmBook=&netTotal=<?php echo $netTotal;?>">Confirm All the Bookings</a>
	</div>
</div>
<?php }
echo $noPacks;
?> 
</div>

<div class="py-5"></div>
<?php
include("footer.php");
?>
<!------------------------js--------------------------------->
<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="bootstrap/mdb_js/mdb.js"></script>
<script type="text/javascript" src="aos/aos.js"></script>
<script type="text/javascript" src="js/mine.js"></script>
<!--------------------------------------------------------->
</body>
</html>