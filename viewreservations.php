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
<div class="w-75 mx-auto my-5">

<div class="container">
	<div class="row">
		<div class="col-md-5">
				<?php 
				include('phpScripts/class/reservation.cls.php');
				$res = new Reservation();
				$noPacks = '';
				$id = '';
				if (isset($_SESSION['ID'])) {
			      	$id = $_SESSION['ID'];
			     }
				$result = $res->getAllres($id);
				if($result==false){
				  $noPacks = '<div class="alert alert-danger float-right w-100 text-center mb-5" role="alert">No Reservations Added</div>
				              <div class="text-center"><h4><a href="ticket.php"><i class="fas fa-ticket-alt px-3"></i>View Packages<i class="fas fa-ticket-alt px-3"></i></a></h4></div>';
				}
				else{
				?>
				<table class="table table-bordered text-center table-responsive-md">
				  <thead class="table-dark">
				    <tr>
				      <th scope="col">RESERVATION CODE</th>
				      <th scope="col">BOOKED DATE</th>
				      <th scope="col">NET TOTAL(Rs.)</th>
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
				      <td><?php echo $row['NetTotal'];?></td>
				      <td><?php echo $row['date'];?></td>
				      <td>
				      	<form method="post" action="viewreservations.php">
							<input type="number" name="txtResID" value="<?php echo $row['idRes'];?>" hidden>
				            <button name="btnViewRes" class="btn btn-primary btn-sm">View</button>
				        </form>
				      </td>
				    </tr>
				<?php 
				}
				 ?>
				  </tbody>
				</table>
				
		</div>
		<div class="col-md-7 print-content">
			    <?php 
			      if(isset($_POST['btnViewRes'])){
			      	$resId = $_POST['txtResID'];
			      	$netTotal =0;
			      	$date = '';
			        $result = $res->viewResDetails($resId);
			      if($result==false){
			        $noPacks = '<div class="alert alert-danger float-right w-100 text-center" role="alert">Error: No Packages included</div>';
			      }
			      else{

			      	echo '<div class="text-center mb-3"><h3>RESERVATION CODE #'.$resId.'%'.$id.'%</h3></div>';
			        while($row = mysqli_fetch_assoc($result))
			        {
			        	$netTotal= $row['NetTotal'];
			        	$date = $row['date'];
			        ?>
			      <!-- Project One -->
			      <div class="row">
			        <div class="col-md-6">
			          <a href="#">
			            <?php 
			            if($row['imgPack']==null)
			              {
			            ?>

			                <img class="img-fluid rounded mb-3 mb-md-0" src="images/ticket.jpg" alt="Ticket image" >

			            <?php
			              }
			            else
			              {
			            ?>

			            <img class="img-fluid rounded mb-3 mb-md-0" src="<?php echo $row['imgPack'];?>" alt="Ticket image">

			            <?php
			              }
			            ?>
			          </a>
			        </div>
			        <div class="col-md-6">
			          <h5><b><?php echo $row['namePack'];?></b></h5>
			          <p class="text-justify">Price: Rs.<?php echo $row['pricePack'];?></p>
			          <p class="text-justify">Quantity: <?php echo $row['quantity'];?></p>
			          <p class="text-justify">Total: Rs.<?php echo $row['total'];?></p>

			      </div>
			      </div>
			      <!-- /.row -->
			      <hr>

			  <?php 
						}
					echo '<div class="container-fluid py-2">
					<h5 class="float-left">Booked Date:('.$date.')</h5>
					<h3 class="float-right"><u>NET TOTAL: Rs.'.$netTotal.'</u></h3>
					</div>';
					}
			    
			    ?>
			    	<div class="my-5"></div><hr>
					<div class="text-justify pt-5 text-danger">
						<h5>Important</h5><p>Give hard or a soft copy to the counter at the zoo and get your package tickets<br>

											This reservation is only valid for 6 months from the booked date please purchase your reservation before that
											</p>
					</div>

					<div class="container-fluid"><button class="float-right btn btn-primary" onclick="window.print();">Print</button></div>
			    <?php
				}
			    else{
			    	echo '<div class="alert alert-info float-right w-100 text-center mb-5" role="alert">Select a Reservation to View Details</div>';
			    }
			   ?>
			
				<?php }
					echo $noPacks;
				?> 
		</div>
	</div>
</div>

</div>
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