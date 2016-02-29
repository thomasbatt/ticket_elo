<?php
/* DEBUG
var_dump($_POST);
*/
// Etape 1
if (isset($_POST['action']))
{
	$action = $_POST['action'];
	if ($action == 'create')
	{
		if (isset($_POST['content']))
		{
			if (isset($_SESSION['id']))
			{
				// Etape 2
				$content = $_POST['content'];
				// Etape 3
				if (strlen($content) < 6)
					$error = "Contenu trop court (< 6)";
				else if (strlen($content) > 2047)
					$error = "Contenu trop long (> 2047)";
				else
				{
					// Etape 4
					$content = mysqli_real_escape_string($db, $content);
					$query = "INSERT INTO messages (content, author) VALUES('".$content."', '".$_SESSION['id']."')";
					$res = mysqli_query($db, $query);
					if ($res === false)
						$error = "Erreur interne au serveur";
					else
					{
						// Etape 5
						header('Location: index.php');
						exit;
					}
				}
			}
			else
				$error = "Vous devez etre connecte pour ecrire des messages";
		}
		else
			$error = "Erreur interne (vous avez essayé de m'entuber)";
	}
	else
		$error = "Erreur interne (vous avez essayé de m'entuber)";
}
?>