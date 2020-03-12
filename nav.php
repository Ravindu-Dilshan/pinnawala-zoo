<?php session_start(); ?>
<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
<script>
  $(document).ready(function(){
      $("#LoginForm").submit(function(event){
      event.preventDefault();
      var txtEmail = $("#login-txtEmail").val();
      var txtPassword = $("#login-txtPassword").val();
      var btnLogin = $("#login-btnLogin").val();
      $("#login-error-message").load("phpScripts/login.inc.php", {
          txtEmail: txtEmail,
          txtPassword: txtPassword,
          btnLogin: btnLogin
      });
    });
  });
  $(document).ready(function(){
      $("#RegisterForm").submit(function(event){
      event.preventDefault();
      var txtName = $("#Reg-txtName").val();
      var txtAddress = $("#Reg-txtAddress").val();
      var txtEmail = $("#Reg-txtEmail").val();
      var txtPassword = $("#Reg-txtPassword").val();
      var txtRepPassword = $("#Reg-txtRepPassword").val();
      var btnReg = $("#Reg-btnReg").val();
      $("#reg-error-message").load("phpScripts/register.inc.php", {
          txtName: txtName,
          txtAddress: txtAddress,
          txtEmail: txtEmail,
          txtPassword: txtPassword,
          txtRepPassword: txtRepPassword,
          btnReg: btnReg
      });
    });
  });

</script>
  <!--Modal: Login / Register Form-->
<div class="modal fade" id="modalLRForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog cascading-modal" role="document">
    <!--Content-->
    <div class="modal-content">

      <!--Modal cascading tabs-->
      <div class="modal-c-tabs">

        <!-- Nav tabs -->
        <ul class="nav nav-tabs md-tabs tabs-2 bg-light darken-3" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#panel7" role="tab"><i class="fas fa-user mr-1"></i>
              Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#panel8" role="tab"><i class="fas fa-user-plus mr-1"></i>
              Register</a>
          </li>
        </ul>

        <!-- Tab panels -->
        <div class="tab-content">
          <!--Panel 7-->
          <div class="tab-pane fade in show active" id="panel7" role="tabpanel">
            <form action="phpScripts/login.inc.php"  method="post" id="LoginForm">
            <!--Body-->
            <div class="modal-body mb-1">
              <div class="md-form form-sm mb-5">
                <i class="fas fa-envelope prefix"></i>
                <input type="text" class="form-control form-control-sm validate" placeholder="Your email / Username"  id="login-txtEmail" name="txtEmail">
              </div>
              <div class="md-form form-sm mb-4">
                <i class="fas fa-lock prefix"></i>
                <input type="password" class="form-control form-control-sm validate" placeholder="Your password" id="login-txtPassword" name="txtPassword">
              </div>
              <div id="login-error-message"></div>
              <div class="text-center mt-2">
                <button class="btn btn-info" id="login-btnLogin" name="btnLogin">Log in</button>
                <button class="btn btn-info" type="reset" name="btnClear">Clear</button>
              </div>
            </div>
            </form>
          </div>
          <!--/.Panel 7-->

          <!--Panel 8-->
          <div class="tab-pane fade" id="panel8" role="tabpanel">
            <form action="phpScripts/register.inc.php"  method="post" id="RegisterForm">
            <!--Body-->
            <div class="modal-body">
              <div class="md-form form-sm mb-5">
                <i class="fas fa-user prefix"></i>
                <input type="text" class="form-control form-control-sm validate" placeholder="Your Name" id="Reg-txtName" name="txtName">
              </div>

              <div class="md-form form-sm mb-5">
                <i class="fas fa-user prefix"></i>
                <input type="text" class="form-control form-control-sm validate" placeholder="Your address" id="Reg-txtAddress" name="txtAddress">
              </div>

              <div class="md-form form-sm mb-5">
                <i class="fas fa-envelope prefix"></i>
                <input type="email" class="form-control form-control-sm validate" placeholder="Your email" id="Reg-txtEmail" name="txtEmail">
              </div>

              <div class="md-form form-sm mb-5">
                <i class="fas fa-lock prefix"></i>
                <input type="password" class="form-control form-control-sm validate" placeholder="Your password" id="Reg-txtPassword" name="txtPassword">
              </div>

              <div class="md-form form-sm mb-4">
                <i class="fas fa-lock prefix"></i>
                <input type="password" class="form-control form-control-sm validate" placeholder="Repeat password" id="Reg-txtRepPassword" name="txtRepPassword">
              </div>
              <div id="reg-error-message"></div>
              <div class="text-center form-sm mt-2">
                <button class="btn btn-info" name="btnReg" id="Reg-btnReg">Sign up</button>
                <button class="btn btn-info" type="reset" name="btnClear">Clear</button>
              </div>
            </div>
            </form>
          </div>   
          <!--/.Panel 8-->
        </div>

      </div>
    </div>
    <!--/.Content-->
  </div>
