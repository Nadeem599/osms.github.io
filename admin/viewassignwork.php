<?php
session_start();
define('TITLE','Work Order');
define('PAGE','Work Order');
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

<!-- starting view -->
<?php

    if(isset($_POST['view']))
    {
    
    
        $id = $_POST['id'];
        $sql = " select * from assignwork where assignworkr_id = '$id' ";
        $result = $con->query($sql);
        $row = $result->fetch_assoc();
        $assignworkrid = $row['assignworkr_id'];
        if($id == $assignworkrid)
        {
            
            ?>

    <div class="mt-5 mx-2">
        <h3 class="text-center">Assign work to Technician</h3>
        <table class="table  table-bordered table-hover table-sm  table-striped">
            <tr>
                <th>AssignRequest Id</th>
                <td>
                    <?php echo $row['assignworkr_id']; ?>
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
                        <input type="submit" class="btn btn-danger d-print-none float-right" value="Print" name="print" onClick="window.print()">
                        
                    </form>
                </td>
                <td class="p-2">
                    <form action="" method="post">
                        <input type="submit" class="btn btn-dark d-print-none " name="close" value="Close">
                    </form>
                </td>
            </tr>
        </table>
        </div>

        <?php
        }
    }
        
        ?>

<!-- ending view--->
<?php
if(isset($_POST['print'])||isset($_POST['close']))
{
header('Location:work.php');
}
?>



</div>
</div>

<?php include_once('include/footer.php'); ?>