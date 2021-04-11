<?php
session_start();
define('TITLE','edittechnician');
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
    if(isset($_POST['edit']))
    {
        $id = $_POST['id'];
        $sql = " select * from technician where t_id = '$id'";
        $result = $con->query($sql);
        $row = $result->fetch_assoc();

    }
    ?>
        <?php

if(isset($_POST['update']))
{
    if(empty($_POST['id'])||empty($_POST['name'])||empty($_POST['city'])||empty($_POST['mobile'])||empty($_POST['email']))
    {
        $msg = '<div class="alert alert-warning mt-2 alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert">&times;</button>All fields are required</div>';
    }
    else
    {
        
        $technicianid = mysqli_real_escape_string($con, trim($_POST['id']));
        $technicianid = htmlentities($technicianid,ENT_QUOTES);
        $technicianname = mysqli_real_escape_string($con, trim($_POST['name']));
        $technicianname = htmlentities($technicianname,ENT_QUOTES);
        $techniciancity = mysqli_real_escape_string($con, trim($_POST['city']));
        $techniciancity = htmlentities($techniciancity,ENT_QUOTES);
        $technicianmobile = mysqli_real_escape_string($con, trim($_POST['mobile']));
        $technicianmobile = htmlentities($technicianmobile,ENT_QUOTES);
        $technicianemail = mysqli_real_escape_string($con, trim($_POST['email']));
        $technicianemail = htmlentities($technicianemail,ENT_QUOTES);
        $sql = " update  technician set t_id = '$technicianid' , t_name = '$technicianname', t_city = '$techniciancity', t_mobile = '$technicianmobile', t_email = '$technicianemail' where t_id = '$technicianid'";
        if($con->query($sql) == true)
        
        {
            $msg = '<div class="alert alert-warning mt-2 alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert">&times;</button>Technician info is Updated</div>';
            
        }
        else
        {
            $msg = '<div class="alert alert-warning mt-2 alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert">&times;</button>Technician info is not Updated</div>';
        }
    }
}

?>
        


<form action="" method="post" class="jumbotron mt-5 ">
                <div class="form-group">
                    <label for="id" class="font-weight-bold"><i class="fa fa-user-plus mr-1"></i>name</label>
                    <input type="text" name="id" readonly class="form-control" id="id" placeholder="id" value="<?php 
                    if(!empty($row['t_id'])) { echo $row['t_id']; } 
                    ?>">
                </div>
                <div class="form-group">
                    <label for="name" class="font-weight-bold"><i class="fa fa-user-plus mr-1"></i>name</label>
                    <input type="text" name="name"  class="form-control" id="name" placeholder="name" value="<?php 
                    if(!empty($row['t_name'])) { echo $row['t_name']; } 
                    ?>">
                </div>
                
                <div class="form-group">
                    <label for="city" class="font-weight-bold "><i class="fa fa-windows  mr-1"></i>city</label>
                   <input type="text" name="city" class="form-control" id="city" placeholder="city" value="<?php 
                    if(!empty($row['t_city'])) { echo $row['t_city']; } 
                    ?>">
                </div>
               
                <div class="form-group">
                    <label for="mobile" class="font-weight-bold"><i class="fa fa-phone-square fa-1x mr-1"></i>Mobile</label>
                   <input type="text" name="mobile" class="form-control" id="mobile" placeholder="mobile" value="<?php 
                    if(!empty($row['t_mobile'])) { echo $row['t_mobile']; } 
                    ?>">
                </div>
                
                <div class="form-group">
                    <label for="email" class="font-weight-bold"><i class="fa fa-envelope mr-1"></i>Email</label>
                   <input type="email" name="email" class="form-control" id="email" placeholder="email" value="<?php 
                    if(!empty($row['t_email'])) { echo $row['t_email']; } 
                    ?>">
                </div>
            <div class="text-center">
                
            
                <input type="submit" class="btn btn-success " value="Update" name="update">
           
               
                <a href="technician.php" class="btn btn-dark">Close</a>
            </div>
            <?php
            if(isset($msg))
            {
                echo $msg;
            }
            ?>
    </form>










</div>
</div>




<?php include_once('include/footer.php'); ?>