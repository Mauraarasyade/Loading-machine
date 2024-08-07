<?php
include_once("./connect.php");


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $start_time = $_POST['start_time'];
    $duration = $_POST['duration'];

    $sql = "INSERT INTO stopwatch (start_time, duration) VALUES ('$start_time', '$duration')
            ON DUPLICATE KEY UPDATE duration='$duration'";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$conn->close();
?>
