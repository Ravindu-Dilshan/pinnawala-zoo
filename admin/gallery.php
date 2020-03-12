
<div class="container mt-5">
<div class="text-center">
  <h4 class="dark-text w-100 font-weight-bold">GALLERY</h4>
</div>

<div class="my-5 row">
  <div class="col-md-6">
  <form method="post" action="../phpScripts/gallery.inc.php" enctype="multipart/form-data">
    <span class="btn bg-warning text-dark">
    <input type="file" name="image">
      <button name="btnUpload" class="btn btn-primary btn-sm">Upload</button>
    </span>
  </form>
</div>
  <div class="mt-2 col-md-6">
  <?php
    if (isset($_GET['file'])) {
      if ($_GET['file']=='noinput') {
        echo '<div class="alert alert-danger float-right w-100 text-center" role="alert">Please Select a File</div>';
      }
      elseif ($_GET['file']=='large') {
        echo '<div class="alert alert-danger float-right w-100 text-center" role="alert">File is Too large</div>';
      }
      elseif ($_GET['file']=='ext') {
        echo '<div class="alert alert-danger float-right w-100 text-center" role="alert">File must be .jpg</div>';
      }
      elseif ($_GET['file']=='upload') {
        echo '<div class="alert alert-danger float-right w-100 text-center" role="alert">Sorry cannot Upload</div>';
      }
      
    }
  ?>
</div>
</div>

<?php 
include('../phpScripts/class/gallery.cls.php');
$package = new Gallery();
$noMsg = '';
$result = $package->getAllImg();
if($result==false){
  $noMsg = '<div class="alert alert-danger float-right w-100 text-center" role="alert">No Images</div>';
}
else{
?>
  <div class="row">
    <?php 
    while($row = mysqli_fetch_assoc($result))
    {
    ?>
      
  <!-- Grid column -->
      <div class="col-lg-2 col-md-2 text-center">
        <img src="<?php echo '../'.$row['path'];?>" class="img-fluid z-depth-1" alt="Our image">
        <p class="m-0"><?php echo $row['nameGal'];?></p>
        <a type="button" class="btn btn-danger btn-sm confirm_dialog" style="margin-top:1.5px;" href="../phpScripts/gallery.inc.php?btnDelete=&id=<?php echo $row['idGal'];?>"><i class="fas fa-trash-alt"></i></a>
      </div>
    
<?php }
?>
  </div>
<?php
  }
 ?>
<?php echo $noMsg; ?> 

</div>