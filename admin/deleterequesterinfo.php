<?php
session_start();
define('TITLE','requester');
define('PAGE','requester');
include_once('../connection_db.php');
if(isset($_SESSION['is_adminlogin']))
{
    $email = $_SESSION['email'];
}
else
{
    header('Location:adminlogin.php');
}
include_once('include/header.php');
?>

<?php

if(isset($_POST['delete']))
{
    $request_id = $_POST['id'];
$sql = " delete from registration where u_id = '$request_id' ";
if($con->query($sql) == true)
{
    header('Location:requester.php');
}
else
{
    $msg = 'request is deleted';
}

}

?>
