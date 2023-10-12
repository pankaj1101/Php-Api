<?php
require_once("./db/connection.php");

header("Access-Control-Allow-Origin: http://localhost:3000");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    http_response_code(200);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['age']) && isset($_POST['name'])) {
        $age = $_POST['age'];
        $name = $_POST['name'];

        if (empty($age) || empty($name)) {
            $response = array("success" => false, "message" => "Empty Filed");
            http_response_code(400);
            echo json_encode($response);
        } else {
            $sql = "INSERT INTO mytable (age, name) VALUES ('$age', '$name')";

            if (mysqli_query($connection, $sql)) {

                $response = array("success" => true, "message" => "Record created successfully");
                http_response_code(200);

            } else {

                $response = array("success" => false, "message" => "Error: " . mysqli_error($connection));
                http_response_code(500);

            }

            mysqli_close($connection); //close connection ...
            echo json_encode($response);
        }

        //display response ...

    } else {
        $response = array("success" => false, "message" => "Missing parameters in the POST data");
        http_response_code(400);

        echo json_encode($response);
    }
} else {
    $response = array("success" => false, "message" => "Get method not allowed");
    http_response_code(400);

    echo json_encode($response);
}
