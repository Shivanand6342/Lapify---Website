<?php include('config/constantsuser.php'); ?>

<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="shortcut icon" href="images/logo.png" type="">

  <title> Lapify </title>

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap1.css" />
  <!--owl slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css" />
  <!-- font awesome style -->
  <link href="css/font-awesome1.min.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="css/style1.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive1.css" rel="stylesheet" />
  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
  <!--owl slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css" />
  <!-- font awesome style -->
  <link href="css/font-awesome.min.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />

</head>

<body class="sub_page">

  <div class="hero_area">
    <div class="hero_bg_box">
      <img src="images/123.jpg" alt="">
    </div>
    <!-- header section strats -->
    <header class="header_section">
      <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="index.php">
            <span>
              <img src="images/logo.png" style="height: 40px; width: 40px;">
              Lapify
            </span>
          </a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""> </span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav  ">
              <li class="nav-item ">
                <a class="nav-link" href="index.php">Home </a>
              </li>&nbsp;&nbsp;
              <li class="nav-item active">
                <a class="nav-link" href="products.php"> Products <span class="sr-only">(current)</span></a>
              </li>&nbsp;&nbsp;
              <li class="nav-item">
                <a class="nav-link" href="category.php">Category</a>
              </li>&nbsp;&nbsp;
              <li class="nav-item">
                <a class="nav-link" href="contact us.html">Contact Us</a>
              </li>&nbsp;&nbsp;
              <!-- <form class="form-inline">
                <input class="form-control mr-sm-2" type="search" placeholder="Search..." style=" height: 30px;">
                <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit">
                  <i class="fa fa-search" aria-hidden="true"></i>
                </button>
              </form> -->
            </ul>
            <ul class="navbar-nav  ">
              <li align="right" class="nav-item">
                <a class="nav-link" href="login_singup.html">Log In</a>
              </li </ul>
          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->
  </div>

  <!-- about section -->

  <section class="about_section about_section1 layout_padding">
    <div class="d-flex justify-content-center row">
      <div class="col-md-10">

      <?php

      $sql = "SELECT * FROM products";
      $res = mysqli_query($conn, $sql);
      $count = mysqli_num_rows($res);
      if($count>0)
      {
        while($row=mysqli_fetch_assoc($res))
        {
          $id = $row['id'];
          $name = $row['name'];
          $price = $row['price'];
          $image_name = $row['image_name'];
          $ram = $row['ram'];
          $storage = $row['storage'];
          $processor = $row['processor'];
          ?>

          <div class="row p-2 bg-white border rounded">
            <div class="col-md-3 mt-1"> 
              <?php
              if($image_name == "")
              {
                echo "<div class='error'>Image Not Available</div>";
              }
              else
              {
                ?>
                <a href="<?php echo SITEURL; ?>Products/index.php?id=<?php echo $id; ?>"><img class="img-fluid img-responsive rounded product-image" src="<?php echo SITEURL; ?>images/laptop/<?php echo $image_name; ?>"></a><br>
                <?php
              }
              ?>
            </div>
            <div class="col-md-6 mt-1"><br>
              <a href="<?php echo SITEURL; ?>Products/index.php?id=<?php echo $id; ?>">
                <h3> <?php echo $name; ?> </h3>
              </a>
              <div class="mt-1 mb-1 spec-1"><span>RAM: <?php echo $ram; ?>GB </span> <br><br> <span class="square"></span><span>Storage:
                  <?php echo $storage; ?> </span> <br><br> <span class="dot"></span><span>Processor: <?php echo $processor; ?><br></span>
              </div><br>
            </div>
            <div class="align-items-center align-content-center col-md-3 border-left mt-1">
              <div class="d-flex flex-row align-items-center">
                <h4 class="mr-1" style="color: blue;"><b><?php echo $price; ?>/-</b></h4>
              </div>
              <h6 class="text-success">Free shipping</h6>
              <div class="d-flex flex-column mt-4">
                <a href="<?php echo SITEURL; ?>Products/index.php?id=<?php echo $id; ?>"><button class="btn btn-primary btn-sm" style="width: 287px;"
                    type="button"> Details
                  </button></a>
              </div>
            </div>
          </div>
          <?php
        }
      }
      else
      {
        echo "<div class='error'>Laptop Not Found</div>";
      }
      ?>
      </div>
    </div>
  </section>

  <!-- end about section -->

  <!-- info section -->
  <section class="info_section">
    <div class="container">
      <div class="row info_main_row">
        <div class="col-md-4 info_col">
          <h5>
            About Us
          </h5>
          <p>
            I'm just a student with enormous love for Coffee who dares to think big and isn't
            afraid to to be different. <span style="color: red;"><b>Lapify</b></span> is a unique website, which provide
            you budget friendly top
            laptops all over India.
          </p>
        </div>
        <div class="col-md-4 col-lg-3 mx-auto info_col">
          <h5>
            Connect With Us
          </h5>
          <div class="info_contact">
            <a href="https://www.google.com/maps/@26.7893406,80.9672635,21z">
              <i class="fa fa-map-marker" aria-hidden="true"></i>
              <span>
                Location
              </span>
            </a>
            <a href="tel:6392761106">
              <i class="fa fa-phone" aria-hidden="true"></i>
              <span>
                Call +91 6392761106
              </span>
            </a>
            <a href="mailto:shivanandv66@gmail.com">
              <i class="fa fa-envelope"></i>
              <span>
                shivanandv66@gmail.com
              </span>
            </a>
          </div>
          <div class="social_box">
            <a href="https://www.facebook.com/profile.php?id=100006139695813">
              <i class="fa fa-facebook" aria-hidden="true"></i>
            </a>
            <a href="https://wa.me/6392761106">
              <i class="fa fa-whatsapp" aria-hidden="true"></i>
            </a>
            <a href="https://github.com/Shivanand6342/">
              <i class="fa fa-github" aria-hidden="true"></i>
            </a>
            <a href="https://www.instagram.com/shiva__0fficial/">
              <i class="fa fa-instagram" aria-hidden="true"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
    <div align="center">
      <p>
        &copy; <span id="displayYear"></span> All Rights Reserved By
        <a href="#">Shivanand Vishwakarma</a>
      </p>
    </div>
  </section>
  <!-- end info section -->


  <!-- jQery -->
  <script src="js/jquery-3.4.1.min.js"></script>
  <!-- popper js -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
  <!-- bootstrap js -->
  <script src="js/bootstrap.js"></script>
  <!-- owl slider -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <!-- custom js -->
  <script src="js/custom.js"></script>
  <!-- Google Map -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
  </script>
  <!-- End Google Map -->

</body>

</html>