<?php
session_start();
define('TITLE','insertrequester');
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

if(isset($_POST['signup']))
{
    if(empty($_POST['name'])||empty($_POST['email'])||empty($_POST['password']))
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
            $password =mysqli_real_escape_string($con, trim($_POST['password']));
            $password = htmlentities($password,ENT_QUOTES);
            $password = password_hash($password,PASSWORD_BCRYPT);
            $email =mysqli_real_escape_string($con, trim($_POST['email']));
            $email = htmlentities($email,ENT_QUOTES);
            $sql = "insert into registration(u_name,u_email,u_password) values('$name','$email','$password')";
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
    <h3 class="text-center text-danger mb-4">Add a new User</h3>
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
            <form action="" class=" p-4  well bg-info" method="POST">
                <div class="form-group">
                    <i class="fa fa-user"></i>
                    <label for="name" class="font-weight-bold">name</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="name">
                </div>
                <div class="form-group">
                    <i class="fa fa-user"></i>
                    <label for="email" class="font-weight-bold">Email</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="email">
                    <small class="form-text">We will not share his email with any one </small>
                </div>
                <div class="form-group">
                    <i class="fa fa-key"></i>
                    <label for="pass" class="font-weight-bold">New Password</label>
                    <input type="password" name="password" class="form-control" id="pass" placeholder="password">
                </div>
                <input type="submit" class="btn btn-danger  shadow-sm" name="signup" value="SignUp">
                <a href="requester.php" class='btn btn-dark'>Close</a>
                <small class="form-text">Lorem ipsum dolor sit amet.</small>

            </form>
            </div>

        </div>
    </div>
</div>
<!-- end registration -->
</div>



<?php include_once('include/footer.php'); ?>