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
?>



<?php include_once('include/header.php'); ?>

<div class="col-lg-10" style="min-height: 550px;">

   <?php
    if(isset($_POST['edit']))
    {
        $id = $_POST['id'];
        $sql = " select * from registration where u_id = '$id'";
        $result = $con->query($sql);
        $row = $result->fetch_assoc();

    }
    ?>
        <?php

if(isset($_POST['update']))
{
    if(empty($_POST['requestername'])||empty($_POST['requestername']))
    {
        $msg = '<div class="alert alert-warning mt-2 alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert">&times;</button>All fields are required</div>';
    }
    else
    {
        
        $requesterid = mysqli_real_escape_string($con, trim($_POST['requesterid']));
        $requesterid = htmlentities($requesterid,ENT_QUOTES);
        $requestername = mysqli_real_escape_string($con, trim($_POST['requestername']));
        $requestername = htmlentities($requestername,ENT_QUOTES);
        $requesteremail = mysqli_real_escape_string($con, trim($_POST['requesteremail']));
        $requesteremail = htmlentities($requesteremail,ENT_QUOTES);
        $sql = " update  registration set u_id = '$requesterid' , u_name = '$requestername' , u_email = '$requesteremail' where u_id = '$requesterid'";
        if($con->query($sql) == true)
        
        {
            $msg = '<div class="alert alert-warning mt-2 alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert">&times;</button>Requester info is Updated</div>';
            
        }
        else
        {
            $msg = '<div class="alert alert-warning mt-2 alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert">&times;</button>Requester info is not Updated</div>';
        }
    }
}

?>
        


<form action="" method="post" class="jumbotron mt-5 ">
            <div class="form-group ">
                <label for="requesterid">Request Id</label><input type="text" readonly name="requesterid"
                    id="requesterid" class="form-control" value="<?php 
                    if(!empty($row['u_id'])) { echo $row['u_id']; } 
                    ?>" placeholder="Requester Id" >
            </div>
            <div class="form-group ">
                <label for="requestername">Request Info</label><input type="text" name="requestername"
                    id="requestername" class="form-control" value="<?php 
                    if(!empty($row['u_name'])) { echo $row['u_name']; } 
                    ?>" placeholder="Requester name" >
            </div>
            <div class="form-group">
                <label for="requesteremail">Description</label><input type="email"
                    name="requesteremail" id="requesteremail" class="form-control" value="<?php 
                    if(!empty($row['u_email'])) { echo $row['u_email']; } 
                    ?>" placeholder="Requester Email" >
            </div>
            <div class="text-center">
                
            
                <input type="submit" class="btn btn-success " value="Update" name="update">
           
               
                <a href="requester.php" class="btn btn-dark">Close</a>
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