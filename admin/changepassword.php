<?php
session_start();
define('TITLE','changepassword');
define('PAGE','changepassword');
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
<?php

if(isset($_POST['update']))
{
    if(empty($_POST['password']))
    {
        $msg = '<div class="alert alert-warning mt-2 alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert">&times;</button>All fields are required</div>';
    }
    else
    {
        $password = mysqli_real_escape_string($con,trim($_POST['password']));
        $password = htmlentities($password,ENT_QUOTES);
        $password = password_hash($password,PASSWORD_BCRYPT);
        $sql = "update adminlogin set a_password = '$password' where a_email= '$email'";
        if($con->query($sql)==true)
        {
            $msg = '<div class="alert alert-success mt-2 alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert">&times;</button>Password Updated Successfully</div>';
        }
    }
}
?>


            <div class="col-lg-10" style="min-height: 550px;">

                <form action="" method="POST" class="mt-4 mx-2">
                    <div class="form-group">
                        <label for="email">Email</label><input type="email" name="email" id="email" class="form-control"
                            readonly value="<?php echo $email; ?>">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label><input type="password" name="password" placeholder="New Password" id="password" class="form-control"
                        value="" >
                    </div>
                    <?php
                        if(isset($msg))
                            {
                                echo $msg;
                            }
                    ?>
                    <input type="submit" class="btn btn-danger" name="update" value="Update">
                </form>
            </div>
        </div>
    </div>


<?php include_once('include/footer.php'); ?>