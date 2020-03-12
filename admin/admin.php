<?php
session_start();
if(isset($_SESSION['ID'])){
    if ($_SESSION['TYPE']=='admin') {
 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
  		<link rel="icon" href="../images/index/logo.png">
	<!--------------------css------------------------------------->
	<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="../bootstrap/mdb_css/mdb.min.css" rel="stylesheet">
	<link href="../fonts/css/fontawesome-all.min.css" rel="stylesheet">
	<link href="../aos/aos.css" rel="stylesheet">
	<link href="../css/styles.css" rel="stylesheet">
  <link href="../css/datatables.css" rel="stylesheet">
	<!--------------------------------------------------------->
</head>
<body>
<div class="row h-100 pl-3">
  <div class="col-md-2 bg-dark p-0 rounded">
    <div class="nav flex-column nav-pills nav-fill" id="v-pills-tab" role="tablist" aria-orientation="vertical">
      <a class="nav-link" href="admin.php?page=panel.php"><i class="fas fa-home px-3"></i>Home</a>
      <a class="nav-link" href="admin.php?page=users.php"><i class="fas fa-users px-3"></i>Users</a>
      <a class="nav-link" href="admin.php?page=packages.php"><i class="fas fa-ticket-alt px-3"></i>Packages</a>
      <a class="nav-link" href="admin.php?page=messages.php"><i class="fas fa-comment-alt px-3"></i>Messages</a>
      <a class="nav-link" href="admin.php?page=bookings.php"><i class="fas fa-clipboard-list px-3"></i>Bookings</a>
      <a class="nav-link"  href="admin.php?page=gallery.php"><i class="fas fa-images px-3"></i>Gallery</a>
      <a class="nav-link" href="../index.php"><i class="fas fa-reply px-3"></i>Back</a>
    </div>
  </div>
  <div class="col-md-10" style="background:#f1f1f1;">
    <div class="tab-content" id="v-pills-tabContent">
      <div>
          <?php
              if(isset($_GET['page'])){
                $page = $_GET['page'];
                  include($page);
              }
              else{
                include('panel.php');
              }
          ?>
      </div>
    </div>
  </div>
</div>
<!------------------------js--------------------------------->
<script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../bootstrap/mdb_js/mdb.js"></script>
<script type="text/javascript" src="../aos/aos.js"></script>
<script type="text/javascript" src="../js/mine.js"></script>
<script type="text/javascript" src="../js/datatables.js"></script>

<script type="text/javascript">
      $('.userTable tbody').on('click','#btnViewUser',function(){
        var currow = $(this).closest('tr');
        var id = currow.find('td:eq(0)').text();
        var name = currow.find('td:eq(1)').text();
        var email = currow.find('td:eq(2)').text();
        var address = currow.find('td:eq(3)').text();
        var type = currow.find('td:eq(4)').text();

        $('#update-idUser').val(id);
        $('#update-nameUser').val(name);
        $('#update-emailUser').val(email);
        $('#update-addressUser').val(address);
        $('#update-typeUser').val(type);

        $('#userUpdateModal').modal('show');

      })


      $('.packTable tbody').on('click','#btnViewPack',function(){
        var currow = $(this).closest('tr');
        var id = currow.find('td:eq(0)').text();
        var name = currow.find('td:eq(1)').text();
        var disc = currow.find('td:eq(2)').text();
        var price = currow.find('td:eq(3)').text();

        $('#update-idPack').val(id);
        $('#update-namePack').val(name);
        $('#update-discPack').val(disc);
        $('#update-pricePack').val(price);

        $('#packUpdateModal').modal('show');

      })

      $(window).on('load',function(){
        $('#viewResModal').modal('show');
      });

</script>
<!-- <script>
    function showRes(button){
    var id = button.id;
    $.ajax({
     type: "POST",
     url: '../phpScripts/reservation.inc.php',
     data: {"type":id},
     success: function(response){      
         var res = response;
         alert(response);
         $("#view-name").text(['name']);
     }
    });

    }
</script> -->
<!--------------------------------------------------------->
</body>
</html>
<?php 
    }
    else{
      echo '<script>window.location = "../index.php?msg=errorLog"</script>';
    }
}
else{
    echo '<script>window.location = "../index.php?msg=errorLog"</script>';
  }
?>