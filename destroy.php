<?php
	session_start();
	$_SESSION['state'] = "no";
	session_unset();
	session_destroy();
	header('Location: http://localhost/wt');
?>	