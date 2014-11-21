<?php
include 'php-execute/connection.php';
echo $url = $_POST['URL'];
echo $_POST['FoolName'];
echo $_POST['1stCrush'];
echo $_POST['2ndCrush'];
echo $_POST['3rdCrush'];

if($_POST['FoolName'] == '') {
	header("location: register.php");
	exit();
}

$sql = "SELECT * FROM register WHERE id='$url'";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0){
    // if user registered
    while($row = mysqli_fetch_assoc($result)){
		echo $row["id"];
		echo $row["YourName"];
		echo $row["YourEmail"];
		//echo $row["URL"];
    }
}else{
	echo "not fetched data from db";
}

include 'php-execute/connection-close.php';
?>