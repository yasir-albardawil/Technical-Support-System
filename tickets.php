
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
        WHERE  tickets.Emp_no = users.Emp_no ORDER BY tickets.Ticket_no DESC");
		
$result1 = mysqli_query($link, "SELECT * FROM tickets, users
        WHERE  tickets.Emp_no = users.Emp_no and users.Emp_no=".$_SESSION['employee']." ORDER BY tickets.Ticket_no DESC");

?>
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
                       <?php if($empRow['Role']==2) {?>
                        <li class="page-scroll">
                        <a href="index.php#ground_floor">Ground floor</a>
                    </li>
                    <li class="page-scroll">
                         <a href="index.php#first_floor">First Floor</a>
                    </li>
                    <?php } else {?>
                    <li class="page-scroll">
                        <a href="#tickets">Tickets</a>
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
                    <h2>Tickets</h2>
                </div>
            </div>
            <div id="page-wrapper">
            <div class="row">
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Tickets infromation
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <?php if($empRow['Role']==1) {?>
                                    <thead>
                                        <tr>
                                            <th>Ticket number</th>
                                            <th>Employee number</th>
                                    		<th>Employee name</th>
                                            <th>Lab number</th>
                                            <th>Type of sevice</th>
                                            <th>Item of sevice</th>
                                            <th>Message</th>
											<th>Status</th>
                                            <th>Data</th>
                                            <th>Request</th>
                                        </tr>
                                    </thead>

                                    <tbody>
									<?php 
									while($ticketRow = mysqli_fetch_array($result)) {
										 ?>
                                         <tr <?php if($ticketRow['Recipient']!=null) echo " class='info'"?>>
                                            <td align="center"><?php echo $ticketRow['Ticket_no']; ?></td>
                                            <td align="center"><?php echo $ticketRow['Emp_no']; ?></td>
                                            <td align="center"><?php echo $ticketRow['First_name']; ?></td>
                                            <td align="center"><?php echo $ticketRow['Lab_no']; ?></td>
                                            <td align="center"><?php if($ticketRow['Type']==0)
											 {echo "Setup Hardware/Software Installation";}
											else {echo "Maintenance";}?></td>
                                            <td align="center"><?php echo $ticketRow['Item']; ?></td>
                                            <td align="center"><?php echo $ticketRow['Message']; ?></td>
											<td align="center">
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
                                            <td align="center"><?php echo $ticketRow['Date']; ?></td>
                                       <td align="center">
                             					 <a href="request.php?ticket_no=<?php echo  $ticketRow['Ticket_no']; ?>" class=" btn btn-default">
                                                  <em class="fa  fa-search-plus"></em></a>
            								</td>
                                        </tr>
                                        <?php 
										
											$ticket_id = isset($_GET['Ticket_id']);
										
										} ?>
                                    </tbody>
                                     	<?php } else {?>
                                        <thead>
                                        <tr>
                                            <th>Ticket number</th>
                                            <th>Employee number</th>
                                    		<th>Employee name</th>
                                            <th>Lab number</th>
                                            <th>Type of sevice</th>
                                            <th>Item of sevice</th>
                                            <th>Message</th>
											<th>Status</th>
                                            <th>Data</th>
                                            <th>Request</th>
                                        </tr>
                                    </thead>

                                    <tbody>
									<?php 
									while($ticketRow1 = mysqli_fetch_array($result1)) {
										 ?>
                                         <tr>
                                            <td align="center"><?php echo $ticketRow1['Ticket_no']; ?></td>
                                            <td align="center"><?php echo $ticketRow1['Emp_no']; ?></td>
                                            <td align="center"><?php echo $ticketRow1['First_name']; ?></td>
                                            <td align="center"><?php echo $ticketRow1['Lab_no']; ?></td>
                                            <td align="center"><?php if($ticketRow1['Type']==0)
											 {echo "Setup Hardware/Software Installation";}
											else {echo "Maintenance";}?></td>
                                            <td align="center"><?php echo $ticketRow1['Item']; ?></td>
                                            <td align="center"><?php echo $ticketRow1['Message']; ?></td>
											<td align="center">
                                            <?php switch($ticketRow1['Status']) {
												
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
                                            <td align="center"><?php echo $ticketRow1['Date']; ?></td>
                                       <td align="center">
                             					 <a href="request.php?ticket_no=<?php echo  $ticketRow1['Ticket_no']; ?>" class=" btn btn-default">
                                                  <em class="fa  fa-search-plus"></em></a>
            								</td>
                                        </tr>
                                        <?php 
										$ticket_id = $_GET['Ticket_id'];
										} ?>
                                    </tbody>
                                    <?php } ?>
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



    <!--  -->
     <div class="portfolio-modal modal fade" id="requestModal" tabindex="-1" role="dialog" aria-hidden="true">                                       
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
                        	
                            

                            <h2>request<?php echo " #" . $ticket_id ?></h2>

                        </div>
                	</div>
            </div>
         </div>
	</div>
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
 	<script src="js/jquery.rwdImageMaps.js"></script>

        <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

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
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>
    
    <script>
		(function timeAgo(selector) {

    var templates = {
        prefix: "",
        suffix: " ago",
        seconds: "less than a minute",
        minute: "about a minute",
        minutes: "%d minutes",
        hour: "about an hour",
        hours: "about %d hours",
        day: "a day",
        days: "%d days",
        month: "about a month",
        months: "%d months",
        year: "about a year",
        years: "%d years"
    };
    var template = function(t, n) {
        return templates[t] && templates[t].replace(/%d/i, Math.abs(Math.round(n)));
    };

    var timer = function(time) {
        if (!time)
            return;
        time = time.replace(/\.\d+/, ""); // remove milliseconds
        time = time.replace(/-/, "/").replace(/-/, "/");
        time = time.replace(/T/, " ").replace(/Z/, " UTC");
        time = time.replace(/([\+\-]\d\d)\:?(\d\d)/, " $1$2"); // -04:00 -> -0400
        time = new Date(time * 1000 || time);

        var now = new Date();
        var seconds = ((now.getTime() - time) * .001) >> 0;
        var minutes = seconds / 60;
        var hours = minutes / 60;
        var days = hours / 24;
        var years = days / 365;

        return templates.prefix + (
                seconds < 45 && template('seconds', seconds) ||
                seconds < 90 && template('minute', 1) ||
                minutes < 45 && template('minutes', minutes) ||
                minutes < 90 && template('hour', 1) ||
                hours < 24 && template('hours', hours) ||
                hours < 42 && template('day', 1) ||
                days < 30 && template('days', days) ||
                days < 45 && template('month', 1) ||
                days < 365 && template('months', days / 30) ||
                years < 1.5 && template('year', 1) ||
                template('years', years)
                ) + templates.suffix;
    };

    var elements = document.getElementsByClassName('timeago');
    for (var i in elements) {
        var $this = elements[i];
        if (typeof $this === 'object') {
            $this.innerHTML = timer($this.getAttribute('title') || $this.getAttribute('datetime'));
        }
    }
    // update time every minute
    setTimeout(timeAgo, 60000);

})();
	</script>
  
</body>

</html>
