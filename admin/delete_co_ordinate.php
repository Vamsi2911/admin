<?php
require('db.php');

session_start();
	if ($_SESSION['username']!="" && $_SESSION['hostel_login']=="" && $_SESSION['userlogin']=="true") {
	$id=$_REQUEST['id'];
	$query = "DELETE FROM ordinator WHERE id='".$id."' "; 
	$result = mysqli_query($con,$query) or die ( mysqli_error());
	header("Location: ordinators.php?msg=2"); 
}
else{
	echo "<script>
		location.href='index.php';
	</script>";
}
?>