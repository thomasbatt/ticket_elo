<?php
if ($status == 'todo')
	require('views/todo_btn.phtml');
else if ($status == 'doing')
	require('views/doing_btn.phtml');
else if ($status == 'done')
	require('views/done_btn.phtml');
?>