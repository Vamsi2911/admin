
<?php 
require('db.php');
include("auth.php");
$status = "";
if(isset($_POST['co']) && $_POST['co']==1)
{
$fname =$_REQUEST['fname'];
$fno =$_REQUEST['fno'];
$femail =$_REQUEST['femail'];
$ftype =$_REQUEST['ftype'];
$submittedby = $_SESSION["username"];
$ins_query="insert into ordinator (`fname`,`fno`,`femail`,`ftype`,`submittedby`) values ('$fname','$fno','$femail','$ftype','$submittedby')";
mysqli_query($con,$ins_query);
$status = header("Location: insert.php"); 
}
?>