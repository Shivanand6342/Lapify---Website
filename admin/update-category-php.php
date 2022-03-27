<?php include('../config/constants.php');

if (isset($_POST['submit'])) 
{
    $id = $_POST['id'];
    $title = $_POST['title'];

    $sql = "UPDATE category SET
        title = '$title'
        WHERE id=$id
    ";

    $res = mysqli_query($conn, $sql);

    if ($res == TRUE) 
    {
        $_SESSION['update'] = "<div class='success'>Category Updated Successfully</div>";
        header('location:' . SITEURL . 'admin/index.php');
    } 
    else 
    {
        $_SESSION['update'] = "<div class='error'>Failed to Update Category</div>";
        header('location:' . SITEURL . 'admin/index.php');
    }
}
