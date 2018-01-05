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
		
		if (isset($_POST['loguj']))
		{
			$login = filtruj($_POST['login']);
			$haslo = filtruj($_POST['password']);
			$ip = filtruj($_SERVER['REMOTE_ADDR']);
			
		   // sprawdzamy czy login i hasło są dobre
			if ($rezultat = @$connection->query(sprintf("SELECT * FROM uzytkownicy WHERE login='%s' AND password='%s'", $login, md5($haslo))))
			{
				$ilu_userow = $rezultat->num_rows;
				if($ilu_userow>0)
				{
				  // uaktualniamy date logowania oraz ip
				  @$connection->query(sprintf("UPDATE uzytkownicy SET logowanie = '%s', ip = '%s' WHERE login ='%s'", time(), $ip, $login));
			 
					$_SESSION['zalogowany'] = true;
					$_SESSION['login'] = $login;
				  
					header('Location: account.php');
			   }
			   else 
			   {	   
					$_SESSION['error_mess'] = '<p class="error_message">Login or password is incorrect!</p>';
					header('Location: signin.php');
			   }
			}
		   else 
		   {	   
				$_SESSION['error_mess'] = '<p class="error_message">Something is wrong!</p>';
				header('Location: signin.php');
		   }
		}
	}
	$connection->close();

?>