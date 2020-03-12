<script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
<script>
  $(document).ready(function(){
      $("#UpdatePack").submit(function(event){
      event.preventDefault();
      var txtIdPack = $("#update-idPack").val();
      var txtName = $("#update-namePack").val();
      var txtDiscrip = $("#update-discPack").val();
      var txtPrice = $("#update-pricePack").val();
      var btnUpdate = $("#btnUpdatePack").val();
      $("#updatePack-error-message").load("../phpScripts/package.inc.php", {
          txtIdPack: txtIdPack,
          txtName: txtName,
          txtDiscrip: txtDiscrip,
          txtPrice: txtPrice,
          btnUpdate: btnUpdate
      });
    });

      $("#AddPack").submit(function(event){
      event.preventDefault();
      var txtName = $("#add-namePack").val();
      var txtDiscrip = $("#add-discPack").val();
      var txtPrice = $("#add-pricePack").val();
      var btnAddPack = $("#btnAddPack").val();
      $("#addPack-error-message").load("../phpScripts/package.inc.php", {
          txtName: txtName,
          txtDiscrip: txtDiscrip,
          txtPrice: txtPrice,
          btnAddPack: btnAddPack 
      });
    });

  });
</script>



<div class="container mt-5">
<?php 
include('../phpScripts/class/package.cls.php');
$package = new package();
$noPacks = '';
$result = $package->getAllPacks();
if($result==false){
  $noPacks = '<div class="alert alert-danger float-right w-100 text-center" role="alert">No Packages</div>';
}
else{
?>
<div class="text-center">
        <h4 class="dark-text w-100 font-weight-bold">PACKAGES</h4>
</div>
<table id="Dtable" class="table table-bordered text-center z-depth-2 packTable table-responsive-md">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">NAME</th>
      <th scope="col">DISCRIPTION</th>
      <th scope="col">PRICE(Rs.)</th>
      <th scope="col">IMAGE</th>
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
      <td><b><?php echo $row['idPack'];?></b></td>
      <td><?php echo $row['namePack'];?></td>
      <td><?php echo $row['discription'];?></td>
      <td><?php echo $row['pricePack'];?></td>
      <td>
        <?php if($row['imgPack']!=null){echo '<img src="'.$row['imgPack'].'" style="width:100px;" >';}else{echo '<img src="../images/ticket.jpg" style="width:100px" alt="Package image" >';}
        echo '<form method="post" action="../phpScripts/package.inc.php" enctype="multipart/form-data">
                <input type="text" name="txtid" value="'.$row['idPack'].'" hidden><br>
                <input type="file" name="imageName"><br>
                <button name="btnUploadImage" class="btn btn-primary btn-sm">Upload Image</button>
              </form>';
        ?>
      </td>
      <td><button type="button" id="btnViewPack" class="btn btn-primary btn-sm"  data-toggle="modal" data-target="#packUpdateModal">Update</button>
          <a type="button" id="btnViewPack" class="btn btn-primary btn-sm confirm_dialog mt-4"  href="../phpScripts/package.inc.php?btnImageDefault=&idP=<?php echo $row['idPack'];?>">Set image default</a>
      </td>
      <td><a type="button" class="btn btn-danger btn-sm mt-2 confirm_dialog" style="margin-top:1.5px;" href="../phpScripts/package.inc.php?btnDelete=&id=<?php echo $row['idPack'];?>"><i class="fas fa-trash-alt"></i></a></td>
    </tr>
<?php }
  }
 ?>
  </tbody>
</table>
<?php echo $noPacks; ?> 
<div class="mb-5 row">
  <div class="col-md-4">
    <button type="submit" class="btn btn-primary waves-effect btn-block" data-toggle="modal" data-target="#addPackModal">Add new package</button>
  </div>
  <div class="col-md-4"></div>
  <div class="col-md-4">
  <?php 
    if (isset($_GET['imgError'])) {
      $err = $_GET['imgError'];
      switch ($err) {
        case 'size':
          echo '<div class="alert alert-danger float-right w-100 text-center" role="alert">Image Upload Error: File is too large</div>';
          break;
        case 'select':
          echo '<div class="alert alert-danger float-right w-100 text-center" role="alert">Image Upload Error: Select a File</div>';
          break;
        case 'ext':
          echo '<div class="alert alert-danger float-right w-100 text-center" role="alert">Image Upload Error: File must be .jpg</div>';
          break;
        case 'sql':
          echo '<div class="alert alert-danger float-right w-100 text-center" role="alert">Something went wrong</div>';
          break;
        default:
          break;
      }
    }
  ?>
</div>
</div>

<div class="modal fade" id="addPackModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-notify modal-warning" role="document">
    <!--Content-->
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header text-center bg-primary">
        <h4 class="modal-title white-text w-100 font-weight-bold py-2">ADD NEW PACKAGE</h4>
      </div>

      <!--Body-->
      <div class="modal-body">
        <form action="../phpScripts/package.inc.php" method="post" id="AddPack">
        
        <div class="md-form">
          <input type="text" class="form-control validate" id="add-namePack" name="add-txtNamePack">
          <label>Package Name</label>
        </div>

      <div class="form-group">
        <label>Discription</label>
          <textarea rows="10" type="text" class="form-control validate" id="add-discPack" name="add-txtdiscPack"></textarea>
        </div>

      <div class="md-form">
          <input type="number" class="form-control validate" id="add-pricePack" name="add-txtpricePack">
          <label>Price</label>
      </div>
      
      <!-- <div class="md-form mb-5">
          <div class="input-group">
              <input type="file" class="" id="add-img" name="add-txtimg">
          </div>
        </div> -->

      <div id="addPack-error-message"></div>
      <!--Footer-->
      <div class="modal-footer justify-content-center">
        <button type="submit" class="btn btn-primary waves-effect" id ="btnAddPack">Add Package</button>
      </div>
    </form>
    </div>
    <!--/.Content-->
  </div>
</div>
</div>

<div class="modal fade" id="packUpdateModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-notify modal-warning" role="document">
    <!--Content-->
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header text-center bg-primary">
        <h4 class="modal-title white-text w-100 font-weight-bold py-2">PACKAGE UPDATE</h4>
      </div>

      <!--Body-->
      <div class="modal-body">
        <form action="../phpScripts/package.inc.php" method="post" id="UpdatePack">
        <div class="form-group mb-5">
          <label>Package ID</label>
          <input type="text" class="form-control validate" id="update-idPack" name="update-txtIdPack" readonly>
        </div>

        <div class="form-group">
          <label>Package Name</label>
          <input type="text" class="form-control validate" id="update-namePack" name="update-txtNamePack">
        </div>

      <div class="form-group">
        <label>Discription</label>
          <textarea type="text" rows="10" class="form-control validate" id="update-discPack" name="update-txtdiscPack"></textarea>
        </div>

      <div class="form-group">
          <label>Price</label>
          <input type="number" class="form-control validate" id="update-pricePack" name="update-txtpricePack">
        </div>

      <div id="updatePack-error-message"></div>
      <!--Footer-->
      <div class="modal-footer justify-content-center">
        <button type="submit" class="btn btn-primary waves-effect confirm_dialog" id ="btnUpdatePack">Update</button>
      </div>
    </form>
    </div>
    <!--/.Content-->
  </div>
</div>
<!-- <a  class="btn btn-info waves-effect btn-sm " href="../phpScripts/user.inc.php?btnSetAdmin">Set this user Admin</a> -->
</div>
</div>