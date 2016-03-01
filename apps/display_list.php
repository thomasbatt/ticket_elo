<?php
$count = 0;
while ($count < sizeof($list))
{
	$ticket = $list[$count];
	require('views/ticket.phtml');
	$count++;
}
?>