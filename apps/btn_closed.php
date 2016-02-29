<?php 
if ( $session_role == 'admin' )
	$btn_action_file = 'btn_admin.phtml';
	
else if ( $session_role == 'user' )
	$btn_action_file = 'btn_closed';

// require('views/'.$btn_action_file.'.phtml')
?>