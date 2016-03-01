<?php

if (isset($_POST['action']))
{
	$action = $_POST['action'];
		if ($action == 'creat_ticket')
		{
				if (isset($_POST['title'],  $_POST['content'],  $_POST['img']))
				{
					if (isset($_SESSION['id']))
					{
						$title = $_POST['title'];
						$content = $_POST['content'];
						$img = $_POST['img'];
						$user_id = $_SESSION['id'];
				
						if (strlen($title) < 2)
							$error = "Titre trop court (< 2)";
						else if (strlen($title) > 2047)
							$error = "Titre trop long (> 2047)";
						if (strlen($content) < 6)
							$error = "Contenu trop court (< 6)";
						else if (strlen($content) > 2047)
							$error = "Contenu trop long (> 2047)";
						else
						{
							
							$title = mysqli_real_escape_string($db, $title);
							$content = mysqli_real_escape_string($db, $content);
							$img = mysqli_real_escape_string($db, $img);
							$query = "INSERT INTO ticket_tickets (title, content, user_id , statut, img, treatment_id) VALUES('".$title."', '".$content."', '".$_SESSION['id']."', 'todo', '".$img."', '1')";
							$res = mysqli_query($db, $query);
							
							if ($res === false)
								$error = "Erreur interne au serveur";
							else
							{
					
								header('Location: index.php');
								exit;
							}
						} 
					}
					else
						$error = "Vous devez etre connecté";
				}
			else
				$error = "Erreur interne (vous avez essayé de m'entuber)";
		}
	else
		$error = "Erreur interne (vous avez essayé de m'entuber)";
}
?>