<?php
	if( count($_POST) > 0 ){
		$datetime = date("Y-m-d H:i:s");
		$name = trim($_POST['name']);
		$surname = trim($_POST['surname']);
		$login = trim($_POST['login']);
		$phone = trim($_POST['phone']);
		$email = trim($_POST['email']);
		$password = trim($_POST['password']);

		if ( !preg_match( "/[A-Z][a-z]{2,15}/", $name ) ){
			$message = 'Please enter correct name!';
		}
		else if ( !preg_match("/[A-Z][a-z]{2,15}/", $surname ) ){
			$message = 'Please enter correct surname!';
		}
		else if ( !preg_match( "/[A-Za-z][A-Za-z0-9_]{2,15}/", $login ) ){
			$message = 'Please enter correct login!';
		}
		else if ( !preg_match("/[+]?[0-9]{10,12}/", $phone ) ){
			$message = 'Please enter correct phone!';
		}
		else if ( !preg_match("/[A-Za-z0-9._]{3,10}[@][A-Za-z]{1,6}[.][A-Za-z]{1,6}[.]?[A-Za-z]?[A-Za-z]?[A-Za-z]?/", $email ) ){
			$message = 'Please enter correct email!';
		}
		else if ( !preg_match( "/[A-Za-z0-9_]{6,15}/", $password ) ){
			$message = 'Please enter correct password!';
		}
		else{
			file_put_contents( "register.txt", "$datetime $name $surname $login $phone $email\n", FILE_APPEND );
			file_put_contents( "userdata.txt", "\n$login:$password,", FILE_APPEND );
			$message = "Thank you, $name $surname! Your request is accepted.";
		}
	}
	else{
		$name = '';
		$surname = '';
		$login = '';
		$phone = '';
		$email = '';
		$password = '';
		$message = 'Please, fill out the form to register.';
	}
    echo '<h1>Registration form</h1>';
    echo $message;
?>

<form method="post">
	<br><br>Enter your name:<br><input name="name" type="text" placeholder="name" value="<?php echo $name;?>"><br>
	<br>Enter your surname:<br><input name="surname" type="text" placeholder="surname" value="<?php echo $surname;?>"><br>
	<br>Enter your login:<br><input name="login" type="text" placeholder="login" value="<?php echo $login;?>"><br>
	<br>Enter your phone:<br><input name="phone" type="text" placeholder="phone" value="<?php echo $phone;?>"><br>  
	<br>Enter your email:<br><input name="email" type="text" placeholder="email" value="<?php echo $email;?>"><br> 
	<br>Enter password:<br><input  name="password" type="password" placeholder="password"><br><br>
	<input value="Send" type="submit">
</form>

<a href="index.php">Go back</a>