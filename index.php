
<?php

/** -----------Database Connection----------- --**/
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

if($empRow['Role']=="0") {
	header("Location: administrator.php");
}

if($empRow['Role']=="1") {
	header("Location: tickets.php");
}


  /** ground floor Portfolio Modals  call values **/
    /** -----------PHP  section----------- --**/

	$res1=mysqli_query($link, "SELECT * FROM tickets ORDER BY Ticket_no DESC");
	$ticketRow=mysqli_fetch_array($res1);
	$ticket_no = ++$ticketRow['Ticket_no'];
	$cb = isset($_POST['cb']);
	$lab_no = isset($_POST['lab_no']);
	$emp_no = isset($_POST['emp_no']);
	$name = isset($_POST['name']);
	$email_address = isset($_POST['email']);
	$phone = isset($_POST['phone']);
	$message = isset($_POST['message']);
	$type = isset($_POST['type']);
	$item = isset($_POST['item1']);


	$lab_no = trim($lab_no);
	$type - trim($type);
	$emp_no = trim($emp_no);
	$name = trim($name);
	$email_address = trim($email_address);		
	$phone = trim($phone);
	$message = trim($message);
	$type = trim($type);
	$item = trim($item);

	$date = date('m/d/Y h:i:s A', time());
	$query  = "INSERT INTO tickets(Ticket_no, Type, Item, Message, Emp_no, Lab_no, Recipient, Date, Status) VALUES 
	('$ticket_no','$type','$item', '$message','$emp_no','$lab_no','', '$date', 'Open')";
	$query_run = mysqli_query($link, $query);

	$res1=mysqli_query($link, "SELECT * FROM labs");
	$labRow=mysqli_fetch_array($res1);

		?>
        

	<!-- Copyright (C) 2016 Yasir salam Al-Bardawil - All Rights Reserved
 	You may use, distribute and modify this code under the
 	terms of the Technical Support System(TSS) license, which unfortunately won't be
 	written for another century.
 	You should have received a copy of the Tickets system license with
 	this file. If not, please email me: yasir.s.albardawil@gmail.com -->
    
<!DOCTYPE html>
<html lang="en"><head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Welcome Mr.<?php echo " ".$empRow['Last_name'];?></title>


    <!-- Bootstrap Core CSS -->

    <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">



    <!-- Theme CSS -->

    <link href="css/freelancer.css" rel="stylesheet">



    <!-- Custom Fonts -->

    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">

    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">





    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->

    <!-- WARNING: Respond.js doesn't work if you view the page via file://
