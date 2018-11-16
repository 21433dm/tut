<?php /*logut.php*/ session_start();
	$_SESSION['logged_in'] = false;
	$_SESSION['username'] = "";
	header("Location:home.php");
?>