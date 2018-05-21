<?php
require('db.php');

	session_start();
    if ($_SESSION['username']!="" && $_SESSION['username']=="thub" && $_SESSION['userlogin']=='true' && $_SESSION['secure']=="high") {
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Create New User</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!-- stylesheet -->
    <link rel="stylesheet" href="css/style.css" />

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
                    <a class="navbar-brand" href="#">New User Creation</a>
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
                                        <h4 class="title">New User Details</h4><br/>

                                        <div class="row">
											<div class="form">
											<form name="registration" action="" method="post">
												<input type="text" name="username" class="form-control" placeholder="Username" required autocomplete="off" autofocus /><br/>
												<input type="email" name="email" class="form-control" placeholder="Email" required autocomplete="off" /><br/>
												<input type="password" name="password" class="form-control" placeholder="Password" required /><br/>
												<input type="password" name="re_password" class="form-control" placeholder="Re-enter Password" required /><br/>
												<input type="submit" name="submit" value="Register" />
											</form>
											<br /><br />
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
    // If form submitted, insert values into the database.
    if (isset($_POST['submit'])){
		$username = mysqli_real_escape_string($con, stripslashes($_POST['username']));
		$email = mysqli_real_escape_string($con, stripslashes($_POST['email']));
		$password = mysqli_real_escape_string($con,stripslashes($_POST['password']));
		$re_password = mysqli_real_escape_string($con,stripslashes($_POST['re_password']));

		if ($password==$re_password) {
			$trn_date = date("Y-m-d H:i:s");
	        $query = "INSERT into `users` (username, password, email, trn_date) VALUES ('$username', '".md5($password)."', '$email', '$trn_date')";
	        $result = mysqli_query($con,$query);
	        if($result){
	            echo "<script>alert('New User Registered Successfully....!'); location.href=''; </script>";
	        }			
		}
		else{
			echo "<script>alert('Enter the Same Password in Re-enter Password....!'); </script>";
		}
    }


}
else {
	echo "<script>location.href='index.php'; </script>";
	} ?>