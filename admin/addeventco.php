<?php
require('db.php');
include("auth.php");

$status1 = "";
if(isset($_POST['co']) && $_POST['co']==1)
{
$fname =$_REQUEST['fname'];
$fno =$_REQUEST['fno'];
$femail =$_REQUEST['femail'];
$ftype =$_REQUEST['ftype'];
$submittedby = $_SESSION["username"];
$ins_query="insert into ordinator (`fname`,`fno`,`femail`,`ftype`,`submittedby`) values ('$fname','$fno','$femail','$ftype','$submittedby')";
$r = mysqli_query($con,$ins_query);
    if ($r) {
        header("Location: ordinators.php?msg=1");    
    }
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

<?php 
    include("aside_menu.php"); ?>
?>

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
                    <a class="navbar-brand" href="ordinators.php">Dept. Co-ordinator --></a><a class="navbar-brand" href="#" > Add Dept. Co-ordinater</a>
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
        <?php
                $user=$_SESSION['username'];
                ?>

         <div class="content">
                        
                    <div class="col-lg-8 col-md-7">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Add Dept. Co-ordinator</h4>
                            </div>
                            <div class="content">
                                <form name="form" method="post" action=""> 
                                <input type="hidden" name="co" value="1" />
                                    <div class="row">
                                    <!--
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Name of the Event</label>
                                               <select  name="name" id="name"  class="form-control border-input" placeholder="Event Name" required="" >
                                               <option value="">Select Event Name</option>
                                                <?php
                $count=1;
                //$sel_query="Select * from event where submittedby='$user' ORDER BY id desc;";
                //$result = mysqli_query($con,$sel_query);
                //$rows = mysqli_num_rows($result);
                if ($rows>0) {
                while($row = mysqli_fetch_assoc($result)) { ?>
               <option value="<?php echo $row["event_name"]; ?>"><?php echo $row["event_name"]; ?></option>
               <?php $count++; } } else {
                ?>
               <option value="">No Events Found</option>
               <?php
                } ?>
               </select>
                                            </div>
                                        </div>-->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Name of Co-ordinator</label>
                                                <input type="text" name="fname" id="fname"  class="form-control border-input" placeholder="Name of Co-ordinator" required="" />
                                                
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Mobile Number of Co-Ordinator </label>
                                               <input type="text" name="fno" id="fno"  class="form-control border-input" placeholder="Mobile Number of Co-Ordinator" required="" />
                                            </div>
                                        </div>
                                   
                                      <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email address</label>
                                                <input type="email" name="femail" class="form-control border-input" placeholder="Email">
                                            </div>
                                        </div>
                                         <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Select Co-ordinator type</label>
                                               <select name="ftype" class="form-control border-input" required>
                                               <option value="">Select Co-ordinator Type</option>
                                                <option value="Faculty Co-Ordinator">Faculty Co-Ordinator</option>
                                                <option value="Student Co-Ordinator">Student Co-Ordinator</option>
                                            </select>
                                            </div>
                                        </div>
                                    
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label></label>
                                                <input type="text" name="user" value="<?php echo $_SESSION['username']; ?>" style="display: none;" />
                                            </div>
                                        </div>
                                    </div>   <div class="text-center">
                                        <button type="submit" class="btn btn-info btn-fill btn-wd">Add Co-Ordinator</button>
                                    </div>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>

                                  
        <?php include("footer.php"); ?>



    </div>
</div>


</body>

</html>
