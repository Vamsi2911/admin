<?php
require('db.php');
include("auth.php");

$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$event_name = strtolower($_REQUEST['event_name']);
$event_overview = str_replace("\n", "<br/>", $_REQUEST['event_overview']);
$event_rules = str_replace("\n", "<br/>", $_REQUEST['event_rules']);
$event_registration =$_REQUEST['event_registration'];
$other_conditions =$_REQUEST['other_conditions'];
$event_location = $_REQUEST['event_location'];
$submittedby = $_SESSION["username"];
$ins_query="insert into event (`event_name`,`event_overview`,`event_rules`,`event_registration`,`other_conditions`,`event_location`,`submittedby`) values ('$event_name','$event_overview','$event_rules','$event_registration','$other_conditions','$event_location','$submittedby')";
mysqli_query($con,$ins_query);
$status = header("Location: events.php?msg=1");

if ($ins_query) {
    echo "<script>location.href='events.php?msg=1'; </script>";
}
}
?>



<?php 
//require('db.php');
$status1 = "";
if(isset($_POST['co']) && $_POST['co']==1)
{
$name =$_REQUEST['name'];
$fname =$_REQUEST['fname'];
$fno =$_REQUEST['fno'];
$femail =$_REQUEST['femail'];
$ftype =$_REQUEST['ftype'];
$submittedby = $_SESSION["username"];
$ins_query="insert into ordinator (`name`,`fname`,`fno`,`femail`,`ftype`,`submittedby`) values ('$name','$fname','$fno','$femail','$ftype','$submittedby')";
mysqli_query($con,$ins_query);
$status1 = header("Location: addeventco.php"); 
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Dashboard</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Paper Dashboard core CSS    -->
    <link href="assets/css/paper-dashboard.css" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />


    <!--  Fonts and icons     -->
    <link href="css/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/themify-icons.css" rel="stylesheet">

</head>
<body>

<div class="wrapper">

    <?php include("aside_menu.php"); ?>

    <div class="main-panel">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar bar1"></span>
                        <span class="icon-bar bar2"></span>
                        <span class="icon-bar bar3"></span>
                    </button>
                    <a class="navbar-brand" href="events.php">Events --> </a><a class="navbar-brand" href="#">Add Event</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                       <!--  <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="ti-panel"></i>
                                <p>Stats</p>
                            </a>
                        </li>
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="ti-bell"></i>
                                    <p class="notification">5</p>
                                    <p>Notifications</p>
                                    <b class="caret"></b>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="#">Notification 1</a></li>
                                <li><a href="#">Notification 2</a></li>
                                <li><a href="#">Notification 3</a></li>
                                <li><a href="#">Notification 4</a></li>
                                <li><a href="#">Another notification</a></li>
                              </ul>
                        </li> -->
                         <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="ti-user"></i>
                                    
                                    <p>Hello <b><?php echo $_SESSION['username']; ?></b> !</p>
                                    <b class="caret"></b>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="logout.php">Logout</a></li>
                                
                              </ul>
                        </li>
                        
                    </ul>

                </div>
            </div>
        </nav>


      <div class="content">
                        
                    <div class="col-lg-8 col-md-7">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Add Event</h4>
                                <h5 class="text-success"><b>NOTE : </b> <span class="text-danger">&nbsp;&nbsp;Don't Use Single quote in the text.</span></h5>
                            </div>
                            <div class="content">
                                <form name="form" method="post" action=""> 
                                <input type="hidden" name="new" value="1" />
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Name of the Event</label>
                                                <input type="text" name="event_name" id="event_name"  class="form-control border-input" placeholder="Event Name" required="" />
                                               
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Overview</label>
                                                <textarea name="event_overview" class="form-control border-input"  id="event_overview"  rows="5" placeholder="Event Overview" ></textarea>
                                                
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Rules and Regulations</label>
                                               <textarea name="event_rules" id="event_rules"  class="form-control border-input" rows="5" placeholder="Event Rules and Regulations" ></textarea>
                                            </div>
                                        </div>
                                    </div>
                                      <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Registration</label>
                                                <input type="text" class="form-control border-input" placeholder="Event Registration" name="event_registration" id="event_registration"/>
                                               
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Location / Venue</label>
                                                <input type="text" class="form-control border-input" placeholder="Event location" name="event_location" id="event_location"/>
                                               
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Other Conditions</label>
                                                <textarea name="other_conditions" class="form-control border-input" id="other_conditions" rows="5" placeholder="Other Conditions"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label></label>
                                                <input type="text" name="user" value="<?php echo $_SESSION['username']; ?>" style="display: none;" />
                                            </div>
                                        </div>
                                    </div>

                                  

                                   
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-info btn-fill btn-wd">Add Event</button>
                                    </div>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>


        <?php include("footer.php");  ?>


    </div>
</div>


</body>
</html>
