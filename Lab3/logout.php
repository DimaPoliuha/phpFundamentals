<?php
	session_start();
	session_unset();
	session_destroy();
	setcookie("start_time");
	setcookie("user");
	header('Location: index.php');
?>