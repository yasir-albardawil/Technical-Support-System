	<!-- Copyright (C) 2016 Yasir salam Al-Bardawil - All Rights Reserved
 	You may use, distribute and modify this code under the
 	terms of the Technical Support System(TSS) license, which unfortunately won't be
 	written for another century.
 	You should have received a copy of the Tickets system license with
 	this file. If not, please email me: yasir.s.albardawil@gmail.com -->
<!DOCTYPE html>
<html lang="en">
<head>
<?php

/** -----------Database Connection----------- --**/
	session_start();
	//include_once 'dbconnect.php';
	$link = mysqli_connect("eu-cdbr-west-02.cleardb.net", "ba7a07e1878e53", "ab27f554", "heroku_8f300be620e34e7");

	if(isset($_SESSION['employee'])) {
		$res=mysqli_query($link, "SELECT * FROM users WHERE Emp_no=".$_SESSION['employee']);
		$empRow=mysqli_fetch_array($res);
}


	if(!isset($_SESSION['employee'])) {
		header("Location: login.php");
}

if($empRow['Role']=="1") {
	header("Location: tickets.php");
}
if($empRow['Role']=="2" or $empRow['Role']=="3") {
	header("Location: index.php");
}


    /** -----------PHP  section----------- --**/
	$emp_no = isset($_POST['emp_no']);
	$first_name = isset($_POST['first_name']);
	$last_name = isset($_POST['last_name']);
	$password =  md5(isset($_POST['pass']));
	$email = isset($_POST['email']);
	$phone = isset($_POST['phone']);
	$role = isset($_POST['role']);


