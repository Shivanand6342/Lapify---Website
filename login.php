<?php
include('config/constantsuser.php');

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT password FROM user WHERE username='$username'";
    $res = $conn->query($sql);

    // $count = mysqli_num_rows($res);

    if ($res->num_rows > 0) {
        while ($row = $res->fetch_assoc()) 
        {
            if ($row['password'] == $password) 
            {
                header("Location: index.php");
            } 
            else 
            {
                header("Location: login_signup.html");
            }
        }
        // $row = mysqli_fetch_assoc($res);
        // Login Success
        // $_SESSION['login'] = "<div class='success'> Login Successfull </div>";
        // $_SESSION['user'] = $username; //To check whether user is loggin in or logged out or not

        // Redirect to Home Page or Dashboard
        // header("Location: index.php");
    }
    // else
    // {
    // Login Failed
    // $_SESSION['login'] = "<div class='error text-center'> Invalid Username or Password </div>";

    // Redirect to Home Page or Dashboard
    // header('location:'.SITEURL.'/login_signup.php');
    // header("Location: login_signup.php");
    // }

?>
