<?php
require('db.php');

session_start();
if ($_SESSION['username']!="" && $_SESSION['hostel_login']=="" && $_SESSION['userlogin']=="true") {	

	$id1=$_REQUEST['id'];
	$query1 = "DELETE FROM about WHERE id='".$id1."' "; 
	$result1 = mysqli_query($con,$query1) or die ( mysqli_error());
	header("Location: about_dept.php?msg=2"); 
}
else{
	echo "<script>
		location.href='index.php';
	</script>";
}
?>