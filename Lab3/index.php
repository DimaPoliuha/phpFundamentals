<?php
	session_start();
	if( isset( $_SESSION['auth_user'] ) ){
		if($_SESSION['auth_user']){
			echo "<a href='get.php?id=one.txt'>Some news</a>";
			echo "<br><br>";
			echo "<a href='logout.php'>Log out</a>";
			echo "<br><br>";
			echo "<a href='cookies.php'>Cookies</a>";
		}
		else{
			echo "<a href='post.php'>Register</a>";
			echo "<br><br>";
			echo "<a href='login.php'>Sign in</a>";
			echo "<h1>Main</h1>";
		}
	}
	else{
		echo "<a href='post.php'>Register</a>";
		echo "<br><br>";
		echo "<a href='login.php'>Sign in</a>";
		echo "<h1>Main</h1>";
	}
?>