<?php include('../config/constants.php');

if (isset($_POST['submit'])) 
{
    $id = $_POST['id'];
    $name = $_POST['name'];
    // $current_image = $_POST['current_image'];
    $ram = $_POST['ram'];
    $storage = $_POST['storage'];
    $processor = $_POST['processor'];
    $windows = $_POST['windows'];
    $weight = $_POST['weight'];
    $thickness = $_POST['thickness'];
    $battery = $_POST['battery'];
    $description = $_POST['description'];
    $current_category = $_POST['category'];
    $price = $_POST['price'];
}

// Upload the image if selected
// check whether upload button is clicked or not
// if (isset($_FILES['image']['name'])) 
// {
//     $image_name = $_FILES['image']['name'];

    // check whether files is available or not
    // if ($image_name != "") 
    // {
        // get the source path and des path
        // $src_path = $_FILES['image']['tmp_name'];
        // $dest_path = "../images/laptop/" . $image_name;

        // upload the image
        // $upload = move_uploaded_file($src_path, $dest_path);

        // check whether image uploaded or not
        // if ($upload == FALSE) 
        // {
        //     $_SESSION['upload'] = "<div class='error'>Failed to Upload New Image</div>";
        //     header('location:' . SITEURL . 'admin/products.php');
        //     die();
        // }

        // Remove current image if available
        // if ($current_image != "") 
        // {
            // remove the image
            // $remove_path = "../images/laptop/" . $current_image;

            // $remove = unlink($remove_path);

            // check whether image is removed or not
            // if ($remove == FALSE) 
            // {
            //     $_SESSION['remove-failed'] = "<div class='error'>Failed to Remove Current Image</div>";
            //     header('location:' . SITEURL . 'admin/products.php');
            //     die();
            // }
//         }
//     } 
//     else 
//     {
//         $image_name = $current_image; //Deafult image when image is not selected
//     }
// } 
// else 
// {
//     $image_name = $current_image; //Deafult image when button is not clicked
// }

$sql5 = "UPDATE products SET
    name = '$name',
    ram = $ram,
    storage = '$storage',
    processor = '$processor',
    windows = '$windows',
    weight = '$weight',
    thickness = '$thickness',
    battery = '$battery',
    description = '$description',
    category_id = $current_category,
    price = $price
    WHERE id=$id
";

$res5 = mysqli_query($conn, $sql5);
if ($res5 == TRUE) 
{
    // Query executed and laptop updated
    header('location:' . SITEURL . 'admin/products.php');
} 
else 
{
    echo "Failed to Update Laptop";
    header('location:' . SITEURL . 'admin/update-product.php');
}