//	$lab_no = trim($lab_no);
//	$first_name = trim($first_name);
//	$last_name = trim($last_name);
//	$password = trim($password);
//	$email = trim($email);
//	$phone = trim($phone);
//	$role = trim($role);
				
				// Employee number exist or not
	$query = "SELECT Emp_no FROM users WHERE Emp_no=$emp_no";
	$result = mysqli_query($link, $query);
	
	$count = mysqli_num_rows($result); // if Employee number not found then register
	
	if($count == 0){
			$sql  = "INSERT INTO users(Emp_no, First_name, Last_name, Password, Email, Phone, Role) VALUES ($emp_no,'$first_name','$last_name','$password','$email','$phone',$role)";

         	$query_run= mysqli_query($link, $sql);
		
	}
	
	
	$query1 = "SELECT * FROM users";
	$result1 = mysqli_query($link, $query1);
	if(isset($_GET['delete'])) {
	$delete = $_GET['delete'];
	$query2 = "DELETE FROM users WHERE Emp_no = '$delete'";
	if(!mysqli_query($link, $query2)){
			echo "<div class='alert alert-danger'>
  <strong>Danger!</strong> error!.
</div>";
		} else {
			header("Location: administrator.php");
			echo "<div class='alert alert-success'>
  <strong>Success!</strong> The record deleted.
</div>";
		}
	}
	
		?>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Track requests</title>

     <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

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
                <a class="navbar-brand" href="#page-top">Technical support system</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                     <li class="page-scroll">
                        <a href="#employee">Employees</a>
                    </li>
                    <li class="page-scroll">
                        <a href="trackrequest.php">Tracking requests</a>
                    </li>
         
               		<li class="dropdown">
                    	<a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        	<i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    	</a>
                    <ul id="dropdown-menu-color" class="dropdown-menu dropdown-user">
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
                    <img class="img-responsive" src="img/settings.png" alt="">
                    <div class="intro-text">
                        <span class="name">Technical Support System</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

            

        <!-- Employees Grid Section -->
   <section id="employee">
        <div class="container">
            <div class="row">
              <div class="col-lg-12 text-center">
                <h2>Employees </h2>
                <hr>
              </div>
            </div>
            <div id="page-wrapper">
            <div class="row">
              <div class="col-sm-12">
				              <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Employees infromation
                            <div class="text-right">
                   				 <button type="button" class="btn btn-sm btn-primary btn-create" data-toggle="modal"  data-target="#add_new_record_modal">Create New</button>
                  			</div>
                        </div>
                        
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-employees">
                                    <thead>
                                        <tr>
                                            <th>Employee number</th>
                                            <th>First name</th>
                                    		<th>Last name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Role</th>
                                            <th><em class="fa fa-cog"></em></th>
                                        </tr> 
                                    </thead>
                                    
                                    <tbody>
                                    <?php while($userRow = mysqli_fetch_array($result1)) { ?>
										
                                        <tr>
 											<td align="center"><?php echo $userRow['Emp_no']; ?></td>
                                            <td align="center"><?php echo $userRow['First_name']; ?></td>
                                            <td align="center"><?php echo $userRow['Last_name']; ?></td>
                                            <td align="center"><?php echo $userRow['Email']; ?></td>
                                            <td align="center"><?php echo $userRow['Phone']; ?></td>
                                            <td align="center"><?php 
											switch($userRow['Role']) {
												case "0":
												echo "Admin";
												break;
												case "1":
												echo "Support";
												break;
												case "2":
												echo "Empolyee";
												break;
												case "3":
												echo "Student";
												break;
												default:
												echo "Uncategorized";
										
											}
											 ?></td>
                                      <td align="center">
                             					 <a  href="edit.php?update=<?php echo $userRow['Emp_no']; ?>"class="btn btn-default"><em class="fa fa-pencil"></em></a>
                             		             <a href="administrator.php?delete=<?php echo $userRow['Emp_no']; ?>" class="btn btn-danger"><em class="fa fa-trash"></em></a>
                            				</td>
                                        </tr>
                                       <?php } ?>
                                     </tbody>
                                     
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
    </section>
    



      <!-- Portfolio Modals employees -->
    <div class="portfolio-modal modal fade" id="add_new_record_modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <h2>Employees</h2>
                        </div>

                    <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
                    <!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->
                    <form id="addEmpForm" novalidate>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Employee number</label>
                                <input type="number" class="form-control" placeholder="Employee number" id="emp_no" required data-validation-required-message="Please enter an employee number.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                          <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>First name</label>
                                <input type="text" class="form-control" placeholder="First name" id="first_name" required data-validation-required-message="Please enter First name.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                          <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Last name</label>
                                <input type="text" class="form-control" placeholder="Last name" id="last_name" required data-validation-required-message="Please enter an employee number.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                          <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Password</label>
                                <input type="password" class="form-control" placeholder="Password" id="password" required data-validation-required-message="Please enter a pasword.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                          <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Email</label>
                                <input type="email" class="form-control" placeholder="Email" id="email" required data-validation-required-message="Please enter an email.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Phone</label>
                                <input type="text" class="form-control" placeholder="Phone" id="phone" required data-validation-required-message="Please enter a phone.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Role</label>
								<select class="form-control" placeholder="Role" id="role" required data-validation-required-message="Please choose a role.">
                               		<option value="">Please choose a role:</option>
									<option value="0">Admin</option>
									<option value="1">Support</option>
									<option value="2">Employee</option>
                                    <option value="3">Student</option>
								</select>
                        </div>
                        	</div>
         
                        <br>
                        <div id="successaddemp"></div>
                        <div class="row">
                            <div class="form-group col-xs-12">
                                <button type="submit" class="btn btn-success btn-lg">Send</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
         </div>
	</div>
</div>
    


    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="delete" aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align" id="Heading">Delete this entry</h4>
      </div>
          <div class="modal-body">
       
       <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to delete this Record?</div>
       
      </div>
        <div class="modal-footer ">
        <a type="button" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Yes</a>
        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
      </div>
        </div>
    <!-- /.modal-content --> 
  </div>
      <!-- /.modal-dialog --> 
    </div>
    

    

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
    <script src="vendor/jquery/jquery.min.js"></script>
    
    <!-- jQuery -->
 	<script src="js/jquery.rwdImageMaps.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

   <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/add_employee.js"></script>

    <!-- Theme JavaScript -->
    <script src="js/freelancer.js"></script>
    
    <script> $('img[usemap]').rwdImageMaps(); </script>
    
    <!-- Metis Menu Plugin JavaScript -->
    <script src="bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>


    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-employees').DataTable({
                responsive: true
        });
    });
    </script>

</body>

</html>
