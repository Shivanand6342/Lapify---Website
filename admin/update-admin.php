<?php include('../config/constants.php');

if (!isset($_SESSION['user'])) // if user session is not set
{
    // User is not logged in so redirect it to login page
    $_SESSION['no-login-message'] = "<div align='center' class='error text-center'> Please Login to Access Admin Panel </div>";
    header('location:' . SITEURL . 'admin/login.php');
}

setcookie('admin', 'shiva', time()+3600);

if(isset($_GET['id']))
{
    $id = $_GET['id'];
    $sql2 = "SELECT * FROM admin WHERE id=$id";
    $res2 = mysqli_query($conn, $sql2);
    
    if($res2 == TRUE)
    {
        $count = mysqli_num_rows($res2);
        if($count==1)
        {
            // Get the details
            $row=mysqli_fetch_assoc($res2);

            $username = $row['username'];
        }
        else
        {   
            header('location:'.SITEURL.'admin/index.php');
        }
    }
}
else
{
    header('location:'.SITEURL.'admin/index.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Update Product - Lapify</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700" />
    <!-- https://fonts.google.com/specimen/Roboto -->
    <link rel="stylesheet" href="css/fontawesome.min.css" />
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="jquery-ui-datepicker/jquery-ui.min.css" type="text/css" />
    <!-- http://api.jqueryui.com/datepicker/ -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="css/templatemo-style.css">
    <!--
	Product Admin CSS Template
	https://templatemo.com/tm-524-product-admin
	-->
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
                        <i class="fa fa-user"></i> Update Admin
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
                            <h2 class="tm-block-title d-inline-block">Update Admin</h2>
                        </div>

                    </div>
                    <div class="row tm-edit-product-row">
                        <div class="col-xl-6 col-lg-6 col-md-12">
                            <form action="update-admin-php.php" method="POST" class="tm-edit-product-form">
                                <div class="form-group mb-3">
                                    <label for="username">Username
                                    </label>
                                    <input name="username" type="text" class="form-control validate" style="width: 750px;" value="<?php echo $username; ?>" />
                                </div>
                                <div class="form-group mb-3">
                                    <label for="password">Current Password
                                    </label>
                                    <input name="current_password" type="password" class="form-control validate" style="width: 750px;" />
                                </div>
                                <div class="form-group mb-3">
                                    <label for="new_password">New Password
                                    </label>
                                    <input name="new_password" type="password" class="form-control validate" style="width: 750px;" />
                                </div>
                                <div class="form-group mb-3">
                                    <label for="confirm_password">Confirm Password
                                    </label>
                                    <input name="confirm_password" type="password" class="form-control validate" style="width: 750px;" />
                                </div>
                        </div>
                        <div class="col-12">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <input type="submit" name="submit" class="btn btn-primary btn-block text-uppercase" value="Update Now"></input>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
    <script src="jquery-ui-datepicker/jquery-ui.min.js"></script>
    <!-- https://jqueryui.com/download/ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
    <script>
        $(function() {
            $("#expire_date").datepicker({
                defaultDate: "10/22/2020"
            });
        });
    </script>
</body>

</html>