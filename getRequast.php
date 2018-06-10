<?php
// include_once 'dbconnect.php';
$link = mysqli_connect("eu-cdbr-west-02.cleardb.net", "ba7a07e1878e53", "ab27f554", "heroku_8f300be620e34e7");

$id = filter_input(INPUT_POST, 'dataId');
include('mysql_connect.php');
$query = mysqli_query($link, "select * from Ticket_no where id = '$id' ") or die(mysql_error());
$rows = mysqli_fetch_array($query);
//you should use json_encode, and you can parse when get back data in ajax
echo json_encode($rows['Ticket_no']);