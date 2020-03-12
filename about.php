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
<!--top header-->
  <div class="paralax" style="background: url('images/index/home_back2.jpg') no-repeat center;background-size: cover;background-attachment: fixed;height: 40rem;">
    <div class="mask rgba-black-light d-flex justify-content-center align-items-center h-100">
      <!-- Content -->
      <div class="container">
        <!--Grid row-->
        <div class="row">
          <!--Grid column-->
          <div class="col-md-12 mb-4 white-text text-center">
            <h1 class="h1-reponsive white-text text-uppercase font-weight-bold mb-0 pt-md-5 pt-5  animated fadeInDown"><strong>About us</strong></h1>
            <hr class="hr-light my-4 animated fadeInDown">
          </div>
          <!--Grid column-->
        </div>
        <!--Grid row-->
      </div>
      <!-- Content -->
    </div>
  </div>
<!--top header-->

<!--content-->
  <div class="p-3 container">
    <div class="row">
      <div class="col-lg-9">
        <h3>The mission of Pinnawala Zoo is to inspire a culture of understanding and discovery of our natural world through conservation, innovation and leadership.</h3>
        <p>Pinnawala Zoo is a progressive and dynamic zoological park serving Middle Tennessee, southern Kentucky and hundreds of thousands of tourists that travel to Pinnawala every year. </p>
           <p>
           Keeping up with the modern concept of a zoo which is more of an educational and conservation based visitor center, which provides an opportunity to see the animals close to its natural state, the Pinnawala Zoo was designed with a unique taste of architecture and complete with immerse exhibits. The locality was chosen with the close proximity to the renowned Pinnawala Elephant Orphanage with access to natural water resources such as the Ma Oya.

          Inaugurated by the Hon. Minister Dharmasiri Senanayake the Pinnawala Zoo opened its doors to the public on the 17th of April 2015 under the patronage of Hon. Navin Dissanayaka Minister of tourism and sports.</p>

      </div>
      <div class="col-lg-3">
          <div class="nav flex-column nav-fill" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <a class="nav-link active" id="v-pills-1-tab" data-toggle="pill" href="#v-pills-1" role="tab"
              aria-controls="v-pills-1" aria-selected="true">Our Memories</a>
            <a class="nav-link" id="v-pills-2-tab" data-toggle="pill" href="#v-pills-2" role="tab"
              aria-controls="v-pills-2" aria-selected="false">Our team</a>
            <a class="nav-link" id="v-pills-3-tab" data-toggle="pill" href="#v-pills-3" role="tab"
              aria-controls="v-pills-3" aria-selected="false">Senior Management</a>
            <a class="nav-link" id="v-pills-4-tab" data-toggle="pill" href="#v-pills-4" role="tab"
              aria-controls="v-pills-4" aria-selected="false">Policy </a>
          </div>
      </div>
    </div>
  </div>
<!--content-->


<!--fade content-->
<div class="tab-content" id="v-pills-tabContent">



<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
        <img class="_imageBox img-fluid" src="">
      </div>
    </div>
  </div>
</div>
<div class="container text-center tab-pane fade show active mb-5" style="padding-top:2rem;" id="v-pills-1" role="tabpanel" aria-labelledby="v-pills-1-tab">
<!-- Section heading -->
  <h2 class="h1-responsive font-weight-bold my-5">Gallery</h2>

  <!-- Grid row -->
<div class="row" data-aos="fade-up">
  
  <!-- Grid column -->
  <!--
  <div class="col-md-12 mb-3 _imageBox">
    <img src="https://mdbootstrap.com/img/Photos/Slides/img%20(137).jpg" class="img-fluid z-depth-1" alt="Our image">
  </div>
  -->
  <!-- Grid column -->

</div>
<!-- Grid row -->

<!-- Grid row -->
<div class="row" data-aos="zoom-in">

<?php 
include('phpScripts/class/gallery.cls.php');
$package = new Gallery();
$noMsg = '';
$result = $package->getAllImg();
if($result==false){
  $noMsg = '<div class="alert alert-secondary float-right w-100 text-center" role="alert">No Images</div>';
}
else{
?>

    <?php 
    while($row = mysqli_fetch_assoc($result))
    {
    ?>

  <!-- Grid column -->
      <div class="col-lg-2 col-md-2 mb-3 tumb">
        <img src="<?php echo $row['path'];?>" class="img-fluid z-depth-1" alt="Our image" style="height: 100px;">
      </div>


<?php }
  }
 ?>
