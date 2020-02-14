<?php
$link=mysql_connect('localhost','root','root');

	if (!$link) {
		die('not connected: '.mysql_error());
	}
$db_selected=mysql_select_db('epitech_tp',$link);
if (!$db_selected) {
	die('base inaccessible: '.mysql_error());
}


?>