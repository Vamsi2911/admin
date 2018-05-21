
<?php 
session_start();

if(!isset($_SESSION['username']) || !isset($_SESSION['userlogin']) || !isset($_SESSION['secure']))
{
	echo "<script>location.href='index.php'</script>";
}

    if ($_SESSION['username']!="" && $_SESSION['hostel_login']=="true" && $_SESSION['userlogin']=="true" && $_SESSION['secure']=="high" ) {
        echo "<script>
            location.href='hostel_dashboard.php';
        </script>";
    }


?>
