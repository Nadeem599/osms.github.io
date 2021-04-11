<?php
session_start();
include_once('../connection_db.php');
if(!isset($_SESSION['is_login']))
{
if(isset($_POST['login']))
{
    if(empty($_POST['email'])||empty($_POST['password']))
    {
      $msg = '<div class="alert alert-warning mt-2 alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert">&times;</button>All fields are required</div>';
    }
    else
    {
            $password =mysqli_real_escape_string($con, trim($_POST['password']));
            $password = htmlentities($password,ENT_QUOTES);
           // $password = password_hash($password,PASSWORD_BCRYPT);
            $email =mysqli_real_escape_string($con, trim($_POST['email']));
            $email = htmlentities($email,ENT_QUOTES);
            $sql = "select * from registration where u_email= '$email'";
            $result = $con->query($sql);
            $row = $result->fetch_assoc();
            $pass = $row['u_password'];
            if(password_verify($password,$pass))
            {
              $_SESSION['is_login'] = true;
              $_SESSION['email'] = $row['u_email'];
              header('Location:userprofile.php');
            }
            else
            {
              $msg = '<div class="alert alert-warning mt-2 alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert">&times;</button>Enter valid email and password</div>';
            }
            
    }
}
}
else
{
  header('Location:userprofile.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../boot/css/bootstrap.min.css">
  <link rel="stylesheet" href="../boot/fonts/font-awesome.min.css">
  <title>userlogin</title>
</head>

<body>
  <div class="mt-5  text-center" style="font-size: 30px;">
    <i class="fa fa-stethoscope text-info"></i>
    <span>Online Service Management System</span>
  </div>
  <p style="font-size: 20px;" class=" mt-2 text-center">
    <i class="fa fa-user-secret text-danger"></i>
    Requester Area (demo)
  </p>
  <div class="row">
    <div class="col-md-4 offset-md-4 col-8 offset-2">
    <?php
  if(isset($msg))
  {
    echo"$msg";
  }
  ?>
    </div>
  </div>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-4 offset-md-4 col-8 offset-2">
        <form action="" class="shadow shadow-lg p-4" method="POST">
          <div class="form-group">
            <i class="fa fa-user"></i>
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="email">
            <small class="form-text">Do not share his email with anyone</small>
          </div>
          <div class="form-group">
            <i class="fa fa-key"></i>
            <label for="password">Password</label>
            <input type="password" class="form-control text-weight-bold" name="password" id="password"
              placeholder="password">
          </div>
          <input type="submit" role="button" name="login" class="btn btn-outline-danger btn-block shadow shadow-sm" value="Login">
        </form>
      </div>
    </div>
    <div class="text-center mt-2"><a href="../index.php" class="btn btn-info">Back to Home</a></div>
  </div>



  <script type="text/javascript" src="../js/jquery.js"></script>
  <script type="text/javascript" src="../js/popover.js"></script>
  <script type="text/javascript" src="../js/bootstrap.min.js"></script>
</body>

</html>