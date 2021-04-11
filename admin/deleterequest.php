<?php
session_start();

include_once('../connection_db.php');
if(isset($_SESSION['is_adminlogin']))
{
    $email = $_SESSION['email'];
}
else
{
    header('Location:adminlogin.php');
}
?>

<?php

if(isset($_POST['close']))
{
    $request_id = $_POST['id'];
$sql = " delete from request where requester_id = '$request_id' ";
if($con->query($sql) == true)
{
    header('Location:requests.php');
}
else
{
    $msg = 'request is deleted';
}

}

?>