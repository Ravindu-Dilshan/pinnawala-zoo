
<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
<script>

</script>
<div class="container-fluid mt-5">
<div class="w-75 m-auto row">
<?php 
include('../phpScripts/class/reservation.cls.php');
$res = new Reservation();
$noPacks = '';
$result = $res->getRes();
if($result==false){
  $noPacks = '<div class="alert alert-danger float-right w-100 text-center" role="alert">No Reservations</div>';
}
else{
?>
<div class="col-md-12">
  <div class="text-center">
        <h4 class="dark-text w-100 font-weight-bold">RESERVATIONS</h4>
  </div>
<table id="Dtable" class="table table-bordered text-center z-depth-2 packTable table-responsive-md">
  <thead class="thead-dark">
    <tr>
      <th scope="col">RESERVATION ID</th>
      <th scope="col">USER ID</th>
      <th scope="col">NET TOTAL</th>
      <th scope="col">DATE</th>
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
      <td><b><?php echo $row['idRes'];?></b></td>
      <td><?php echo $row['idUser'];?></td>
      <td><?php echo $row['NetTotal'];?></td>
      <td><?php echo $row['date'];?></td>
      <td>
        <?php
        echo '
        <form method="post" action="admin.php?page=bookings.php">
        <input id="txtResID" type="number" name="txtResID" value="'.$row['idRes'].'" hidden>
        <button id="btnViewResA" name="btnViewResA" class="btn btn-primary btn-sm">View</button>
        </form>
        ';
        ?>
      </td>
      <td>
        <?php if ($row['purchased']==null){
          echo '<a type="button" class="btn btn-danger btn-sm mt-2 confirm_dialog" style="margin-top:1.5px;" href="../phpScripts/reservation.inc.php?btnDeletRese=&id='.$row['idRes'].'"><i class="fas fa-trash-alt"></i></a>';
        } 
        else
          echo '<p class="mt-2 text-danger">Dismissed</p>'
           ?>
        
      </td>
    </tr>
<?php }
  }
 ?>
  </tbody>
</table>
</div>
<?php echo $noPacks; ?> 


<!-- ********************************************************************* -->


<?php 
if(isset($_REQUEST['btnViewResA'])){
  $resId = $_REQUEST['txtResID'];
  $netTotal =0;
  $result = $res->viewResDetails2($resId);
if($result==false){
  echo '<div class="alert alert-danger float-right w-100 text-center mb-5" role="alert">Error: No packages included</div>';
}
else{
  ?>
  <!--Header-->
  <div class="modal fade" id="viewResModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-notify modal-warning" role="document">
    <!--Content-->
    <div class="modal-content">

      <!--Body-->
      <div>

      <div class="container">

        <table class="table table-bordered table-striped text-center mt-3 table-responsive-md">
          <thead class="thead-dark">
            <tr>
              <th scope="col">PACKAGE NAME</th>
              <th scope="col">PRICE</th>
              <th scope="col">QUANTITY</th>
              <th scope="col">TOTAl</th>
            </tr>
          </thead>
          <tbody>
<?php
  while($row = mysqli_fetch_assoc($result))
  {
    $netTotal= $row['NetTotal'];
  ?>
            <tr>
              <td><span id="view-name"><?php echo $row['namePack']; ?></span></td>
              <td><span id="view-price"><?php echo $row['pricePack']; ?></span></td>
              <td><span id="view-qnt"><?php echo $row['quantity']; ?></span></td>
              <td><span id="view-tlt"><?php echo $row['total']; ?></span></td>
            </tr>
    <!--/.Content-->


<?php }

?>
          </tbody>
        </table>
            <div class="container pb-5"><h5 class="float-right">Net Total: Rs.<?php echo $netTotal ?></h5></div>
          </div>
        </div>
      </div>
    </div>
    </div>
  
<?php 
  }
}
?>

</div>
</div>


