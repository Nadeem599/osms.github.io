<?php 
session_start();
define('TITLE','userrequestsubmit');
define('PAGE','userrequest');
include_once('include/header.php');  
include_once('../connection_db.php');
if(isset($_SESSION['myid']))
{
    $myid = $_SESSION['myid'];
    $email = $_SESSION['email'];
}
else
{
    header('Location:userlogin.php');
}

$sql = "select * from request where requester_id = '$myid'";
$result =  $con->query($sql);
if($result->num_rows== 1)
{
   $row = $result->fetch_assoc();
   
}
?>

<div class="col-lg-10 mb-5" style="min-height: 550px;">
    <table class=" table table-red table-bordered table-hover table-sm table-striped mt-4 mx-2">
        <tbody>
            <tr>
                <th>Requester Id</th>
                <td>
                    <?php echo $row['requester_id']; ?>
                </td>
            </tr>
            <tr>
                <th>Requester Info</th>
                <td>
                    <?php echo $row['requester_info'];?>
                </td>
            </tr>
            <tr>
                <th>Requester Description</th>
                <td>
                    <?php echo $row['requester_description'];?>
                </td>
            </tr>
            <tr>
                <th>Requester Name</th>
                <td>
                    <?php echo $row['requester_name'];?>
                </td>
            </tr>
            <tr>
                <th>Requester Address1</th>
                <td>
                    <?php echo $row['requester_address1']; ?>
                </td>
            </tr>
            <tr>
                <th>Requester Address2</th>
                <td>
                    <?php echo $row['requester_address2']; ?>
                </td>
            </tr>
            <tr>
                <th>Requester City</th>
                <td>
                    <?php echo $row['requester_city']; ?>
                </td>
            </tr>
            <tr>
                <th>Requester State</th>
                <td>
                    <?php echo $row['requester_state']; ?>
                </td>
            </tr>
            <tr>
                <th>Requester Zip</th>
                <td>
                    <?php echo $row['requester_zip']; ?>
                </td>
            </tr>
            <tr>
                <th>Requester Email</th>
                <td>
                    <?php echo $row['requester_email']; ?>
                </td>
            </tr>
            <tr>
                <th>Requester Mobile</th>
                <td>
                    <?php echo $row['requester_mobile']; ?>
                </td>
            </tr>
            <tr>
                <th>Requester Date</th>
                <td>
                    <?php echo $row['requester_date'];?>
                </td>
            </tr>
            
        </tbody>
        
    </table>
    <div class="pl-2">
        <form action="" class="d-print-none float-right">
            <input type="submit" class="btn btn-danger" value="Print" onClick="window.print()">

        </form>
        <a href="userrequest.php" class="d-print-none float-right btn btn-dark mr-1">Close</a>
    </div>
</div>