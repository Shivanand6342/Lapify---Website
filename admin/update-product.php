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
    $sql2 = "SELECT * FROM products WHERE id=$id";
    $res2 = mysqli_query($conn, $sql2);
    $row2 = mysqli_fetch_assoc($res2);

    $name = $row2['name'];
    $current_image = $row2['image_name'];
    $ram = $row2['ram'];
    $storage = $row2['storage'];
    $processor = $row2['processor'];
    $windows = $row2['windows'];
    $weight = $row2['weight'];
    $thickness = $row2['thickness'];
    $battery = $row2['battery'];
    $description = $row2['description'];
    $current_category = $row2['category_id'];
    $price = $row2['price'];
}
else
{
    header('location:'.SITEURL.'admin/products.php');
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
                            <h2 class="tm-block-title d-inline-block">Update Laptop</h2>
                        </div>

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

                    </div>
                    <div class="row tm-edit-product-row">
                        <div class="col-xl-6 col-lg-6 col-md-12">
                            <form action="update-product-php.php" method="POST" class="tm-edit-product-form">
                                <div class="form-group mb-3">
                                    <label for="name">Laptop Name
                                    </label>
                                    <input name="name" type="text" class="form-control validate" style="width: 750px;" value="<?php echo $name; ?>" />
                                </div>
                                <div class="form-group mb-3">
                                    <label for="category">Category</label>
                                    <select class="custom-select tm-select-accounts" name="category" style="width: 750px;">
                                        
                                    <?php
                                        $sql = "SELECT * FROM category";
                                        $res = mysqli_query($conn, $sql);
                                        $count = mysqli_num_rows($res);

                                        if($count>0)
                                        {
                                            while($row=mysqli_fetch_assoc($res))
                                            {
                                                $category_title = $row['title'];
                                                $category_id = $row['id'];
                                                ?><option <?php if($current_category == $category_id) {echo "selected";} ?> value="<?php echo $category_id; ?>"><?php echo $category_title; ?></option><?php
                                            }
                                        }
                                        else
                                        {
                                            echo "<option value='0'>Category Not Available</option>";
                                        }
                                        ?>

                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="ram">RAM (in GB)</label>
                                    <select class="custom-select tm-select-accounts" name="ram" style="width: 750px;">
                                        
                                    <?php
                                        $sql6 = "SELECT * FROM ram";
                                        $res6 = mysqli_query($conn, $sql6);
                                        $count3 = mysqli_num_rows($res6);

                                        if($count3>0)
                                        {
                                            while($row3=mysqli_fetch_assoc($res6))
                                            {
                                                $ram_title = $row3['title'];
                                                $ram_id = $row3['id'];
                                                ?><option <?php if($ram == $ram_id) {echo "selected";} ?> value="<?php echo $ram_title; ?>"><?php echo $ram_title; ?></option><?php
                                            }
                                        }
                                        else
                                        {
                                            echo "<option value='0'>RAM Not Available</option>";
                                        }
                                    ?>
                                    
                                    <!-- <option value="8">8</option>
                                        <option value="16">16</option>
                                        <option value="32">32</option> -->
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="storage">Storage</label>
                                    <select class="custom-select tm-select-accounts" name="storage" style="width: 750px;">
                                        
                                    <?php
                                        $sql3 = "SELECT * FROM storage";
                                        $res3 = mysqli_query($conn, $sql3);
                                        $count1 = mysqli_num_rows($res3);

                                        if($count1>0)
                                        {
                                            while($row4=mysqli_fetch_assoc($res3))
                                            {
                                                $storage_title = $row4['title'];
                                                $storage_id = $row4['id'];
                                                ?><option <?php if($storage == $storage_id) {echo "selected";} ?> value="<?php echo $storage_title; ?>"><?php echo $storage_title; ?></option><?php
                                            }
                                        }
                                        else
                                        {
                                            echo "<option value='0'>Storage Not Available</option>";
                                        }
                                    ?>

                                        <!-- <option value="1 TB HDD">1 TB HDD</option>
                                        <option value="512 GB SSD">512 GB SSD</option> -->
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="processor">Processor
                                    </label>
                                    <input id="processor" name="processor" type="text" class="form-control validate" style="width: 750px;" value="<?php echo $processor; ?>" />
                                </div>
                                <div class="form-group mb-3">
                                    <label for="windows">Windows Version</label>
                                    <select class="custom-select tm-select-accounts" name="windows" style="width: 750px;">
                                        
                                    <?php
                                        $sql4 = "SELECT * FROM windows";
                                        $res4 = mysqli_query($conn, $sql4);
                                        $count2 = mysqli_num_rows($res4);

                                        if($count2>0)
                                        {
                                            while($row5=mysqli_fetch_assoc($res4))
                                            {
                                                $windows_title = $row5['title'];
                                                $windows_id = $row5['id'];
                                                ?><option <?php if($windows == $windows_id) {echo "selected";} ?> value="<?php echo $windows_title; ?>"><?php echo $windows_title; ?></option><?php
                                            }
                                        }
                                        else
                                        {
                                            echo "<option value='0'>Windows Not Available</option>";
                                        }
                                    ?>
                                    
                                        <!-- <option value="10">10</option>
                                        <option value="11">11</option> -->
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="weight">Weight
                                    </label>
                                    <input id="weight" name="weight" type="text" class="form-control validate" style="width: 750px;" value="<?php echo $weight; ?>" required />
                                </div>
                                <div class="form-group mb-3">
                                    <label for="thickness">Thickness
                                    </label>
                                    <input id="thickness" name="thickness" type="text" class="form-control validate" style="width: 750px;" value="<?php echo $thickness; ?>" required />
                                </div>
                                <div class="form-group mb-3">
                                    <label for="battery">Battery
                                    </label>
                                    <input id="battery" name="battery" type="text" class="form-control validate" style="width: 750px;" value="<?php echo $battery; ?>" required />
                                </div>
                                <div class="form-group mb-3">
                                    <label for="description">Description</label>
                                    <textarea class="form-control validate tm-small" name="description" style="width: 750px;" rows="5" required><?php echo $description; ?></textarea>
                                </div>
                                <div class="row">
                                    <div class="form-group mb-3 col-xs-12 col-sm-6">
                                        <label for="price">Price</label>                                        
                                        <input id="price" name="price" type="number" class="form-control validate" style="width: 750px;" value="<?php echo $price; ?>" required />
                                    </div>
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
            $("#expire_date").datepicker({
                defaultDate: "10/22/2020"
            });
        });
    </script>
</body>

</html>