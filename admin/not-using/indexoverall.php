<?php
require('db.php');
include("auth.php"); //include auth.php file on all secure pages ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Welcome Home</title>

<link rel="stylesheet" href="css/new.css" />

<style>
body {
    margin: 0;
}

ul {
    list-style-type: none;
    margin: 0;
    margin-top: -20px;
    padding: 0;
    width: 9%;
    background-color: #f1f1f1;
    position: fixed;
    height: 100%;
    overflow: auto;
    color: #9F2839;
}

li a {
    display: block;
    color: #000;
    padding: 8px 16px;
    text-decoration: none;
}

li a.active {
    background-color: #32B7FA;
    color: white;
}

li a:hover:not(.active) {
    background-color: #555;
    color: white;
}

 .dropbtn {
    display: inline-block;
    color: ;
    text-align: left;
    width: 200%;
    text-decoration: none;
}

li a:hover, .dropdown:hover .dropbtn {
    background-color: #555555;
}

.dropdown {
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    text-align: left;
}

.dropdown-content a:hover {background-color: #f1f1f1}

.dropdown:hover .dropdown-content {
    display: block;
}
</style>
<!--Bootstrap --> 

<!--/Bootstrap -->
</head>
<body>

<ul>
  <li><a class="active" href="index.php">Home</a></li>
  <li class="dropdown">
    <a href="javascript:void(0)" class="dropbtn">Event</a>
    <div class="dropdown-content">
      <a href="#">Add New Event</a>
      <a href="#">Add About Event</a>
      <a href="#">Link 3</a>
    </div>
  </li>
  <li><a href="#about">About</a></li>
  <li><a href="#co">co-ordinator</a></li>
  <li><a href="logout.php">Logout</a></li>
</ul>
<div class="form"> 
<h1>Welcome <?php echo $_SESSION['username']; ?>!</h1>
<!-- <h2><a href="dashboard.php">Dashboard</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="logout.php">Logout</a></h2> -->



<?php
$user=$_SESSION['username'];
?>

<div class="form">
<h2 ><a href="index.php">Home</a> | <a href="insert.php">Add New Event</a> | <a href="logout.php">Logout</a></h2>
<br /><br /><br /><br />
<h1>View Events &nbsp;<a href="insert.php"> <img src="icons/add.png" title="Add Event" width="25" height="25"></a></h1>
<table class="container">
<thead>
<tr><th><strong>Id</strong></th><th><strong>Event Name</strong></th><th><strong>Event Overview</strong></th><th><strong>Event Rules</strong></th><th><strong>Important Dates</strong></th><th><strong>Selection Process</strong></th><th><strong>Edit</strong></th><th><strong>Delete</strong></th></tr>
</thead>
<tbody>
<?php
$count=1;
$sel_query="Select * from event where submittedby='$user' ORDER BY id desc;";
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr><td align="center" ><?php echo $count; ?></td><td align="center"><?php echo $row["event_name"]; ?></td><td align="center"><?php echo $row["event_overview"]; ?></td><td align="center"><?php echo $row["event_rules"]; ?></td><td align="center"><?php echo $row["event_dates"]; ?></td><td align="center"><?php echo $row["event_selection"]; ?></td><td align="center"><a href="edit.php?id=<?php echo $row["id"]; ?>"><img src="icons/edit.png" title="Edit" width="16" height="16"></a></td><td align="center"><a href="delete.php?id=<?php echo $row["id"]; ?>"><img src="icons/trash.png" title="Delete" width="25" height="25"></a></td></tr>
<?php $count++; } ?>
</tbody>
</table>

<br /><br /><br /><br />
</div>


<!--Co-Ordinators -->

<div id="ordinator" >
	<h1>Co-ordinators  of Event<a href="about.php"> <img src="icons/add.png" title="About" width="25" height="25"></a></h1>
	<table  class="container">
