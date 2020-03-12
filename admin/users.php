<script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
<script>
  $(document).ready(function(){
      $("#UpdateUser").submit(function(event){
      event.preventDefault();
      var txtIdUser = $("#update-idUser").val();
      var txtName = $("#update-nameUser").val();
      var txtEmail = $("#update-emailUser").val();
      var txtAddress = $("#update-addressUser").val();
      var type = $('#update-typeUser option:selected').val();
      var btnUpdate = $("#btnUpdateUser").val();
      $("#updateUser-error-message").load("../phpScripts/user.inc.php", {
          txtIdUser: txtIdUser,
          txtName: txtName,
          txtEmail: txtEmail,
          txtAddress: txtAddress,
          type: type,
          btnUpdate: btnUpdate
      });
    });

      $("#AddUser").submit(function(event){
      event.preventDefault();
      var txtName = $("#add-nameUser").val();
      var txtEmail = $("#add-emailUser").val();
      var txtAddress = $("#add-addressUser").val();
      var txtPassword = $("#add-password").val();
      var btnAddUser = $("#btnAddUser").val();
      $("#addUser-error-message").load("../phpScripts/user.inc.php", {
          txtName: txtName,
          txtEmail: txtEmail,
          txtAddress: txtAddress,
          txtPassword: txtPassword,
          btnAddUser: btnAddUser  
      });
    });

  });
</script>



<div class="container mt-5">
<?php 
include('../phpScripts/class/user.cls.php');
$user = new User();
$noUsers = '';
$result = $user->getAllUsers();
if($result==false){
  $noUsers = '<div class="alert alert-danger float-right w-100 text-center" role="alert">No users</div>';
}
else{
?>
<div class="text-center">
        <h4 class="dark-text w-100 font-weight-bold">USERS</h4>
</div>
<table id="Dtable" class="table table-bordered text-center z-depth-2 userTable table-responsive-md">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">NAME</th>
      <th scope="col">EMAIL</th>
      <th scope="col">ADDRESS</th>
      <th scope="col">TYPE</th>
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
      <td><b><?php echo $row['idUser'];?></b></td>
      <td><?php echo $row['nameUser'];?></td>
      <td><?php echo $row['email'];?></td>
      <td><?php echo $row['address'];?></td>
      <td><?php echo $row['type'];?></td>
      <td><button type="button" id="btnViewUser" class="btn btn-primary btn-sm"  data-toggle="modal" data-target="#userUpdateModal">Update</button></td>
      <td><a type="button" class="btn btn-danger btn-sm mt-2 confirm_dialog" style="margin-top:1.5px;" href="../phpScripts/user.inc.php?btnDelete=&id=<?php echo $row['idUser'];?>"><i class="fas fa-trash-alt"></i></a></td>
    </tr>
<?php }
  }
 ?>
  </tbody>
</table>
<?php echo $noUsers; ?> 
<div>
  <div class="col-md-4">
    <button type="submit" class="btn btn-primary waves-effect btn-block" data-toggle="modal" data-target="#addUserModal">Add new user</button>
  </div>
</div>

<div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-notify modal-warning" role="document">
    <!--Content-->
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header text-center bg-primary">
        <h4 class="modal-title white-text w-100 font-weight-bold py-2">ADD NEW USER</h4>
      </div>

      <!--Body-->
      <div class="modal-body">
        <form action="../phpScripts/user.inc.php" method="post" id="AddUser">
        
        <div class="md-form">
          <input type="text" class="form-control validate" id="add-nameUser" name="add-txtNameUser">
          <label>Username</label>
        </div>

      <div class="md-form">
          <input type="email" class="form-control validate" id="add-emailUser" name="add-txtEmailUser">
          <label>Email</label>
        </div>

      <div class="md-form">
          <input type="text" class="form-control validate" id="add-addressUser" name="add-txtAddressUser">
          <label>Address</label>
        </div>
      
      <div class="md-form mb-5">
          <input type="text" class="form-control validate" id="add-password" name="add-txtpassword">
          <label>Password</label>
        </div>

      <div id="addUser-error-message"></div>
      <!--Footer-->
      <div class="modal-footer justify-content-center">
        <button type="submit" class="btn btn-primary waves-effect" id ="btnAddUser">Add User</button>
      </div>
    </form>
    </div>
    <!--/.Content-->
  </div>
</div>
</div>

<div class="modal fade" id="userUpdateModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-notify modal-warning" role="document">
    <!--Content-->
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header text-center bg-primary">
        <h4 class="modal-title white-text w-100 font-weight-bold py-2">USER UPDATE</h4>
      </div>

      <!--Body-->
      <div class="modal-body">
        <form action="../phpScripts/user.inc.php" method="post" id="UpdateUser">
        <div class="form-group mb-5">
          <label>User ID</label>
          <input type="text" class="form-control validate" id="update-idUser" name="update-txtIdUser" readonly>
        </div>

        <div class="form-group">
          <label>Username</label>
          <input type="text" class="form-control validate" id="update-nameUser" name="update-txtNameUser">
        </div>

      <div class="form-group">
          <label>Email</label>
          <input type="text" class="form-control validate" id="update-emailUser" name="update-txtEmailUser">
        </div>

      <div class="form-group">
          <label>Address</label>
          <input type="text" class="form-control validate" id="update-addressUser" name="update-txtAddressUser">
        </div>

      <div class="form-group">
          <label for="update-typeUser">Type</label>
          <select id="update-typeUser" name="update-txtTypeUser" class="form-control">
            <option>user</option>
            <option>admin</option>
          </select>
        </div>
      <div id="updateUser-error-message"></div>
      <!--Footer-->
      <div class="modal-footer justify-content-center">
        <button type="submit" class="btn btn-primary waves-effect confirm_dialog" id ="btnUpdateUser">Update</button>
      </div>
    </form>
    </div>
    <!--/.Content-->
  </div>
</div>
<!-- <a  class="btn btn-info waves-effect btn-sm " href="../phpScripts/user.inc.php?btnSetAdmin">Set this user Admin</a> -->
</div>
</div>