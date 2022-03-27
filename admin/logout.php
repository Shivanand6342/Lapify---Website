<?php 

// Include constants.php for SITEURL
include('../config/constants.php');

// Destroy the cookies
setcookie('admin', 'shiva', time()-3600);

// Destroy the session
session_destroy();

// Redirect to Login Page
header('location:'.SITEURL.'admin/login.php');

?>