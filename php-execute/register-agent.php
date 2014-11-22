<?php
session_start();

include 'connection.php';

$YourName = $_POST['YourName'];
$YourEmail = $_POST['YourEmail'];
//$url = "mdaliakhtar.com";

//user registration check begins
$sql = "SELECT * FROM register WHERE YourEmail='$YourEmail'";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0){
    // if user registered
    while($row = mysqli_fetch_assoc($result)){
		echo $row["id"];
		echo $row["YourName"];
		echo $row["YourEmail"];
		echo $row["URL"];
    }
}else{
	//if user not registered
	$sql = "INSERT INTO register (YourName, YourEmail, URL)
	VALUES ('$YourName', '$YourEmail', 'noURL')";
	if ($conn->query($sql) === TRUE) {
		//echo "New record created successfully";
		$sql = "SELECT * FROM register WHERE YourEmail='$YourEmail'";
		$result = mysqli_query($conn, $sql);
		if(mysqli_num_rows($result) > 0){
			// getting back new user's details
			while($row = mysqli_fetch_assoc($result)){
				$_SESSION['id'] = $row["id"];
				$_SESSION['YourName'] = $row["YourName"];
				$_SESSION['YourEmail'] = $row["YourEmail"];
				//$row["URL"];
				header('Location: ../register-done.php');
			}
		}else{
			echo "error while getting url";
		}		
		
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
}

include 'connection-close.php';
?>