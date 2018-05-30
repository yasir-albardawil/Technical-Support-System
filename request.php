
<?php
session_start();
// include_once 'dbconnect.php';
$link = mysqli_connect("localhost", "root", "", "kfu_database");
if(isset($_SESSION['employee'])) {
$res=mysqli_query($link, "SELECT * FROM users WHERE Emp_no=".$_SESSION['employee']);
$empRow=mysqli_fetch_array($res);
}

if(!isset($_SESSION['employee'])) {
	header("Location: login.php");
}


 

$result = mysqli_query($link, "SELECT * FROM tickets, users
        WHERE  tickets.Emp_no = users.Emp_no and ticket_no = '$_GET[ticket_no]'");
		
		$status = isset($_POST['status']);
		$recipient = isset($_POST['recipient']);
		$compeltion_date = isset($_POST['date']);
	
		$status = trim($status);
		$recipient = trim($recipient);
		$compeltion_date = trim($compeltion_date);
	
	
		$sql = "UPDATE tickets SET Recipient='$recipient', Status='$status', Compeltion_date = '$compeltion_date'  WHERE Ticket_no='$_GET[ticket_no]'";
	
			if($_POST['request'] == 'request') {
 				$query_run= mysqli_query($link, $sql);
			}
			
		$request_status = isset($_POST['request_status']);
		$feedback = isset($_POST['feedback']);
		$comments = isset($_POST['comments']);
		$date = date('m/d/Y h:i:s A', time());
		$request_no = $_GET['ticket_no'];
		$request_status = trim($request_status);
		$feedback = trim($feedback);
		$comments = trim($comments);
		
		
		$sql1 = "INSERT INTO feedback(Request_no,Request_status, Feedback, Date, Comments) VALUES ('$request_no','$request_status','$feedback','$date','$comments')";
			
			if($_POST['feedback1'] == 'feedback') {
 				$query_run= mysqli_query($link, $sql1);
			}
			
	$result1 = mysqli_query($link, "SELECT * FROM feedback where Request_no = '$request_no'");
			

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
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Tickets</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="css/freelancer.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">


<!-- MetisMenu CSS -->
    <link href="bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">
    
    
    <link href="css/datepicker.css" rel="stylesheet">
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <link rel="shortcut icon" href="img/ticket.png">
</head>

<body id="page-top" class="index">

    <!-- Navigation -->
    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top navbar-custom">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="index.php#page-top">Technical support system</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <?php if($empRow['Role']==2) {?>
                        <li class="page-scroll">
                        <a href="index.php#ground_floor">Ground floor</a>
                    </li>
                    <li class="page-scroll">
                         <a href="index.php#first_floor">First Floor</a>
                    </li>
                    <?php } else {?>
                    <li class="page-scroll">
                        <a href="tickets.php#tickets">Tickets</a>
                    </li>
                    <?php } ?>
               
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul id="dropdown-menu-color" class="dropdown-menu dropdown-user">
               			 <?php if($empRow['Role']==1) { ?>
                        <li><a href="tickets.php#tickets"><i class="fa fa-ticket fa-fw"></i> Tickets</a>
                        </li>
                        <?php } else {?>
                         <li><a href="tickets.php#tickets"><i class="fa fa-ticket fa-fw"></i> My tickets</a>
                        </li>
                        <?php } ?>
                		<li class="divider"></li>
                        <li><a href="logout.php?logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <!-- Header -->
    <header>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <img class="img-responsive" src="img/support.png" alt="">
                    <div class="intro-text">
                        <span class="name">Technical Support System</span>
                    </div>
                </div>
            </div>
        </div>
    </header>



	             <!-- Tickets  Section -->
    <section id="tickets">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2></h2>
                </div>
                

				<?php $ticketRow = mysqli_fetch_array($result);
		?>
     			 <!-- /.col-lg-6 -->
                <div class="col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        	Request #<?php echo $_GET['ticket_no']; ?>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div id="morris-line-chart">
                            	<table class="table table-striped">
                                  <tbody>
                                    <tr>
                                      <td><?php echo "<b>Name: " .  $ticketRow['First_name'];"</b>"?></td>
                                    </tr>
                                    <tr>
                                      <td><?php echo "<b>Phone: " .  $ticketRow['Phone'];"</b>"?></td>
                                    </tr>
                                    <tr>
                                      <td><?php echo "<b>Email: " .  $ticketRow['Email'];"</b>"?></td>
                                    </tr>
                                    <tr>
                                      <td><?php echo "<b>Date: " .  $ticketRow['Date'];"</b>"?></td>
                                    </tr>
                                    <tr>
                                      <td><?php echo "<b>Message:<br> " .  $ticketRow['Message'];"</b>"?></td>
                                    </tr>
                                  </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
                
                
                <div class="col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             <?php echo $ticketRow['First_name']; ?> submitted this request
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div id="morris-donut-chart">
											<input type="hidden" id="ticket_no" value="<?php echo $_GET['ticket_no'];?>">
                                           <?php if($empRow['Role']=="1") {?>
											   <form id="request">
                                             <table class="table table-striped">
                                              <tbody>
                                                <tr>
                                                  <td>Status: </td>
                                                  <td>
                                                  	<select <?php if($ticketRow['Recipient']==null) {echo "disabled "; }?>class="form-control" id="status" name="status">
                                                    	<option value="Open" <?php if($ticketRow['Status']=="Open") 
														 echo " selected"  ?>>Open</option>
                                                                 	<option value="Solved" <?php if($ticketRow['Status']=="Solved") echo " selected" ?>>Solved</option>
                                                    </select>
                                                  </td>
                                                </tr>
                                                <tr>
                                                  <td>Requested attended by:
												 
												  <?php 
 
												  echo $ticketRow['Recipient'];
												  
												  ?> </td>
                                                  <td>
													<select id="recipient" class="form-control">
                                                    	
                                                    	<option value="<?php echo $empRow['First_name'];?>" <?php if($ticketRow['Recipient']!=null) echo " selected" ?>>Recipient</option>
                                                        <option value="" <?php if($ticketRow['Recipient']=="") echo " selected"?>>Not recipient</option>
                                                    </select>
                                                  </td>
                                                </tr>
                                                <tr>
                                                  <td>Requested Compeltion Date: </td>
                                                  <td> 
  <input class="form-control" id="date" size="16" type="text" value="<?php echo $ticketRow['Compeltion_date'];?>">
  <span class="add-on"><i class="icon-th"></i></span>
</div></td>
                    		                    </tr>
                                                 
                                              </tbody>
                                            </table>
												<div id="success"></div>
                                                    <div class="row">
                                                        <div class="form-group col-xs-12">
                                                            <button type="submit" id="submit" name="submit" class="btn btn-success">Send</button>
                                                        </div>
                                                    </div>
                                           </form>
                                           <?php } else {?>
    											   <form id="request">
                                             <table class="table table-striped">
                                              <tbody>
                                                <tr>
                                                  <td>Status: </td>
                                                  <td>
                                                  	<?php switch($ticketRow['Status']) {
												
												case "Open": ?>
												<span class="label label-default">Open</span>
											<?php
												break;
												case "Solved": ?>
												<span class="label label-success">Solved</span> 
												<?php 
												break;
												default: ?>
												<span class="label label-default">Open</span>
											 <?php } ?>
                                                  </td>
                                                </tr>
                                                <tr>
                                                  <td>Requested attended by:</td>
                                                  <td> <?php echo $ticketRow["Recipient"];?></td>
												
                                                  </td>
                                                </tr>

                                                <tr>
                                                  <td>Requested Compeltion Date: </td>
                                                  <td><?php echo $ticketRow['Compeltion_date'];?></td>
                    		                    </tr>
                                                 
                                              </tbody>
                                            </table>
										<?php }?>
                                           </form>
    
                                           </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
            <div id="page-wrapper">
            <div class="row">
                <!-- /.col-lg-12 -->
            </div>
             <?php if($ticketRow['Status']=="Solved" && $empRow['Role']==1) { ?>
             <?php $feedbackRow = mysqli_fetch_array($result1);?>
           <!-- /.col-lg-6 -->
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        	Feedback 
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div id="morris-line-chart">
                            	<table class="table table-striped">
                                  <tbody>
                                    <tr>
                                      <td><b>Request Status: </b>&nbsp;
                                      <?php if($feedbackRow['Request_status']=="Fully Completed") {?> 
                                      	<span class="label label-success"><?php echo  $feedbackRow['Request_status'];?></span>
                                        <?php } else { ?>
                                        	<span class="label label-danger"><?php echo  $feedbackRow['Request_status'];?></span>
                                        <?php } ?>
        							  </td>
                                    </tr>
                                    <tr>
                                      <td><b>Feedback: </b>&nbsp;
                                     	<?php if($feedbackRow['Feedback']=="Satified") {?> 
                                      	<span class="label label-success"><?php echo  $feedbackRow['Feedback'];?></span>
                                        <?php } else { ?>
                                        	<span class="label label-danger"><?php echo  $feedbackRow['Feedback'];?></span>
                                        <?php } ?>
                                      </td>
									<tr>
										<td><b>Comments:</b> &nbsp;
											<?php 
											echo  "<br>" .$feedbackRow['Comments'];
											?>
										</td>
                                    </tr>
									<tr>
										<td><b>Request date:</b> &nbsp;
											<?php echo $feedbackRow['Date'];?>
										</td>
                                    </tr>
                                  </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
                <?php } ?>
           
           <?php if($ticketRow['Status']=="Solved" && $empRow['Role']==2) { ?>
           <!-- /.col-lg-6 -->
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        	Feedback
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div id="morris-line-chart">
                            <form id="feedback">
                            	<table class="table table-striped">
                                  <tbody>
                                    <tr>
                                      <td><b>Request Status:</b> 
                                      	<select class="form-control" id="request_status" name"request_status" required>
                                       		<option value="">------</option>
                                        	<option value="Fully Completed">Fully Completeds</option>
                                            <option value="Partially Completed">Partially Completed</option>
                                        </select>
        							  </td>
                                    </tr>
                                    <tr>
                                      <td><b>Feedback:</b>
                                     <select class="form-control" id="feedback" name"feedback" required>
                                     		<option value="">------</option>
                                        	<option value="Satified">Satified</option>
                                            <option value="Not Satified">Not Satified</option>
                                        </select>
                                      </td>
									<tr>
										<td><b>Comments:</b> 
											<textarea class="form-control" placeholder="Write your comment" rows="5" id="comments"></textarea>
										</td>
                                    </tr>
                                  </tbody>
                                </table>
                                <div id="successfeedback"></div>
                                                    <div class="row">
                                                        <div class="form-group col-xs-12">
                                                            <button type="submit" id="submit" name="submit" class="btn btn-success">Send</button>
                                                        </div>
                                                    </div>
                              </form>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
                <?php } ?>

    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-top page-scroll hidden-sm hidden-xs hidden-lg hidden-md">
        <a class="btn btn-primary" href="#page-top">
            <i class="fa fa-chevron-up"></i>
        </a>
    </div>

   
<span id="top-link-block" class="hidden">
    <a href="#page-top" class="well well-sm"  onclick="$('html,body').animate({scrollTop:0},'slow');return false;">
        <i class="glyphicon glyphicon-chevron-up"></i>
    </a>
</span><!-- /top-link-block -->

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <!-- jQuery -->
 	<script src="js/jquery.rwdImageMaps.js"></script>

        <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/request.js"></script>
    <script src="js/feedback.js"></script>

    <!-- Theme JavaScript -->
    <script src="js/freelancer.js"></script>
    <script> $('img[usemap]').rwdImageMaps(); </script>
    
        <!-- Metis Menu Plugin JavaScript -->
    <script src="bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

<script>$('.date').datepicker()</script>

<script src="js/bootstrap-datepicker.js"></script>
<script>$('#date').datepicker('hide');</script>
<script>$('#date').datepicker('setStartDate');</script>
<script>$('#date').datepicker('setEndDate');</script>
    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>

</body>

</html>
