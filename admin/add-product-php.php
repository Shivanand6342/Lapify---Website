<?php include('../config/constants.php');

// Authorization - Access Control
// Check whether user is logged in or not

// if (!isset($_SESSION['user'])) // if user session is not set
// {
//     User is not logged in so redirect it to login page
//     $_SESSION['no-login-message'] = "<div align='center' class='error text-center'> Please Login to Access Admin Panel </div>";
//     header('location:' . SITEURL . 'admin/login.php');
// }


if (isset($_POST['submit'])) 
{
    $name = $_POST['name'];
    $category = $_POST['category'];
    $ram = $_POST['ram'];
    $storage = $_POST['storage'];
    $processor = $_POST['processor'];
    $windows = $_POST['windows'];
    $weight = $_POST['weight'];
    $thickness = $_POST['thickness'];
    $battery = $_POST['battery'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    if (isset($_FILES['image']['name'])) 
    {
        $image_name = $_FILES['image']['name'];
        if ($image_name != "") 
        {
            $src = $_FILES['image']['tmp_name'];
            $dst = "../images/laptop/" . $image_name;

            // finally upload image
            $upload = move_uploaded_file($src, $dst);

            if ($upload == false) 
            {
                // Redirect with Message and Stop the Process
                $_SESSION['upload'] = "<div class='error'>Failed to Upload Image</div>";
                header('location:' . SITEURL . 'admin/add-product.php');
                die();
            }
        }
    } else 
    {
        $image_name = ""; // Setting Deafult
    }

    $sql2 = "INSERT INTO products SET
        name = '$name',
        image_name = '$image_name',
        ram = '$ram',
        storage = '$storage',
        processor = '$processor',
        windows = '$windows',
        weight = '$weight',
        thickness = '$thickness',
        battery = '$battery',
        description = '$description',
        category_id = '$category',
        price = $price
    ";

    $res2 = mysqli_query($conn, $sql2);

    if ($res2 == TRUE) 
    {
        // $_SESSION['add'] = "<div class = 'success'>Laptop Added Successfully</div>";
        header('location:' . SITEURL . 'admin/products.php');
    } 
    else 
    {
        // $_SESSION['add'] = "<div class = 'error'>Failed to Add Laptop</div>";
        header('location:' . SITEURL . 'admin/products.php');
    }
}
?>

?>