<thead>
<tr><th><strong>ID</strong></th><th>  <strong>Event Name</strong></th><th>  <strong>Name</strong></th><th><strong>Mobile Number</strong></th><th><strong>Email</strong></th><th><strong>Type</strong></th><th>  <strong>Edit</strong></th><th>  <strong>Delete</strong></th>
<tbody>
<?php
$count=1;
$sel_query="Select * from ordinator where submittedby='$user' ORDER BY id desc;";
$result1 = mysqli_query($con,$sel_query);
while($row1 = mysqli_fetch_assoc($result1)) { ?>
<tr><td align="center" ><?php echo $count; ?></td><td align="center" style="width: %;"><?php echo $row1["name"]; ?></td><td style="width: %;"><?php echo $row1["fname"]; ?></td> <td style="width: %;"><?php echo $row1["fno"]; ?></td><td  style="width: %;"><?php echo $row1["femail"]; ?></td><td align="center" style="width: %;"><?php echo $row1["ftype"]; ?></td><td align="center"><a href="edit_co_ordinate.php?id=<?php echo $row1["id"]; ?>"><img src="icons/edit.png" title="Edit" width="16" height="16"></a></td><td align="center"><a href="delete_co_ordinate.php?id=<?php echo $row1["id"]; ?>"><img src="icons/trash.png" title="Delete" width="25" height="25"></a></td></tr>
<?php $count++; } ?>
</tbody>
</thead>
</table>
</div>


<!-- --><!-- About  -->

<div id="about" >
	<h1>About <a href="about.php"> <img src="icons/add.png" title="About" width="25" height="25"></a></h1>
	<table  class="container">
<thead>
<tr><th><strong>ID</strong></th><th colspan="10" >   <strong>Discription</strong></th><th><strong>Edit</strong></th><th><strong>Delete</strong></th></tr>
<tbody>
<?php
$count=1;
$sel_query="Select * from about where submittedby='$user' ORDER BY id desc;";
$result1 = mysqli_query($con,$sel_query);
while($row1 = mysqli_fetch_assoc($result1)) { ?>
<tr><td align="center" ><?php echo $count; ?></td><td align="center" colspan="10" style="width: 50%;"><?php echo $row1["about"]; ?></td><td align="center"><a href="edit_about.php?id=<?php echo $row1["id"]; ?>"><img src="icons/edit.png" title="Edit" width="16" height="16"></a></td><td align="center"><a href="delete_about.php?id=<?php echo $row1["id"]; ?>"><img src="icons/trash.png" title="Delete" width="25" height="25"></a></td></tr>
<?php $count++; } ?>
</tbody>
</thead>
</table>
</div>

<br>
<br><br>
<br /><br /><br /><br />

<!-- End of About -->

<!-- Co-Ordinator -->
<div id="co">
	<h1>Co-Ordinator <a href="co.php"> <img src="icons/add.png" title="Add" width="25" height="25"></a></h1>
	<table class="container">
<thead>
<tr><th><strong>ID</strong></th><th >   <strong>Name </strong></th><th>   <strong>Mobile Number </strong></th><th colspan="10">   <strong>Email Address </strong></th><th><strong>Edit</strong></th><th><strong>Delete</strong></th></tr>
<tbody>
<?php
$count=1;
$sel_query="Select * from co where submittedby='$user' ORDER BY id desc;";
$result1 = mysqli_query($con,$sel_query);
while($row1 = mysqli_fetch_assoc($result1)) { ?>
<tr><td align="center" ><?php echo $count; ?></td><td align="center" style="width: 50%;"><?php echo $row1["cname"]; ?></td><td  style="width: 25%;"><?php echo $row1["cno"]; ?></td><td align="center" colspan="10" style="width: 60%;"><?php echo $row1["cemail"]; ?></td><td><a href="edit_co.php?id=<?php echo $row1["id"]; ?>"><img src="icons/edit.png" title="Edit" width="16" height="16"></a></td><td align="center"><a href="delete_co.php?id=<?php echo $row1["id"]; ?>"><img src="icons/trash.png" title="Delete" width="25" height="25"></a></td></tr>
<?php $count++; } ?>
</tbody>
</thead>
</table>
</div>

<br /><br /><br /><br />
<!-- End of About -->
</body>
</html>

</div>
</body>
</html>
