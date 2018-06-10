<?php
error_reporting( E_ALL & ~E_DEPRECATED & ~E_NOTICE );
//if(!mysql("localhost","root","")){
//	die('Oops connection problem ! --> '.mysql_error());
//}
//if(!mysql_select_db("kfu_database")){
//	die('Oops database selection problem ! --> '.mysql_error());
//}

// $db = new PDO('mysql:host=localhost;dbname=kfu_database;charset=utf8mb4', 'root', '');
$link = mysqli_connect("eu-cdbr-west-02.cleardb.net", "ba7a07e1878e53", "ab27f554", "heroku_8f300be620e34e7");

function logfile($msg){
	if(isset($_SESSION['user'])) {
	$res=mysqli_query($link, "SELECT * FROM users WHERE Emp_no=".$_SESSION['employee']);
	$EmpRow=mysql_fetch_array($res);
	}
	$file = fopen("logfile.php","r");
	$s = fread($file,filesize("logfile.php"));
	fclose($file);
	$da = date('l jS \of F Y h:i:s A');
	$file = fopen("logfile.php","w+");
	fwrite($file,$s. $EmpRow['Username']."  ".$msg." $da <br>");
	fclose($file);
}

function checker(){
	if(isset($_SESSION['employee'])) {
		$res=mysqli_query($link, "SELECT * FROM rent WHERE Emp_no=".$_SESSION['employee']);
	    $rentRow=mysql_fetch_array($res);
		$start = time();
		$end =  $rentRow['Time'];
	
		if(!empty($end)){ 
		if($start>$end){
		mysqli_query($link, "UPDATE users SET Privileges='3' WHERE UserID='$_SESSION[user]'");
			} 
		}
		
	}
	
}

?>