<?php
var_dump('coucou');
if (isset($_POST['action']))
{
	$action = $_POST['action'];
		if ($action == 'creat_ticket')
		{
				if (isset($_POST['content']))
				{
					if (isset($_SESSION['id']))
					{
					
						$content = $_POST['content'];
						$user_id = $_SESSION['id'];
				
						if (strlen($content) < 6)
							$error = "Contenu trop court (< 6)";
						else if (strlen($content) > 2047)
							$error = "Contenu trop long (> 2047)";
						else
						{
					
							$content = mysqli_real_escape_string($db, $content);
							$query = "INSERT INTO ticket_tickets (content, user_id , treatment_id) VALUES('".$content."', '".$_SESSION['id']."', '1')";
							$res = mysqli_query($db, $query);
							var_dump($res);
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