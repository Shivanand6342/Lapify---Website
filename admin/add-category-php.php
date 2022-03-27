<?php include('../config/constants.php');

if(isset($_POST['submit']))
{
    $category = $_POST['category'];

    $sql = "INSERT INTO category SET
        title='$category'
    ";

    $res = mysqli_query($conn, $sql);

    if($res==TRUE)
    {
        // create a session variable to display Message
        $_SESSION['add'] = "<div class='success'> Category Added Successfully </div>";
        // Redirection to Page Admin
        header("location:".SITEURL.'admin/index.php');
    }
    else
    {
        // create a session variable to display Message
        $_SESSION['add'] = "<div class='error'> Failed to Add Category </div>";
        // Redirection to Page Admin
        header("location:".SITEURL.'admin/index.php');
    }
}
?>