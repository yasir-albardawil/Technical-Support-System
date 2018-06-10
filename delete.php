<?php
session_start();
// include_once 'dbconnect.php';
$link = mysqli_connect("eu-cdbr-west-02.cleardb.net", "ba7a07e1878e53", "ab27f554", "heroku_8f300be620e34e7");

if(isset($_SESSION['employee'])) {
$res=mysqli_query($link, "SELECT * FROM users WHERE Emp_no=".$_SESSION['employee']);
$empRow=mysqli_fetch_array($res);
}

if(!isset($_SESSION['employee'])) {
	header("Location: login.php");
}

?>