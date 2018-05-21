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

    <title>Registered Students</title>

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
                    <a class="navbar-brand" href="#">Hostel Registrations students</a>
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
            <div class="col-md-12">

            <div class="row">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Pre-Registered Students List</h4><br/>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped" id="datatable" style="background-color: #fff;">
                                    <thead align="center">
                                        <tr>
                                            <th>S.No</th>
                                            <th>Date</th>
                                            <th>Roll No.</th>
                                            <th>Student Name</th>
                                            <th>College</th>
                                            <th>Location</th>
                                            <th>Mobile Number</th>
                                            <th>Email</th>
                                            <th>Dept.</th>
                                            <th>Event</th>
                                            <th>Accommodation</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                            $count = 1;
                                            $sel_query = "Select * from event_register where regacc = 'Yes' ORDER BY id desc;";
                                            $result1 = mysqli_query($con,$sel_query);

                                        while($row1 = mysqli_fetch_assoc($result1)) { ?>
                                        <tr>
                                            <td><?php echo $count; ?></td>
                                            <td><?php echo $row1["reg_Date"]; ?></td>
                                            <td><?php echo $row1["regroll"]; ?></td>
                                            <td><?php echo $row1["regname"]; ?></td>
                                            <td><?php echo $row1["regclg"]; ?></td>
                                            <td><?php echo $row1["regloc"]; ?></td>
                                            <td><?php echo $row1["regph"]; ?></td>
                                            <td><?php echo $row1["regmail"]; ?></td>
                                            <td><?php echo $row1["regcategory"]; ?></td>
                                            <td><?php echo $row1["regevent"]; ?></td>
                                            <td><?php echo $row1["regacc"]; ?></td>
                                        </tr>
                                        <?php $count++; } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                </div>
            </div>

            <?php include("footer.php"); ?>
        </div>
    </div>


    


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
    </script>

</body>

</html>

<?php
}
else {
    echo "<script>location.href='index.php'; </script>";
}
?>