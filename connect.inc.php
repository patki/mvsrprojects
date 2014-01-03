<?php
$conn_error = 'could not find';
$mysql_host = 'localhost';
$mysql_user = 'root';
$mysql_pass = '';
$mysql_datab= 'matrimony';

$conn=mysql_connect($mysql_host, $mysql_user, $mysql_pass);
if(!$conn or !mysql_select_db($mysql_datab))
{
	die($conn_error);
}


?>