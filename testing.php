<?php

require_once('./db/connection.php');

$connection = mysqli_connect($hostname, $username, $password, $database);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get the JSON data from the request body
    $json_data = file_get_contents("php://input");

    // Decode the JSON data
    $data = json_decode($json_data);

    // Check if the required data fields are present
    if (isset($_POST['name'])) {
        // Sanitize and escape user input
        $name = mysqli_real_escape_string($connection, $_POST['name']);

        // Query the database to check if the user exists
        $query = "SELECT age FROM mytable WHERE name = '$name'";

        $result = mysqli_query($connection, $query);
        if (mysqli_num_rows($result) === 1) {
            $userRow = mysqli_fetch_assoc($result);

            $response = array("age" => $userRow['age'], "success" => true);
        } else {
            $response = array("success" => false, "message" => "Invalid name");
        }
    } else {
        $response = array("success" => false, "message" => "Required fields (name are missing)");
    }
} else {
    // Handle other request methods (GET, PUT, DELETE, etc.) as needed
    http_response_code(405); // Method Not Allowed
    $response = array("success" => false, "message" => "Get Method not allowed");
}

// Close the database connection
mysqli_close($connection);


// Set response headers
header("Content-Type: application/json");

// Send the JSON response
echo json_encode($response);
?>