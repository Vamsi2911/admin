<?php
require('db.php');

session_start();
if ($_SESSION['username']=="") {
    echo "<script>
        location.href='index.php';
    </script>";
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Help Line | Numbers</title>

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
                    <a class="navbar-brand" href="#">Help Line</a>
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
                    <div class="col-md-6">
                                <div class="card">
                                    <div class="header">
                                        <h4 class="title">Numbers</h4><br/>

                                        <div class="row">
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-condensed">
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Number</th>
                                                            <th>Level</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>Bhupathi</td>
                                                            <td>+91 95811 35256</td>
                                                            <td>Level 1</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Babji Sir</td>
                                                            <td>+91 80960 26664</td>
                                                            <td>Level 2</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                    </div>

                    <div class="clearfix"></div>

                    <div class="col-md-6">
                                <div class="card">
                                    <div class="header">
                                        <h4 class="title">Allow Popups</h4><br/>

                                        <label class="label label-danger" style="color: #fff;" >NOTE : This Could be Works in Google Chrome Web Browser</label><br/><br/>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <b>Step : 1</b>
                                                <p>Go to <b>Settings</b> in your Chrome.</p>
                                                <b>Step : 2</b>
                                                <p>Click on <b>Advanced</b> in the Below of the Settings page.</p>
                                                <b>Step : 3</b>
                                                <p>After that See there is <b>( Privacy and Security )</b> and click on the <b>Content Settings.</b></p>
                                                <b>Step : 4</b>
                                                <p>In that <b>Content Settings</b> you see the <b>Popups</b>, clik on it.</p>
                                                <b>Step : 5</b>
                                                <p>Switch <b>Allowed</b> to <b>ON</b></p>
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


<?php
    if (isset($_POST['change'])) {

        $old = mysqli_real_escape_string($con, $_POST['old_pwd']);
        $new = mysqli_real_escape_string($con, $_POST['new_pwd']);
        $confirm = mysqli_real_escape_string($con, $_POST['conf_pwd']);

        if ($_SESSION['hostel_login']=="true") {
            $query = "select * from hostel_login where username='".$_SESSION['username']."' ";
        }
        else {
            $query = "select * from users where username='".$_SESSION['username']."' ";
        }
        
        $result = mysqli_query($con, $query);
        $fetch = mysqli_fetch_assoc($result);

        if ($new==$confirm) {
            if ($fetch['password']==md5($old)) {
                if ($_SESSION['hostel_login']=="true") {
                    $query = "update hostel_login set password='".md5($new)."' where username='".$_SESSION['username']."' ";
                }
                else{
                    $query = "update users set password='".md5($new)."' where username='".$_SESSION['username']."' ";
                }

                $result = mysqli_query($con, $query);
                if ($result) {
                    echo "<script>alert('You can login with your New Password....!'); location.href=''; </script>";    
                }
            }
            else {
                echo "<script>alert('You are Entered Old Password is Wrong....!'); location.href=''; </script>";
            }
        }
        else {
            echo "<script>alert('You are Entered Confirm Password is not same as the New Password....!'); location.href=''; </script>";
        }
    }
?>