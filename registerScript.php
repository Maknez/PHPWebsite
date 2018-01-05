<?php

session_start();



require_once "connection.php";
	
	$connection = @new mysqli($host, $db_user, $db_password, $db_name);
	
	if ($connection->connect_errno!=0) {
		echo "Error:".$connection->connect_errno;
	}
	else {
		$connection->set_charset("utf8");
		
		function filtruj($zmienna)
		{
			if(get_magic_quotes_gpc())
				$zmienna = stripslashes($zmienna); // usuwamy slashe
		 
		   // usuwamy spacje, tagi html oraz niebezpieczne znaki
			return htmlentities(trim($zmienna), ENT_QUOTES, "UTF-8");
		}
		
		
		if (isset($_POST['rejestruj']))
		{
		   $login = filtruj($_POST['login']);
		   $haslo1 = filtruj($_POST['password1']);
		   $haslo2 = filtruj($_POST['password2']);
		   $email = filtruj($_POST['email']);
		   $name = filtruj($_POST['name']);
		   $surname = filtruj($_POST['surname']);
		   $ip = filtruj($_SERVER['REMOTE_ADDR']);
		 
		 
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
			{
				header('Location: registerLogin.php');
			}
			else 
			{
				// sprawdzamy czy login nie jest już w bazie
				if (mysqli_num_rows(mysqli_query($connection, "SELECT login FROM uzytkownicy WHERE login = '".$login."';")) == 0)
			   {
				  if ($haslo1 == $haslo2) // sprawdzamy czy hasła takie same
				  {
						mysqli_query($connection, "INSERT INTO `uzytkownicy` (`login`, `password`, `email`, `name`, `surname`, `rejestracja`, `logowanie`, `ip`)
						VALUES ('".$login."', '".md5($haslo1)."', '".$email."', '".$name."', '".$surname."', '".time()."', '".time()."', '".$ip."');");
					
					
						$_SESSION['error_mess'] = '<p class="success_message">Your account was created successfully!</p>';
						header('Location: register.php');

				  }
				  else 
				  {
					    $_SESSION['error_mess'] = '<p class="error_message">The password are not the same!</p>';
						header('Location: register.php');
				  }
					
			   }
			   else 
			   {
					$_SESSION['error_mess'] = '<p class="error_message">This login is already used!</p>';
					header('Location: register.php');   
			   } 
			}
		   
		}
		
		$connection->close();
	}
 

?>