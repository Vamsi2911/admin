
<?php 
require('db.php');
include("auth.php");

$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$about =$_REQUEST['about'];
$submittedby = $_SESSION["username"];
$ins_query="insert into about (`about`,`submittedby`) values ('$about','$submittedby')";
mysqli_query($con,$ins_query);
$status = header("Location: about_dept.php?msg=1");
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
                    <a class="navbar-brand" href="about_dept.php"> About Dept. --> </a><a class="navbar-brand" href="#"> Add About Dept.</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
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
                                <h4 class="title">About Dept.</h4>
                            </div>
                            <div class="content">
                                <form name="form" method="post" action=""> 
                                <input type="hidden" name="new" value="1" />
                                    <div class="row">
                                       
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Discription</label>
                                                <textarea name="about" id="about" class="form-control border-input" placeholder="Description of the About Dept" rows="5" required></textarea>
                                            </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label></label>
                                                <input type="text" name="user" value="<?php echo $_SESSION['username']; ?>" style="display: none;" />
                                            </div>
                                        </div>
                                    </div>   <div class="text-center">
                                        <button type="submit" class="btn btn-info btn-fill btn-wd">Add </button>
                                    </div>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>


                </div>
 
        <?php include("footer.php"); ?>

    </div>
</div>


</body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
    <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

    <!--  Checkbox, Radio & Switch Plugins -->
    <script src="assets/js/bootstrap-checkbox-radio.js"></script>

    <!--  Charts Plugin -->
    <script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

    <!-- Paper Dashboard Core javascript and methods for Demo purpose -->
    <script src="assets/js/paper-dashboard.js"></script>

    <!-- Paper Dashboard DEMO methods, don't include it in your project! -->
    <script src="assets/js/demo.js"></script>


</html>
