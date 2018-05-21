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

    <title>Change PWD</title>

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
                    <a class="navbar-brand" href="#">Change Password</a>
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
                    <div class="col-md-5">
                                <div class="card">
                                    <div class="header">
                                        <h4 class="title">Change Password</h4><br/>

                                        <div class="row">

                                        <form method="post">

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Old Password</label>
                                                    <input type="password" name="old_pwd" id="old_pwd"  class="form-control border-input" placeholder="Old Password" required="" />
                                                   
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>New Password</label>
                                                    <input type="password" name="new_pwd" id="new_pwd"  class="form-control border-input" placeholder="New Password" required="" />
                                                   
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Confirm New Password</label>
                                                    <input type="password" name="conf_pwd" id="conf_pwd"  class="form-control border-input" placeholder="Confirm Password" required="" />
                                                   
                                                </div>
                                            </div>


                                            <div class="col-md-12">
                                                    <button type="submit" name="change" class="btn btn-info btn-fill btn-wd">Change</button><br/><br/>
                                            </div>

                                        </form>

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