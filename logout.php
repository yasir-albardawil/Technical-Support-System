<?php
include_once('dbconnect.php');
session_start();

if(isset($_GET['logout'])){		
	session_destroy();
	unset($_SESSION['employee']);
	header("Location: login.php");
}
?>