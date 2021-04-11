<?php 
define('TITLE','userrequest');
define('PAGE','userrequest');
include_once('include/header.php');  
session_start();
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



if(isset($_POST['send']))
{

if(empty($_POST['requestinfo'])||empty($_POST['requestdescription'])||empty($_POST['requestername'])||empty($_POST['requesteraddress1'])||empty($_POST['requesteraddress2'])||empty($_POST['city'])||empty($_POST['state'])||empty($_POST['zipcode'])||empty($_POST['email'])||empty($_POST['mobileno'])||empty($_POST['date']))
{
    $msg = '<div class="alert alert-warning mt-2 alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert">&times;</button>All fields are required</div>';
}
else
{
        $requestinfo = mysqli_real_escape_string($con,trim($_POST['requestinfo']));
        $requestinfo = htmlentities($requestinfo,ENT_QUOTES);
        $requestdescription = mysqli_real_escape_string($con,trim($_POST['requestdescription']));
        $requestdescription = htmlentities($requestdescription,ENT_QUOTES);
        $requestername = mysqli_real_escape_string($con,trim($_POST['requestername']));
        $requestername = htmlentities($requestername,ENT_QUOTES);
        $requesteraddress1 = mysqli_real_escape_string($con,trim($_POST['requesteraddress1']));
        $requesteraddress1 = htmlentities($requesteraddress1,ENT_QUOTES);
        $requesteraddress2 = mysqli_real_escape_string($con,trim($_POST['requesteraddress2']));
        $requesteraddress2 = htmlentities($requesteraddress2,ENT_QUOTES);
        $mobileno = mysqli_real_escape_string($con,trim($_POST['mobileno']));
        $mobileno = htmlentities($mobileno,ENT_QUOTES);
        $city = mysqli_real_escape_string($con,trim($_POST['city']));
        $city = htmlentities($city,ENT_QUOTES);
        $state = mysqli_real_escape_string($con,trim($_POST['state']));
        $state = htmlentities($state,ENT_QUOTES);
        $zipcode = mysqli_real_escape_string($con,trim($_POST['zipcode']));
        $zipcode = htmlentities($zipcode,ENT_QUOTES);
        $email = mysqli_real_escape_string($con,trim($_POST['email']));
        $email = htmlentities($email,ENT_QUOTES);
        $date = mysqli_real_escape_string($con,trim($_POST['date']));
        $date = htmlentities($date,ENT_QUOTES);

        $sql = " insert into request(requester_info,requester_description,requester_name,       requester_address1,requester_address2,requester_city,requester_state,requester_zip,requester_email,requester_mobile,requester_date) values('$requestinfo',' $requestdescription','$requestername','$requesteraddress1','$requesteraddress2','$city','$state','$zipcode','$email','$mobileno','$date') ";

        if($con->query($sql)==true)
        {
            $requestid = mysqli_insert_id($con);
            $_SESSION['myid'] = $requestid;
            $msg = '<div class="alert alert-success mt-2 alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert">&times;</button>Request is submitted</div>';
            header('location:userrequestsubmit.php');
        }
        else
        {
            $msg = '<div class="alert alert-warning mt-2 alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert">&times;</button>Request is not submitted</div>';
        }


}
}

?>







            <div class="col-lg-10 mb-5" style="min-height: 550px;">

                <form action="" method="POST" class="mt-4 mx-2">
                    <?php
            if(isset($msg))
            {
                echo $msg;
            }
            ?>
                    <div class="form-group">
                        <label for="requestinfo">Request Info</label><input type="text" name="requestinfo"
                            id="requestinfo" class="form-control" value="" placeholder="Request Info" >
                    </div>
                    <div class="form-group">
                        <label for="requestdescription">Description</label><input type="text"
                            name="requestdescription" id="requestdescription" class="form-control" value="" placeholder="Write Description" >
                    </div>
                    <div class="form-group">
                        <label for="requestername">Name</label><input type="text" name="requestername"
                            id="requestername" class="form-control" value="<?php echo $name; ?>" readonly placeholder="Name">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="requesteraddress">Address Line 1</label><input type="text"
                                    name="requesteraddress1" id="requesteraddress" class="form-control" value="" placeholder="House No.123">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="requesteraddress2">Address Line 2</label><input type="text"
                                    name="requesteraddress2" id="requesteraddress2" class="form-control" value="" placeholder="Railway Colony">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="city">City</label><input type="text"
                                    name="city" id="city" class="form-control" value="">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="state">State</label><input type="text"
                                    name="state" id="state" class="form-control" value="">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="zipcode">Zip Code</label><input type="text"
                                    name="zipcode" id="zipcode" class="form-control" value="" onkeypress ="digitFunction(event)">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Email</label><input type="email"
                                    name="email" id="email" class="form-control" value="<?php echo $email; ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="mobileno">Mobile No.</label><input type="text"
                                    name="mobileno" id="mobileno" class="form-control" value="" onkeypress ="digitFunction(event);">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="date">Date</label><input type="date"
                                    name="date" id="date" class="form-control"  value="">
                            </div>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-danger" name="send" value="Send">
                    <input type="reset" class="btn btn-warning" name="reset" value="Reset">
                </form>
            </div>
        </div>
    </div>




    <script>
        function digitFunction(evt)
        {
           var ch = String.fromCharCode(evt.which);
           if(!(/[0-9]/.test(ch)))
           {
               evt.preventDefault();
           }
        }
    </script>














    <?php include_once('include/footer.php');  ?>