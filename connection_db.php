<?php

$db_host = 'localhost';
$db_user = 'root';
$db_password = '';
$db_name = 'osms';
$con = new mysqli($db_host,$db_user,$db_password,$db_name);
if($con->connect_error)
{
    die('connection is failed').$con->connect_error;
}

?>