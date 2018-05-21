<?php
require('db.php');
include("auth.php");

$id=$_REQUEST['id'];
$query = "SELECT * from ordinator where id='".$id."'"; 
$result1 = mysqli_query($con, $query) or die ( mysqli_error()); 
$row1 = mysqli_fetch_assoc($result1);
?>
<?php
$status = "";
if(isset($_POST['co']) && $_POST['co']==1)
{
$id=$_REQUEST['id'];

$fname =$_REQUEST['fname'];

$fno =$_REQUEST['fno'];

$femail =$_REQUEST['femail'];

$ftype = $_REQUEST['ftype'];

$submittedby = $_SESSION["username"];
$update="update ordinator set fname='".$fname."' , fno='".$fno."', femail='".$femail."', ftype='".$ftype."', submittedby='".$submittedby."' where id='".$id."'";
mysqli_query($con, $update) or die(mysqli_error());
$status = header("Location: ordinators.php?msg=3"); 
echo '<p style="color:#FF0000;">'.$status.'</p>';
}else {
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Edit Co-Ordinator</title>

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
                    <a class="navbar-brand" href="ordinators.php"> Dept. Co-ordinator --></a><a class="navbar-brand" href="#"> Edit</a>
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
                                <h4 class="title">Edit  Dept. Co-ordinator</h4>
                            <div class="content">
                            <div class="container-fluid">
                                <form name="form" method="post" action=""> 
                                <input type="hidden" name="co" value="1" />
                                    <div class="row">
                                    	 </div>
                                        
 										<div class="col-md-6s">
                                            <div class="form-group">
                                                <label></label>
                                                
                                                <input name="id" type="hidden" value="<?php echo $row1['id'];?>"  />
                                               
                                            </div>
                                            </div>

                                             <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Name of the  Co-Ordinate</label>
                                                <input type="text" name="fname"  class="form-control border-input" placeholder="Event Name" required id="fname" value="<?php echo $row1['fname'];?>">
                                               
                                            </div>
                                            </div>

                                              <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Mobile Number of the  Co-Ordinate</label>
                                                
                                                <input type="text" name="fno"  class="form-control border-input" placeholder="Event Name" required id="fno" value="<?php echo $row1['fno'];?>">
                                               
                                            </div>
                                             <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Email of the  Co-Ordinate</label>
                                                
                                                <input type="email" name="femail"  class="form-control border-input" placeholder="Event Name" required id="femail" value="<?php echo $row1['femail'];?>">
                                               
                                            </div></div>

                                             <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Type of the Co-Ordinate</label>
                                                    <select name="ftype" class="form-control border-input" required>
                                                        <option value="">Select Co-ordinator Type</option>
                                                        <option value="Faculty Co-Ordinator" <?php if ($row1['ftype']=="Faculty Co-Ordinator") echo "selected"; ?>>Faculty Co-Ordinator</option>
                                                        <option value="Student Co-Ordinator" <?php if ($row1['ftype']=="Student Co-Ordinator") echo "selected"; ?>>Student Co-Ordinator</option>
                                                    </select>
                                                </div>
                                            </div>


                                              <div class="text-center">
                                        <button type="submit" class="btn btn-info btn-fill btn-wd">Update </button>
                                    </div></div>
                                    <div class="clearfix"></div>
                                    </form>
                                    </div>	
                                    </div>
                                    </div>
                                    </div>



		
<?php } ?>


    <?php include("footer.php");  ?>


</body>

</html>
