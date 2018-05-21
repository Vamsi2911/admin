<?php
    session_start();

    error_reporting(0);

    if ($_SESSION['username']!="" && $_SESSION['userlogin']=="true" && $_SESSION['secure']=="high" && $_SESSION['username']!="thub" && $_SESSION['hostel_login']!="true") {
        echo "<script>
            location.href='dashboard.php';
        </script>";
    }
    else if ($_SESSION['username']!="" && $_SESSION['userlogin']=="true" && $_SESSION['secure']=="high" && $_SESSION['username']=="thub") {
        echo "<script>
            location.href='admin_dashboard.php';
        </script>";
    }
    else if ($_SESSION['username']!="" && $_SESSION['userlogin']=="true" && $_SESSION['secure']=="high" && $_SESSION['hostel_login']=="true") {
        echo "<script>
            location.href='hostel_dashboard.php';
        </script>";
    }
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>

    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Login</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <link href="css/css/font-awesome.min.css" rel="stylesheet" />
</head>
<style>
.wrapper {    
	margin-top: 80px;
	margin-bottom: 20px;
}

.form-signin {
  max-width: 420px;
  padding: 30px 38px 66px;
  margin: 0 auto;
  background-color: #eee;
  border: 3px dotted rgba(0,0,0,0.1);  
  }

.form-signin-heading {
  text-align:center;
  margin-bottom: 30px;
}

.form-control {
  position: relative;
  font-size: 16px;
  height: auto;
  padding: 10px;
}

input[type="text"] {
  margin-bottom: 0px;
  border-bottom-left-radius: 0;
  border-bottom-right-radius: 0;
}

input[type="password"] {
  margin-bottom: 20px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}

.colorgraph {
  height: 7px;
  border-top: 0;
  background: #c4e17f;
  border-radius: 5px;
  background-image: -webkit-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
  background-image: -moz-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
  background-image: -o-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
  background-image: linear-gradient(to right, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
}
</style>

<body>



<div class = "container">
	<div class="wrapper form login">
		<form action="" method="post" name="Login_Form" class="form-signin">       
		    <h3 class="form-signin-heading">Welcome Back! Please Sign In</h3>
			  <hr class="colorgraph"><br>
			  
			  <input type="text" class="form-control" name="username" placeholder="Username" autocomplete="off" required="" autofocus="" />
			  <input type="password" class="form-control" name="password" placeholder="Password" required=""/>     		  
			 
			  <button class="btn btn-lg btn-primary btn-block"  name="submit" value="Login" type="Submit">Login</button>  			
		</form>			
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


<?php
    require('db.php');
    // If form submitted, insert values into the database.
    if (isset($_POST['submit'])){
        
        $username = mysqli_real_escape_string($con,$_POST['username']); //escapes special characters in a string
        $password = mysqli_real_escape_string($con,$_POST['password']);
        
        //Checking if the user is existing in the database and in Users table or not
        $query = "SELECT * FROM `users` WHERE username='".$username."' and password='".md5($password)."'";
        //echo $query;
        $result = mysqli_query($con,$query);
        $rows = mysqli_num_rows($result);


        //Checking if the user is existing in the database and in hostel_login table or not
        $hostel_query = "SELECT * FROM `hostel_login` WHERE username='".$username."' and password='".md5($password)."'";
        //echo $query;
        $hostel_result = mysqli_query($con,$hostel_query);
        $hostel_rows = mysqli_num_rows($hostel_result);

        if($rows>0){
            $_SESSION['username'] = $username;
            $_SESSION['userlogin'] = "true";
            $_SESSION['secure'] = "high";
            
            if ($_SESSION['username']=='thub') {
                echo "<script>location.href='admin_dashboard.php';</script>"; // Redirect user to dashboard.php    
            }
            else {
                echo "<script>location.href='dashboard.php';</script>"; // Redirect user to dashboard.php
            }
        }
        else if ($hostel_rows>0) {
            $_SESSION['username'] = $username;
            $_SESSION['hostel_login'] = "true";

            echo "<script>location.href='hostel_dashboard.php';</script>";
        }
        else{
           echo "<script>alert('You are Entered Details was wrong....!'); location.href='index.php'; </script>"; // Redirect user to index.php
        }
    }

?>
