<?php include('../config/constants.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Lapify - Login</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700" />
  <!-- https://fonts.google.com/specimen/Open+Sans -->
  <link rel="stylesheet" href="css/fontawesome.min.css" />
  <!-- https://fontawesome.com/ -->
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <!-- https://getbootstrap.com/ -->
  <link rel="stylesheet" href="css/templatemo-style.css">
</head>

<body>
  <br><br><br>
  <div class="container tm-mt-big tm-mb-big">
    <div class="row">
      <div class="col-12 mx-auto tm-login-col">
        <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
          <div class="row">
            <div class="col-12 text-center">
              <h2 class="tm-block-title mb-4">Please Login to Access Admin Features</h2>
            </div>
            <br><br>

            <?php 

            if(isset($_SESSION['login']))
            {
                echo $_SESSION['login'];
                unset($_SESSION['login']);
            }

            if(isset($_SESSION['no-login-message']))
            {
                echo $_SESSION['no-login-message'];
                unset($_SESSION['no-login-message']);
            }

            ?> <br>

          </div>
          <div class="row mt-2">
            <div class="col-12">
              <form action="" method="POST" class="tm-login-form">
                <div class="form-group">
                  <label for="username">Username</label>
                  <input name="username" type="text" class="form-control validate" id="username" value="" required />
                </div>
                <div class="form-group mt-3">
                  <label for="password">Password</label>
                  <input name="password" type="password" class="form-control validate" id="password" value=""
                    required />
                </div>
                <div class="form-group mt-4">
                  <input type="submit" name="submit" id="submit" value="LOGIN" class="btn btn-primary btn-block text-uppercase">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div><br><br><br>
  <footer class="tm-footer row tm-mt-small">
    <div class="col-12 font-weight-light">
      <p class="text-center text-white mb-0 px-4 small">
        &copy; 2022<span id="displayYear"></span> All Rights Reserved By
        <a href="https://github.com/Shivanand6342/" style="color: yellow;">Shivanand Vishwakarma</a>
      </p>
    </div>
  </footer>
  <script src="js/jquery-3.3.1.min.js"></script>
  <!-- https://jquery.com/download/ -->
  <script src="js/bootstrap.min.js"></script>
  <!-- https://getbootstrap.com/ -->
</body>
</html>

<?php

// Check whether submit button clicked or not
if(isset($_POST['submit']))
{
    // Get the data from FORM
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // SQL query to check whether the username and password exist or not
    $sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";

    // Execute the query
    $res = mysqli_query($conn, $sql);

    // count rows to Check whether the user exists
    $count = mysqli_num_rows($res);

    if($count == 1)
    {
        // Login Success        
        $_SESSION['login'] = "<div class='success'> Login Successfull </div>";
        $_SESSION['user'] = $username; //To check whether user is loggin in or logged out or not


        // Redirect to Home Page or Dashboard
        header('location:'.SITEURL.'admin/');
    }
    else
    {
        // Login Failed
        $_SESSION['login'] = "<div class='error text-center'> Invalid Username or Password </div>";

        // Redirect to Home Page or Dashboard
        header('location:'.SITEURL.'admin/login.php');
    }
}

?>