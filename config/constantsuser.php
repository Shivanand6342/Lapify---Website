<?php

// Starting Session
// session_start();

// Create Constants to store Non Repeating Values
define('SITEURL', 'http://localhost/lapify/');
define('LOCALHOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'lapify');

$conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD); //Databse Connection
$db_select = mysqli_select_db($conn, DB_NAME); //Selecting Database

?>