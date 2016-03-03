<?php
/* DEBUG
var_dump($_POST);
*/
// Etape 1
if (isset($_POST['action']))
{
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
				$query = "SELECT * FROM users WHERE login='".$login."'";
				$res = mysqli_query($db, $query);
				if ($res)
				{
					$user = mysqli_fetch_assoc($res);
					if ($user)
					{
						// http://fr2.php.net/manual/fr/function.password-verify.php
						if (password_verify($password, $user['password']))
						{
							// Etape 5
							$_SESSION['id'] = $user['id'];
							$_SESSION['login'] = $user['login'];
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
		if (isset($_POST['login'], $_POST['password1'], $_POST['password2']))
		{
			// Etape 2
			$login = $_POST['login'];
			$password1 = $_POST['password1'];
			$password2 = $_POST['password2'];
			// Etape 3
			if (strlen($login) < 3)
				$error = "Login trop court (< 3)";
			else if (strlen($login) > 31)
				$error = "Login trop long (> 31)";
			else if (strlen($password1) < 6)
				$error = "Password trop court (< 6)";
			else if ($password1 !== $password2)
				$error = "Les mots de passe ne correspondent pas";
			else
			{
				$password = $password1;
				// Etape 4
				$login = mysqli_real_escape_string($db, $login);
				$password = password_hash($password, PASSWORD_BCRYPT, ['cost'=>12]);
				$password = mysqli_real_escape_string($db, $password);
				// http://fr2.php.net/manual/fr/function.password-hash.php
				$query = "INSERT INTO users (login, password) VALUES('".$login."', '".$password."')";
				$res = mysqli_query($db, $query);
				if ($res)
				{
					// Etape 5
					header('Location: index.php?page=login');
					exit;
				}
				else
					$error = "Erreur interne au serveur";
			}
		}
	}
	else
	{
		$error = "Erreur interne (vous avez essayé de m'entuber)";
	}
}
else if ($page == 'logout')
{
	session_destroy();
	header('Location: index.php');
	exit;
}
?>