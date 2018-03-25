<?php
	session_start();
	if($_SERVER['REQUEST_METHOD'] == "POST"){
		$data = file('userdata.txt');
		foreach($data as $d) {
			$user = explode(',', $d);
			foreach($user as $us){
				$strp = strpos($us, ":");
				$logn = substr($us, 0, $strp);
				$psw = substr($us, $strp + 1);
	
				//file_put_contents( "temp.txt", "$logn    $psw\n", FILE_APPEND );

				if($logn == $_POST['login'] && $psw == $_POST['password']){
					setcookie('start_time', date("Y-m-d H:i:s") );
					setcookie('user', $logn );
					$_SESSION['auth_user'] = true;
					header('Location: index.php');
					exit();
				}
			}
		}
		$_SESSION['auth_user'] = false;
		header('Location: index.php');
	}
?>

<form method="post">
	<input type="text" name="login" placeholder="login">
	<input type="password" name="password" placeholder="password">
	<button>Sign in</button>
</form>

<a href="index.php">Go back</a>