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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
  <!---------------------------------------------------------------------------------------------------------->
  <style type="text/css">
    .animated{
      animation-duration: 1.5s;
      animation-delay: 0.5s;
    }
  </style>

</head>
<body>
<?php
include("nav.php");
?>

<!-- Main navigation -->
<header>
  <!-- Full Page Intro -->
  <div class="view" >
    <video class="video-intro" autoplay loop muted style="height: auto;width:auto;">
            <source src="images/index/home_vedio.mp4" type="video/mp4">
    </video>
    <!-- Mask & flexbox options-->
    <div class="mask rgba-black-light d-flex justify-content-center align-items-center">
      <!-- Content -->
      <div class="container">
        <!--Grid row-->
        <div class="row">
          <!--Grid column-->
          <div class="col-md-12 mb-4 white-text text-center">
            <h1 class="h1-reponsive white-text text-uppercase font-weight-bold mb-0 pt-md-5 pt-5  animated fadeInDown" style="font-size: 5vw;"><strong>Welcome</strong></h1>
            <hr class="hr-light my-4 animated fadeInDown">
            <h5 class="text-uppercase mb-4 white-text animated fadeInDown"><strong>Find the Explore in you</strong></h5>
            <?php 
              if(!isset($_SESSION['ID'])){
                echo '<a class="btn btn-outline-white animated fadeIn" data-toggle="modal" data-target="#modalLRForm">Sign up</a>';        
              }
            ?>
            <a class="btn btn-outline-white animated fadeIn" href="about.php">About us</a>
          </div>
          <!--Grid column-->
        </div>
        <!--Grid row-->
      </div>
      <!-- Content -->
    </div>
    <!-- Mask & flexbox options-->
  </div>
  <!-- Full Page Intro -->
</header>
<!-- Main navigation -->


<div>
   <!-- Portfolio -->
  <section class="content-section my-5" id="portfolio">
    <div class="container pt-5">
      <div class="content-section-heading text-center" data-aos="zoom-in">
        <h2 class="h1-responsive font-weight-bold my-5">Explore</h2>
      </div>
      <div class="row no-gutters">
        <div class="col-lg-6" data-aos="flip-up">
          <a class="portfolio-item" href="#">
            <span class="caption">
              <span class="caption-content">
                <h2>Natural beauty</h2>
                <p class="mb-0">Nature is full of beauties. Only we should have eyes to perceive them, as it is wisely said that beauty lies in the eyes of the beholder.</p>
              </span>
            </span>
            <img class="img-fluid" src='images/index/p1.jpg' alt="">
          </a>
        </div>
        <div class="col-lg-6" data-aos="flip-up">
          <a class="portfolio-item" href="#">
            <span class="caption">
              <span class="caption-content">
                <h2>Education</h2>
                <p class="mb-0">How do different animals behave? What is the role of biodiversity in an ecosystem? How are animal babies cared for? All these and more are part of the ‘PZ Living Classrooms’, where learning about nature is done within nature itself.</p>
              </span>
            </span>
            <img class="img-fluid" src='images/index/p2.jpg' alt="">
          </a>
        </div>
        <div class="col-lg-6" data-aos="flip-down">
          <a class="portfolio-item" href="#">
            <span class="caption">
              <span class="caption-content">
                <h2>Petting</h2>
                <p class="mb-0">The petting area is a unique feature in the Pinnawala Zoo where all visitors especially children can have a live experience in touching and petting domesticated animals even before they buy the tickets.</p>
              </span>
            </span>
            <img class="img-fluid" src='images/index/p3.jpg' alt="">
          </a>
        </div>
        <div class="col-lg-6" data-aos="flip-down">
          <a class="portfolio-item" href="#">
            <span class="caption">
              <span class="caption-content">
                <h2>Tigers</h2>
                <p class="mb-0">The tiger enclosure presented at the Pinnawala Zoo is of a unique concept on its own. It presents varieties of tiger living in Sri Lanka in a single enclosure. </p>
              </span>
            </span>
            <img class="img-fluid" src='images/index/p4.jpg' alt="">
          </a>
        </div>
      </div>
    </div>
  </section> 
  <!-- Portfolio -->
