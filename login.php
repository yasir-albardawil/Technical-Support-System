<?php
session_start();
// $link = include_once 'dbconnect.php';
$link = mysqli_connect("eu-cdbr-west-02.cleardb.net", "ba7a07e1878e53", "ab27f554", "heroku_8f300be620e34e7");

if(isset($_POST['login'])){
	$emp_no = $_POST['form-employee'];
	$email = $_POST['form-employee'];
	$emp_pass = $_POST['form-password'];
	
	$emp_no = trim($emp_no);
	$email = trim($email);
	$emp_pass = trim($emp_pass);
	
	$res=mysqli_query($link, "SELECT * from users where Emp_no='$emp_no' or Email='$email'");
	$row=mysqli_fetch_array($res);
	
	$count = mysqli_num_rows($res); // if employee number or Email address/password correct. It returns must be 1 row

	if($count == 1 && $row['Password']==md5($emp_pass)){
		$_SESSION['employee'] = $row['Emp_no'];
		$res=mysqli_query("SELECT * FROM users WHERE Emp_no=".$_SESSION['employee']);
		$empRow=mysqli_fetch_array($res);
	if($empRow['Role'] == 0) {
		header("Location: administrator.php");
	} else if($empRow['Role'] == 1) {
		header("Location: tickets.php");
	} else {
		header("Location: index.php");
	}
	}else{
		echo 
		'<div class="alert alert-danger fade in">
    		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times; </a>
    		<strong>Warring!</strong> Employee number or Email address / Password Seems Wrong!
   		 </div>';
	}
}

?>

	<!-- Copyright (C) 2016 Yasir salam Al-Bardawil - All Rights Reserved
 	You may use, distribute and modify this code under the
 	terms of the Technical Support System(TSS) license, which unfortunately won't be
 	written for another century.
 	You should have received a copy of the Tickets system license with
 	this file. If not, please email me: yasir.s.albardawil@gmail.com -->
    
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="img/ticket.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">

    </head>

    <body>

        <!-- Top content -->
        <div class="img-responsive">
        <div class="top-content">
        	
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <h1><strong>TECHNICAL SUPPORT SYSTEM</strong></h1>
                            <div class="description"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                        	<div class="form-top">
                        		<div class="form-top-left">
                        			<h3 >LOGIN</h3>
                            		<p>Enter your  Employee number or Email address  and Password to log on:</p>
                        		</div>
                        		<div class="form-top-right">
                        			<i class="fa fa-lock"></i>
                        		</div>
                            </div>
                            <div class="form-bottom">
			                    <form role="form" method="post" class="login-form">
			                    	<div class="form-group">
			                    		<label class="sr-only" for="form-employee">Username</label>
			                        	<input type="text" name="form-employee" placeholder="Employee number or Email address" class="form-username form-control" id="form-username">
			                        </div>
			                        <div class="form-group">
			                        	<label class="sr-only" for="form-password">Password</label>
			                        	<input type="password" name="form-password" placeholder="Password" class="form-password form-control" id="form-password">
			                        </div>
			                        <button type="submit" name="login" class="btn">Sign in</button>
			                    </form>
                            </div>
                        </div>
                    </div>
                  </div>
            </div>
        </div>
	</div>

        <!-- Javascript -->
        <script src="assets/js/jquery-1.11.1.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/scripts.js"></script>
        
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

    </body>
</html>