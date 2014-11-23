<?php
$servername = "sql4.freemysqlhosting.net";
$username = "sql459125";
$password = "lI4*pF8%";
$dbname = "sql459125";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>