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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin - Lapify</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
    <!-- https://fonts.google.com/specimen/Roboto -->
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="css/templatemo-style.css">
    <!--
	Product Admin CSS Template
	https://templatemo.com/tm-524-product-admin
	-->
</head>

<body id="reportsPage">
    <div class="" id="home">
        <nav class="navbar navbar-expand-xl">
            <div class="container h-100">
                <a class="navbar-brand" href="index.php">
                    <h1 class="tm-site-title mb-0">
                        <?php
                        if (isset($_COOKIE['admin']))
                        {
                            echo "Welcome ".$_COOKIE['admin'];
                        }
                        ?>
                        <!-- Welcome Admin -->
                    </h1>
                </a>
                <button class="navbar-toggler ml-auto mr-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars tm-nav-icon"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto h-100">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">
                                <i class="fas fa-tachometer-alt"></i>
                                Dashboard
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="products.php">
                                <i class="fas fa-shopping-cart"></i>
                                Products
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
        <br><br><br>
        <div class="container">
            <!-- <a href="add-admin.php" class="btn-primary"> Add Admin</a> -->
            <a href="add-admin.php" style="width: 150px;" class="btn btn-primary btn-block text-uppercase mb-3" >Add Admin</a>
            <br>

            <?php
                if(isset($_SESSION['delete']))
                {
                    echo $_SESSION['delete'];
                    unset($_SESSION['delete']);
                }
                if(isset($_SESSION['add']))
                {
                    echo $_SESSION['add'];
                    unset($_SESSION['add']);
                }
                if(isset($_SESSION['update']))
                {
                    echo $_SESSION['update'];
                    unset($_SESSION['update']);
                }
                if(isset($_SESSION['pwd-not-match']))
                {
                    echo $_SESSION['pwd-not-match'];
                    unset($_SESSION['pwd-not-match']);
                }
                if(isset($_SESSION['user-not-found']))
                {
                    echo $_SESSION['user-not-found'];
                    unset($_SESSION['user-not-found']);
                }
            ?>
            <br>

            <table class="table table-hover tm-table-small tm-product-table" style="width: 100%; color: white;">
                <tr>
                    <th scope="col"> S.No. </th>
                    <th scope="col"> USERNAME </th>
                    <th scope="col"> UPDATE </th>
                    <th scope="col"> DELETE </th>
                </tr>
                <?php

                $sql = "SELECT * FROM admin";
                $res = mysqli_query($conn, $sql);

                if($res == TRUE)
                {
                    $count = mysqli_num_rows($res); //Function to get all rows of databse
                    $sn = 1;

                    if($count>0)
                    {
                        while($rows=mysqli_fetch_assoc($res))
                        {
                            $id=$rows['id'];
                            $username=$rows['username'];
                            ?>

                            <tr>
                                <td> <?php echo $sn++; ?> </td>
                                <td> <?php echo $username; ?> </td>
                                <td>
                                    <a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id; ?>" class="tm-product-delete-link">
                                        <i class="fa fa-pencil-alt tm-product-delete-icon"></i>
                                    </a>
                                </td>
                                <td>

                                    <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id; ?>" class="tm-product-delete-link">
                                        <i class="far fa-trash-alt tm-product-delete-icon"></i>
                                    </a>
                                </td>
                            </tr>

                            <?php
                        }
                    }
                    else
                    {
                        echo "We Do not have data in database";
                    }
                }

                ?>
            </table>
        </div><br>
        <br><br>

        <div class="container">
            <!-- <a href="add-admin.php" class="btn-primary"> Add Admin</a> -->
            <a href="add-category.php" style="width: 180px;" class="btn btn-primary btn-block text-uppercase mb-3" >Add Category</a>
            <br>

            <table class="table table-hover tm-table-small tm-product-table" style="width: 100%; color: white;">
                <tr>
                    <th> S.No. </th>
                    <th> CATEGORY </th>
                    <th> UPDATE </th>
                    <th> DELETE </th>
                </tr>
                <?php

                $sql = "SELECT * FROM category";
                $res = mysqli_query($conn, $sql);

                if($res == TRUE)
                {
                    $count = mysqli_num_rows($res); //Function to get all rows of databse
                    $sn = 1;

                    if($count>0)
                    {
                        while($rows=mysqli_fetch_assoc($res))
                        {
                            $id=$rows['id'];
                            $title=$rows['title'];
                            ?>

                            <tr>
                                <td> <?php echo $sn++; ?> </td>
                                <td> <?php echo $title; ?> </td>
                                <td>
                                    <a href="<?php echo SITEURL; ?>admin/update-category.php?id=<?php echo $id; ?>" class="tm-product-delete-link">
                                        <i class="fa fa-pencil-alt tm-product-delete-icon"></i>
                                    </a>
                                </td>
                                <td>

                                    <a href="<?php echo SITEURL; ?>admin/delete-category.php?id=<?php echo $id; ?>" class="tm-product-delete-link">
                                        <i class="far fa-trash-alt tm-product-delete-icon"></i>
                                    </a>
                                </td>
                            </tr>

                            <?php
                        }
                    }
                    else
                    {
                        echo "We Do not have data in database";
                    }
                }

                ?>
            </table>
        </div><br>

        <footer class="tm-footer row tm-mt-small">
            <div class="col-12 font-weight-light">
                <p class="text-center text-white mb-0 px-4 small">
                    &copy; 2022<span id="displayYear"></span> All Rights Reserved By
                    <a href="#" style="color: yellow;">Shivanand Vishwakarma</a>
                </p>
            </div>
        </footer>
    </div>

    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="js/moment.min.js"></script>
    <!-- https://momentjs.com/ -->
    <script src="js/Chart.min.js"></script>
    <!-- http://www.chartjs.org/docs/latest/ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
    <script src="js/tooplate-scripts.js"></script>
    <script>
        Chart.defaults.global.defaultFontColor = 'white';
        let ctxLine,
            ctxBar,
            ctxPie,
            optionsLine,
            optionsBar,
            optionsPie,
            configLine,
            configBar,
            configPie,
            lineChart;
        barChart, pieChart;
        // DOM is ready
        $(function () {
            drawLineChart(); // Line Chart
            drawBarChart(); // Bar Chart
            drawPieChart(); // Pie Chart

            $(window).resize(function () {
                updateLineChart();
                updateBarChart();                
            });
        })
    </script>
</body>

</html>