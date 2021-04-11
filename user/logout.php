<?php
session_start();
unset($_SESSION['myid']);
unset($_SESSION['is_login']);
define('PAGE','logout');
header('Location:../index.php');


?>