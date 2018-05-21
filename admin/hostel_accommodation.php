<?php
require('db.php');
    session_start();

    if (isset($_SESSION['username']) && $_SESSION['hostel_login']=='true') {
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Hostel Accomodation</title>

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
    <!--<link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">-->
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/themify-icons.css" rel="stylesheet">


    <!-- jQuery library -->
    <script src="js/jquery/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->

    <!--- Data Tables -->
    <link rel="stylesheet" type="text/css" href="css/datatables/jquery.dataTables.min.css"/>
    <link rel="stylesheet" type="text/css" href="css/datatables/buttons.dataTables.min.css"/> 
    <!--<script type="text/javascript" src="https://cdn.datatables.net/v/bs-3.3.7/jqc-1.12.4/dt-1.10.15/datatables.min.js"></script>-->

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
                    <a class="navbar-brand" href="#">Hostel Accommodation</a>
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

            <div class="container">
                <label class="label label-danger" style="color: #fff; font-size: 13px;">NOTE : If you want to generate the Receipt Please Switch On / Allow the Popups in your Browser. <a href="helpline.php" style="color: rgb(204, 226, 31); font-size: 15px;">Click to Allow....!</a></label>
            </div>

        <div class="content">
            <div class="col-md-12">
                <div class="card col-md-8">
                    <div class="header">
                        <h4 class="title">Accommodation</h4><br/>
                    </div>

                    <div class="row">
                        <form method="post">
                            <div class="content">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Student Id / Roll No.</label>
                                        <input type="text" id="roll" name="roll" class="form-control border-input" required autocomplete="off" autofocus oninput="loaddata();"  onblur="loaddata();">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Student Name</label>
                                        <input type="text" id="name" name="name" class="form-control border-input" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>College</label>
                                        <input type="text" id="college" name="college" class="form-control border-input" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Mobile</label>
                                        <input type="text" name="mobile" id="mobile" class="form-control border-input" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" id="email" name="email" class="form-control border-input" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                        <label>Gender</label><br/>
                                        <div class="col-md-6">
                                            <input type="radio" name="gender" value="Male" required>
                                            <label>Male</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="radio" name="gender" value="Female" required>
                                            <label>Female</label>
                                        </div>
                                </div><div class="clearfix"></div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Location</label>
                                        <input type="text" name="location" id="location" class="form-control border-input" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>fee</label>
                                        <input type="text" name="fee" id="fee"  class="form-control border-input" placeholder="fee" required="" />                                         
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 text-center">
                                <button class="btn btn-info btn-fill btn-wd" name="submit">Submit</button>
                            </div>
                        </form>
                    </div><br/>
                </div>
            </div>

            <?php include("footer.php"); ?>
        </div>
    </div>


    <p id="ajax-load" style="display: none;"></p>
    <a href="hostel_receipt/" id="new_tab_print" target="new" style="display: none;"></a>


    


    <!-- Datatables -->
    <script src="js/datatables/jquery.dataTables.min.js"></script>
    <script src="js/datatables/dataTables.buttons.min.js"></script>
    <script src="js/datatables/buttons.flash.min.js"></script>
    <script src="js/datatables/jszip.min.js"></script>
    <script src="js/datatables/pdfmake.min.js"></script>
    <script src="js/datatables/vfs_fonts.js"></script>
    <script src="js/datatables/buttons.html5.min.js"></script>
    <script src="js/datatables/buttons.print.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#datatable').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            } );
        } );

        // phone number validation
        $("#mobile").keyup(function() {
            $("#mobile").val(this.value.match(/[0-9]*/));
        });

        // fee number validation
        $("#fee").keyup(function() {
            $("#fee").val(this.value.match(/[0-9]*/));
        });

        
        //load data function
        function loaddata(){
            //load data
            $("#ajax-load").load('load_data.php?action=data&pin='+roll.value);
        }
    </script>

</body>

</html>

<?php
    if (isset($_POST['submit'])) {
        $roll = mysqli_real_escape_string($con, $_POST['roll']);
        $name = mysqli_real_escape_string($con, $_POST['name']);
        $college = mysqli_real_escape_string($con, $_POST['college']);
        $mobile = mysqli_real_escape_string($con, $_POST['mobile']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        //$dept = mysqli_real_escape_string($con, $_POST['dept']);
        //$event_category = mysqli_real_escape_string($con, $_POST['event_category']);
        //$event_name = mysqli_real_escape_string($con, $_POST['event_name']);
        $location = mysqli_real_escape_string($con, $_POST['location']);
        $gender = $_POST['gender'];
        //$team = mysqli_real_escape_string($con, $_POST['team']);
        //$team_size = mysqli_real_escape_string($con, $_POST['team_size']);
        $fee = mysqli_real_escape_string($con, $_POST['fee']);

        $query = "insert into hostel_accommodation set student_code='".$roll."', student_name='".$name."', college='".$college."',location='".$location."', gender='".$gender."', mobile='".$mobile."', email='".$email."', fee='".$fee."', added_by='".$_SESSION['username']."' ";
        $result = mysqli_query($con, $query);

        if ($result) {
            $lastid = mysqli_insert_id($con);
            $_SESSION['hid'] = $lastid;

             //**********************************************//
            //              Generating Receipt Id           //
           //*********************************************//

            $start = "HSTL";
            $end = rand(100,999);

            // total receipt id
            $receipt_id = $start.$end.$lastid;

            $re_result = mysqli_query($con, "update hostel_accommodation set receipt_id='".$receipt_id."' where id='".$lastid."' ");

            if ($re_result) {
                echo "
                    <script>
                        alert('Receipt generated Successfully....');
                        //location.href='print/';
                        document.getElementById('new_tab_print').click();
                    </script>";
            }
        }
    }
?>


<?php
}
else {
    echo "<script>location.href='index.php'; </script>";
}
?>