<?php echo $noMsg; ?> 

</div>

</div>




<div class="container pt-5 tab-pane fade" id="v-pills-2" role="tabpanel" aria-labelledby="v-pills-2-tab">
	<!-- Section: Team-->
<section class="team-section text-center my-5">

  <!-- Section heading -->
  <h2 class="h1-responsive font-weight-bold my-5">Our amazing team</h2>
  <!-- Section description -->
  <p class="grey-text w-responsive mx-auto mb-5">The mission of Pinnawala Zoo is to inspire a culture of understanding and discovery of our natural world through conservation, innovation and leadership.</p>

  <!-- Grid row -->
  <div class="row text-center">

    <!-- Grid column -->
    <div class="col-md-4 mb-md-0 mb-5">
      <div class="avatar mx-auto">
        <img src="images/avatarF.png" class="rounded img-fluid" alt="Avatar">
      </div>
      <h4 class="font-weight-bold dark-grey-text my-4">Maria Kate</h4>
      <h6 class="text-uppercase grey-text mb-3"><strong>President and Chief Executive Officer</strong></h6>
      <!-- Facebook-->
      <a type="button" class="btn-floating btn-sm mx-1 mb-0 btn-fb">
        <i class="fab fa-facebook-f"></i>
      </a>
      <!--Dribbble -->
      <a type="button" class="btn-floating btn-sm mx-1 mb-0 btn-dribbble">
        <i class="fab fa-dribbble"></i>
      </a>
      <!-- Twitter -->
      <a type="button" class="btn-floating btn-sm mx-1 mb-0 btn-tw">
        <i class="fab fa-twitter"></i>
      </a>
    </div>
    <!-- Grid column -->

    <!-- Grid column -->
    <div class="col-md-4 mb-md-0 mb-5">
      <div class="avatar mx-auto">
        <img src="images/avatarM.png" class="rounded img-fluid" alt="Avatar">
      </div>
      <h4 class="font-weight-bold dark-grey-text my-4">John Doe</h4>
      <h6 class="text-uppercase grey-text mb-3"><strong>Vice President</strong></h6>
      <!-- Facebook-->
      <a type="button" class="btn-floating btn-sm mx-1 mb-0 btn-fb">
        <i class="fab fa-facebook-f"></i>
      </a>
      <!--Dribbble -->
      <a type="button" class="btn-floating btn-sm mx-1 mb-0 btn-dribbble">
        <i class="fab fa-dribbble"></i>
      </a>
      <!-- Twitter -->
      <a type="button" class="btn-floating btn-sm mx-1 mb-0 btn-tw">
        <i class="fab fa-twitter"></i>
      </a>
    </div>
    <!-- Grid column -->

    <!-- Grid column -->
    <div class="col-md-4">
      <div class="avatar mx-auto">
        <img src="images/avatarF.png" class="rounded img-fluid" alt="Avatar">
      </div>
      <h4 class="font-weight-bold dark-grey-text my-4">Sarah Melyah</h4>
      <h6 class="text-uppercase grey-text mb-3"><strong>Chief Operating Officer</strong></h6>
      <!--Linkedin -->
      <a type="button" class="btn-floating btn-sm mx-1 mb-0 btn-li">
        <i class="fab fa-linkedin-in "></i>
      </a>
      <!-- Twitter -->
      <a type="button" class="btn-floating btn-sm mx-1 mb-0 btn-tw">
        <i class="fab fa-twitter "></i>
      </a>
      <!--Pinterest -->
      <a type="button" class="btn-floating btn-sm mx-1 mb-0 btn-pin">
        <i class="fab fa-pinterest "></i>
      </a>
    </div>
    <!-- Grid column -->

  </div>
  <!-- Grid row -->

  <!-- Grid row -->
  <div class="row text-center">

    <!-- Grid column -->
    <div class="col-md-4 mb-md-0 mb-5">
      <div class="avatar mx-auto">
        <img src="images/avatarM.png" class="rounded img-fluid" alt="Avatar">
      </div>
      <h4 class="font-weight-bold dark-grey-text my-4">Eddie Trisler</h4>
      <h6 class="text-uppercase grey-text mb-3"><strong>Animal control Officer</strong></h6>
      <!-- Facebook-->
      <a type="button" class="btn-floating btn-sm mx-1 mb-0 btn-fb">
        <i class="fab fa-facebook-f"></i>
      </a>
      <!--Dribbble -->
      <a type="button" class="btn-floating btn-sm mx-1 mb-0 btn-dribbble">
        <i class="fab fa-dribbble"></i>
      </a>
      <!-- Twitter -->
      <a type="button" class="btn-floating btn-sm mx-1 mb-0 btn-tw">
        <i class="fab fa-twitter"></i>
      </a>
    </div>
    <!-- Grid column -->

    <!-- Grid column -->
    <div class="col-md-4 mb-md-0 mb-5">
      <div class="avatar mx-auto">
        <img src="images/avatarF.png" class="rounded img-fluid" alt="Avatar">
      </div>
      <h4 class="font-weight-bold dark-grey-text my-4">Sonia Cosper</h4>
      <h6 class="text-uppercase grey-text mb-3"><strong>Chairman</strong></h6>
      <!-- Facebook-->
      <a type="button" class="btn-floating btn-sm mx-1 mb-0 btn-fb">
        <i class="fab fa-facebook-f"></i>
      </a>
      <!--Dribbble -->
      <a type="button" class="btn-floating btn-sm mx-1 mb-0 btn-dribbble">
        <i class="fab fa-dribbble"></i>
      </a>
      <!-- Twitter -->
      <a type="button" class="btn-floating btn-sm mx-1 mb-0 btn-tw">
        <i class="fab fa-twitter"></i>
      </a>
    </div>
    <!-- Grid column -->

    <!-- Grid column -->
    <div class="col-md-4">
      <div class="avatar mx-auto">
        <img src="images/avatarM.png" class="rounded img-fluid" alt="Avatar">
      </div>
      <h4 class="font-weight-bold dark-grey-text my-4">Mickey Allaire</h4>
      <h6 class="text-uppercase grey-text mb-3"><strong>Main zoo keeper</strong></h6>
      <!--Linkedin -->
      <a type="button" class="btn-floating btn-sm mx-1 mb-0 btn-li">
        <i class="fab fa-linkedin-in "></i>
      </a>
      <!-- Twitter -->
      <a type="button" class="btn-floating btn-sm mx-1 mb-0 btn-tw">
        <i class="fab fa-twitter "></i>
      </a>
      <!--Pinterest -->
      <a type="button" class="btn-floating btn-sm mx-1 mb-0 btn-pin">
        <i class="fab fa-pinterest "></i>
      </a>
    </div>
    <!-- Grid column -->

  </div>
  <!-- Grid row -->

