<?php
session_start();
define('TITLE','requests');
define('PAGE','requests');
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
    <div class="row  mt-5 mx-2">
        <div class="col-md-5">
            <?php
            $sql = " select * from request  ";
            $result = $con->query($sql);
            if($result->num_rows>0)
            {
                while($row = $result->fetch_assoc())
                    {
                            echo'<div class="card mb-5">';
                            echo'<div class="card-header">Request ID: '.$row['requester_id'].'</div>'; 
                            echo'<div class="card-body">';
                            echo'<h5 class="card-title">'.$row['requester_info'].'</h5>';
                            
                            echo'<p class="card-text">'.$row['requester_description'].'</p>';

                            
                            echo'<p class="card-text">Request Date: '.$row['requester_date'].'</p>';

                            
                            
                            echo'<form action="" class="float-right " method="POST">';
                            echo '<input type="text" name="id" hidden  class="form-control" value='.$row["requester_id"]. '>';
                            echo '<input type="submit" class="btn btn-danger mb-2  mr-2" value="View" name="view">';
                            echo'</form>';
                            echo'<form action="deleterequest.php" class="float-right mr-1"  method="POST">';
                            echo '<input type="text" name="id" hidden  class="form-control" value='.$row["requester_id"]. '>';
                            echo '<input type="submit" class="btn btn-dark " name="close" value="Close">';
                            echo'</form>';
                            echo'</div>';
            
                            
                            echo'</div>';
                    }
            }
            ?>
        </div>

<?php
if(isset($_REQUEST['view']))
{
    $request_id = $_POST['id'];
$sql = " select * from request where requester_id = '$request_id' ";
$result = $con->query($sql);
$row = $result->fetch_assoc();
}



if(isset($_POST['assign']))
{

if(empty($_POST['requestid'])||empty($_POST['requestinfo'])||empty($_POST['requestdescription'])||empty($_POST['requestername'])||empty($_POST['requesteraddress1'])||empty($_POST['requesteraddress2'])||empty($_POST['city'])||empty($_POST['state'])||empty($_POST['zipcode'])||empty($_POST['email'])||empty($_POST['mobileno'])||empty($_POST['date'])||empty($_POST['technician']))
{
    $msg = '<div class="alert alert-warning mt-2 alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert">&times;</button>All fields are required</div>';
}
else
{
        $requestid = mysqli_real_escape_string($con,trim($_POST['requestid']));
        $requestid = htmlentities($requestid,ENT_QUOTES);    
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
        $technician = mysqli_real_escape_string($con,trim($_POST['technician']));
        $technician = htmlentities($technician,ENT_QUOTES);

        $sql = " insert into assignwork(assignworkr_id,assignworkr_info,assignworkr_description,assignworkr_name,       assignworkr_address1,assignworkr_address2,assignworkr_city,assignworkr_state,assignworkr_zip,assignworkr_email,assignworkr_mobile,assignworkr_date,assignworkr_technician) values('$requestid','$requestinfo',' $requestdescription','$requestername','$requesteraddress1','$requesteraddress2','$city','$state','$zipcode','$email','$mobileno','$date','$technician') ";

        if($con->query($sql)==true)
        {
            $requestid = mysqli_insert_id($con);
            $_SESSION['myid'] = $requestid;
            $msg = '<div class="alert alert-success mt-2 alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert">&times;</button>Tehnician is assigned</div>';
            
        }
        else
        {
            $msg = '<div class="alert alert-warning mt-2 alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert">&times;</button>Tehnician is not assigned</div>';
        }


}
}
?>



        <div class="col-md-7 ">
        <?php
        if(isset($msg))
        {
            echo $msg;
        }
        ?>
            <h5 class="jumbotron mb-0 p-3 text-center">Assign Work Order Request</h5>
           <form action="" method="post" class="jumbotron pt-0 pb-5 ">
            <div class="form-group ">
                <label for="requestid">Request Id</label><input type="text" name="requestid"
                    id="requestid" class="form-control" value="<?php 
                    if(!empty($row['requester_id'])) { echo $row['requester_id']; } 
                    ?>" placeholder="Request Id" >
            </div>
            <div class="form-group ">
                <label for="requestinfo">Request Info</label><input type="text" name="requestinfo"
                    id="requestinfo" class="form-control" value="<?php 
                    if(!empty($row['requester_info'])) { echo $row['requester_info']; } 
                    ?>" placeholder="Request Info" >
            </div>
            <div class="form-group">
                <label for="requestdescription">Description</label><input type="text"
                    name="requestdescription" id="requestdescription" class="form-control" value="<?php 
                    if(!empty($row['requester_description'])) { echo $row['requester_description']; } 
                    ?>" placeholder="Write Description" >
            </div>
            <div class="form-group">
                <label for="requestername">Name</label><input type="text" name="requestername"
                    id="requestername" class="form-control" value="<?php 
                    if(!empty($row['requester_name'])) { echo $row['requester_name']; } 
                    ?>"  >
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="requesteraddress">Address Line 1</label><input type="text"
                            name="requesteraddress1" id="requesteraddress" class="form-control" value="<?php 
                            if(!empty($row['requester_address1'])) { echo $row['requester_address1']; } 
                            ?>" placeholder="House No.123">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="requesteraddress2">Address Line 2</label><input type="text"
                            name="requesteraddress2" id="requesteraddress2" class="form-control" value="<?php 
                            if(!empty($row['requester_address2'])) { echo $row['requester_address2']; } 
                            ?>" placeholder="Railway Colony">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-5">
                    <div class="form-group">
                        <label for="city">City</label><input type="text"
                            name="city" id="city" class="form-control" value="<?php 
                            if(!empty($row['requester_city'])) { echo $row['requester_city']; } 
                            ?>">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="state">State</label><input type="text"
                            name="state" id="state" class="form-control" value="<?php 
                            if(!empty($row['requester_state'])) { echo $row['requester_state']; } 
                            ?>">
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="zipcode">Zip Code</label><input type="text"
                            name="zipcode" id="zipcode" class="form-control" value="<?php 
                            if(!empty($row['requester_zip'])) { echo $row['requester_zip']; } 
                            ?>" onkeypress ="digitFunction(event)">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="email">Email</label><input type="email"
                            name="email" id="email" class="form-control" value="<?php 
                            if(!empty($row['requester_email'])) { echo $row['requester_email']; } 
                            ?>" >
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="mobileno">Mobile No.</label><input type="text"
                            name="mobileno" id="mobileno" class="form-control" value="<?php 
                            if(!empty($row['requester_mobile'])) { echo $row['requester_mobile']; } 
                            ?>" onkeypress ="digitFunction(event);">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="date">Date</label><input type="date"
                            name="date" id="date" class="form-control"  value="">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="technician">Assign to Technician</label><input type="text"
                            name="technician" id="technician" class="form-control"  value="">
                    </div>
                </div>
            </div>
            <div class="float-right">
                <input type="submit" class="btn btn-danger" name="assign" value="Assign">
                <input type="reset" class="btn btn-warning" name="reset" value="Reset">
            </div>
           
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



<?php include_once('include/footer.php'); ?>