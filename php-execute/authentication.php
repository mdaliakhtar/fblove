<?php
@session_start();

if(!isset($_SESSION['YourEmail']) == '') {
	echo "ALi";
	//header("location: ../index.php");
	exit();
}
?>