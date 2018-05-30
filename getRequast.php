<?php
// include_once 'dbconnect.php';
$link = mysqli_connect($link, "localhost", "root", "", "kfu_database");
$id = filter_input(INPUT_POST, 'dataId');
include('mysql_connect.php');
$query = mysqli_query($link, "select * from Ticket_no where id = '$id' ") or die(mysql_error());
$rows = mysqli_fetch_array($query);
//you should use json_encode, and you can parse when get back data in ajax
echo json_encode($rows['Ticket_no']);