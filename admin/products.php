<?php include('../config/constants.php'); ?>

<?php 

// Authorization - Access Control
// Check whether user is logged in or not

if(!isset($_SESSION['user'])) // if user session is not set
{
    // User is not logged in so redirect it to login page
    $_SESSION['no-login-message'] = "<div align='center' class='error text-center'> Please Login to Access Admin Panel </div>";
    header('location:'.SITEURL.'admin/login.php');
}

setcookie('admin', 'shiva', time()+3600);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Products - Lapify</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700" />
  <!-- https://fonts.google.com/specimen/Roboto -->
  <link rel="stylesheet" href="css/fontawesome.min.css" />
  <!-- https://fontawesome.com/ -->
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <!-- https://getbootstrap.com/ -->
  <link rel="stylesheet" href="css/templatemo-style.css">
  <!--
	Product Admin CSS Template
	https://templatemo.com/tm-524-product-admin
	-->
</head>

<body id="reportsPage">
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
      <button class="navbar-toggler ml-auto mr-0" type="button" data-toggle="collapse"
        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
        aria-label="Toggle navigation">
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
  <div class="container mt-5">
    <div class="row tm-content-row">

    <?php
    if(isset($_SESSION['upload']))
    {
        echo $_SESSION['upload'];
        unset($_SESSION['upload']);
    }
    if(isset($_SESSION['remove-failed']))
    {
        echo $_SESSION['remove-failed'];
        unset($_SESSION['remove-failed']);
    }
    ?>


      <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 tm-block-col">
        <!-- <div class="tm-bg-primary-dark tm-block tm-block-products"> -->
          <!-- <div class="tm-product-table-container"> -->
            <table class="table table-hover tm-table-small tm-product-table" style="width: 1400px; margin-left: -140px;">
                <tr>
                  <th scope="col">S.No.</th>
                  <th scope="col">LAPTOP NAME</th>
                  <th scope="col">IMAGE</th>
                  <th scope="col">RAM</th>
                  <th scope="col">STORAGE</th>
                  <th scope="col">PROCESSOR</th>
                  <th scope="col">WINDOWS</th>
                  <th scope="col">WEIGHT</th>
                  <th scope="col">THICKNESS</th>
                  <th scope="col">BATTERY</th>
                  <th scope="col">PRICE</th>
                  <th scope="col">&nbsp;</th>
                  <th scope="col">&nbsp;</th>
                </tr>

                <?php
                
                $sql = "SELECT * FROM products";
                $res = mysqli_query($conn, $sql);
                $count = mysqli_num_rows($res);
                $sn=1;

                if($count>0)
                {
                  while($row=mysqli_fetch_assoc($res))
                  {
                    $id = $row['id'];
                    $name = $row['name'];
                    $image_name = $row['image_name'];
                    $ram = $row['ram'];
                    $storage = $row['storage'];
                    $processor = $row['processor'];
                    $windows = $row['windows'];
                    $weight = $row['weight'];
                    $thickness = $row['thickness'];
                    $battery = $row['battery'];
                    $price = $row['price'];
                    ?>
                    <tr>
                      <td> <?php echo $sn++ ?>. </td>
                      <td class="tm-product-name"> <?php echo $name; ?> </td>
                      <td> 
                        <?php
                        if($image_name=="")
                        {
                          echo "<div class='error'>Image is not Added</div>";
                        }
                        else
                        {
                          ?>
                          <img src="<?php echo SITEURL; ?>images/laptop/<?php echo $image_name; ?>" width="100px">
                          <?php 
                        }
                        ?>
                      </td>
                      <td> <?php echo $ram; ?> </td>
                      <td> <?php echo $storage; ?> </td>
                      <td> <?php echo $processor; ?> </td>
                      <td> <?php echo $windows; ?> </td>
                      <td> <?php echo $weight; ?> </td>
                      <td> <?php echo $thickness; ?> </td>
                      <td> <?php echo $battery; ?> </td>
                      <td> <?php echo $price; ?>/- </td>
                      <td>
                        <a href="<?php echo SITEURL; ?>admin/update-product.php?id=<?php echo $id; ?>" class="tm-product-delete-link">
                          <i class="fa fa-pencil-alt tm-product-delete-icon"></i>
                        </a>
                      </td>
                      <td>
                        <a href="<?php echo SITEURL; ?>admin/delete-product.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="tm-product-delete-link">
                          <i class="far fa-trash-alt tm-product-delete-icon"></i>
                        </a>
                      </td>
                    </tr>
                    <?php
                  }
                }
                else
                {
                  echo "<tr> <td colspan='10' class='error'> Laptop Not Added yet </td> </tr>";
                }
                ?>
            </table><br><br><br>
          <!-- </div> -->
          <!-- table container -->
          <a href="add-product.php" class="btn btn-primary btn-block text-uppercase mb-3" >Add new product</a>
        <!-- </div> -->
      </div>
    </div>
  </div><br>
  <footer class="tm-footer row tm-mt-small">
    <div class="col-12 font-weight-light">
      <p class="text-center text-white mb-0 px-4 small">
        &copy; 2022<span id="displayYear"></span> All Rights Reserved By
        <a href="#" style="color: yellow;">Shivanand Vishwakarma</a>
      </p>
    </div>
  </footer>

  <script src="js/jquery-3.3.1.min.js"></script>
  <!-- https://jquery.com/download/ -->
  <script src="js/bootstrap.min.js"></script>
  <!-- https://getbootstrap.com/ -->
  <script>
    $(function () {
      $(".tm-product-name").on("click", function () {
        window.location.href = "edit-product.php";
      });
    });
  </script>
</body>

</html>