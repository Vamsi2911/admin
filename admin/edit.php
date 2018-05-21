<?php
require('db.php');
include("auth.php");

$id=$_REQUEST['id'];
$query = "SELECT * from event where id='".$id."'"; 
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
?>
<?php
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$id=$_REQUEST['id'];
$trn_date = date("Y-m-d H:i:s");
$event_name = strtolower($_REQUEST['event_name']);
$event_overview =str_replace("\n", "<br/>", $_REQUEST['event_overview']);
$event_rules =str_replace("\n", "<br/>", $_REQUEST['event_rules']);
$event_registration = $_REQUEST['event_registration'];
$event_location = $_REQUEST['event_location'];
$other_conditions =$_REQUEST['other_conditions'];
$submittedby = $_SESSION["username"];
$update="update event set event_name='".$event_name."', event_overview='".$event_overview."',event_rules='".$event_rules."',event_registration='".$event_registration."',event_location='".$event_location."', other_conditions='".$other_conditions."', submittedby='".$submittedby."' where id='".$id."'";
mysqli_query($con, $update) or die(mysqli_error());
$status = header("Location: events.php?msg=3"); 
//echo '<p style="color:#FF0000;">'.$status.'</p>';
}else {
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Edit event</title>

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
                    <a class="navbar-brand" href="events.php"> Events --></a><a class="navbar-brand" href="#"> Edit Event</a>
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
                                <h4 class="title">Edit Event</h4>
                                <h5 class="text-success"><b>NOTE : </b> <span class="text-danger">&nbsp;&nbsp;Don't Use Single quote in the text.</span></h5>
                            <div class="content">
                            <div class="container-fluid">
                                <form name="form" method="post" action=""> 
                                <input type="hidden" name="new" value="1" />
                                    <div class="row">
                                       
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Name of the Event</label>
                                                
                                                <input type="text" name="event_name" class="form-control border-input" placeholder="Event Name" required value="<?php echo $row['event_name'];?>"  />
                                                
                                                
                                            </div>
                                             <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Overview of the Event</label>
                                               
                                                <textarea name="event_overview" class="form-control border-input" rows="8" cols="50"><?php echo str_replace("<br/>", "", $row['event_overview']); ?></textarea>
                                            </div>
                                             <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Rules of the Event</label>
                                               
                                                <textarea name="event_rules" class="form-control border-input" rows="8" cols="50"><?php echo str_replace("<br/>", "", $row['event_rules']); ?></textarea>
                                            </div>
                                             <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Registration of the Event</label>
                                                
                                                <input type="text" name="event_registration" class="form-control border-input" placeholder="Registration" required value="<?php echo $row['event_registration'];?>"  />
                                                
                                                
                                            </div>
                                            <div class="form-group">
                                                <label>Event Location</label>
                                                
                                                <input type="text" name="event_location" class="form-control border-input" placeholder="Location" required value="<?php echo $row['event_location'];?>"  />
                                                
                                                
                                            </div>
                                             <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Other Conditions</label>
                                               
                                                <textarea name="other_conditions" class="form-control border-input" rows="8" cols="50"> <?php echo $row['other_conditions'];?> </textarea>
                                            </div>
                                       
                                        
                                    
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label></label>
                                                <input type="text" name="user" value="<?php echo $_SESSION['username']; ?>" style="display: none;" />
                                            </div>
                                        </div>
                                    </div>   <div class="text-center">
                                        <button type="submit" class="btn btn-info btn-fill btn-wd">Update </button>
                                    </div>
                                    <div class="clearfix"></div>

                                  </div></div></div></div>
                                  </form></div>	</div></div></div>	
<?php } ?>

    <?php include("footer.php"); ?>

</body>
</html>
