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
<script type="text/javascript">
	$(document).ready(function(){
      $("#profileForm").submit(function(event){
      event.preventDefault();
      var txtid = $("#profile-id").val();
      var txtName = $("#profile-name").val();
      var txtAddress = $("#profile-address").val();
      var txtEmail = $("#profile-email").val();
      var btnUpdatePro = $("#profile-btnUpdatePro").val();

      $("#profile-error-message").load("phpScripts/user.inc.php", {
          txtid: txtid,
          txtName: txtName,
          txtAddress: txtAddress,
          txtEmail: txtEmail,
          btnUpdatePro: btnUpdatePro
      });
    });

      $("#cPwForm").submit(function(event){
      event.preventDefault();
      var txtId = $("#profile-id").val();
      var oldPw = $("#profile-txtOPassword").val();
      var newPw = $("#profile-txtNPassword").val();
      var cPw = $("#profile-txtCPassword").val();
      var btnPassword = $("#profile-btnPassword").val();
      $("#cPw-error-message").load("phpScripts/user.inc.php", {
          txtId: txtId,
          oldPw: oldPw,
          newPw: newPw,
          cPw: cPw,
          btnPassword: btnPassword
      });
    });
  });
</script>
<?php if (isset($_SESSION['ID'])){
include('phpScripts/class/user.cls.php');
      $user = new user();
      $error = '';
      $result = $user->getProfile($_SESSION['ID']);
      if($result==false){
        $error = '<div class="alert alert-danger float-right w-100 text-center" role="alert">No Packages</div>';
      }
      else{
        $row = mysqli_fetch_assoc($result);
?>
	
<div class="container">
	<div class="col-md-12" style="margin: 10rem 0 5em 0;">
			<div class="border border-light p-md-5 w-50 m-auto">
			<form action="phpScripts/user.inc.php" method="post" id="profileForm">
			<input type="text" class="form-control mb-4" placeholder="Your name" id="profile-id" name="txtid" value="<?php echo $row['idUser']; ?>" hidden>
		    <p class="h4 mb-md-4 text-center">Profile</p>
		    <div class="form-group">
			<label>Name</label>
		    <input type="text" class="form-control mb-4" placeholder="Your name" id="profile-name" name="txtName" value="<?php echo $row['nameUser']; ?>">
		    </div>
		    <div class="form-group">
			<label>Address</label>
		    <input type="text" class="form-control mb-4" placeholder="Your adress" id="profile-address" name="txtAddress" value="<?php echo $row['address']; ?>">
		    </div>
		    <div class="form-group">
			<label>Email</label>
		    <input type="email" class="form-control mb-4" placeholder="Your email" id="profile-email" name="txtEmail" value="<?php echo $row['email']; ?>">
		    </div>
		    <div id="profile-error-message"></div>
		    <button class="btn btn-primary my-md-4 float-right confirm_dialog" type="submit" name="btnUpdatePro" id="profile-btnUpdatePro">Update</button>
		    <a type="button" class="btn btn-danger confirm_dialog" type="submit" name="btnDeletePro" href="phpScripts/user.inc.php?btnDeletePro=&id=<?php echo $row['idUser'];?>">Delete my account</a>
		</form>
		<button class="btn btn-primary my-md-4" type="submit" data-toggle="modal" data-target="#modalCPForm">Change password</button>
		</div>
	</div>
</div>

		<?php 
		}
	}
  else{
    echo '<div class="py-5"></div><div class="py-5"></div>
    <div class="alert alert-danger float-right w-100 text-center mb-5" role="alert">Please login to proceed</div>
    <div class="py-5"></div><div class="py-5"></div>';
  }
		 ?>

<div class="modal fade" id="modalCPForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog cascading-modal" role="document">
    <!--Content-->
    <div class="modal-content">

      <!--Modal cascading tabs-->
      <div class="modal-c-tabs">

        <!-- Tab panels -->
        <div class="tab-content">
          <!--Panel 7-->
          <div class="tab-pane fade in show active" id="panel7" role="tabpanel">
            <!--Body-->
            <form action="phpScripts/user.inc.php" method="post" id="cPwForm">
            <div class="modal-body mb-1">
	        	<input type="text" class="form-control mb-4" placeholder="Your name" id="profile-id" name="txtid" value="<?php echo $_SESSION['ID']; ?>" hidden>
              <div class="md-form form-sm mb-4">
                <i class="fas fa-lock prefix"></i>
                <input type="password" class="form-control form-control-sm validate" placeholder="Your old password" id="profile-txtOPassword" name="txtPassword">
              </div>
              <div class="md-form form-sm mb-4">
                <i class="fas fa-lock prefix"></i>
                <input type="password" class="form-control form-control-sm validate" placeholder="Your new password" id="profile-txtNPassword" name="txtPassword">
              </div>
              <div class="md-form form-sm mb-4">
                <i class="fas fa-lock prefix"></i>
                <input type="password" class="form-control form-control-sm validate" placeholder="Confirm your new password" id="profile-txtCPassword" name="txtPassword">
              </div>
              <div id="cPw-error-message"></div>
              <div class="text-center mt-2">
                <button class="btn btn-info confirm_dialog" type="submit" name="btnPassword" id="profile-btnPassword">Change</button>
                <button class="btn btn-info" type="reset" name="btnClear">Clear</button>
              </div>
            </div>
            </form>
          </div>
          <!--/.Panel 7-->
        </div>

      </div>
    </div>
    <!--/.Content-->
  </div>
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