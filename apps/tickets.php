<?php
if (isset($_SESSION['id']))
	require('views/tickets.phtml');
else
	require('views/display_login.phtml');
?>