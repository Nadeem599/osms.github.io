<?php
session_start();
define('TITLE','deletetechnician');
define('PAGE','technician');
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


<?php include_once('include/header.php'); ?>



<div class="col-lg-10" style="min-height: 550px;">
<?php

if(isset($_POST['delete']))
{
    $request_id = $_POST['id'];
$sql = " delete from technician where t_id = '$request_id' ";
if($con->query($sql) == true)
{
    header('Location:technician.php');
}
else
{
    $msg = 'request is deleted';
}

}

?>
</div>
</div>

<?php include_once('include/footer.php'); ?>