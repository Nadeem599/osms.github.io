<?php 
session_start();
include_once('../connection_db.php');
define('TITLE','servicestatus');
define('PAGE','servicestatus');
include_once('include/header.php');
if(isset($_SESSION['is_login']))
{
    $email = $_SESSION['email'];
}
else
{
    header('Location:userlogin.php');
}




?>

<div class="col-lg-10" style="min-height: 550px;">

    <form action="" method="POST" class="mt-5 mx-2 form-inline d-print-none">

        <div class="form-group">
            <label for="id" class="mr-2">Request ID: </label><input type="text" name="id" id="id"
                class="form-control mr-2" placeholder="Id" value="" onkeypress ="digitFunction(event);">
        </div>
        <input type="submit" class="btn btn-danger" name="search" value="Search">
    </form>


    <?php

    if(isset($_POST['search']))
    {
    if(empty($_POST['id']))
    {
        $msg = '<div class="alert alert-warning mt-2 alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert">&times;</button>All fields are required</div>';
    }
    else
    {
        $id = $_POST['id'];
        $sql = " select * from assignwork where assignworkr_id = '$id' ";
        $result = $con->query($sql);
        $row = $result->fetch_assoc();
        $assignworkrid = $row['assignworkr_id'];
        if($id == $assignworkrid)
        {
            $msg = '<div class="alert alert-warning mt-2 alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert">&times;</button>Technician is assigned to Request</div>';
        
        }
        else
        {
            $sql = " select * from request where requester_id = '$id' ";
            $result = $con->query($sql);
            $row = $result->fetch_assoc();
            $requesterid = $row['requester_id'];
            if($id == $requesterid)
            {
                $msg = '<div class="alert alert-warning mt-2 alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert">&times;</button>Request is still in pending</div>';
            }
            else
            {
                $msg = '<div class="alert alert-warning mt-2 alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert">&times;</button>Enter valid id</div>';
            }
        }
    }
}
            
            ?>

<?php
if(isset($assignworkrid))
{ 
?>
    <div class="mt-5 mx-2">
        <h3 class="text-center">Assign work to Technician</h3>
        <table class="table  table-bordered table-hover table-sm  table-striped">
            <tr>
                <th>AssignRequest Id</th>
                <td>
                    <?php echo $row['assignworkr_id'];  ?>
                </td>
            </tr>
            <tr>
                <th>AssignRequest Info</th>
                <td>
                    <?php echo $row['assignworkr_info']; ?>
                </td>
            </tr>
            <tr>
                <th>AssignRequest Description</th>
                <td>
                    <?php echo $row['assignworkr_description']; ?>
                </td>
            </tr>
            <tr>
                <th>AssignRequest Name</th>
                <td>
                    <?php echo $row['assignworkr_name']; ?>
                </td>
            </tr>
            <tr>
                <th>AssignRequest Address1</th>
                <td>
                    <?php echo $row['assignworkr_address1']; ?>
                </td>
            </tr>
            <tr>
                <th>AssignRequest Address2</th>
                <td>
                    <?php echo $row['assignworkr_address2']; ?>
                </td>
            </tr>
            <tr>
                <th>AssignRequest City</th>
                <td>
                    <?php echo $row['assignworkr_city']; ?>
                </td>
            </tr>
            <tr>
                <th>AssignRequest State</th>
                <td>
                    <?php echo $row['assignworkr_state']; ?>
                </td>
            </tr>
            <tr>
                <th>AssignRequest ZipCode</th>
                <td>
                    <?php echo $row['assignworkr_zip']; ?>
                </td>
            </tr>
            <tr>
                <th>AssignRequest Email</th>
                <td>
                    <?php echo $row['assignworkr_email']; ?>
                </td>
            </tr>
            <tr>
                <th>AssignRequest Mobile</th>
                <td>
                    <?php echo $row['assignworkr_mobile']; ?>
                </td>
            </tr>
            <tr>
                <th>AssignRequest Date</th>
                <td>
                    <?php echo $row['assignworkr_date']; ?>
                </td>
            </tr>
            <tr>
                <th>AssignRequest Technician</th>
                <td>
                    <?php echo $row['assignworkr_technician']; ?>
                </td>
            </tr>
            <tr>
                <th>Customer Sign</th>
                <td></td>
            </tr>
            <tr>
                <th>Technician Sign</th>
                <td></td>
            </tr>
            <tr class="d-print-none">
                <td class="p-2">
                    <form action="" method="POST">
                        <input type="submit" class="btn btn-danger d-print-none float-right" value="Print" onClick="window.print()">
                        
                    </form>
                </td>
                <td class="p-2">
                    <form action="" method="post">
                        <input type="submit" class="btn btn-dark d-print-none " value="Close">
                    </form>
                </td>
            </tr>
        </table>

    </div>
    <?php 
}        
            ?>
    <div class="d-print-none">
    <?php
            if(isset($msg))
            {
                echo $msg;
            }
            ?>
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