<?php

include('../config/constants.php');

$id = $_GET['id'];
$sql = "DELETE FROM admin WHERE id=$id";
$res = mysqli_query($conn, $sql);

if($res == TRUE)
    {
        // echo "Admin Deleted";
        // Create session variable to display message
        $_SESSION['delete'] = " <div class='success'> Admin Deleted Successfully. </div>";

        //Redirecting to Manage Admin Page
        header('location:'.SITEURL.'admin/index.php');
    }
    else
    {
        //Failed to Delete Admin
        $_SESSION['delete'] = "<div class='error'> Failed to Delete Admin. </div>";
        header('location:'.SITEURL.'admin/index.php');
    }

?>