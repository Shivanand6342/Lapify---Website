<?php include('../config/constants.php');

if (!isset($_SESSION['user'])) // if user session is not set
{
    // User is not logged in so redirect it to login page
    $_SESSION['no-login-message'] = "<div align='center' class='error text-center'> Please Login to Access Admin Panel </div>";
    header('location:' . SITEURL . 'admin/login.php');
}

setcookie('admin', 'shiva', time()+3600);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Add Product - Lapify</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700" />
  <!-- https://fonts.google.com/specimen/Roboto -->
  <link rel="stylesheet" href="css/fontawesome.min.css" />
  <!-- https://fontawesome.com/ -->
  <link rel="stylesheet" href="jquery-ui-datepicker/jquery-ui.min.css" type="text/css" />
  <!-- http://api.jqueryui.com/datepicker/ -->
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <!-- https://getbootstrap.com/ -->
  <link rel="stylesheet" href="css/templatemo-style.css">
</head>

<body>
  <nav class="navbar navbar-expand-xl">
    <div class="container h-100">
      <a class="navbar-brand" href="index.php">
        <h1 class="tm-site-title mb-0">
          <?php
            if (isset($_COOKIE['admin']))
            {
              echo "".$_COOKIE['admin'];
            }
          ?>
          <!-- Welcome Admin -->
        </h1>
      </a>
      <button class="navbar-toggler ml-auto mr-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars tm-nav-icon"></i>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mx-auto h-100">
          <li class="nav-item">
            <a class="nav-link" href="index.php">
              <i class="fas fa-tachometer-alt"></i> Dashboard
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="products.php">
              <i class="fas fa-shopping-cart"></i> Products
            </a>
          </li>
        </ul>
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link d-block" href="logout.php">
              <b>Logout</b>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container tm-mt-big tm-mb-big">
    <div class="row">
      <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
        <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
          <div class="row">
            <div class="col-12">
              <h2 class="tm-block-title d-inline-block">Add Product</h2>
            </div>
          </div>
          <div class="row tm-edit-product-row">
            <div class="col-xl-6 col-lg-6 col-md-12">
              <form action="add-product-php.php" method="POST" class="tm-edit-product-form" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="name">Laptop Name
                  </label>
                  <input id="name" name="name" type="text" class="form-control validate" style="width: 750px;" required />
                </div>
                <div>
                  <input type="file" name="image" style="margin-left: 200px;" class="btn btn-primary" multiple onchange="preview()"><br><br>
                  <img src="" id="frame" width="307px" height="200px" style="margin-left: 200px;">
                </div>
                <div class="form-group mb-3">
                  <label for="category">Category</label>
                  <select class="custom-select tm-select-accounts" name="category" id="category" style="width: 750px;">

                    <?php
                    // create sql to get all categories
                    $sql = "SELECT * FROM category";

                    // executing queries
                    $res = mysqli_query($conn, $sql);

                    // count rows to check whether we have categories
                    $count = mysqli_num_rows($res);

                    if ($count > 0) {
                      while ($row = mysqli_fetch_assoc($res)) {
                        // get details of category
                        $id = $row['id'];
                        $title = $row['title'];
                    ?>
                        <option value="<?php echo $id; ?>"><?php echo $title; ?></option>
                      <?php
                      }
                    } else {
                      // No category message
                      ?>
                      <option value="0">No Category Found</option>
                    <?php
                    }

                    // display the dropdown
                    ?>

                  </select>
                </div>
                <div class="form-group mb-3">
                  <label for="ram">RAM (in GB)</label>
                  <select class="custom-select tm-select-accounts" name="ram" style="width: 750px;">
                    <option value="8">8</option>
                    <option value="16">16</option>
                    <option value="32">32</option>
                  </select>
                </div>
                <div class="form-group mb-3">
                  <label for="storage">Storage</label>
                  <select class="custom-select tm-select-accounts" name="storage" style="width: 750px;">
                    <option value="1 TB HDD">1 TB HDD</option>
                    <option value="512 GB SSD">512 GB SSD</option>
                  </select>
                </div>
                <div class="form-group mb-3">
                  <label for="processor">Processor
                  </label>
                  <input id="processor" name="processor" type="text" class="form-control validate" style="width: 750px;" required />
                </div>
                <div class="form-group mb-3">
                  <label for="windows">Windows Version</label>
                  <select class="custom-select tm-select-accounts" name="windows" style="width: 750px;">
                    <option value="10">10</option>
                    <option value="11">11</option>
                  </select>
                </div>
                <div class="form-group mb-3">
                  <label for="weight">Weight
                  </label>
                  <input id="weight" name="weight" type="text" class="form-control validate" style="width: 750px;" required />
                </div>
                <div class="form-group mb-3">
                  <label for="thickness">Thickness
                  </label>
                  <input id="thickness" name="thickness" type="text" class="form-control validate" style="width: 750px;" required />
                </div>
                <div class="form-group mb-3">
                  <label for="battery">Battery
                  </label>
                  <input id="battery" name="battery" type="text" class="form-control validate" style="width: 750px;" required />
                </div>
                <div class="form-group mb-3">
                  <label for="description">Description</label>
                  <textarea class="form-control validate" name="description" rows="3" style="width: 750px;" required></textarea>
                </div>
                <div class="row">
                  <div class="form-group mb-3 col-xs-12 col-sm-6">
                    <label for="price">Price
                    </label>
                    <input id="price" name="price" type="number" class="form-control validate" style="width: 750px;" required />
                  </div>
                </div>
                <br>
                <div class="col-12">
                  <input style="margin-left: 175px;" type="submit" name="submit" class="btn btn-primary btn-block text-uppercase" value="Add Product"></input>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div><br><br>
    <footer class="tm-footer row tm-mt-small">
      <div class="col-12 font-weight-light">
        <p class="text-center text-white mb-0 px-4 small">
          &copy; 2022<span id="displayYear"></span> All Rights Reserved By
          <a href="#" style="color: yellow;">Shivanand Vishwakarma</a>
        </p>
      </div>
    </footer>

    <script>
      function preview() {
        frame.src = URL.createObjectURL(event.target.files[0])
      }
    </script>
    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="jquery-ui-datepicker/jquery-ui.min.js"></script>
    <!-- https://jqueryui.com/download/ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
    <script>
      $(function() {
        $("#expire_date").datepicker();
      });
    </script>
</body>

</html>