</div>


<!--Carousel Wrapper-->
<div id="carousel-with-lb" class="carousel slide carousel-multi-item container" data-ride="carousel" data-aos="fade-in">
 <h2 class="h1-responsive font-weight-bold my-5 text-center">Latest from the Gallery</h2>
  <!--Slides and lightbox-->

  <div class="carousel-inner mdb-lightbox" role="listbox">
    <div id="mdb-lightbox-ui"></div>
    <!--First slide-->
    <div class=" carousel-item active text-center">

      <figure class="col-md-3 d-md-inline-block m-3 ">
        <a href="images/index/slide/1.jpg" data-size="1600x1067">
          <img src="images/index/slide/1.jpg" class="img-fluid">
        </a>
      </figure>

      <figure class="col-md-3 d-md-inline-block m-3 ">
        <a href="images/index/slide/2.jpg" data-size="1600x1067">
          <img src="images/index/slide/2.jpg" class="img-fluid">
        </a>
      </figure>

      <figure class="col-md-3 d-md-inline-block m-3 ">
        <a href="images/index/slide/3.jpg" data-size="1600x1067">
          <img src="images/index/slide/3.jpg" class="img-fluid">
        </a>
      </figure>

      <figure class="col-md-3 d-md-inline-block m-3 ">
        <a href="himages/index/slide/4.jpg" data-size="1600x1067">
          <img src="images/index/slide/4.jpg" class="img-fluid">
        </a>
      </figure>
      <figure class="col-md-3 d-md-inline-block m-3 ">
        <a href="himages/index/slide/5.jpg" data-size="1600x1067">
          <img src="images/index/slide/5.jpg" class="img-fluid">
        </a>
      </figure>
      <figure class="col-md-3 d-md-inline-block m-3 ">
        <a href="himages/index/slide/6.jpg" data-size="1600x1067">
          <img src="images/index/slide/6.jpg" class="img-fluid">
        </a>
      </figure>

    </div>
    <!--/.First slide-->

    <!--Second slide-->
    <div class="carousel-item text-center">

      <figure class="col-md-3 d-md-inline-block m-3">
        <a href="himages/index/slide/7.jpg" data-size="1600x1067">
          <img src="images/index/slide/7.jpg" class="img-fluid">
        </a>
      </figure>

      <figure class="col-md-3 d-md-inline-block m-3">
        <a href="himages/index/slide/8.jpg" data-size="1600x1067">
          <img src="images/index/slide/8.jpg" class="img-fluid">
        </a>
      </figure>

      <figure class="col-md-3 d-md-inline-block m-3">
        <a href="himages/index/slide/9.jpg" data-size="1600x1067">
          <img src="images/index/slide/9.jpg" class="img-fluid">
        </a>
      </figure>

      <figure class="col-md-3 d-md-inline-block m-3">
        <a href="himages/index/slide/10.jpg" data-size="1600x1067">
          <img src="images/index/slide/10.jpg" class="img-fluid">
        </a>
      </figure>
      <figure class="col-md-3 d-md-inline-block m-3">
        <a href="himages/index/slide/11.jpg" data-size="1600x1067">
          <img src="images/index/slide/11.jpg" class="img-fluid">
        </a>
      </figure>
      <figure class="col-md-3 d-md-inline-block m-3">
        <a href="himages/index/slide/12.jpg" data-size="1600x1067">
          <img src="images/index/slide/12.jpg" class="img-fluid">
        </a>
      </figure>

    </div>
    <!--/.Second slide-->

    <!--third slide-->
    <div class="carousel-item text-center">

      <figure class="col-md-3 d-md-inline-block m-3 ">
        <a href="images/index/slide/13.jpg" data-size="1600x1067">
          <img src="images/index/slide/13.jpg" class="img-fluid">
        </a>
      </figure>

      <figure class="col-md-3 d-md-inline-block m-3 ">
        <a href="images/index/slide/14.jpg" data-size="1600x1067">
          <img src="images/index/slide/14.jpg" class="img-fluid">
        </a>
      </figure>

      <figure class="col-md-3 d-md-inline-block m-3 ">
        <a href="images/index/slide/15.jpg" data-size="1600x1067">
          <img src="images/index/slide/15.jpg" class="img-fluid">
        </a>
      </figure>

      <figure class="col-md-3 d-md-inline-block m-3 ">
        <a href="images/index/slide/16.jpg" data-size="1600x1067">
          <img src="images/index/slide/16.jpg" class="img-fluid">
        </a>
      </figure>
      <figure class="col-md-3 d-md-inline-block m-3 ">
        <a href="images/index/slide/17.jpg" data-size="1600x1067">
          <img src="images/index/slide/17.jpg" class="img-fluid">
        </a>
      </figure>
      <figure class="col-md-3 d-md-inline-block m-3 ">
        <a href="images/index/slide/18.jpg" data-size="1600x1067">
          <img src="images/index/slide/18.jpg" class="img-fluid">
        </a>
      </figure>

    </div>
    <!--/.third slide-->

  </div>
  <!--/.Slides-->

