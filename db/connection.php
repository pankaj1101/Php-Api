<?php

require_once('./Inc/config.php');

$connection = mysqli_connect($hostname, $username, $password, $database);

if (!$connection) {
    $response = array("success" => false, "message" => "Database connection error: " . mysqli_connect_error());
}

?>