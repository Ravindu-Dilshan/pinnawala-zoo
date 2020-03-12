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
<div class="mt-5"></div>

<div class="container pt-5" data-aos="zoom-in">
<div class="z-depth-2 my-4">
<div class="p-3"><h2>WE APPRECIATE YOUR CONTRIBUTION</h2></div>
  <div class="row">
    <div class="col-md-8">
       <form class="py-5">
             <div class="form-group ml-5">
                <label class="col-md-4 control-label">Please Enter a Price</label>
                <div class="col-md-11">
                   <div class="input-group"><input placeholder="Enter a price" class="form-control" required="true" value="" type="number"></div>
                </div>
             </div>
             <div class="form-group ml-5">
                <label class="col-md-4 control-label">Select a Donation Fund</label>
                <div class="col-md-11">
                   <div class="input-group">
                      <span class="input-group-addon" style="max-width: 100%;"><i class="glyphicon glyphicon-list"></i></span>
                      <select class="selectpicker form-control" required="true" >
                         <option>Annual Fund</option>
                         <option>Animal care Center</option>
                         <option>Animal Medical Expences</option>
                         <option>Animal care</option>
                      </select>
                   </div>
                </div>
             </div>
             <div class="form-group ml-5">
                <label class="col-md-4 control-label">Doners Name</label>
                <div class="col-md-11">
                   <div class="input-group"><input placeholder="Enter a Name" class="form-control" required="true" value="" type="text"></div>
                </div>
             </div>
             <div class="form-group ml-5">
                <label class="col-md-4 control-label">Tribute type</label>
                <div class="col-md-11">
                   <div class="input-group">
                      <span class="input-group-addon" style="max-width: 100%;"><i class="glyphicon glyphicon-list"></i></span>
                      <select class="selectpicker form-control">
                         <option>In Memory of</option>
                         <option>In Honor of</option>
                         <option>None</option>
                      </select>
                   </div>
                </div>
             </div>
             <div class="form-group ml-5">
                <label class="col-md-4 control-label">Name of the Notifier</label>
                <div class="col-md-11">
                   <div class="input-group"><input placeholder="Enter a Name" class="form-control" value="" type="text"></div>
                </div>
             </div>
             <div class="form-group ml-5">
                <label class="col-md-4 control-label">Address</label>
                <div class="col-md-11">
                   <div class="input-group"><input placeholder="Enter Address" class="form-control" required="true" value="" type="text"></div>
                </div>
             </div>
             <div class="form-group ml-5">
                <label class="col-md-4 control-label">City</label>
                <div class="col-md-11">
                   <div class="input-group"><input placeholder="City" class="form-control" required="true" value="" type="text"></div>
                </div>
             </div>
             <div class="form-group ml-5">
                <label class="col-md-4 control-label">State/Province/Region</label>
                <div class="col-md-11">
                   <div class="input-group"><input placeholder="State/Province/Region" class="form-control" required="true" value="" type="text"></div>
                </div>
             </div>
             <div class="form-group ml-5">
                <label class="col-md-4 control-label">Postal Code/ZIP</label>
                <div class="col-md-11">
                   <div class="input-group"><input placeholder="Postal Code/ZIP" class="form-control" required="true" value="" type="text"></div>
                </div>
             </div>
             <div class="form-group ml-5">
                <label class="col-md-4 control-label">Email</label>
                <div class="col-md-11">
                   <div class="input-group"><input placeholder="Email" class="form-control" required="true" value="" type="email"></div>
                </div>
             </div>
             <div class="form-group ml-5">
                <label class="col-md-4 control-label">Phone Number</label>
                <div class="col-md-11">
                   <div class="input-group"><input placeholder="Phone Number" class="form-control" required="true" value="" type="Number"></div>
                </div>
             </div>
             <div class="col-md-11">
               <button class="btn btn-primary float-right mb-3">Donate</button>
             </div>
         </form>
         </div>
         <div class="col-md-4">
           <img src="images/donate.jpg" class="img-fluid">
           <img src="images/donate2.jpg" class="img-fluid">
         </div>
      </div>
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