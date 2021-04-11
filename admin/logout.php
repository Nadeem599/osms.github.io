<?php
session_start();
unset($_SESSION['is_adminlogin']);
define('PAGE','logout');
header('Location:../index.php');


?>