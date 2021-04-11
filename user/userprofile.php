<?php
session_start();
define('TITLE','userprofile');
define('PAGE','userprofile');
include_once('../connection_db.php');
if(isset($_SESSION['is_login']))
{
    $email = $_SESSION['email'];
}
else
{
    header('Location:userlogin.php');
}
$sql = "select u_name , u_email from registration where u_email = '$email'";
$result = $con->query($sql);
$row = $result->fetch_assoc();
$name = $row['u_name'];
$email = $row['u_email'];


if(isset($_POST['update']))
{
    if(empty($_POST['name']))
    {
        $msg = '<div class="alert alert-warning mt-2 alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert">&times;</button>All fields are required</div>';
    }
    else
    {
        $name = mysqli_real_escape_string($con,trim($_POST['name']));
        $name = htmlentities($name,ENT_QUOTES);
        $sql = "update registration set u_name = '$name' where u_email= '$email'";
        if($con->query($sql)==true)
        {
            $msg = '<div class="alert alert-success mt-2 alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert">&times;</button>Name Updated Successfully</div>';
        }
    }
}
?>


<?php include_once('include/header.php');  ?>
  
            <div class="col-lg-10" style="min-height: 550px;">

                <form action="" method="POST" class="mt-4 mx-2">
                    <div class="form-group">
                        <label for="email">Email</label><input type="email" name="email" id="email" class="form-control"
                            readonly value="<?php echo $email;?>">
                    </div>
                    <div class="form-group">
                        <label for="name">UserName</label><input type="text" name="name" id="name" class="form-control"
                            value="<?php echo $name; ?>">
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




    <?php include_once('include/footer.php');  ?>