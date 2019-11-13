<?php

	$connect = mysql_connect('Localhost','root','') or die(mysql_error());
	$select_db = mysql_select_db('canteen attendance') or die(mysql_error());
?>