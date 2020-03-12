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
      $("#contactForm").submit(function(event){
      event.preventDefault();
      var txtName = $("#form-name").val();
      var txtEmail = $("#form-email").val();
      var txtMessage = $("#form-msg").val();
      var btnSend = $("#form-btnmsg").val();
      $("#contact-error-message").load("phpScripts/message.inc.php", {
          txtName: txtName,
          txtEmail: txtEmail,
          txtMessage: txtMessage,
          btnSend: btnSend
      });
    });
  });
  </script>
<div class="container pt-5">
<!-- Section: Contact v.1 -->
<section class="my-5">

  <!-- Section heading -->
  <h2 class="h1-responsive font-weight-bold text-center my-5">Contact us</h2>
  <!-- Section description -->
  <p class="text-center w-responsive mx-auto pb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
    Fugit, error amet numquam iure provident voluptate esse quasi, veritatis totam voluptas nostrum quisquam
    eum porro a pariatur veniam.</p>

  <!-- Grid row -->
  <div class="row">

    <!-- Grid column -->
    <div class="col-lg-5 mb-lg-0 mb-4" style="box-shadow: 0px 2px 10px 0px rgba(0,0,0,.8);">

      <!-- Form with header -->
        <div class="card-body py-4">
          <!-- Header -->
          <div class="form-header bg-primary p-3">
            <h3 class="mt-2"><i class="fas fa-envelope"></i> Write to us:</h3>
          </div>
          <!-- Body -->
          <form class="p-3" id="contactForm" method="get" action="phpScripts/message.inc.php">
	          <div class="md-form">
	            <i class="fas fa-user prefix grey-text"></i>
	            <input type="text" id="form-name" class="form-control" name="contact-txtName">
	            <label>Your name</label>
	          </div>
	          <div class="md-form">
	            <i class="fas fa-envelope prefix grey-text"></i>
	            <input type="email" id="form-email" class="form-control" name="contact-txtEmail">
	            <label >Your email</label>
	          </div>
	          <div class="md-form">
	            <i class="fas fa-pencil-alt prefix grey-text"></i>
	            <textarea type="text" id="form-msg" class="form-control md-textarea" rows="3" name="contact-txtMessage"></textarea>
	            <label>Send message</label>
	          </div>
            <div id="contact-error-message"></div>
	          <div class="text-center">
	            <button class="btn btn-primary" id="form-btnmsg" name="contact-btnSend">Submit</button>
	          </div>
      	</form>

        </div>
      <!-- Form with header -->

    </div>
    <!-- Grid column -->

    <!-- Grid column -->
    <div class="col-lg-7 p-4" style="box-shadow: 0px 2px 10px 0px rgba(0,0,0,.8);">

      <!--Google map-->
      <div id="map-container-section" class="z-depth-1-half map-container-section mb-4" style="height: 400px">
       <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.495211623865!2d80.3848011653456!3d7.2981244947326385!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae315ca68381591%3A0x36adaccbc62335e5!2zUGlubmF3YWxhIFpvbyAo4La04LeS4Lax4LeK4Lax4LeA4La9IOC3g-C2reC3iuC3gOC3neC2r-C3iuKAjeC2uuC3j-C2seC2uik!5e0!3m2!1sen!2slk!4v1552741584264" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
      </div>
      <!-- Buttons-->
      <div class="row text-center">
        <div class="col-md-4">
          <a class="btn-floatin">
            <i class="fas fa-map-marker-alt"></i>
          </a>
          <p>Kegalle - Rambukkana Rd, Rambukkana</p>
          <p class="mb-md-0">Sri Lanka</p>
        </div>
        <div class="col-md-4">
          <a class="btn-floating">
            <i class="fas fa-phone"></i>
          </a>
          <p>+94 35 22 66641 </p>
          <p class="mb-md-0">Mon - Fri, 7:00-20:00</p>
        </div>
        <div class="col-md-4">
          <a class="btn-floating" >
            <i class="fas fa-envelope"></i>
          </a>
          <p>zoosl@slt.lk</p>
        </div>
      </div>

    </div>
    <!-- Grid column -->

  </div>
  <!-- Grid row -->

</section>
<!-- Section: Contact v.1 -->
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