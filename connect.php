
  
<?php

$server = 'localhost';
$username = 'root';
$password = 'root';
$db = 'fullForm';

$conn = mysqli_connect($server, $username, $password, $db);

if (!$conn) {
    die("Database is not connected. Error:" . mysqli_connect_error());
}

$does_not_have_error = true;
$error_msg = '';