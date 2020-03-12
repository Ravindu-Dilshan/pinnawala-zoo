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

<div class="container pt-5">
<!-- Section: Pricing v.4 -->
<section class="text-center my-5">
  <?php 
    if(!isset($_SESSION['ID'])){
      echo '<div class="alert alert-danger float-right" role="alert">
               You have to Login to buy
            </div>';        
    }
  ?>
  <!-- Page Content -->
    <div class="container pb-3">
      <!-- Page Heading -->
      <h1 class="my-4">Pinnawala Zoo Packages</h1>
      <div class="container d-flex py-2" >
        <div class="col-md-8"></div>
        <form action="ticket.php" method="post" class="d-flex">
          <button type="submit" class="btn btn-primary w-100" name="btnSearch">Search</button>
          <input type="text" name="txtSearch" class="form-control mt-2">
        </form>
      </div>
      <hr>
    <?php 
      include('phpScripts/class/package.cls.php');
      $package = new package();
      $noPacks = '';
      $result ='';
      if(isset($_POST['btnSearch'])){
        $result = $package->searchPacks($_POST['txtSearch']);
      }
      else{
      $result = $package->getAllPacks();
      }
      if($result==false){
        $noPacks = '<div class="alert alert-danger float-right w-100 text-center" role="alert">No Packages Available</div>';
      }
      else{
        while($row = mysqli_fetch_assoc($result))
        {
        ?>
      <!-- Project One -->
      <div class="row">
        <div class="col-md-6">
          <a href="#">
            <?php 
            if($row['imgPack']==null)
              {
            ?>

                <img class="img-fluid rounded mb-3 mb-md-0" src="images/ticket.jpg" alt="Ticket image" data-aos="fade-right">

            <?php
              }
            else
              {
            ?>

            <img class="img-fluid rounded mb-3 mb-md-0" src="<?php echo $row['imgPack'];?>" alt="Ticket image" data-aos="fade-right">

            <?php
              }
            ?>
          </a>
        </div>
        <div class="col-md-6" data-aos="fade-left">
          <h3><?php echo $row['namePack'];?></h3>
          <p class="text-justify"><?php echo $row['discription'];?></p>
          <h2>Rs.<?php echo $row['pricePack'];?></h2>
          <form action="phpScripts/reservation.inc.php" method="post">
            <input hidden type="text" name="txtid" value="<?php echo $row['idPack'];?>">
            <input hidden type="text" name="txtname" value="<?php echo $row['namePack'];?>">
            <input hidden type="text" name="txtprice" value="<?php echo $row['pricePack'];?>">
            <?php 
              if(isset($_SESSION['ID'])){
                echo '<div class="form-group d-flex mx-auto pl-5">
                <label class="ml-5 mr-2">Quantity</label>
                <input type="number" class="form-control-range w-50" name="txtQuantity" required><br>
                </div>';
                echo '<button class="btn btn-primary" name="btnBook">Book this Package</button>';        
              }
            ?>
          </form>
      </div>
      </div>
      <!-- /.row -->

      <hr>
  <?php }
    }
    echo $noPacks;
   ?>
     
    </div>
    <!-- /.container -->
</div>


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