</section>
<!-- Section: Team-->
</div>




<div class="container tab-pane fade" id="v-pills-3" role="tabpanel" aria-labelledby="v-pills-3-tab">
	<!-- Section: Testimonials -->
<section class="text-center my-5">

  <!-- Section heading -->
  <h2 class="h1-responsive font-weight-bold my-5">Senior Management</h2>

  <!-- Carousel Wrapper -->
  <div id="carousel-example-1" class="carousel no-flex slide carousel-fade" data-ride="carousel"
    data-interval="false">
    <!--Slides-->
    <div class="carousel-inner" role="listbox">
      <!--First slide-->
      <div class="carousel-item active">
        <div>
          <!--Avatar-->
          <div class="avatar mx-auto mb-4">
            <img src="images/avatarF.png" class="rounded-circle img-fluid"
              alt="Avatar" style="height: 200px;">
          </div>
          <!--Content-->
          <p>
            <i class="fas fa-quote-left"></i> When I was 7 and went to the zoo with my second-grade class, I saw chimpanzee eyes for the first time - the eyes of an unhappy animal, all alone, locked in a bare, concrete-floored, iron-barred cage in one of the nastier, old-fashioned zoos. I remember looking at the chimp, then looking away.
          </p>
          <h4 class="font-weight-bold">Anna Deynah</h4>
          <h6 class="font-weight-bold my-3">President and Chief Executive Officer</h6>
        </div>
      </div>
      <!--First slide-->
      <!--Second slide-->
      <div class="carousel-item">
        <div>
          <!--Avatar-->
          <div class="avatar mx-auto mb-4">
            <img src="images/avatarF.png" class="rounded-circle img-fluid"
              alt="Avatare" style="height: 200px;">
          </div>
          <!--Content-->
          <p>
            <i class="fas fa-quote-left"></i> There's the famous quote that if you want to understand how animals live, you don't go to the zoo, you go to the jungle. The Future Lab has really pioneered that within Lego, and it hasn't been a theoretical exercise. It's been a real design-thinking approach to innovation, which we've learned an awful lot from.</p>
          <h4 class="font-weight-bold">Maria Kate</h4>
          <h6 class="font-weight-bold my-3">Chief Operating Officer</h6>
        </div>
      </div>
      <!--Second slide-->
      <!--Third slide-->
      <div class="carousel-item">
        <div>
          <!--Avatar-->
          <div class="avatar mx-auto mb-4">
            <img src="images/avatarM.png" class="rounded-circle img-fluid"
              alt="Avatar" style="height: 200px;">
          </div>
          <!--Content-->
          <p>
            <i class="fas fa-quote-left"></i> For better or worse, zoos are how most people come to know big or exotic animals. Few will ever see wild penguins sledding downhill to sea on their bellies, giant pandas holding bamboo lollipops in China or tree porcupines in the Canadian Rockies, balled up like giant pine cones.</p>
          <h4 class="font-weight-bold">John Doe</h4>
          <h6 class="font-weight-bold my-3">Chairman</h6>
        </div>
      </div>
      <!--Third slide-->
    </div>
    <!--Slides-->
    <!--Controls-->
    <a class="btn btn-danger mt-3" href="#carousel-example-1"  data-slide="prev">Previous</a>
    <a class="btn btn-danger mt-3" href="#carousel-example-1"  data-slide="next">Next</a>
    <!--Controls-->
  </div>
  <!-- Carousel Wrapper -->

