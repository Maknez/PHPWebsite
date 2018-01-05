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
		
		if (isset($_POST['changeThePass']))
		{
			$login = filtruj($_POST['login']);
			$currentPass = filtruj($_POST['currentPassword']);
			$newPass1 = filtruj($_POST['newPassword1']);
			$newPass2 = filtruj($_POST['newPassword2']);
			
		   // sprawdzamy czy login i hasło są dobre
			if($newPass1 == $currentPass) {
				$_SESSION['error_mess'] = '<p class="error_message">New password cannot be the same as current!</p>';
				header('Location: account.php');
			}
			else {
				if($newPass1 == $newPass2) {
					if ($rezultat = @$connection->query(sprintf("SELECT * FROM uzytkownicy WHERE login ='%s' AND password='%s'", $login, md5($currentPass))))
					{
						$ilu_userow = $rezultat->num_rows;
						if($ilu_userow>0)
						{
						  // uaktualniamy date logowania oraz ip
							@$connection->query(sprintf("UPDATE uzytkownicy SET password = '%s' WHERE login ='%s'", md5($newPass1), $login));
							$_SESSION['error_mess'] = '<p class="success_message">Your password was changed successfully!</p>';
							header('Location: account.php');
					   }
					   else 
					   {	   
							$_SESSION['error_mess'] = '<p class="error_message">Current password is incorrect!</p>';
							header('Location: account.php');
					   }
					}
					else 
					{	   
						$_SESSION['error_mess'] = '<p class="error_message">Current password is incorrect!</p>';
						header('Location: account.php');
					}
				}
				else {
					$_SESSION['error_mess'] = '<p class="error_message">Typed passwords are not the same!</p>';
						header('Location: account.php');
				}
			}
		}
	}
	$connection->close();

?>