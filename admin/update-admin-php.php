<?php include('../config/constants.php');

if(isset($_POST['submit']))
{
    $id = $_POST['id'];
    $username = $_POST['username'];
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    $sql = "SELECT * FROM admin WHERE id=$id AND password='$current_password'";

    $res = mysqli_query($conn, $sql);

    if($res==TRUE)
    {
        // Check whether data is available or not
        $count=mysqli_num_rows($res);
        if($count==1)
        {   
            // check whether the new password and confirm password matches or not
            if($new_password == $confirm_password)
            {
                // Update the password
                // $current_password = $new_password
                $sql2 = "UPDATE admin SET
                    username = '$username',
                    password='$new_password'
                    WHERE id=$id;
                ";

                // Execute the query
                $res2 = mysqli_query($conn, $sql2);

                // Check whether the query executed or not
                if($res==TRUE)
                {
                    // Redirect to manage admin with error message
                    $_SESSION['update'] = "<div class='success'> Admin Updated Successfully </div>";

                    // Redirecting to manage admin
                    header('location:'.SITEURL.'admin/index.php');
                }
                else
                {
                    // Redirect to manage admin with error message
                    $_SESSION['update'] = "<div class='error'> Failed to Update Admin </div>";

                    // Redirecting to manage admin
                    header('location:'.SITEURL.'admin/index.php');
                }
            }
            else
            {
                // Redirect to manage admin with error message
                $_SESSION['pwd-not-match'] = "<div class='error'> Password Not Matched </div>";

                // Redirecting to manage admin
                header('location:'.SITEURL.'admin/index.php');
            }
        }
        else
        {
            // if user does not exist
            $_SESSION['user-not-found'] = "<div class='error'> User Not Found </div>";

            // Redirecting to manage admin
            header('location:'.SITEURL.'admin/index.php');
        }
    }

}

?>

