<?php
// Database connection details
$db_host = 'localhost'; // Change this to your database host
$db_username = 'admin'; // Change this to your database username
$db_password = 'mansojey56'; // Change this to your database password
$db_name = 'cms';

$conn = new mysqli($db_host, $db_username, $db_password, $db_name);
if (!$conn) {
    die("Connection failed: ". mysqli_connect_error());
}
?>