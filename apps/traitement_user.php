<?php
 // DEBUG
// var_dump('coucou');
// var_dump('coucou');
// var_dump($_POST);
// exit;
// Etape 1
if (isset($_POST['action']))
{
	/* ##PASCAL ~> Pareil, deuxieme verif de action, inutile dans l'index */
	$action = $_POST['action'];
	if ($action == 'login')
	{
		// Etape 1
		if (isset($_POST['login'], $_POST['password']))
		{
			// Etape 2
			$login = $_POST['login'];
			$password = $_POST['password'];
			
			// Etape 3
			if (empty($login))
				$error = "Login vide";
			else if (empty($password))
				$error = "Password vide";
			else
			{
				// Etape 4
				$login = mysqli_real_escape_string($db, $login);
				$query = "SELECT * FROM ticket_users WHERE login='".$login."'";
				$res = mysqli_query($db, $query);
				if ($res)
				{
					$user = mysqli_fetch_assoc($res);
					if ($user)
					{
						if (password_verify($password, $user['password']))
						{
							// Etape 5
							$_SESSION['id'] = $user['id'];
							$_SESSION['login'] = $user['login'];
							$_SESSION['role'] = $user['role'];
							$_SESSION['avatar'] = $user['avatar'];
							/* ##PASCAL ~> pareil, tickets plutot que index.php, sinon nickel */
							header('Location: index.php');
							exit;
						}
						else
							$error = "Mot de passe incorrect";
					}
					else
						$error = "Login incorrect";
				}
				else
					$error = "Erreur interne au serveur";
			}
		}
	}
	else if ($action == 'register')
	{
		// Etape 1
// var_dump($_POST, $_FILES);
// exit;
		if (isset($_POST['login'], $_POST['password1'], $_POST['password2'], $_POST['email'], $_POST['phone'], $_POST['first_name'], $_POST['last_name'], $_FILES['avatar']))
		{

			// Etape 2
			$login = $_POST['login'];
			$password1 = $_POST['password1'];
			$password2 = $_POST['password2'];
			$email = $_POST['email'];
			$phone = $_POST['phone'];
			$first_name = $_POST['first_name'];
			$last_name = $_POST['last_name'];
			// Etape 3
			if (strlen($login) < 3)
				$error = "Login trop court (< 3)";
			else if (strlen($login) > 31)
				$error = "Login trop long (> 31)";
			else if (strlen($password1) < 6)
				$error = "Password trop court (< 6)";
			/* ##PASCAL ~> Pas de vérification d'email de phone de first_name ou de last_name ? */
			else if ($password1 !== $password2)
				$error = "Les mots de passe ne correspondent pas";
			else
			{
				$password = $password1;
				// Etape 4
				$login = mysqli_real_escape_string($db, $login);
				/* ##PASCAL ~> Pas de protection pour phone, email, first_name, last_name, attention a la securite ! */
				$password = password_hash($password, PASSWORD_BCRYPT, ['cost'=>12]);
				$password = mysqli_real_escape_string($db, $password);
				//VERIFICATION DE L'IMAGE -------------------------------------------------------------------------J.O.-------------------------------
				if (isset($_FILES['avatar']['error']) && $_FILES['avatar']['error'] != 4)
				{
					$extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' );
					$extension_upload = strtolower(  substr(  strrchr($_FILES['avatar']['name'], '.')  ,1)  );
					
					/* ##PASCAL ~> Attention au if ici (je sais que c'est corrigé dans la version de JO mais quand meme) en gros on affiche un message si l'extension est correcte... mais si elle ne l'est pas on fait l'upload quand meme */
					if ( in_array($extension_upload,$extensions_valides) ) 
						echo "Extension correcte";
					$name = md5(uniqid(rand(), true)).'.'.$extension_upload;
					$avatar = move_uploaded_file($_FILES['avatar']['tmp_name'], 'public/avatar/'.$name);
				}
				else
					$name = "avatar_par_defaut.jpg";
				// if ($avatar)
				// {
					$query = "INSERT INTO ticket_users (login, password, email, phone, first_name, last_name, avatar) VALUES('".$login."', '".$password."', '".$email."', '".$phone."', '".$first_name."', '".$last_name."', '".$name."')";
					//--------------------------------------------------------------------------------------------------J.O.-------------------------------
					$res = mysqli_query($db, $query);
					// var_dump($res);
					// exit;
					if ($res)
					{
						// Etape 5

								// var_dump('coucou_register');
						// Etape 5
								$_SESSION['id'] = mysqli_insert_id($db);
								$_SESSION['login'] = $login;
								$_SESSION['role'] = 'user';
								$_SESSION['avatar'] = $name;

								/* ##PASCAL ~> Et la mise a jour de $_SESSION['avatar'] ? */
								// header('Location: index.php');
								// exit;
					}
					else
						$error = "Erreur interne au serveur";
				// }




/* ##PASCAL ~> Du vide ! */




			}
		}
	}

	else if ($action == 'edit_user')
	{
		// Etape 1
		if (isset($_POST['email'], $_POST['phone'], $_POST['first_name'], $_POST['last_name'], $_FILES['avatar']))
		{
			// Etape 2
			$email = $_POST['email'];
			$phone = $_POST['phone'];
			$first_name = $_POST['first_name'];
			$last_name = $_POST['last_name'];
			$avatar = $_FILES['avatar'];

			// Etape 3
			// if (strlen($login) < 3)
			// 	$error = "Login trop court (< 3)";
			// else if (strlen($login) > 31)
			// 	$error = "Login trop long (> 31)";
			// else
			/* ##PASCAL ~> Attention ici a l'écriture du fichier, ça part en sucette avec les accolades :/ */
			{
				// Etape 4

				//VERIFICATION DE L'IMAGE -------------------------------------------------------------------------J.O.-------------------------------
	
				$extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' );
				$extension_upload = strtolower(  substr(  strrchr($_FILES['avatar']['name'], '.')  ,1)  );
				
				if ( in_array($extension_upload,$extensions_valides) ) 
					echo "Extension correcte";
				$name = md5(uniqid(rand(), true)).'.'.$extension_upload;
				$avatar = move_uploaded_file($_FILES['avatar']['tmp_name'], 'public/avatar/'.$name);
				if ($avatar)
				{

				$query = "UPDATE ticket_users SET email='".$email."', phone='".$phone."', first_name='".$first_name."', last_name='".$last_name."', avatar='".$name."' WHERE id='".$_SESSION['id']."'";

				//--------------------------------------------------------------------------------------------------J.O.-------------------------------


				$res = mysqli_query($db, $query);
				if ($res)
				{
					// Etape 5
					header('Location: account');
					exit;
				}
				else
					$error = "Erreur interne au serveur";
			}
		}
		}
	}

	else if ($action == 'edit_secure')
	{
		// Etape 1
		if (isset($_POST['login'], $_POST['old_password'], $_POST['new_password'], $_POST['new_password_repeat']))
		{
			var_dump($_POST);

			// Etape 2
			$login = $_POST['login'];
			$old_password = $_POST['old_password'];
			$new_password = $_POST['new_password'];
			$new_password_repeat = $_POST['new_password_repeat'];

			
			if ($new_password !== $new_password_repeat)
			{
				$error = "Les mots de passe ne correspondent pas";
			}			

			// Etape 3
			// else if (strlen($login) < 3)
			// 	$error = "Login trop court (< 3)";
			// else (strlen($login) > 31)
			// 	$error = "Login trop long (> 31)";

			$query = "SELECT * FROM ticket_users WHERE id='".$_SESSION['id']."'";
			$res = mysqli_query($db, $query);
			$user = mysqli_fetch_assoc($res);


			if (password_verify($old_password, $user['password']))
			{

				// Etape 4
				$login = mysqli_real_escape_string($db, $login);
				$password = password_hash($new_password, PASSWORD_BCRYPT, ['cost'=>12]);
				$password = mysqli_real_escape_string($db, $password);

				$query = "UPDATE ticket_users SET login='".$login."', password='".$password."' WHERE id='".$_SESSION['id']."'";
				// var_dump($query);die;
				$res = mysqli_query($db, $query);
				if ($res)
				{
					// Etape 5
					/* ##PASCAL ~> Redirection tickets plutot que index.php */
					header('Location: index.php');
					exit;
				}
				else
					$error = "Erreur interne au serveur";

			}
			else
				$error = "Les mots de passe ne correspondent pas";
			
		}
	}
	else if ($action == 'logout'){
		session_destroy();
		$_SESSION = array();
		/* ##PASCAL ~> Pareil, mais sinon ok */
		header('Location: index.php');
		exit;
	}
	else
		$error = "Erreur interne (filou détecté !!!)";
}

?>