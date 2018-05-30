<?php
session_start();
include_once 'dbconnect.php';
if(isset($_SESSION['employee'])) {
$res=mysql_query("SELECT * FROM users WHERE Emp_no=".$_SESSION['employee']);
$empRow=mysql_fetch_array($res);
}

if(!isset($_SESSION['employee'])) {
	header("Location: login.php");
}

?>