</section>
<!-- Section: Testimonials -->
</div>




<!--policy-->

<!--policy-->
<div class="container text-justify tab-pane fade mb-5" id="v-pills-4" role="tabpanel" aria-labelledby="v-pills-4-tab">

    <!-- Section heading -->
  <h2 class="h1-responsive font-weight-bold my-5 text-center">Privacy Policy </h2>
  <div><p>
    This Privacy Policy (this "Privacy Policy") applies to the Pinnawala Zoo website located at www.nashvillezoo.org (this "Site"), which is owned and operated by Pinnawala Zoo, Inc. (referred to in this Privacy Policy as the "Zoo", "Pinnawala Zoo", "we", "us", or "our"). This Privacy Policy describes the Pinnawala Zoo's collection, use, and disclosure of personally identifiable information. This Privacy Policy applies whether you access or use this Site via personal computer, mobile device or otherwise. This Privacy Policy applies only to information collected through this Site and does not cover any information collected by any websites to which we link. In addition, please review the Site's Terms of Use, which governs your use of this Site.</p>

    <p>This Site is a general audience website that does not knowingly collect information from children younger than age 13 ("Children", and each, a "Child"). However, the Site allows parents to register their Children for various educational programs by providing the Pinnawala Zoo with a Child's name and birth date. Please review our Children's Privacy Policy to learn about the information this Site collects about Children, how that information is used, and additional information for parents and legal guardians (collectively, "Parents") with regard to information collected by Pinnawala Zoo.</p>

    <p>The Zoo reserves the right, at its sole discretion, to change, modify, add, or remove portions of this Privacy Policy at any time without notice and, unless otherwise indicated, such changes will become effective immediately; therefore, please check this Privacy Policy periodically for changes. Your continued use of the Site following the posting of changes to this Privacy Policy constitutes your acceptance of the changes. This Privacy Policy was last revised on June 15, 2011.</p>
  </div> 
</div>



</div>
<!--fade content-->

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
<script type="text/javascript">
$('.tumb img').click(function(e){
   e.preventDefault();
   $('._imageBox').attr("src",$(this).attr("src"));
   $('.tumb').attr("data-toggle","modal");
   $('.tumb').attr("data-target","#basicModal");
})
</script>
</body>
</html>