-->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="img/ticket.png">
    
    
    
        <!-- Navigation -->
        <nav id="mainNav" class="navbar navbar-default navbar-fixed-top navbar-custom">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header page-scroll">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>Menu
                        <i class="fa fa-bars"></i>
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
                            <a href="#ground_floor">Ground floor</a>
                        </li>
                        <li class="page-scroll">
                            <a href="#first_floor">First Floor</a>
                        </li>
                        <li class="page-scroll">
                            <a href="#Instructions">Instructions</a>
                        </li>
                       
                       
                                <li class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">

                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>

                    </a>
                                    <ul id="dropdown-menu-color" class="dropdown-menu dropdown-user">
                                        <li>
                                           	<a href="tickets.php#tickets"><i class="fa fa-ticket fa-fw"></i> My tickets</a>
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <a href="logout.php?logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
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
                            <span class="name">Technical Support Support</span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- ground floor Grid Section -->
        <section id="ground_floor">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2>ground floor</h2>
                        <hr class="line-">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <img name="Groundfloor" src="img/Ground floor.png" width="1024" height="768" class="img-responsive" id="Groundfloor" usemap="#m_Ground20floor" alt="">
                        <map name="m_Ground20floor" id="m_Ground20floor">
                            <area shape="poly" coords="621,321,728,322,729,327,667,385,654,386,654,377,652,377,649,377,647,380,645,382,644,384,643,382,636,377,635,376,634,377,632,377,633,383,633,387,624,388,621,387,621,321" href="#lab1239" class="portfolio-link" data-toggle="modal" title="Lab 1239" alt="Lab 1239">
                            <area shape="poly" coords="234,293,401,293,399,424,233,425,234,418,249,418,249,416,243,416,242,417,241,417,240,417,240,417,239,416,239,413,240,412,243,409,246,408,246,408,249,407,249,406,246,405,246,405,245,404,243,403,241,401,240,400,240,397,239,397,242,395,247,395,249,395,249,395,249,393,245,392,234,393,234,293" href="#lab1241" class="portfolio-link" data-toggle="modal" title="Lab 1241" alt="Lab 1241">
                            <area shape="poly" coords="14,577,177,579,167,583,168,591,174,592,175,592,176,594,176,596,174,598,170,600,170,601,177,609,177,611,167,611,166,618,166,620,178,620,178,713,162,716,139,717,115,719,75,721,48,720,31,721,20,720,15,721,13,721,14,577" href="#lab1220" class="portfolio-link" data-toggle="modal" title="Lab 1220" alt="Lab 1220">
                            <area shape="poly" coords="34,461,166,460,167,465,176,465,176,468,175,471,173,473,170,473,170,477,173,477,174,480,176,482,177,483,177,484,167,485,167,490,179,491,177,578,31,577,32,462" href="#lab1222" class="portfolio-link" data-toggle="modal" title="Lab 1222" alt="Lab 1222">
                            <area shape="poly" coords="35,342,178,341,178,423,178,424,167,425,167,432,175,432,177,433,175,436,173,439,170,440,172,443,174,446,177,449,176,451,173,451,167,450,167,453,167,456,167,457,173,457,177,457,179,458,179,458,179,459,179,459,167,459,32,460,33,343,33,343,33,461" href="#lab1224" class="portfolio-link" data-toggle="modal" title="Lab 1224" alt="Lab 1224">
                            <area shape="poly" coords="14,216,178,218,178,297,167,299,166,306,176,305,176,309,175,311,172,314,170,314,169,314,171,316,173,318,175,322,176,324,176,324,165,324,166,329,165,333,175,334,178,334,178,339,12,341,12,216" href="#lab1226" class="portfolio-link" data-toggle="modal" title="Lab1226" alt="Lab1226">
                            <area shape="poly" coords="820,108,1011,105,957,217,957,224,949,233,940,248,864,248,864,238,856,238,855,247,851,247,848,245,847,245,846,244,846,243,845,242,844,242,842,242,842,244,840,245,840,246,838,247,836,248,834,248,832,238,822,238,821,239" href="#lab1236" class="portfolio-link" data-toggle="modal" title="Lab 1236" alt="Lab 1236">
                            <area shape="poly" coords="654,106,820,107,820,236,810,237,808,247,804,246,802,246,800,244,799,242,797,241,795,242,794,245,791,246,790,247,787,247,786,246,787,240,783,238,779,239,779,240,779,241,779,245,778,249,655,249" href="#lab1234" class="portfolio-link" data-toggle="modal" title="Lab 1234" alt="Lab 1234">
                            <area shape="poly" coords="518,123,656,123,655,249,557,249,557,239,548,239,548,247,544,247,541,247,540,244,538,243,537,241,535,242,534,245,533,245,531,246,528,248,525,248,524,239,518,239" href="#lab1232" class="portfolio-link" data-toggle="modal" title="Lab 1232" alt="Lab 1232">
                            <area shape="poly" coords="378,123,517,123,517,238,508,238,508,247,504,247,501,246,499,243,497,241,496,243,495,244,494,244,493,246,492,246,490,248,487,248,486,248,486,248,485,239,483,240,478,240,479,249,477,250,378,248" href="#lab1230" class="portfolio-link" data-toggle="modal" title="Lab 1230" alt="Lab 1230">
                            <area shape="poly" coords="233,107,377,109,376,249,280,247,280,238,272,237,270,247,264,246,261,243,260,241,259,242,256,245,251,248,249,248,247,239,236,239,236,249,233,249,233,107" href="#lab1228" class="portfolio-link" data-toggle="modal" title="Lab 1228" alt="Lab 1228">
                        </map>
                    </div>
                </div>
            </div>
        </section>
        <!-- First floor Grid Section -->
        <section id="first_floor">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2>first floor</h2>
                        <hr class="line-">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <img name="FirstFloor" src="img/First Floor.png" width="1024" height="768" class="img-responsive" id="FirstFloor" usemap="#m_First20Floor" alt="">
                        <map name="m_First20Floor" id="m_First20Floor">
                            <area shape="poly" coords="19,203,176,204,177,274,166,276,165,285,179,286,177,289,175,292,170,294,167,294,172,296,175,297,177,301,166,303,165,313,19,312,19,203" href="#lab2060" class="portfolio-link" data-toggle="modal" title="Lab 2060" alt="Lab 2060">
                            <area shape="poly" coords="38,318,177,317,177,392,166,393,166,402,178,402,176,407,168,410,174,413,176,416,177,420,166,419,164,425,39,425,38,318" href="#lab2058" class="portfolio-link" data-toggle="modal" title="Lab 2058" alt="Lab 2058">
                            <area shape="poly" coords="39,429,164,429,164,435,178,434,177,438,172,441,169,441,173,443,178,448,179,452,166,451,166,459,175,460,177,460,177,490,175,535,38,535,39,429" href="#lab2056" class="portfolio-link" data-toggle="modal" title="Lab 2056" alt="Lab 2056">
                            <area shape="poly" coords="18,541,165,539,165,551,169,552,177,552,177,555,173,559,170,559,173,562,176,564,178,568,166,569,165,570,166,582,176,582,176,662,130,666,115,666,97,667,77,668,62,669,49,668,19,669,18,541" href="#lab2054" class="portfolio-link" data-toggle="modal" title="Lab 2054" alt="Lab 2054">
                            <area shape="poly" coords="287,572,287,645,355,629,369,625,391,618,367,563,360,565,354,555,351,556,348,558,347,562,346,565,346,568,346,570,338,571,331,561,287,572" href="#lab2019" class="portfolio-link" data-toggle="modal" title="Lab 2019" alt="Lab 2019">
                            <area shape="poly" coords="394,543,420,533,456,598,395,618,371,564,377,561,376,557,372,549,372,548,372,548,375,548,380,548,382,550,387,553,389,555,390,557,392,557,398,555,400,554,394,543" href="#lab2021" class="portfolio-link" data-toggle="modal" title="Lab 2021" alt="Lab 2021">
                            <area shape="poly" coords="624,301,623,359,634,360,633,353,634,349,638,349,646,357,647,355,651,352,654,350,656,350,658,351,658,358,667,358,678,349,718,314,730,301,730,300,624,301" href="#lab2027" class="portfolio-link" data-toggle="modal" title="Lab 2027" alt="Lab 2027">
                            <area shape="poly" coords="239,274,398,275,397,392,256,393,254,386,242,386,243,383,245,381,249,378,250,377,247,376,245,375,243,372,242,369,242,367,254,368,255,363,254,362,240,362,239,274" href="#lab2029" class="portfolio-link" data-toggle="modal" title="Lab 2029" alt="Lab 2029">
                            <area shape="poly" coords="828,100,1007,98,1002,110,998,120,992,136,984,153,978,165,968,182,961,195,960,197,956,199,953,199,951,206,952,213,943,228,867,226,867,218,857,218,855,227,850,227,847,224,845,220,843,223,840,226,836,228,835,228,834,218,827,217,828,100" href="#lab2070" class="portfolio-link" data-toggle="modal" title="Lab 2070" alt="Lab 2070">
                            <area shape="poly" coords="663,99,822,99,822,218,816,218,815,227,812,228,808,225,807,222,805,221,803,225,801,227,797,228,794,228,794,219,784,218,782,227,661,227,663,99" href="#lab2068" class="portfolio-link" data-toggle="modal" title="Lab 2068" alt="Lab 2068">
                            <area shape="poly" coords="524,115,656,114,657,227,562,226,561,219,557,217,550,217,549,227,545,227,542,223,540,219,538,223,538,225,529,229,528,219,522,218,524,115" href="#lab2066" class="portfolio-link" data-toggle="modal" title="Lab 2066" alt="Lab 2066">
                            <area shape="poly" coords="383,115,517,114,518,218,511,218,510,220,510,228,507,228,504,226,502,224,500,221,498,224,496,226,490,228,490,218,486,218,479,218,478,227,381,227,383,115" href="#lab2064" data-toggle="modal" title="Lab 2064" alt="Lab 2064">
                            <area shape="poly" coords="241,98,377,98,378,228,279,226,278,219,269,218,269,227,269,229,267,228,263,227,259,224,257,221,256,224,254,226,250,228,247,228,246,220,240,220,241,98" href="#lab2062" class="portfolio-link" data-toggle="modal" title="Lab 2062" alt="Lab 2062">
                        </map>
                    </div>
                </div>
            </div>
        </section>
        
       
       
        <!-- Scroll to Top Button (Only visible on small and extra-small screen
        sizes) -->
        <div class="scroll-top page-scroll hidden-sm hidden-xs hidden-lg hidden-md">
            <a class="btn btn-primary" href="#page-top">

            <i class="fa fa-chevron-up"></i>

        </a>
        </div>
        <!-- ground floor Portfolio Modals lab1228 -->
        <div class="portfolio-modal modal fade" id="lab1228" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-content">
                <div class="close-modal" data-dismiss="modal">
                    <div class="lr">
                        <div class="rl"></div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2">
                            <div class="modal-body">
                                <h2>Lab 1228</h2>
                            </div>
                            <!-- To configure the contact form email address, go to mail/contact_me.php
                            and update the email address in the PHP file on line 19. -->
                            <!-- The form should work on most web servers, but if the form is not
                            working you may need to configure your web server differently. -->
                            <form name="sentMessage" id="contactForm" novalidate>
                                <input type="hidden" id="emp_no" value="<?php echo $empRow['Emp_no']; ?>">
                                <input type="hidden" id="lab_no" value="1228">
                                <input type="hidden" id="ticket_no" value="<?php echo $ticket_no; ?>">
                                <input type="hidden" id="first_name" value="<?php echo $empRow['First_name']; ?>">
                                 <div class="row control-group">
                                    <div class="form-group col-xs-12 floating-label-form-group controls">
                                        <label>Type of service</label>
                                        <select  class="form-control" id="type" data-validation-required-message="Please choose the type for the sevice.">
                                        <option value="">Please choose the type for the sevice:</option>
                                        <option value="0">Setup hardware/Software installation</option>
                                        <option value="1">Maintenace</option>
                                        </select>
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>
                               <fieldset>
                                
                                <div class="row control-group">
                                    <div class="form-group col-xs-12 floating-label-form-group controls">
                                        <label>Item of service</label>
                                        <select  class="form-control" id="item1" data-validation-required-message="Please choose  the the item for the service.">
                                        <option value="">Please choose the item for the sevice:</option>
                                        <option value="Smart board">Smart board</option>
                                        <option value="Project">Project</option>
                                        <option value="Program">Program</option>
                                        <option value="Internet">Internet</option>
                                        <option value="Computer">Computer</option>
                                        <option value="Labtop">Labtop</option>
                                        <option value="Monitor">Monitor</option>
                                        <option value="Printer">Printer</option>
                                        <option value="Scanner">Mouse</option>
                                        <option value="Keyboard">Keyboard</option>
                                        <option value="IP Phone">IP Phone</option>
                                        <option value="System">System</option>
                                        <option value="Other">Other</option>
                                        </select>
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>
                                <div class="row control-group">
                                    <div class="form-group col-xs-12 floating-label-form-group controls">
                                        <label>Other</label>
                                        <textarea rows="5" class="form-control" placeholder="Message" id="message" required data-validation-required-message="Please enter a message."></textarea>
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>
                                <br>
                                <div id="success"></div>
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
        <!-- ground floor Portfolio Modals lab1230 -->
        <div class="portfolio-modal modal fade" id="lab1230" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-content">
                <div class="close-modal" data-dismiss="modal">
                    <div class="lr">
                        <div class="rl"></div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2">
                            <div class="modal-body">
                                <h2>Lab 1230</h2>
                            </div>
                            <!-- To configure the contact form email address, go to mail/contact_me.php
                            and update the email address in the PHP file on line 19. -->
                            <!-- The form should work on most web servers, but if the form is not
                            working you may need to configure your web server differently. -->
                            <form id="lab1230" novalidate>
                                <input type="hidden" id="emp_no1230" value="<?php echo $empRow['Emp_no']; ?>">
                                <input type="hidden" id="lab_no1230" value="1230">
                                <input type="hidden" id="ticket_no1230" value="<?php echo $ticket_no; ?>">
                                <input type="hidden" id="first_name1230" value="<?php echo $empRow['First_name']; ?>">
                                <div class="row control-group">
                                    <div class="form-group col-xs-12 floating-label-form-group controls">
                                        <label>Type of service</label>
                                        <select  class="form-control" id="type1230" data-validation-required-message="Please choose the type for the sevice.">
                                        <option value="">Please choose the type for the sevice:</option>
                                        <option value="0">Setup hardware/Software installation</option>
                                        <option value="1">Maintenace</option>
                                        </select>
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>
                               <fieldset>
                                
                                <div class="row control-group">
                                    <div class="form-group col-xs-12 floating-label-form-group controls">
                                        <label>Item of service</label>
                                        <select  class="form-control" id="item1230" data-validation-required-message="Please choose  the the item for the service.">
                                        <option value="">Please choose the item for the sevice:</option>
                                        <option value="Smart board">Smart board</option>
                                        <option value="Project">Project</option>
                                        <option value="Program">Program</option>
                                        <option value="Internet">Internet</option>
                                        <option value="Computer">Computer</option>
                                        <option value="Labtop">Labtop</option>
                                        <option value="Monitor">Monitor</option>
                                        <option value="Printer">Printer</option>
                                        <option value="Scanner">Mouse</option>
                                        <option value="Keyboard">Keyboard</option>
                                        <option value="IP Phone">IP Phone</option>
                                        <option value="System">System</option>
                                        <option value="Other">Other</option>
                                        </select>
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>
                                <div class="row control-group">
                                    <div class="form-group col-xs-12 floating-label-form-group controls">
                                        <label>Message</label>
                                        <textarea rows="5" class="form-control" placeholder="Message" id="messagelab1230" required data-validation-required-message="Please enter a message."></textarea>
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>
                                <br>
                                <div id="successlab1230"></div>
                                <div class="row">
                                    <div class="form-group col-xs-12">
                                        <button type="submit" id="btn1230" class="btn btn-success btn-lg">Send</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       <!-- ground floor Portfolio Modals lab1232 -->
        <div class="portfolio-modal modal fade" id="lab1232" tabindex="-1" role="dialog" aria-hidden="true">
            <input type="hidden" id="lab_no" value="1232">
            <div class="modal-content">
                <div class="close-modal" data-dismiss="modal">
                    <div class="lr">
                        <div class="rl"></div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2">
                            <div class="modal-body">
                                <h2>Lab 1232</h2>
                                <hr class="star-primary">
                            </div>
                            <!-- To configure the contact form email address, go to mail/contact_me.php
                            and update the email address in the PHP file on line 19. -->
                            <!-- The form should work on most web servers, but if the form is not
                            working you may need to configure your web server differently. -->
                            <form name="sentMessage" id="lab1232" novalidate>
                                <input type="hidden" id="emp_no1232" value="<?php echo $empRow['Emp_no']; ?>">
                                <input type="hidden" id="lab_no1232" value="1232">
                                <input type="hidden" id="ticket_no1232" value="<?php echo $ticket_no; ?>">
                                <input type="hidden" id="first_name1232" value="<?php echo $empRow['First_name']; ?>">
                                <div class="row control-group">
                                    <div class="form-group col-xs-12 floating-label-form-group controls">
                                    
                                        <label>Type of service</label>
                                        <select  class="form-control" id="type1232" data-validation-required-message="Please choose the type for the sevice.">
                                        <option value="">Please choose the type for the sevice:</option>
                                        <option value="0">Setup hardware/Software installation</option>
                                        <option value="1">Maintenace</option>
                                        </select>
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>
                               <fieldset>
                                
                                <div class="row control-group">
                                    <div class="form-group col-xs-12 floating-label-form-group controls">
                                        <label>Item of service</label>
                                        <select  class="form-control" id="item1232" data-validation-required-message="Please choose  the the item for the service.">
                                        <option value="">Please choose the item for the sevice:</option>
                                        <option value="Smart board">Smart board</option>
                                        <option value="Project">Project</option>
                                        <option value="Program">Program</option>
                                        <option value="Internet">Internet</option>
                                        <option value="Computer">Computer</option>
                                        <option value="Labtop">Labtop</option>
                                        <option value="Monitor">Monitor</option>
                                        <option value="Printer">Printer</option>
                                        <option value="Scanner">Mouse</option>
                                        <option value="Keyboard">Keyboard</option>
                                        <option value="IP Phone">IP Phone</option>
                                        <option value="System">System</option>
                                        <option value="Other">Other</option>
                                        </select>
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>
                                <div class="row control-group">
                                    <div class="form-group col-xs-12 floating-label-form-group controls">
                                        <label>Message</label>
                                        <textarea rows="5" class="form-control" placeholder="Message" id="messagelab1232" required data-validation-required-message="Please enter a message."></textarea>
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>
                                <br>
                                <div id="successlab1232"></div>
                                <div class="row">
                                    <div class="form-group col-xs-12">
                                        <button type="submit" id="btn1232" class="btn btn-success btn-lg">Send</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ground floor Portfolio Modals lab1234 -->
        <div class="portfolio-modal modal fade" id="lab1234" tabindex="-1" role="dialog" aria-hidden="true">
            <input type="hidden" id="lab_no" value="1234">
            <div class="modal-content">
                <div class="close-modal" data-dismiss="modal">
                    <div class="lr">
                        <div class="rl"></div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2">
                            <div class="modal-body">
                                <h2>Lab 1234</h2>
                                <hr class="star-primary">
                               
                            </div>
                            <!-- To configure the contact form email address, go to mail/contact_me.php
                            and update the email address in the PHP file on line 19. -->
                            <!-- The form should work on most web servers, but if the form is not
                            working you may need to configure your web server differently. -->
                            <form name="sentMessage" id="lab1234" novalidate>
                                <input type="hidden" id="emp_no1234" value="<?php echo $empRow['Emp_no']; ?>">
                                <input type="hidden" id="lab_no1234" value="1234">
                                <input type="hidden" id="ticket_no1234" value="<?php echo $ticket_no; ?>">
                                <input type="hidden" id="first_name1234" value="<?php echo $empRow['First_name']; ?>">
                                <div class="row control-group">
                                    <div class="form-group col-xs-12 floating-label-form-group controls">
                                     <label>Type of service</label>
                                        <select  class="form-control" id="type1234" data-validation-required-message="Please choose the type for the sevice.">
                                        <option value="">Please choose the type for the sevice:</option>
                                        <option value="0">Setup hardware/Software installation</option>
                                        <option value="1">Maintenace</option>
                                        </select>
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>
                               <fieldset>
                                
                                <div class="row control-group">
                                    <div class="form-group col-xs-12 floating-label-form-group controls">
                                     <label>Item of service</label>
                                        <select  class="form-control" id="item1234" data-validation-required-message="Please choose  the the item for the service.">
                                        <option value="">Please choose the item for the sevice:</option>
                                        <option value="Smart board">Smart board</option>
                                        <option value="Project">Project</option>
                                        <option value="Program">Program</option>
                                        <option value="Internet">Internet</option>
                                        <option value="Computer">Computer</option>
                                        <option value="Labtop">Labtop</option>
                                        <option value="Monitor">Monitor</option>
                                        <option value="Printer">Printer</option>
                                        <option value="Scanner">Mouse</option>
                                        <option value="Keyboard">Keyboard</option>
                                        <option value="IP Phone">IP Phone</option>
                                        <option value="System">System</option>
                                        <option value="Other">Other</option>
                                        </select>
                                        <p class="help-block text-danger"></p>
                                    	</div>
                                </div>
                                <div class="row control-group">
                                    <div class="form-group col-xs-12 floating-label-form-group controls">
                                        <label>Message</label>
                                        <textarea rows="5" class="form-control" placeholder="Message" id="messagelab1234" required data-validation-required-message="Please enter a message."></textarea>
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>
                                <br>
                                <div id="successlab1234"></div>
                                <div class="row">
                                    <div class="form-group col-xs-12">
                                        <button type="submit" id="btn1234" class="btn btn-success btn-lg">Send</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ground floor Portfolio Modals lab1236 -->
        <div class="portfolio-modal modal fade" id="lab1236" tabindex="-1" role="dialog" aria-hidden="true">
            <input type="hidden" id="lab_no" value="1236">
            <div class="modal-content">
                <div class="close-modal" data-dismiss="modal">
                    <div class="lr">
                        <div class="rl"></div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2">
                            <div class="modal-body">
                                <h2>Lab 1236</h2>
                                <hr class="star-primary">
                                
                            </div>
                            <!-- To configure the contact form email address, go to mail/contact_me.php
                            and update the email address in the PHP file on line 19. -->
                            <!-- The form should work on most web servers, but if the form is not
                            working you may need to configure your web server differently. -->
                            <form name="sentMessage" id="lab1236" novalidate>
                                <input type="hidden" id="emp_no1236" value="<?php echo $empRow['Emp_no']; ?>">
                                <input type="hidden" id="lab_no1236" value="1236">
                                <input type="hidden" id="ticket_no1236" value="<?php echo $ticket_no; ?>">
                                <input type="hidden" id="first_name1236" value="<?php echo $empRow['First_name']; ?>">
                                <div class="row control-group">
                                    <div class="form-group col-xs-12 floating-label-form-group controls">
                                     <label>Type of service</label>
                                        <select  class="form-control" id="type1236" data-validation-required-message="Please choose the type for the sevice.">
                                        <option value="">Please choose the type for the sevice:</option>
                                        <option value="0">Setup hardware/Software installation</option>
                                        <option value="1">Maintenace</option>
                                        </select>
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>
                               <fieldset>
                                
                                <div class="row control-group">
                                    <div class="form-group col-xs-12 floating-label-form-group controls">
                                     <label>Item of service</label>
                                        <select  class="form-control" id="item1236" data-validation-required-message="Please choose  the the item for the service.">
                                        <option value="">Please choose the item for the sevice:</option>
                                        <option value="Smart board">Smart board</option>
                                        <option value="Project">Project</option>
                                        <option value="Program">Program</option>
                                        <option value="Internet">Internet</option>
                                        <option value="Computer">Computer</option>
                                        <option value="Labtop">Labtop</option>
                                        <option value="Monitor">Monitor</option>
                                        <option value="Printer">Printer</option>
                                        <option value="Scanner">Mouse</option>
                                        <option value="Keyboard">Keyboard</option>
                                        <option value="IP Phone">IP Phone</option>
                                        <option value="System">System</option>
                                        <option value="Other">Other</option>
                                        </select>
                                        <p class="help-block text-danger"></p>
                                        </div>
                                </div>
                                <div class="row control-group">
                                    <div class="form-group col-xs-12 floating-label-form-group controls">
                                        <label>Message</label>
                                        <textarea rows="5" class="form-control" placeholder="Message" id="messagelab1236" required data-validation-required-message="Please enter a message."></textarea>
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>
                                <br>
                                <div id="successlab1236"></div>
                                <div class="row">
                                    <div class="form-group col-xs-12">
                                        <button type="submit"  id="btn1236"  class="btn btn-success btn-lg">Send</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ground floor Portfolio Modals lab1226 -->
        <div class="portfolio-modal modal fade" id="lab1226" tabindex="-1" role="dialog" aria-hidden="true">
            <input type="hidden" id="lab_no" value="1226">
            <div class="modal-content">
                <div class="close-modal" data-dismiss="modal">
                    <div class="lr">
                        <div class="rl"></div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2">
                            <div class="modal-body">
                                <h2>Lab 1226</h2>
                                <hr class="star-primary">
                               
                            </div>
                            <!-- To configure the contact form email address, go to mail/contact_me.php
                            and update the email address in the PHP file on line 19. -->
                            <!-- The form should work on most web servers, but if the form is not
                            working you may need to configure your web server differently. -->
                            <form name="sentMessage" id="lab1226" novalidate>
                                <input type="hidden" id="emp_no1226" value="<?php echo $empRow['Emp_no']; ?>">
                                <input type="hidden" id="lab_no1226" value="1226">
                                <input type="hidden" id="ticket_no1226" value="<?php echo $ticket_no; ?>">
                                <input type="hidden" id="first_name1226" value="<?php echo $empRow['First_name']; ?>">
                                <div class="row control-group">
                                    <div class="form-group col-xs-12 floating-label-form-group controls">
                                    <label>Type of service</label>
                                        <select  class="form-control" id="type1226" data-validation-required-message="Please choose the type for the sevice.">
                                        <option value="">Please choose the type for the sevice:</option>
                                        <option value="0">Setup hardware/Software installation</option>
                                        <option value="1">Maintenace</option>
                                        </select>
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>
                               <fieldset>
                                
                                <div class="row control-group">
                                    <div class="form-group col-xs-12 floating-label-form-group controls">
                                     <label>Item of service</label>
                                        <select  class="form-control" id="item1226" data-validation-required-message="Please choose  the the item for the service.">
                                        <option value="">Please choose the item for the sevice:</option>
                                        <option value="Smart board">Smart board</option>
                                        <option value="Project">Project</option>
                                        <option value="Program">Program</option>
                                        <option value="Internet">Internet</option>
                                        <option value="Computer">Computer</option>
                                        <option value="Labtop">Labtop</option>
                                        <option value="Monitor">Monitor</option>
                                        <option value="Printer">Printer</option>
                                        <option value="Scanner">Mouse</option>
                                        <option value="Keyboard">Keyboard</option>
                                        <option value="IP Phone">IP Phone</option>
                                        <option value="System">System</option>
                                        <option value="Other">Other</option>
                                        </select>
                                        <p class="help-block text-danger"></p>
                                        </div>
                                </div>
                                <div class="row control-group">
                                    <div class="form-group col-xs-12 floating-label-form-group controls">
                                        <label>Message</label>
                                        <textarea rows="5" class="form-control" placeholder="Message" id="messagelab1226" required data-validation-required-message="Please enter a message."></textarea>
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>
                                <br>
                                <div id="successlab1226"></div>
                                <div class="row">
                                    <div class="form-group col-xs-12">
                                        <button type="submit" id="btn1226" class="btn btn-success btn-lg">Send</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ground floor Portfolio Modals lab1224 -->
        <div class="portfolio-modal modal fade" id="lab1224" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-content">
                <div class="close-modal" data-dismiss="modal">
                    <div class="lr">
                        <div class="rl"></div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2">
                            <div class="modal-body">
                                <h2>Lab 1224</h2>
                                <hr class="star-primary">
                                
                            </div>
                            <!-- To configure the contact form email address, go to mail/contact_me.php
                            and update the email address in the PHP file on line 19. -->
                            <!-- The form should work on most web servers, but if the form is not
                            working you may need to configure your web server differently. -->
                            <form id="lab1224" novalidate>
                                <input type="hidden" id="emp_no1224" value="<?php echo $empRow['Emp_no']; ?>">
                                <input type="hidden" id="lab_no1224" value="1224">
                                <input type="hidden" id="ticket_no1224" value="<?php echo $ticket_no; ?>">
                                <input type="hidden" id="first_name1224" value="<?php echo $empRow['First_name']; ?>">
                                <div class="row control-group">
                                    <div class="form-group col-xs-12 floating-label-form-group controls">
                                    <label>Type of service</label>
                                        <select  class="form-control" id="type1224" data-validation-required-message="Please choose the type for the sevice.">
                                        <option value="">Please choose the type for the sevice:</option>
                                        <option value="0">Setup hardware/Software installation</option>
                                        <option value="1">Maintenace</option>
                                        </select>
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>
                               <fieldset>
                                
                                <div class="row control-group">
                                    <div class="form-group col-xs-12 floating-label-form-group controls">
                                     <label>Item of service</label>
                                        <select  class="form-control" id="item1224" data-validation-required-message="Please choose  the the item for the service.">
                                        <option value="">Please choose the item for the sevice:</option>
                                        <option value="Smart board">Smart board</option>
                                        <option value="Project">Project</option>
                                        <option value="Program">Program</option>
                                        <option value="Internet">Internet</option>
                                        <option value="Computer">Computer</option>
                                        <option value="Labtop">Labtop</option>
                                        <option value="Monitor">Monitor</option>
                                        <option value="Printer">Printer</option>
                                        <option value="Scanner">Mouse</option>
                                        <option value="Keyboard">Keyboard</option>
                                        <option value="IP Phone">IP Phone</option>
                                        <option value="System">System</option>
                                        <option value="Other">Other</option>
                                        </select>
                                        <p class="help-block text-danger"></p>
                                        </div>
                                </div>
                                <div class="row control-group">
                                    <div class="form-group col-xs-12 floating-label-form-group controls">
                                        <label>Message</label>
                                        <textarea rows="5" class="form-control" placeholder="Message" id="messagelab1224" required data-validation-required-message="Please enter a message."></textarea>
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>
                                <br>
                                <div id="successlab1224"></div>
                                <div class="row">
                                    <div class="form-group col-xs-12">
                                        <button type="submit" id="lab1224" class="btn btn-success btn-lg">Send</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ground floor Portfolio Modals lab1222 -->
        <div class="portfolio-modal modal fade" id="lab1222" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-content">
                <div class="close-modal" data-dismiss="modal">
                    <div class="lr">
                        <div class="rl"></div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2">
                            <div class="modal-body">
                                <h2>Lab 1222</h2>
                                <hr class="star-primary">
                               
                            </div>
                            <!-- To configure the contact form email address, go to mail/contact_me.php
                            and update the email address in the PHP file on line 19. -->
                            <!-- The form should work on most web servers, but if the form is not
                            working you may need to configure your web server differently. -->
                            <form id="lab1222" novalidate>
                                <input type="hidden" id="emp_no1222" value="<?php echo $empRow['Emp_no']; ?>">
                                <input type="hidden" id="lab_no1222" value="1222">
                                <input type="hidden" id="ticket_no1222" value="<?php echo $ticket_no; ?>">
                                <input type="hidden" id="first_name1222" value="<?php echo $empRow['First_name']; ?>">
                                <div class="row control-group">
                                    <div class="form-group col-xs-12 floating-label-form-group controls">
                                    <label>Type of service</label>
                                        <select  class="form-control" id="type1222" data-validation-required-message="Please choose the type for the sevice.">
                                        <option value="">Please choose the type for the sevice:</option>
                                        <option value="0">Setup hardware/Software installation</option>
                                        <option value="1">Maintenace</option>
                                        </select>
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>
                               <fieldset>
                                
                                <div class="row control-group">
                                    <div class="form-group col-xs-12 floating-label-form-group controls">
                                     <label>Item of service</label>
                                        <select  class="form-control" id="item1222" data-validation-required-message="Please choose  the the item for the service.">
                                        <option value="">Please choose the item for the sevice:</option>
                                        <option value="Smart board">Smart board</option>
                                        <option value="Project">Project</option>
                                        <option value="Program">Program</option>
                                        <option value="Internet">Internet</option>
                                        <option value="Computer">Computer</option>
                                        <option value="Labtop">Labtop</option>
                                        <option value="Monitor">Monitor</option>
                                        <option value="Printer">Printer</option>
                                        <option value="Scanner">Mouse</option>
                                        <option value="Keyboard">Keyboard</option>
                                        <option value="IP Phone">IP Phone</option>
                                        <option value="System">System</option>
                                        <option value="Other">Other</option>
                                        </select>
                                        <p class="help-block text-danger"></p>
                                        </div>
                                </div>
                                <div class="row control-group">
                                    <div class="form-group col-xs-12 floating-label-form-group controls">
                                        <label>Message</label>
                                        <textarea rows="5" class="form-control" placeholder="Message" id="messagelab1222" required data-validation-required-message="Please enter a message."></textarea>
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>
                                <br>
                                <div id="successlab1222"></div>
                                <div class="row">
                                    <div class="form-group col-xs-12">
                                        <button type="submit" id="lab1222" class="btn btn-success btn-lg">Send</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ground floor Portfolio Modals lab1220 -->
        <div class="portfolio-modal modal fade" id="lab1220" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-content">
                <div class="close-modal" data-dismiss="modal">
                    <div class="lr">
                        <div class="rl"></div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2">
                            <div class="modal-body">
                                <h2>Lab 1220</h2>
                                <hr class="star-primary">
                              
                            </div>
                            <!-- To configure the contact form email address, go to mail/contact_me.php
                            and update the email address in the PHP file on line 19. -->
                            <!-- The form should work on most web servers, but if the form is not
                            working you may need to configure your web server differently. -->
                            <form id="lab1220" novalidate>
                                <input type="hidden" id="emp_no1220" value="<?php echo $empRow['Emp_no']; ?>">
                                <input type="hidden" id="lab_no1220" value="1220">
                                <input type="hidden" id="ticket_no1220" value="<?php echo $ticket_no; ?>">
                                <input type="hidden" id="first_name1220" value="<?php echo $empRow['First_name']; ?>">
                                <div class="row control-group">
                                    <div class="form-group col-xs-12 floating-label-form-group controls">
                                    <label>Type of service</label>
                                        <select  class="form-control" id="type1220" data-validation-required-message="Please choose the type for the sevice.">
                                        <option value="">Please choose the type for the sevice:</option>
                                        <option value="0">Setup hardware/Software installation</option>
                                        <option value="1">Maintenace</option>
                                        </select>
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>
                               <fieldset>
                                
                                <div class="row control-group">
                                    <div class="form-group col-xs-12 floating-label-form-group controls">
                                     <label>Item of service</label>
                                        <select  class="form-control" id="item1220" data-validation-required-message="Please choose  the the item for the service.">
                                        <option value="">Please choose the item for the sevice:</option>
                                        <option value="Smart board">Smart board</option>
                                        <option value="Project">Project</option>
                                        <option value="Program">Program</option>
                                        <option value="Internet">Internet</option>
                                        <option value="Computer">Computer</option>
                                        <option value="Labtop">Labtop</option>
                                        <option value="Monitor">Monitor</option>
                                        <option value="Printer">Printer</option>
                                        <option value="Scanner">Mouse</option>
                                        <option value="Keyboard">Keyboard</option>
                                        <option value="IP Phone">IP Phone</option>
                                        <option value="System">System</option>
                                        <option value="Other">Other</option>
                                        </select>
                                        <p class="help-block text-danger"></p>
                                        </div>
                                </div>
                                <div class="row control-group">
                                    <div class="form-group col-xs-12 floating-label-form-group controls">
                                        <label>Message</label>
                                        <textarea rows="5" class="form-control" placeholder="Message" id="messagelab1220" required data-validation-required-message="Please enter a message."></textarea>
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>
                                <br>
                                <div id="successlab1220"></div>
                                <div class="row">
                                    <div class="form-group col-xs-12">
                                        <button type="submit" id="lab1220" class="btn btn-success btn-lg">Send</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ground floor Portfolio Modals lab1241 -->
        <div class="portfolio-modal modal fade" id="lab1241" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-content">
                <div class="close-modal" data-dismiss="modal">
                    <div class="lr">
                        <div class="rl"></div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2">
                            <div class="modal-body">
                                <h2>Lab 1241</h2>
                                <hr class="star-primary">
                              
                            </div>
                            <!-- To configure the contact form email address, go to mail/contact_me.php
                            and update the email address in the PHP file on line 19. -->
                            <!-- The form should work on most web servers, but if the form is not
                            working you may need to configure your web server differently. -->
                            <form id="lab1241" novalidate>
                                <input type="hidden" id="emp_no1241" value="<?php echo $empRow['Emp_no']; ?>">
                                <input type="hidden" id="lab_no1241" value="1241">
                                <input type="hidden" id="ticket_no1241" value="<?php echo $ticket_no; ?>">
                                <input type="hidden" id="first_name1241" value="<?php echo $empRow['First_name']; ?>">
                                <div class="row control-group">
                                    <div class="form-group col-xs-12 floating-label-form-group controls">
                                    <label>Type of service</label>
                                        <select  class="form-control" id="type1241" data-validation-required-message="Please choose the type for the sevice.">
                                        <option value="">Please choose the type for the sevice:</option>
                                        <option value="0">Setup hardware/Software installation</option>
                                        <option value="1">Maintenace</option>
                                        </select>
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>
                               <fieldset>
                                
                                <div class="row control-group">
                                    <div class="form-group col-xs-12 floating-label-form-group controls">
                                     <label>Item of service</label>
                                        <select  class="form-control" id="item1241" data-validation-required-message="Please choose  the the item for the service.">
                                        <option value="">Please choose the item for the sevice:</option>
                                        <option value="Smart board">Smart board</option>
                                        <option value="Project">Project</option>
                                        <option value="Program">Program</option>
                                        <option value="Internet">Internet</option>
                                        <option value="Computer">Computer</option>
                                        <option value="Labtop">Labtop</option>
                                        <option value="Monitor">Monitor</option>
                                        <option value="Printer">Printer</option>
                                        <option value="Scanner">Mouse</option>
                                        <option value="Keyboard">Keyboard</option>
                                        <option value="IP Phone">IP Phone</option>
                                        <option value="System">System</option>
                                        <option value="Other">Other</option>
                                        </select>
                                        <p class="help-block text-danger"></p>
                                        </div>
                                </div>
                                <div class="row control-group">
                                    <div class="form-group col-xs-12 floating-label-form-group controls">
                                        <label>Message</label>
                                        <textarea rows="5" class="form-control" placeholder="Message" id="messagelab1241" required data-validation-required-message="Please enter a message."></textarea>
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>
                                <br>
                                <div id="successlab1241"></div>
                                <div class="row">
                                    <div class="form-group col-xs-12">
                                        <button type="submit" id="lab1241" class="btn btn-success btn-lg">Send</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ground floor Portfolio Modals lab1239 -->
        <div class="portfolio-modal modal fade" id="lab1239" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-content">
                <div class="close-modal" data-dismiss="modal">
                    <div class="lr">
                        <div class="rl"></div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2">
                            <div class="modal-body">
                                <h2>Lab 1239</h2>
                                <hr class="star-primary">
                              
                            </div>
                            <!-- To configure the contact form email address, go to mail/contact_me.php
                            and update the email address in the PHP file on line 19. -->
                            <!-- The form should work on most web servers, but if the form is not
                            working you may need to configure your web server differently. -->
                            <form id="lab1239" novalidate>
                                <input type="hidden" id="emp_no1239" value="<?php echo $empRow['Emp_no']; ?>">
                                <input type="hidden" id="lab_no1239" value="1239">
                                <input type="hidden" id="ticket_no1239" value="<?php echo $ticket_no; ?>">
                                <input type="hidden" id="first_name1239" value="<?php echo $empRow['First_name']; ?>">
                                <div class="row control-group">
                                    <div class="form-group col-xs-12 floating-label-form-group controls">
                                    <label>Type of service</label>
                                        <select  class="form-control" id="type1239" data-validation-required-message="Please choose the type for the sevice.">
                                        <option value="">Please choose the type for the sevice:</option>
                                        <option value="0">Setup hardware/Software installation</option>
                                        <option value="1">Maintenace</option>
                                        </select>
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>
                               <fieldset>
                                
                                <div class="row control-group">
                                    <div class="form-group col-xs-12 floating-label-form-group controls">
                                     <label>Item of service</label>
                                        <select  class="form-control" id="item1239" data-validation-required-message="Please choose  the the item for the service.">
                                        <option value="">Please choose the item for the sevice:</option>
                                        <option value="Smart board">Smart board</option>
                                        <option value="Project">Project</option>
                                        <option value="Program">Program</option>
                                        <option value="Internet">Internet</option>
                                        <option value="Computer">Computer</option>
                                        <option value="Labtop">Labtop</option>
                                        <option value="Monitor">Monitor</option>
                                        <option value="Printer">Printer</option>
                                        <option value="Scanner">Mouse</option>
                                        <option value="Keyboard">Keyboard</option>
                                        <option value="IP Phone">IP Phone</option>
                                        <option value="System">System</option>
                                        <option value="Other">Other</option>
                                        </select>
                                        <p class="help-block text-danger"></p>
                                         </div>
                                </div>
                                        <div class="row control-group">
                                    <div class="form-group col-xs-12 floating-label-form-group controls">
                                        <label>Message</label>
                                        <textarea rows="5" class="form-control" placeholder="Message" id="messagelab1239" required data-validation-required-message="Please enter a message."></textarea>
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>
                                <br>
                                <div id="successlab1239"></div>
                                <div class="row">
                                    <div class="form-group col-xs-12">
                                        <button type="submit" id="lab1239" class="btn btn-success btn-lg">Send</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- first floor Portfolio Modals lab2062 -->
        <div class="portfolio-modal modal fade" id="lab2062" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-content">
                <div class="close-modal" data-dismiss="modal">
                    <div class="lr">
                        <div class="rl"></div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2">
                            <div class="modal-body">
                                <h2>Lab 2062</h2>
                                <hr class="star-primary">
                            </div>
                            <!-- To configure the contact form email address, go to mail/contact_me.php
                            and update the email address in the PHP file on line 19. -->
                            <!-- The form should work on most web servers, but if the form is not
                            working you may need to configure your web server differently. -->
                            <form id="lab12062" novalidate>
                                <input type="hidden" id="emp_no2062" value="<?php echo $empRow['Emp_no']; ?>">
                                <input type="hidden" id="lab_no2062" value="2062">
                                <input type="hidden" id="ticket_no2062" value="<?php echo $ticket_no; ?>">
                                <input type="hidden" id="first_name2062" value="<?php echo $empRow['First_name']; ?>">
                                <div class="row control-group">
                                    <div class="form-group col-xs-12 floating-label-form-group controls">
                                     <label>Type of service</label>
                                        <select  class="form-control" id="type2062" data-validation-required-message="Please choose the type for the sevice.">
                                        <option value="">Please choose the type for the sevice:</option>
                                        <option value="0">Setup hardware/Software installation</option>
                                        <option value="1">Maintenace</option>
                                        </select>
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>
                               <fieldset>
                                
                                <div class="row control-group">
                                    <div class="form-group col-xs-12 floating-label-form-group controls">
                                     <label>Item of service</label>
                                        <select  class="form-control" id="item2062" data-validation-required-message="Please choose  the the item for the service.">
                                        <option value="">Please choose the item for the sevice:</option>
                                        <option value="Smart board">Smart board</option>
                                        <option value="Project">Project</option>
                                        <option value="Program">Program</option>
                                        <option value="Internet">Internet</option>
                                        <option value="Computer">Computer</option>
                                        <option value="Labtop">Labtop</option>
                                        <option value="Monitor">Monitor</option>
                                        <option value="Printer">Printer</option>
                                        <option value="Scanner">Mouse</option>
                                        <option value="Keyboard">Keyboard</option>
                                        <option value="IP Phone">IP Phone</option>
                                        <option value="System">System</option>
                                        <option value="Other">Other</option>
                                        </select>
                                        <p class="help-block text-danger"></p>
                                        </div>
                                </div>
                                <div class="row control-group">
                                    <div class="form-group col-xs-12 floating-label-form-group controls">
                                        <label>Message</label>
                                        <textarea rows="5" class="form-control" placeholder="Message" id="messagelab2062" required data-validation-required-message="Please enter a message."></textarea>
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>
                                <br>
                                <div id="successlab2062"></div>
                                <div class="row">
                                    <div class="form-group col-xs-12">
                                        <button type="submit" id="lab1262" class="btn btn-success btn-lg">Send</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- first floor Portfolio Modals lab2064 -->
        <div class="portfolio-modal modal fade" id="lab2064" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-content">
                <div class="close-modal" data-dismiss="modal">
                    <div class="lr">
                        <div class="rl"></div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2">
                            <div class="modal-body">
                                <h2>Lab 2064</h2>
                                <hr class="star-primary">
                               
                            </div>
                            <!-- To configure the contact form email address, go to mail/contact_me.php
                            and update the email address in the PHP file on line 19. -->
                            <!-- The form should work on most web servers, but if the form is not
                            working you may need to configure your web server differently. -->
                            <form id="lab12064" novalidate>
                                <input type="hidden" id="emp_no2064" value="<?php echo $empRow['Emp_no']; ?>">
                                <input type="hidden" id="lab_no2064" value="2064">
                                <input type="hidden" id="ticket_no2064" value="<?php echo $ticket_no; ?>">
                                <input type="hidden" id="first_name2064" value="<?php echo $empRow['First_name']; ?>">
                                <div class="row control-group">
                                    <div class="form-group col-xs-12 floating-label-form-group controls">
                                     <label>Type of service</label>
                                        <select  class="form-control" id="type2064" data-validation-required-message="Please choose the type for the sevice.">
                                        <option value="">Please choose the type for the sevice:</option>
                                        <option value="0">Setup hardware/Software installation</option>
                                        <option value="1">Maintenace</option>
                                        </select>
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>
                               <fieldset>
                                
                                <div class="row control-group">
                                    <div class="form-group col-xs-12 floating-label-form-group controls">
                                     <label>Item of service</label>
                                        <select  class="form-control" id="item2064" data-validation-required-message="Please choose  the the item for the service.">
                                        <option value="">Please choose the item for the sevice:</option>
                                        <option value="Smart board">Smart board</option>
                                        <option value="Project">Project</option>
                                        <option value="Program">Program</option>
                                        <option value="Internet">Internet</option>
                                        <option value="Computer">Computer</option>
                                        <option value="Labtop">Labtop</option>
                                        <option value="Monitor">Monitor</option>
                                        <option value="Printer">Printer</option>
                                        <option value="Scanner">Mouse</option>
                                        <option value="Keyboard">Keyboard</option>
                                        <option value="IP Phone">IP Phone</option>
                                        <option value="System">System</option>
                                        <option value="Other">Other</option>
                                        </select>
                                        <p class="help-block text-danger"></p>
                                        </div>
                                </div>
                                <div class="row control-group">
                                    <div class="form-group col-xs-12 floating-label-form-group controls">
                                        <label>Message</label>
                                        <textarea rows="5" class="form-control" placeholder="Message" id="messagelab2064" required data-validation-required-message="Please enter a message."></textarea>
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>
                                <br>
                                <div id="successlab2064"></div>
                                <div class="row">
                                    <div class="form-group col-xs-12">
                                        <button type="submit" id="lab2064" class="btn btn-success btn-lg">Send</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- first floor Portfolio Modals lab2066 -->
        <div class="portfolio-modal modal fade" id="lab2066" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-content">
                <div class="close-modal" data-dismiss="modal">
                    <div class="lr">
                        <div class="rl"></div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2">
                            <div class="modal-body">
                                <h2>Lab 2066</h2>
                                <hr class="star-primary">
                  
                            </div>
                            <!-- To configure the contact form email address, go to mail/contact_me.php
                            and update the email address in the PHP file on line 19. -->
                            <!-- The form should work on most web servers, but if the form is not
                            working you may need to configure your web server differently. -->
                            <form id="lab2066" novalidate>
                                <input type="hidden" id="emp_no2066" value="<?php echo $empRow['Emp_no']; ?>">
                                <input type="hidden" id="lab_no2066" value="2066">
                                <input type="hidden" id="ticket_no2066" value="<?php echo $ticket_no; ?>">
                                <input type="hidden" id="first_name2066" value="<?php echo $empRow['First_name']; ?>">
                                <div class="row control-group">
                                    <div class="form-group col-xs-12 floating-label-form-group controls">
                                     <label>Type of service</label>
                                        <select  class="form-control" id="type2066" data-validation-required-message="Please choose the type for the sevice.">
                                        <option value="">Please choose the type for the sevice:</option>
                                        <option value="0">Setup hardware/Software installation</option>
                                        <option value="1">Maintenace</option>
                                        </select>
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>
                               <fieldset>
                                
                                <div class="row control-group">
                                    <div class="form-group col-xs-12 floating-label-form-group controls">
                                     <label>Item of service</label>
                                        <select  class="form-control" id="item2066" data-validation-required-message="Please choose  the the item for the service.">
                                        <option value="">Please choose the item for the sevice:</option>
                                        <option value="Smart board">Smart board</option>
                                        <option value="Project">Project</option>
                                        <option value="Program">Program</option>
                                        <option value="Internet">Internet</option>
                                        <option value="Computer">Computer</option>
                                        <option value="Labtop">Labtop</option>
                                        <option value="Monitor">Monitor</option>
                                        <option value="Printer">Printer</option>
                                        <option value="Scanner">Mouse</option>
                                        <option value="Keyboard">Keyboard</option>
                                        <option value="IP Phone">IP Phone</option>
                                        <option value="System">System</option>
                                        <option value="Other">Other</option>
                                        </select>
                                        <p class="help-block text-danger"></p>
                                        </div>
                                </div>
                                <div class="row control-group">
                                    <div class="form-group col-xs-12 floating-label-form-group controls">
                                        <label>Message</label>
                                        <textarea rows="5" class="form-control" placeholder="Message" id="messagelab2066" required data-validation-required-message="Please enter a message."></textarea>
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>
                                <br>
                                <div id="successlab2066"></div>
                                <div class="row">
                                    <div class="form-group col-xs-12">
                                        <button type="submit" id="lab2066" class="btn btn-success btn-lg">Send</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- first floor Portfolio Modals lab2068 -->
        <div class="portfolio-modal modal fade" id="lab2068" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-content">
                <div class="close-modal" data-dismiss="modal">
                    <div class="lr">
                        <div class="rl"></div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2">
                            <div class="modal-body">
                                <h2>Lab 2068</h2>

                                <hr class="star-primary">
                                
                            </div>
                            <!-- To configure the contact form email address, go to mail/contact_me.php
                            and update the email address in the PHP file on line 19. -->
                            <!-- The form should work on most web servers, but if the form is not
                            working you may need to configure your web server differently. -->
                            <form id="lab2068" novalidate>
                                <input type="hidden" id="emp_no2068" value="<?php echo $empRow['Emp_no']; ?>">
                                <input type="hidden" id="lab_no2068" value="2068">
                                <input type="hidden" id="ticket_no2068" value="<?php echo $ticket_no; ?>">
                                <input type="hidden" id="first_name2068" value="<?php echo $empRow['First_name']; ?>">
                                <div class="row control-group">
                                    <div class="form-group col-xs-12 floating-label-form-group controls">
                                           <label>Type of service</label>
                                        <select  class="form-control" id="type2068" data-validation-required-message="Please choose the type for the sevice.">
                                        <option value="">Please choose the type for the sevice:</option>
                                        <option value="0">Setup hardware/Software installation</option>
                                        <option value="1">Maintenace</option>
                                        </select>
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>
                               <fieldset>
                                
                                <div class="row control-group">
                                    <div class="form-group col-xs-12 floating-label-form-group controls">
                                     <label>Item of service</label>
                                        <select  class="form-control" id="item2068" data-validation-required-message="Please choose  the the item for the service.">
                                        <option value="">Please choose the item for the sevice:</option>
                                        <option value="Smart board">Smart board</option>
                                        <option value="Project">Project</option>
                                        <option value="Program">Program</option>
                                        <option value="Internet">Internet</option>
                                        <option value="Computer">Computer</option>
                                        <option value="Labtop">Labtop</option>
                                        <option value="Monitor">Monitor</option>
                                        <option value="Printer">Printer</option>
                                        <option value="Scanner">Mouse</option>
                                        <option value="Keyboard">Keyboard</option>
                                        <option value="IP Phone">IP Phone</option>
                                        <option value="System">System</option>
                                        <option value="Other">Other</option>
                                        </select>
                                        <p class="help-block text-danger"></p>
                                        </div>
                                </div>
                                <div class="row control-group">
                                    <div class="form-group col-xs-12 floating-label-form-group controls">
                                        <label>Message</label>
                                        <textarea rows="5" class="form-control" placeholder="Message" id="messagelab2068" required data-validation-required-message="Please enter a message."></textarea>
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>
                                <br>
                                <div id="successlab2068"></div>
                                <div class="row">
                                    <div class="form-group col-xs-12">
                                        <button type="submit" id="lab2068" class="btn btn-success btn-lg">Send</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- first floor Modals lab 2070 -->
        <div class="portfolio-modal modal fade" id="lab2070" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-content">
                <div class="close-modal" data-dismiss="modal">
                    <div class="lr">
                        <div class="rl"></div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2">
                            <div class="modal-body">
                                <h2>Lab 2070</h2>
                                <hr class="star-primary">
                                
                            </div>
                            <!-- To configure the contact form email address, go to mail/contact_me.php
                            and update the email address in the PHP file on line 19. -->
                            <!-- The form should work on most web servers, but if the form is not
                            working you may need to configure your web server differently. -->
                            <form id="lab2070" novalidate>
                                <input type="hidden" id="emp_no2070" value="<?php echo $empRow['Emp_no']; ?>">
                                <input type="hidden" id="lab_no2070" value="2070">
                                <input type="hidden" id="ticket_no2070" value="<?php echo $ticket_no; ?>">
                                <input type="hidden" id="first_name2070" value="<?php echo $empRow['First_name']; ?>">
                                <div class="row control-group">
                                    <div class="form-group col-xs-12 floating-label-form-group controls">
                                           <label>Type of service</label>
                                        <select  class="form-control" id="type2070" data-validation-required-message="Please choose the type for the sevice.">
                                        <option value="">Please choose the type for the sevice:</option>
                                        <option value="0">Setup hardware/Software installation</option>
                                        <option value="1">Maintenace</option>
                                        </select>
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>
                               <fieldset>
                                
                                <div class="row control-group">
                                    <div class="form-group col-xs-12 floating-label-form-group controls">
                                     <label>Item of service</label>
                                        <select  class="form-control" id="item2070" data-validation-required-message="Please choose  the the item for the service.">
                                        <option value="">Please choose the item for the sevice:</option>
                                        <option value="Smart board">Smart board</option>
                                        <option value="Project">Project</option>
                                        <option value="Program">Program</option>
                                        <option value="Internet">Internet</option>
                                        <option value="Computer">Computer</option>
                                        <option value="Labtop">Labtop</option>
                                        <option value="Monitor">Monitor</option>
                                        <option value="Printer">Printer</option>
                                        <option value="Scanner">Mouse</option>
                                        <option value="Keyboard">Keyboard</option>
                                        <option value="IP Phone">IP Phone</option>
                                        <option value="System">System</option>
                                        <option value="Other">Other</option>
                                        </select>
                                        <p class="help-block text-danger"></p>
                                        </div>
                                </div>
                                <div class="row control-group">
                                    <div class="form-group col-xs-12 floating-label-form-group controls">
                                        <label>Message</label>
                                        <textarea rows="5" class="form-control" placeholder="Message" id="messagelab2070" required data-validation-required-message="Please enter a message."></textarea>
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>
                                <br>
                                <div id="successlab2070"></div>
                                <div class="row">
                                    <div class="form-group col-xs-12">
                                        <button type="submit" id="lab2070" class="btn btn-success btn-lg">Send</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- first floor Modals lab 2027 -->
        <div class="portfolio-modal modal fade" id="lab2027" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-content">
                <div class="close-modal" data-dismiss="modal">
                    <div class="lr">
                        <div class="rl"></div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2">
                            <div class="modal-body">
                                <h2>Lab 2027</h2>
                                <hr class="star-primary">
                               
                            </div>
                            <!-- To configure the contact form email address, go to mail/contact_me.php
                            and update the email address in the PHP file on line 19. -->
                            <!-- The form should work on most web servers, but if the form is not
                            working you may need to configure your web server differently. -->
                            <form id="lab2027" novalidate>
                                <input type="hidden" id="emp_no2027" value="<?php echo $empRow['Emp_no']; ?>">
                                <input type="hidden" id="lab_no2027" value="2027">
                                <input type="hidden" id="ticket_no2027" value="<?php echo $ticket_no; ?>">
                                <input type="hidden" id="first_name2027" value="<?php echo $empRow['First_name']; ?>">
                                <div class="row control-group">
                                    <div class="form-group col-xs-12 floating-label-form-group controls">
                                     <label>Type of service</label>
                                        <select  class="form-control" id="type2027" data-validation-required-message="Please choose the type for the sevice.">
                                        <option value="">Please choose the type for the sevice:</option>
                                        <option value="0">Setup hardware/Software installation</option>
                                        <option value="1">Maintenace</option>
                                        </select>
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>
                               <fieldset>
                                
                                <div class="row control-group">
                                    <div class="form-group col-xs-12 floating-label-form-group controls">
                                     <label>Item of service</label>
                                        <select  class="form-control" id="item2027" data-validation-required-message="Please choose  the the item for the service.">
                                        <option value="">Please choose the item for the sevice:</option>
                                        <option value="Smart board">Smart board</option>
                                        <option value="Project">Project</option>
                                        <option value="Program">Program</option>
                                        <option value="Internet">Internet</option>
                                        <option value="Computer">Computer</option>
                                        <option value="Labtop">Labtop</option>
                                        <option value="Monitor">Monitor</option>
                                        <option value="Printer">Printer</option>
                                        <option value="Scanner">Mouse</option>
                                        <option value="Keyboard">Keyboard</option>
                                        <option value="IP Phone">IP Phone</option>
                                        <option value="System">System</option>
                                        <option value="Other">Other</option>
                                        </select>
                                        <p class="help-block text-danger"></p>
                                        </div>
                                </div>
                                <div class="row control-group">
                                    <div class="form-group col-xs-12 floating-label-form-group controls">
                                        <label>Message</label>
                                        <textarea rows="5" class="form-control" placeholder="Message" id="messagelab2027" required data-validation-required-message="Please enter a message."></textarea>
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>
                                <br>
                                <div id="successlab2027"></div>
                                <div class="row">
                                    <div class="form-group col-xs-12">
                                        <button type="submit" id="lab2027" class="btn btn-success btn-lg">Send</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- first floor Modals lab 2029 -->
        <div class="portfolio-modal modal fade" id="lab2029" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-content">
                <div class="close-modal" data-dismiss="modal">
                    <div class="lr">
                        <div class="rl"></div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2">
                            <div class="modal-body">
                                <h2>Lab 2029</h2>
                                <hr class="star-primary">
                                </div>
                            <!-- To configure the contact form email address, go to mail/contact_me.php
                            and update the email address in the PHP file on line 19. -->
                            <!-- The form should work on most web servers, but if the form is not
                            working you may need to configure your web server differently. -->
                            <form id="lab2029" novalidate>
                                <input type="hidden" id="emp_no2029" value="<?php echo $empRow['Emp_no']; ?>">
                                <input type="hidden" id="lab_no2029" value="2029">
                                <input type="hidden" id="ticket_no2029" value="<?php echo $ticket_no; ?>">
                                <input type="hidden" id="first_name2029" value="<?php echo $empRow['First_name']; ?>">
                                <div class="row control-group">
                                    <div class="form-group col-xs-12 floating-label-form-group controls">
                                     <label>Type of service</label>
                                        <select  class="form-control" id="type2029" data-validation-required-message="Please choose the type for the sevice.">
                                        <option value="">Please choose the type for the sevice:</option>
                                        <option value="0">Setup hardware/Software installation</option>
                                        <option value="1">Maintenace</option>
                                        </select>
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>
                               <fieldset>
                                
                                <div class="row control-group">
                                    <div class="form-group col-xs-12 floating-label-form-group controls">
                                     <label>Item of service</label>
                                        <select  class="form-control" id="item2029" data-validation-required-message="Please choose  the the item for the service.">
                                        <option value="">Please choose the item for the sevice:</option>
                                        <option value="Smart board">Smart board</option>
                                        <option value="Project">Project</option>
                                        <option value="Program">Program</option>
                                        <option value="Internet">Internet</option>
                                        <option value="Computer">Computer</option>
                                        <option value="Labtop">Labtop</option>
                                        <option value="Monitor">Monitor</option>
                                        <option value="Printer">Printer</option>
                                        <option value="Scanner">Mouse</option>
                                        <option value="Keyboard">Keyboard</option>
                                        <option value="IP Phone">IP Phone</option>
                                        <option value="System">System</option>
                                        <option value="Other">Other</option>
                                        </select>
                                        <p class="help-block text-danger"></p>
                                        </div>
                                </div>
                                <div class="row control-group">
                                    <div class="form-group col-xs-12 floating-label-form-group controls">
                                        <label>Message</label>
                                        <textarea rows="5" class="form-control" placeholder="Message" id="messagelab2029" required data-validation-required-message="Please enter a message."></textarea>
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>
                                <br>
                                <div id="successlab2029"></div>
                                <div class="row">
                                    <div class="form-group col-xs-12">
                                        <button type="submit" id="lab2029" class="btn btn-success btn-lg">Send</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- first floor Modals lab 2060 -->
        <div class="portfolio-modal modal fade" id="lab2060" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-content">
                <div class="close-modal" data-dismiss="modal">
                    <div class="lr">
                        <div class="rl"></div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2">
                            <div class="modal-body">
                                <h2>Lab 2060</h2>
                                <hr class="star-primary">
                                </div>
                            <!-- To configure the contact form email address, go to mail/contact_me.php
                            and update the email address in the PHP file on line 19. -->
                            <!-- The form should work on most web servers, but if the form is not
                            working you may need to configure your web server differently. -->
                            <form id="lab2060" novalidate>
                                <input type="hidden" id="emp_no2060" value="<?php echo $empRow['Emp_no']; ?>">
                                <input type="hidden" id="lab_no2060" value="2060">
                                <input type="hidden" id="ticket_no2060" value="<?php echo $ticket_no; ?>">
                                <input type="hidden" id="first_name2060" value="<?php echo $empRow['First_name']; ?>">
                                <div class="row control-group">
                                    <div class="form-group col-xs-12 floating-label-form-group controls">
                                    <label>Type of service</label>
                                        <select  class="form-control" id="type2060" data-validation-required-message="Please choose the type for the sevice.">
                                        <option value="">Please choose the type for the sevice:</option>
                                        <option value="0">Setup hardware/Software installation</option>
                                        <option value="1">Maintenace</option>
                                        </select>
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>
                               <fieldset>
                                
                                <div class="row control-group">
                                    <div class="form-group col-xs-12 floating-label-form-group controls">
                                     <label>Item of service</label>
                                        <select  class="form-control" id="item2060" data-validation-required-message="Please choose  the the item for the service.">
                                        <option value="">Please choose the item for the sevice:</option>
                                        <option value="Smart board">Smart board</option>
                                        <option value="Project">Project</option>
                                        <option value="Program">Program</option>
                                        <option value="Internet">Internet</option>
                                        <option value="Computer">Computer</option>
                                        <option value="Labtop">Labtop</option>
                                        <option value="Monitor">Monitor</option>
                                        <option value="Printer">Printer</option>
                                        <option value="Scanner">Mouse</option>
                                        <option value="Keyboard">Keyboard</option>
                                        <option value="IP Phone">IP Phone</option>
                                        <option value="System">System</option>
                                        <option value="Other">Other</option>
                                        </select>
                                        <p class="help-block text-danger"></p>
                                        </div>
                                </div>
                                <div class="row control-group">
                                    <div class="form-group col-xs-12 floating-label-form-group controls">
                                        <label>Message</label>
                                        <textarea rows="5" class="form-control" placeholder="Message" id="messagelab2060" required data-validation-required-message="Please enter a message."></textarea>
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>
                                <br>
                                <div id="successlab2060"></div>
                                <div class="row">
                                    <div class="form-group col-xs-12">
                                        <button type="submit" id="lab2060" class="btn btn-success btn-lg">Send</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- first floor Modals lab 2058 -->
        <div class="portfolio-modal modal fade" id="lab2058" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-content">
                <div class="close-modal" data-dismiss="modal">
                    <div class="lr">
                        <div class="rl"></div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2">
                            <div class="modal-body">
                                <h2>Lab 2058</h2>
                                <hr class="star-primary">
                                
                            </div>
                            <!-- To configure the contact form email address, go to mail/contact_me.php
                            and update the email address in the PHP file on line 19. -->
                            <!-- The form should work on most web servers, but if the form is not
                            working you may need to configure your web server differently. -->
                            <form id="lab2058" novalidate>
                                <input type="hidden" id="emp_no2058" value="<?php echo $empRow['Emp_no']; ?>">
                                <input type="hidden" id="lab_no2058" value="2058">
                                <input type="hidden" id="ticket_no2058" value="<?php echo $ticket_no; ?>">
                                <input type="hidden" id="first_name2058" value="<?php echo $empRow['First_name']; ?>">
                                <div class="row control-group">
                                    <div class="form-group col-xs-12 floating-label-form-group controls">
                                     <label>Type of service</label>
                                        <select  class="form-control" id="type2058" data-validation-required-message="Please choose the type for the sevice.">
                                        <option value="">Please choose the type for the sevice:</option>
                                        <option value="0">Setup hardware/Software installation</option>
                                        <option value="1">Maintenace</option>
                                        </select>
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>
                               <fieldset>
                                
                                <div class="row control-group">
                                    <div class="form-group col-xs-12 floating-label-form-group controls">
                                     <label>Item of service</label>
                                        <select  class="form-control" id="item2058" data-validation-required-message="Please choose  the the item for the service.">
                                        <option value="">Please choose the item for the sevice:</option>
                                        <option value="Smart board">Smart board</option>
                                        <option value="Project">Project</option>
                                        <option value="Program">Program</option>
                                        <option value="Internet">Internet</option>
                                        <option value="Computer">Computer</option>
                                        <option value="Labtop">Labtop</option>
                                        <option value="Monitor">Monitor</option>
                                        <option value="Printer">Printer</option>
                                        <option value="Scanner">Mouse</option>
                                        <option value="Keyboard">Keyboard</option>
                                        <option value="IP Phone">IP Phone</option>
                                        <option value="System">System</option>
                                        <option value="Other">Other</option>
                                        </select>
                                        <p class="help-block text-danger"></p>
                                        </div>
                                </div>
                                <div class="row control-group">
                                    <div class="form-group col-xs-12 floating-label-form-group controls">
                                        <label>Message</label>
                                        <textarea rows="5" class="form-control" placeholder="Message" id="messagelab2058" required data-validation-required-message="Please enter a message."></textarea>
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>
                                <br>
                                <div id="successlab2058"></div>
                                <div class="row">
                                    <div class="form-group col-xs-12">
                                        <button type="submit" id="lab2058" class="btn btn-success btn-lg">Send</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- first floor Modals lab 2019 -->
        <div class="portfolio-modal modal fade" id="lab2019" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-content">
                <div class="close-modal" data-dismiss="modal">
                    <div class="lr">
                        <div class="rl"></div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2">
                            <div class="modal-body">
                                <h2>Lab 2019</h2>
                                <hr class="star-primary">
                               
                            </div>
                            <!-- To configure the contact form email address, go to mail/contact_me.php
                            and update the email address in the PHP file on line 19. -->
                            <!-- The form should work on most web servers, but if the form is not
                            working you may need to configure your web server differently. -->
                            <form id="lab2019" novalidate>
                                <input type="hidden" id="emp_no2019" value="<?php echo $empRow['Emp_no']; ?>">
                                <input type="hidden" id="lab_no2019" value="2019">
                                <input type="hidden" id="ticket_no2019" value="<?php echo $ticket_no; ?>">
                                <input type="hidden" id="first_name2019" value="<?php echo $empRow['First_name']; ?>">
                                <div class="row control-group">
                                    <div class="form-group col-xs-12 floating-label-form-group controls">
                                        <label>Type of service</label>
                                        <select  class="form-control" id="type2019" data-validation-required-message="Please choose the type for the sevice.">
                                        <option value="">Please choose the type for the sevice:</option>
                                        <option value="0">Setup hardware/Software installation</option>
                                        <option value="1">Maintenace</option>
                                        </select>
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>
                               <fieldset>
                                
                                <div class="row control-group">
                                    <div class="form-group col-xs-12 floating-label-form-group controls">
                                     <label>Item of service</label>
                                        <select  class="form-control" id="item2019" data-validation-required-message="Please choose  the the item for the service.">
                                        <option value="">Please choose the item for the sevice:</option>
                                        <option value="Smart board">Smart board</option>
                                        <option value="Project">Project</option>
                                        <option value="Program">Program</option>
                                        <option value="Internet">Internet</option>
                                        <option value="Computer">Computer</option>
                                        <option value="Labtop">Labtop</option>
                                        <option value="Monitor">Monitor</option>
                                        <option value="Printer">Printer</option>
                                        <option value="Scanner">Mouse</option>
                                        <option value="Keyboard">Keyboard</option>
                                        <option value="IP Phone">IP Phone</option>
                                        <option value="System">System</option>
                                        <option value="Other">Other</option>
                                        </select>
                                        <p class="help-block text-danger"></p>
                                        </div>
                                </div>
                                <div class="row control-group">
                                    <div class="form-group col-xs-12 floating-label-form-group controls">
                                        <label>Message</label>
                                        <textarea rows="5" class="form-control" placeholder="Message" id="messagelab2019" required data-validation-required-message="Please enter a message."></textarea>
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>
                                <br>
                                <div id="successlab2019"></div>
                                <div class="row">
                                    <div class="form-group col-xs-12">
                                        <button type="submit" id="lab2019" class="btn btn-success btn-lg">Send</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- first floor Modals lab 2021 -->
        <div class="portfolio-modal modal fade" id="lab2021" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-content">
                <div class="close-modal" data-dismiss="modal">
                    <div class="lr">
                        <div class="rl"></div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2">
                            <div class="modal-body">
                                <h2>Lab 2021</h2>
                                <hr class="star-primary">
                                </div>
                            <!-- To configure the contact form email address, go to mail/contact_me.php
                            and update the email address in the PHP file on line 19. -->
                            <!-- The form should work on most web servers, but if the form is not
                            working you may need to configure your web server differently. -->
                            <form id="lab2021" novalidate>
                                <input type="hidden" id="emp_no2021" value="<?php echo $empRow['Emp_no']; ?>">
                                <input type="hidden" id="lab_no2021" value="2021">
                                <input type="hidden" id="ticket_no2021" value="<?php echo $ticket_no; ?>">
                                <input type="hidden" id="first_name2021" value="<?php echo $empRow['First_name']; ?>">
                                <div class="row control-group">
                                    <div class="form-group col-xs-12 floating-label-form-group controls">
                                     <label>Type of service</label>
                                        <select  class="form-control" id="type2021" data-validation-required-message="Please choose the type for the sevice.">
                                        <option value="">Please choose the type for the sevice:</option>
                                        <option value="0">Setup hardware/Software installation</option>
                                        <option value="1">Maintenace</option>
                                        </select>
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>
                               <fieldset>
                                
                                <div class="row control-group">
                                    <div class="form-group col-xs-12 floating-label-form-group controls">
                                     <label>Item of service</label>
                                        <select  class="form-control" id="item2021" data-validation-required-message="Please choose  the the item for the service.">
                                        <option value="">Please choose the item for the sevice:</option>
                                        <option value="Smart board">Smart board</option>
                                        <option value="Project">Project</option>
                                        <option value="Program">Program</option>
                                        <option value="Internet">Internet</option>
                                        <option value="Computer">Computer</option>
                                        <option value="Labtop">Labtop</option>
                                        <option value="Monitor">Monitor</option>
                                        <option value="Printer">Printer</option>
                                        <option value="Scanner">Mouse</option>
                                        <option value="Keyboard">Keyboard</option>
                                        <option value="IP Phone">IP Phone</option>
                                        <option value="System">System</option>
                                        <option value="Other">Other</option>
                                        </select>
                                        <p class="help-block text-danger"></p>
                                        </div>
                                </div>
                                <div class="row control-group">
                                    <div class="form-group col-xs-12 floating-label-form-group controls">
                                        <label>Message</label>
                                        <textarea rows="5" class="form-control" placeholder="Message" id="messagelab2021" required data-validation-required-message="Please enter a message."></textarea>
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>
                                <br>
                                <div id="successlab2021"></div>
                                <div class="row">
                                    <div class="form-group col-xs-12">
                                        <button type="submit" id="lab2021" class="btn btn-success btn-lg">Send</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- first floor Modals lab 2056 -->
        <div class="portfolio-modal modal fade" id="lab2056" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-content">
                <div class="close-modal" data-dismiss="modal">
                    <div class="lr">
                        <div class="rl"></div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2">
                            <div class="modal-body">
                                <h2>Lab 2056</h2>
                                <hr class="star-primary">
                                
                            </div>
                            <!-- To configure the contact form email address, go to mail/contact_me.php
                            and update the email address in the PHP file on line 19. -->
                            <!-- The form should work on most web servers, but if the form is not
                            working you may need to configure your web server differently. -->
                            <form id="lab2056" novalidate>
                                <input type="hidden" id="emp_no2056" value="<?php echo $empRow['Emp_no']; ?>">
                                <input type="hidden" id="lab_no2056" value="2056">
                                <input type="hidden" id="ticket_no2056" value="<?php echo $ticket_no; ?>">
                                <input type="hidden" id="first_name2056" value="<?php echo $empRow['First_name']; ?>">
                                <div class="row control-group">
                                    <div class="form-group col-xs-12 floating-label-form-group controls">
                                     <label>Type of service</label>
                                        <select  class="form-control" id="type2056" data-validation-required-message="Please choose the type for the sevice.">
                                        <option value="">Please choose the type for the sevice:</option>
                                        <option value="0">Setup hardware/Software installation</option>
                                        <option value="1">Maintenace</option>
                                        </select>
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>
                               <fieldset>
                                
                                <div class="row control-group">
                                    <div class="form-group col-xs-12 floating-label-form-group controls">
                                     <label>Item of service</label>
                                        <select  class="form-control" id="item2056" data-validation-required-message="Please choose  the the item for the service.">
                                        <option value="">Please choose the item for the sevice:</option>
                                        <option value="Smart board">Smart board</option>
                                        <option value="Project">Project</option>
                                        <option value="Program">Program</option>
                                        <option value="Internet">Internet</option>
                                        <option value="Computer">Computer</option>
                                        <option value="Labtop">Labtop</option>
                                        <option value="Monitor">Monitor</option>
                                        <option value="Printer">Printer</option>
                                        <option value="Scanner">Mouse</option>
                                        <option value="Keyboard">Keyboard</option>
                                        <option value="IP Phone">IP Phone</option>
                                        <option value="System">System</option>
                                        <option value="Other">Other</option>
                                        </select>
                                        <p class="help-block text-danger"></p>
                                        </div>
                                </div>
                                <div class="row control-group">
                                    <div class="form-group col-xs-12 floating-label-form-group controls">
                                        <label>Message</label>
                                        <textarea rows="5" class="form-control" placeholder="Message" id="messagelab2056" required data-validation-required-message="Please enter a message."></textarea>
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>
                                <br>
                                <div id="successlab2056"></div>
                                <div class="row">
                                    <div class="form-group col-xs-12">
                                        <button type="submit" id="lab2056" class="btn btn-success btn-lg">Send</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- first floor Modals lab 2054 -->
        <div class="portfolio-modal modal fade" id="lab2054" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-content">
                <div class="close-modal" data-dismiss="modal">
                    <div class="lr">
                        <div class="rl"></div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2">
                            <div class="modal-body">
                                <h2>Lab 2054</h2>
                                <hr class="star-primary">
                               
                            </div>
                            <!-- To configure the contact form email address, go to mail/contact_me.php
                            and update the email address in the PHP file on line 19. -->
                            <!-- The form should work on most web servers, but if the form is not
                            working you may need to configure your web server differently. -->
                            <form id="lab2054" novalidate>
                                <input type="hidden" id="emp_no2054" value="<?php echo $empRow['Emp_no']; ?>">
                                <input type="hidden" id="lab_no2054" value="2054">
                                <input type="hidden" id="ticket_no2054" value="<?php echo $ticket_no; ?>">
                                <input type="hidden" id="first_name2054" value="<?php echo $empRow['First_name']; ?>">
                                <div class="row control-group">
                                    <div class="form-group col-xs-12 floating-label-form-group controls">
                                     <label>Type of service</label>
                                        <select  class="form-control" id="type2054" data-validation-required-message="Please choose the type for the sevice.">
                                        <option value="">Please choose the type for the sevice:</option>
                                        <option value="0">Setup hardware/Software installation</option>
                                        <option value="1">Maintenace</option>
                                        </select>
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>
                               <fieldset>
                                
                                <div class="row control-group">
                                    <div class="form-group col-xs-12 floating-label-form-group controls">
                                     <label>Item of service</label>
                                        <select  class="form-control" id="item2054" data-validation-required-message="Please choose  the the item for the service.">
                                        <option value="">Please choose the item for the sevice:</option>
                                        <option value="Smart board">Smart board</option>
                                        <option value="Project">Project</option>
                                        <option value="Program">Program</option>
                                        <option value="Internet">Internet</option>
                                        <option value="Computer">Computer</option>
                                        <option value="Labtop">Labtop</option>
                                        <option value="Monitor">Monitor</option>
                                        <option value="Printer">Printer</option>
                                        <option value="Scanner">Mouse</option>
                                        <option value="Keyboard">Keyboard</option>
                                        <option value="IP Phone">IP Phone</option>
                                        <option value="System">System</option>
                                        <option value="Other">Other</option>
                                        </select>
                                        <p class="help-block text-danger"></p>
                                        </div>
                                </div>
                                <div class="row control-group">
                                    <div class="form-group col-xs-12 floating-label-form-group controls">
                                        <label>Message</label>
                                        <textarea rows="5" class="form-control" placeholder="Message" id="messagelab2054" required data-validation-required-message="Please enter a message."></textarea>
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>
                                <br>
                                <div id="successlab2054"></div>
                                <div class="row">
                                    <div class="form-group col-xs-12">
                                        <button type="submit" id="lab2054" class="btn btn-success btn-lg">Send</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
       </section>
        <!-- Footer -->
        <section id="Instructions">
            <footer class="text-center">
                <div class="footer-above">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6">
                            <p class="text-left">Instructions!<br>
                            * Kindly forward your request with due proper time.<br>
                            * Kindly take  your backup for your important files first.<br>
                            * Service request(s) will be accepted through email only.<br>
                            * Use separate request form for each service.<br>
                            * All request(s) will be completed on high priority.
                            </p>
                            </div>
                            
                            <div class="col-lg-6">
                              <p class="text-right">!تعليمات<br>
                              .عند الحاجة لتثبيت برنامج يرجى إرسال الطلب مبكراً *<br>
                               . يجب على المستخدم الحرص على أخذ نسخة احتياطية *<br>
                              . يتم استقبال طلبات الخدمة عن طريق البريد الإلكتروني فقط *<br>
                              . سيتم إنجاز الطلبات حسب أولوية العمل *
                              <p>
                            </div>
                      </div>
                    </div>
                </div>
                <div class="footer-below">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">Copyright © King Faisal University 2016</div>
                        </div>
                    </div>
                </div>
            </footer>
        </section>
        
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
        <script src="js/send_ticket.js"></script>
        <!-- Theme JavaScript -->
        <script src="js/freelancer.js"></script>
        <script>
            $('img[usemap]').rwdImageMaps();
        </script>
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
    	
</body>

</html>