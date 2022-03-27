<?php include('config/constantsuser.php');

if(isset($_POST['submit']))
{
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $sql = "INSERT INTO feedback SET
        full_name='$full_name',
        email='$email',
        message='$message'
    ";

    $res = mysqli_query($conn, $sql);

    if($res==TRUE)
    {
        // create a session variable to display Message
        // $_SESSION['add'] = "<div class='success'> Message Sent Successfully </div>";
        // Redirection to Page Admin
        header("location:".SITEURL.'contact us.html');
    }
    else
    {
        // create a session variable to display Message
        // $_SESSION['add'] = "<div class='error'> Failed to Sent Message </div>";
        // Redirection to Page Admin
        header("location:".SITEURL.'contact us.html');
    }
}
?>