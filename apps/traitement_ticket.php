<?php

// var_dump('coucou');
// var_dump('coucou');
// var_dump($_POST);
// exit;

if (isset($_POST['action']))
{
	/* ##PASCAL ~> Attention a l'indentation */
	/* ##PASCAL ~> Vous vérifier ENCORE votre $_POST['action'] alors que vous l'avez déjà fait dans l'index... pas de double verif, ça sert a rien, faites le une bonne fois pour toute ici */
	$action = $_POST['action'];
	if ($action == 'creat_ticket')
	{
		if (isset($_SESSION['id']))
		{
			$title = 'Mon titre';
			$content = 'Mon contenu';
			$user_id = $_SESSION['id'];
			$statut = 'todo';
			$img = '';
			$treatment_id = $user_id;

			$query = "INSERT INTO ticket_tickets (title, content, user_id , statut, img, treatment_id) 
						VALUES('".$title."', '".$content."', '".$user_id."', '".$statut."', '".$img."', '".$treatment_id."') ";
			$res = mysqli_query($db, $query);
			
			if ($res === false)
				$error = "Erreur interne au serveur";
			else
			{
				/* ##PASCAL ~> Pareil pour la redirection, mettez tickets plutot que index.php */
				header('Location: index.php');
				exit;
			}
		}
		else
			$error = "Vous devez etre connecté";
	}

	else if ($action == 'valid_ticket')
	{
		if ( isset( $_POST['ticket_id'],$_POST['title'],$_POST['content'] ) )
		{
			if (isset($_SESSION['id']))
			{
				$ticket_id = $_POST['ticket_id'];
				$title = $_POST['title'];
				$content = $_POST['content'];
		
				if (strlen($ticket_id) < 1)
					$error = "ticket_id trop court (< 2)";
				else if (strlen($ticket_id) > 31)
					$error = "ticket_id trop long (> 2047)";
				else if (strlen($title) < 1)
					$error = "title trop court (< 2)";
				else if (strlen($title) > 31)
					$error = "title trop long (> 2047)";
				else if (strlen($content) < 1)
					$error = "content trop court (< 2)";
				else if (strlen($content) > 31)
					$error = "content trop long (> 2047)";
				else
				{
					$ticket_id = mysqli_real_escape_string($db, $ticket_id);
					$title = mysqli_real_escape_string($db, $title);
					$content = mysqli_real_escape_string($db, $content);
					$query = "UPDATE ticket_tickets
								SET title = '".$title."',content = '".$content."',editing = '0'
								WHERE id = '".$ticket_id."' ";
					$res = mysqli_query($db, $query);
					
					if ($res === false)
						$error = "Erreur interne au serveur";
					else
					{
						// header('Location: index.php');
						// exit;
					}
				} 
			}
			else
				$error = "Vous devez etre connecté";
		}
		else
			$error = "Erreur interne (vous avez essayé de m'entuber)";
	}


	else if ($action == 'next_ticket')
	{
		if ( isset($_POST['ticket_id'],$_POST['statut']) )
		{
			if (isset($_SESSION['id']))
			{
				$ticket_id = $_POST['ticket_id'];
				$ticket_statut = $_POST['statut'];
		
				if (strlen($ticket_id) < 1)
					$error = "ticket_id trop court (< 2)";
				else if (strlen($ticket_id) > 31)
					$error = "ticket_id trop long (> 2047)";
				else if (strlen($ticket_statut) < 1)
					$error = "ticket_statut trop court (< 2)";
				else if (strlen($ticket_statut) > 31)
					$error = "ticket_statut trop long (> 2047)";
				else
				{
					if( $ticket_statut == 'editing' )
						$statut = 'todo';
					else if( $ticket_statut == 'todo' )
						$statut = 'current';
					else 
						$statut = 'done';


					$ticket_id = mysqli_real_escape_string($db, $ticket_id);
					$ticket_statut = mysqli_real_escape_string($db, $ticket_statut);
					$query = "UPDATE ticket_tickets
								SET statut = '".$statut."'
								WHERE id = '".$ticket_id."' ";
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


	else if ($action == 'edit_ticket')
	{
		if ( isset($_POST['ticket_id']) )
		{
			if (isset($_SESSION['id']))
			{
				$ticket_id = $_POST['ticket_id'];
		
				if (strlen($ticket_id) < 1)
					$error = "ticket_id trop court (< 2)";
				else if (strlen($ticket_id) > 31)
					$error = "ticket_id trop long (> 2047)";
				else
				{
					$ticket_id = mysqli_real_escape_string($db, $ticket_id);
					$query = "UPDATE ticket_tickets
								SET editing = '1'
								WHERE id = '".$ticket_id."' ";
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

	else if ($action == 'delete_ticket')
	{
			if (isset($_POST['ticket_id']) )
			{
				if (isset($_SESSION['id']))
				{
					$ticket_id = $_POST['ticket_id'];
			
					if (strlen($ticket_id) < 1)
						$error = "ticket_id trop court (< 2)";
					else if (strlen($ticket_id) > 31)
						$error = "ticket_id trop long (> 2047)";
					else
					{
						
						$ticket_id = mysqli_real_escape_string($db, $ticket_id);
						$query = "DELETE FROM ticket_tickets WHERE id='".$ticket_id."' ";
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