<!--Controls-->
  <div class="container text-center">
      <a class="btn btn-outline-dark m-2 py-0" href="#carousel-with-lb" data-slide="next"><h2>&larr;</h2></a>
      <a class="btn btn-outline-dark m-2 py-0" href="#carousel-with-lb" data-slide="prev"><h2>&rarr;</h2></a>
  </div>
<!--/.Controls-->

</div>
<!--/.Carousel Wrapper-->




<div class="container" data-aos="zoom-in">
  <!-- Section: Testimonials -->
<section class="text-center my-5">

  <!-- Section heading -->
  <h2 class="h1-responsive font-weight-bold my-5">Comments</h2>

  <!-- Carousel Wrapper -->
  <div id="carousel-example-1" class="carousel no-flex slide carousel-fade" data-ride="carousel"
    data-interval="false">
    <!--Slides-->
    <div class="carousel-inner" role="listbox">
      <!--First slide-->
      <div class="carousel-item active">
        <div>      
          <!--Content-->
          <h4 class="font-weight-bold">A"Fun Place for Young Kids"</h4>
          <p>
            <i class="fas fa-quote-left"></i> "My family loves this ZOO. It's not too big , but it's a good place for a day of family fun. Both my boys (5 and 10) love to feed all the animals, especially the birds. The bus tour is always exciting." – Nadia B. 
   
        </div>
      </div>
      <!--First slide-->
      <!--Second slide-->
      <div class="carousel-item">
        <div>      
          <!--Content-->
          <h4 class="font-weight-bold">"You Can Feed the Animals!!"</h4>
          <p>
            <i class="fas fa-quote-left"></i> “Love this zoo, lots of interaction with the animals and birds! Food is fresh carrots and romaine for purchase at the front along with sticks of feed for the birds. The bus tour is nice and the animals seem to love that they have food at their disposal all day. Great family outing!” – Stephanie R.  </p>
  
        </div>
      </div>
      <!--Second slide-->
      <!--Third slide-->
      <div class="carousel-item">
        <div>      
          <!--Content-->
          <h4 class="font-weight-bold">"Love Coming Here with Family as a Weekend Activity"</h4>
          <p>
            <i class="fas fa-quote-left"></i> "There are so many areas where the little ones can interact with the animals. I think the best part is the bird atrium where the birds can fly over and sit on your hand and eat off the bird seed sticks. Also the giraffe is very friendly and loves carrots!” – Patti Y. </p>

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