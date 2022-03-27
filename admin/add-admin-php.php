<?php include('../config/constants.php');

if(isset($_POST['submit']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "INSERT INTO admin SET
        username='$username',
        password='$password'
    ";

    $res = mysqli_query($conn, $sql);

    if($res==TRUE)
    {
        // create a session variable to display Message
        $_SESSION['add'] = "<div class='success'> Admin Added Successfully </div>";
        // Redirection to Page Admin
        header("location:".SITEURL.'admin/index.php');
    }
    else
    {
        // create a session variable to display Message
        $_SESSION['add'] = "<div class='error'> Failed to Add Admin </div>";
        // Redirection to Page Admin
        header("location:".SITEURL.'admin/index.php');
    }
}
?>