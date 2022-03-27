<?php include('config/constantsuser.php');

if(isset($_POST['submit']))
{
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "INSERT INTO user SET
        username='$username',
        email='$email',
        password='$password'
    ";

    $res = mysqli_query($conn, $sql);

    if($res==TRUE)
    {
        // create a session variable to display Message
        // $_SESSION['add'] = "<div class='success'> User Added Successfully </div>";
        // Redirection to Page Admin
        header("location:".SITEURL.'login_singup.html');
    }
    else
    {
        // create a session variable to display Message
        // $_SESSION['add'] = "<div class='error'> Failed to Add User </div>";
        // Redirection to Page Admin
        header("location:".SITEURL.'login_singup.html');
    }
}
?>
