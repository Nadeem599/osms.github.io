<?php
session_start();
define('TITLE','products');
define('PAGE','products');
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
$lbillid = $_SESSION['billid'];
$sql = " select * from sellproductbill where spb_id = '$lbillid' ";
$result = $con->query($sql);
$row = $result->fetch_assoc();
if($lbillid == $row['spb_id'])
{

}



?>

<div class="mt-5 mx-2">
        <h3 class="text-center">Customer bill</h3>
        <table class="table  table-bordered table-hover table-sm  table-striped">
            <tr>
                <th>Bill Id</th>
                <td>
                    <?php
                    if(isset($row['spb_id']))
                    {
                        echo $row['spb_id']; 
                    }
                     ?>
                </td>
            </tr>
            <tr>
                <th>Customer Name</th>
                <td>
                <?php
                    if(isset($row['spc_name']))
                    {
                        echo $row['spc_name']; 
                    }
                     ?>
                </td>
            </tr>
            <tr>
                <th>Customer Address</th>
                <td>
                <?php
                    if(isset($row['spc_address']))
                    {
                        echo $row['spc_address']; 
                    }
                     ?>
                </td>
            </tr>
            <tr>
                <th>Product Name</th>
                <td>
                <?php
                    if(isset($row['sp_name']))
                    {
                        echo $row['sp_name']; 
                    }
                     ?>
                </td>
            </tr>
            <tr>
                <th>Quantity</th>
                <td>
                <?php
                    if(isset($row['sp_quantity']))
                    {
                        echo $row['sp_quantity']; 
                    }
                     ?>
                </td>
            </tr>
            <tr>
                <th>Price Each</th>
                <td>
                <?php
                    if(isset($row['esp_price']))
                    {
                        echo $row['esp_price']; 
                    }
                     ?>
                </td>
            </tr>
            <tr>
                <th>Total Cost</th>
                <td>
                <?php
                    if(isset($row['spt_price']))
                    {
                        echo $row['spt_price']; 
                    }
                     ?>
                </td>
            </tr>
            <tr>
                <th>Order Date</th>
                <td>
                <?php
                    if(isset($row['sp_date']))
                    {
                        echo $row['sp_date']; 
                    }
                     ?>
                </td>
            </tr>
           
            <tr class="d-print-none">
                <td class="p-2">
                    <form action="" method="POST">
                        <input type="submit" class="btn btn-danger d-print-none float-right" value="Print" onClick="window.print()">
                        
                    </form>
                </td>
                <td class="p-2">
                    <form action="" method="post">
                        <a href="products.php" class="btn btn-dark d-print-none ">Close</a>
                    </form>
                </td>
            </tr>
        </table>

    </div>




</div>
</div>

<?php include_once('include/footer.php'); ?>