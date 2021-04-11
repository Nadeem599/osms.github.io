<?php
session_start();
define('TITLE','inserttechnician');
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

if(isset($_POST['signup']))
{
    if(empty($_POST['name'])||empty($_POST['city'])||empty($_POST['mobile'])||empty($_POST['email']))
    {
        $msg = '<div class="alert alert-warning mt-2 alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert">&times;</button>All fields are required</div>';
    }
    else
    {
        $check_email = mysqli_real_escape_string($con,trim($_POST['email']));
        $check_email = htmlentities($check_email,ENT_QUOTES);
        $sql = "select * from registration where u_email = '$check_email'";
        $result = $con->query($sql);
        if ($result->num_rows > 0) 
        {
            $msg = '<div class="alert alert-success mt-2 alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert">&times;</button>Email is already used</div>';
            
        }    
        else
        {

            $name =mysqli_real_escape_string($con, trim($_POST['name']));
            $name = htmlentities($name,ENT_QUOTES);
            $city =mysqli_real_escape_string($con, trim($_POST['city']));
            $city = htmlentities($city,ENT_QUOTES);
            $mobile =mysqli_real_escape_string($con, trim($_POST['mobile']));
            $mobile = htmlentities($mobile,ENT_QUOTES);
            $email =mysqli_real_escape_string($con, trim($_POST['email']));
            $email = htmlentities($email,ENT_QUOTES);
            $sql = "insert into technician(t_name,t_city,t_mobile,t_email) values('$name','$city','$mobile','$email')";
            if($con->query($sql)== true)
            {
                $msg = '<div class="alert alert-success mt-2 alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert">&times;</button>Account is created</div>';
            }
            else
            {
                $msg = '<div class="alert alert-danger mt-2 alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert">&times;</button>Account is not created</div>';
            }
        }
    }

}
?>

<div class="container pt-5 mb-5" id="registration">
    <h3 class="text-center text-danger mb-4">Add a new Technician</h3>
    <div class="row">
        <div class="col-sm-6 offset-sm-3">
            <?php
    if(isset($msg))
    {
        echo $msg;
       
    }
    ?>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6 offset-sm-3">
        <div class="jumbotron bg-danger shadow shadow-lg p-5">
            <form action="" class=" p-4   bg-info " method="POST">
                
                <div class="form-group">
                    <label for="name" class="font-weight-bold"><i class="fa fa-user-plus mr-1"></i>name</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="name">
                </div>
                
                <div class="form-group">
                    <label for="city" class="font-weight-bold "><i class="fa fa-windows  mr-1"></i>city</label>
                   <input type="text" name="city" class="form-control" id="city" placeholder="city">
                </div>
               
                <div class="form-group">
                    <label for="mobile" class="font-weight-bold"><i class="fa fa-phone-square fa-1x mr-1"></i>Mobile</label>
                   <input type="text" name="mobile" class="form-control" id="mobile" placeholder="mobile">
                </div>
                
                <div class="form-group">
                    <label for="email" class="font-weight-bold"><i class="fa fa-envelope mr-1"></i>Email</label>
                   <input type="email" name="email" class="form-control" id="email" placeholder="email">
                </div>
               
                
                    
                <input type="submit" class="btn btn-danger  shadow-sm" name="signup" value="SignUp">
                <a href="technician.php" class='btn  btn-dark'>Close</a>
                
               

            </form>
            </div>

        </div>
    </div>
</div>
<!-- end registration -->
</div>



<?php include_once('include/footer.php'); ?>