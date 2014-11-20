<?php
include 'connection.php';

$YourName = $_POST['YourName'];
$YourEmail = $_POST['YourEmail'];

$sql = "INSERT INTO register (YourName, YourEmail, URL)
VALUES ('$YourName', '$YourEmail', 'mdaliakhtar.com')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

include 'connection-close.php';
?>