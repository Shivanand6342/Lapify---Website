<?php

include('../config/constants.php');

if(isset($_GET['id']) AND isset($_GET['image_name']))
{
    $id = $_GET['id'];
    $image_name = $_GET['image_name'];

    // remove the image if available
    if($image_name != "")
    {
        // get image path
        $path = "../images/laptop/".$image_name;

        // remove image file from folder
        $remove = unlink($path);

        // check whether the image is removed or not
        if($remove==FALSE)
        {
            $_SESSION['upload'] = "<div class='error'>Failed to Remove Image File</div>";
            header('location:'.SITEURL.'admin/products.php');
            die();
        }
    }

    $sql = "DELETE FROM products WHERE id=$id";
    $res = mysqli_query($conn, $sql);

    if($res==TRUE)
    {
        // $_SESSION['delete'] = "<div class='success'>Laptop Deleted Successfully</div>";
        header('location:'.SITEURL.'admin/products.php');
    }
    else
    {
        // $_SESSION['delete'] = "<div class='error'>Failed to Delete Laptop</div>";
        header('location:'.SITEURL.'admin/products.php');
    }
}
else
{
    // redirect to manage food with message
    // $_SESSION['unauthorize'] = "<div class='error'>Unauthorized Access</div>";
    header('location:'.SITEURL.'admin/products.php');
}

?>