<?php

require_once("./db/connection.php");

$query = "SELECT * from mytable";
$result = mysqli_query($connection, $query);

$users = [];
while ($row = mysqli_fetch_assoc($result)) {
    $users[] = $row;
}

mysqli_close($connection);
header('Content-Type: application/json');
echo json_encode($users);
?>