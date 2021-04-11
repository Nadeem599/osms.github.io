<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="boot/css/bootstrap.min.css">
  <link rel="stylesheet" href="boot/fonts/font-awesome.min.css">
  <link rel="stylesheet" href="boot/fonts/pacifico.css">
  <link rel="stylesheet" href="boot/fonts/lato.css">
  <link rel="stylesheet" href="boot/css/style1.css">
  <title>online service management system</title>
</head>

<body>

  <nav class="navbar navbar-expand-md navbar-dark bg-danger pl-5 "  id="bottomtotop">
    <a href="index.php" class="navbar-brand">OSMS</a>
    <span class="navbar-text">
      Customer's Happiness is our Aim
    </span>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse " id="collapsibleNavbar">
      <ul class="  navbar-nav pl-5">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#services">Services</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#registration">Registration</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="user/userlogin.php">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#contact">Contact</a>
        </li>
      </ul>
    </div>
  </nav>
  <!-------------end navigation----------------->

  <div class="jumbotron back-img" style="height: 600px; background-image: url('image/11.jpg');">
    <div class="row  pt-5">
      <div class="col-sm-12 text-danger text-center text-uppercase h1">
        Welcome to Osms
      </div>
      <div class="col-sm-12 text-danger text-center font-italic  ">
        Customer's Happiness is our Aim
      </div>
      <div class="col-sm-12 mt-4 text-danger text-center ">
        <a href="user/userlogin.php" class="btn btn-success mr-1">Login</a>
        <a href="#registration" class="btn btn-danger">Signup</a>
      </div>
    </div>
  </div>
  <!--------------end jumbotron------------->
  <div class="container" id="services">
    <div class="jumbotron">
      <div class="row">
        <div class="col-sm-12 text-center">
          <h3>Our Services</h3>
        </div>
        <div class="col-sm-12  text-justify">
          <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Rerum blanditiis excepturi illo. Laborum nihil
            nostrum aperiam architecto, reiciendis pariatur quae nemo sequi dignissimos maiores nisi ipsa voluptas alias
            perspiciatis quos asperiores! Fuga, atque illo. Libero repudiandae alias rerum cumque quibusdam consectetur,
            illum doloremque a odio provident earum optio nihil nesciunt? Lorem ipsum dolor sit amet consectetur
            adipisicing elit. Magnam commodi, rerum eaque quia odit ullam eos animi dicta tempora eius! Lorem ipsum
            dolor sit amet consectetur adipisicing elit. Enim praesentium ipsam culpa fugit? Placeat culpa unde modi
            vero laboriosam facere ad sint perspiciatis non quis temporibus, exercitationem maxime tenetur eligendi
            distinctio qui nemo optio ullam eum asperiores nesciunt. Vel, ipsam!
          </p>
        </div>
      </div>
    </div>
  </div>
  <!--------------end jumbotron------------->
  <div class="container" id="services">
    <div class="row">
      <div class="col-sm-12 text-center">
        <h3>Our Services</h3>
      </div>

    </div>
    <div class="row mt-4">
      <div class="col-md-4 text-center mb-4">
        <i class="fa fa-tv fa-5x  text-success"></i>
        <h4 class="mt-4">Electronic Appliances</h4>
      </div>
      <div class="col-md-4 text-center mb-4">
        <i class="fa fa-sliders fa-5x  text-success"></i>
        <h4 class="mt-4">Preventive Maintenance</h4>
      </div>
      <div class="col-md-4 text-center mb-4">
        <i class="fa fa-cogs fa-5x  text-success"></i>
        <h4 class="mt-4">Fault Repaire</h4>
      </div>
    </div>
  </div>
  <!--------------end jumbotron------------->
  <!--------------start registration------------->
  <?php
  include_once('registration.php');
  ?>
  <!--------------end registration------------->
  <!--------------end jumbotron------------->
  <div class="jumbotron bg-danger">
    <div class="container">
      <h2 class="text-center text-white pb-5">Happy Customers</h2>
      <div class="row ">
        <div class="col-lg-3 col-sm-6 pb-2">
          <div class="card shadow-lg">
            <div class="card-body text-center">
              <img src="image/17.jpg" class="  rounded-circle" style="height: 100px; width: 100px;" alt="">
              <h4 class="card-title">Rahul Kumar</h4>
              <p class="card-text text-justify ">Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio molestiae
                pariatur ullam rem rerum! Magnam, voluptatum. Nulla saepe dolor quis.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-sm-6 pb-2">
          <div class="card shadow-lg">
            <div class="card-body text-center">
              <img src="image/13.jpg" class="  rounded-circle" style="height: 100px; width: 100px;" alt="">
              <h4 class="card-title">Rahul Kumar</h4>
              <p class="card-text text-justify ">Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio molestiae
                pariatur ullam rem rerum! Magnam, voluptatum. Nulla saepe dolor quis.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-sm-6 pb-2">
          <div class="card shadow-lg">
            <div class="card-body text-center">
              <img src="image/17.jpg" class="  rounded-circle" style="height: 100px; width: 100px;" alt="">
              <h4 class="card-title">Rahul Kumar</h4>
              <p class="card-text text-justify ">Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio molestiae
                pariatur ullam rem rerum! Magnam, voluptatum. Nulla saepe dolor quis.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-sm-6 pb-2">
          <div class="card shadow-lg">
            <div class="card-body text-center">
              <img src="image/13.jpg" class="rounded-circle" style="height: 100px; width: 100px;" alt="">
              <h4 class="card-title">Rahul Kumar</h4>
              <p class="card-text text-justify ">Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio molestiae
                pariatur ullam rem rerum! Magnam, voluptatum. Nulla saepe dolor quis.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--------------end jumbotron------------->
  <!--------------start contact------------->
  <?php include_once('contact.php'); ?>
<!--------------end contact------------->
  <!--------------start footer------------->
  <footer class="container-fluid bg-dark mt-5 fixed-bottom text-white ">

    <div class="container">
      <div class="row py-2">
        <div class="col-md-6">
          <small class="mr-2">Follow Us</small>
          <a href="" class="text-danger"><i class="fa fa-facebook mr-2"></i></a>
          <a href="" class="text-danger"><i class="fa fa-twitter mr-2"></i></a>
          <a href="" class="text-danger"><i class="fa fa-youtube mr-2"></i></a>
          <a href="" class="text-danger"><i class="fa fa-instagram mr-2"></i></a>
         
        </div>
        <div class="col-md-6">
          <small>Designed by GeekyShows &copy; 2021</small>
          <small class=" ml-2"><a href="admin/adminlogin.php">Admin Login</a></small>
          <a href="#bottomtotop" class="btn btn-danger btn-sm ml-1">Top</a>
        </div>
      </div>
    </div>

  </footer>

  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/popover.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>

</html>