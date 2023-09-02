<!-- <?php
require __DIR__ . "/Inc/config.php";

// Create a connection to the database
$connection = mysqli_connect($hostname, $username, $password, $database);

// Check the connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Query to fetch users
$query = "SELECT * from mytable";
$result = mysqli_query($connection, $query);

// Fetch and format data as JSON
$users = [];
while ($row = mysqli_fetch_assoc($result)) {
    $users[] = $row;
}

// Close the database connection
mysqli_close($connection);

// Set response headers
header('Content-Type: application/json');

// Send JSON response
echo json_encode($users);
?> -->