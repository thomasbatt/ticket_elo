<?php
/* ##PASCAL ~> Pas obligé d'utiliser une variable ici, mais pourquoi pas */
if ( $session_role == 'admin' )
	$header = 'header_admin';
else if ( $session_role == 'user' )
	$header = 'header_user';
else
	$header = 'header';

require('views/'.$header.'.phtml');
?>