</div>
<!--Modal: Login / Register Form-->

<?php
if(isset($_REQUEST['msg'])){
  if($_REQUEST['msg']=='errorLog'){
        echo '<!-- Central Modal Medium Danger -->
              <div class="modal fade" id="loginMsg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-side modal-sm modal-top-right modal-danger" role="document">
                  <!--Content-->
                  <div class="modal-content">
                    <!--Body-->
                    <div class="modal-body">
                      <div class="text-center">
                        <p>Something went Wrong</p>
                      </div>
                    </div>
                    <!--Footer-->
                    <div class="modal-footer justify-content-center">
                      <a type="button" class="btn btn-outline-danger waves-effect" data-dismiss="modal">Okay</a>
                    </div>
                  </div>
                  <!--/.Content-->
                </div>
              </div>
              <!-- Central Modal Medium Danger-->';
  }
  if($_REQUEST['msg']=='successLog'){
        echo '<!-- Central Modal Medium Danger -->
              <div class="modal fade" id="loginMsg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-sm modal-success" role="document">
                  <!--Content-->
                  <div class="modal-content">
                    <!--Body-->
                    <div class="modal-body">
                      <div class="text-center">
                        <p>Successfully logged in</p>
                      </div>
                    </div>
                    <!--Footer-->
                    <div class="modal-footer justify-content-center">
                      <a type="button" class="btn btn-outline-success waves-effect" data-dismiss="modal">Okay</a>
                    </div>
                  </div>
                  <!--/.Content-->
                </div>
              </div>
              <!-- Central Modal Medium Danger-->';
  }
}
?>

  <!--Navbar-->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top scrolling-navbar">
    <div class="container">
      <a class="navbar-brand" href="#"><img src="images/index/logo2.png" height="60" alt="mdb logo"></a>
          <!-- Collapse button -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"><span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.php">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.php">About us</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown">
              Support the us
            </a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="ticket.php">Buy Ticket</a>
              <a class="dropdown-item" href="donations.php">Donations</a>
              <a class="dropdown-item" href="#" hidden="">Events</a>
            </div>
          </li>
        </ul>
        <ul class="navbar-nav ml-auto nav-flex-icons">
          <li class="nav-item">
            <a class="nav-link waves-effect waves-light">
              <i class="fab fa-twitter"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link waves-effect waves-light">
              <i class="fab fa-google-plus-g"></i>
            </a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown">
              <i class="fas fa-user"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-left dropdown-default" style="width:10%;">
              <?php
                if(isset($_SESSION['ID'])){
                  if ($_SESSION['TYPE']=='admin') {
                    echo '<a class="dropdown-item" href="admin/admin.php">Admin panel</a>';
                  }
                  echo '<a class="dropdown-item" href="reservation.php">Bookings</a>';
                  echo '<a class="dropdown-item" href="viewreservations.php">My reservations</a>';
                  echo '<a class="dropdown-item" href="profile.php">Profile</a>';
                  echo '<a class="dropdown-item" href="phpScripts/logout.inc.php?btnLogout">Logout</a>';
                  }
                else{
                  echo '<a class="dropdown-item"><form><input class="btn btn-outline-dark" style="max-width: 55%;" value="Login" data-toggle="modal" data-target="#modalLRForm"/></form></a>';
                    }
              ?> 
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Navbar -->
