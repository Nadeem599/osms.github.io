<?php
session_start();
define('TITLE','sellproductreport');
define('PAGE','sellproductreport');
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
    <form action="" method="POST" class="mt-5 mx-2 form-inline d-print-none ">
        <div class="form-group ">
            <label for="startdate" class="mr-2">From</label>
            <input type="date" name="startdate" id="startdate" class="form-control mr-2 ">
        </div>
        <div class="form-group">
            <label for="enddate" class="mr-2">To</label>
            <input type="date" name="enddate" id="enddate" class="form-control mr-2">
        </div>
        <input type="submit" class="btn btn-danger" value="Search" name="search">
    </form>

<?php
if(isset($_REQUEST['search']))
{
    if(empty($_POST['startdate'])||empty($_POST['enddate']))
    {
        $msg = '<div class="alert alert-warning mt-2 alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert">&times;</button>All fields are required</div>';
    }
    else
    {
     $startdate = $_POST['startdate'];
     $enddate = $_POST['enddate'];
        $sql = " select * from sellproductbill where sp_date  between '$startdate' and '$enddate' " ;
        $result = $con->query($sql);
        
        
        if($result->num_rows > 0)
        {
            echo '<p class="bg-dark text-white text-center mt-4 p-2">Details</p> ';
            echo '<table class="table">
               <thead>
                    <tr>
                        <th>Customer Id</th>
                    <th>Customer Name</th>
                        <th>Address</th>
                        <th>Product Name</th>
                       <th>Quantity</th>
                       <th>Price Each</th>
                        <th>Total</th>
                        <th>Date</th>
                    </tr>
                </thead>
                </tbody>';
                while($row = $result->fetch_assoc())
                {
                    echo '<tr>';
                        echo '<td>'.$row['spb_id'].'</td>';
                        echo '<td>'.$row['spc_name'].'</td>';
                        echo '<td>'.$row['spc_address'].'</td>';
                        echo '<td>'.$row['sp_name'].'</td>';
                        echo '<td>'.$row['sp_quantity'].'</td>';
                        echo '<td>'.$row['esp_price'].'</td>';
                        echo '<td>'.$row['spt_price'].'</td>';
                        echo '<td>'.$row['sp_date'].'</td>';
                    echo '</tr>';
                }
                echo '</tbody>';
                echo 
                '
                <tr class="d-print-none">
                <td class="p-2">
                    <form action="" method="POST">
                        <input type="submit" class="btn btn-danger d-print-none float-right" value="Print" onClick="window.print()">
                        
                    </form>
                </td>
                <td class="p-2">
                    <form action="" method="post">
                        <a href="sellproductreport.php" class="btn btn-dark d-print-none">Close</a>
                    
                    </form>
                </td>
            </tr>
            ';
            echo '</table>';
        }
    }
}

?>
    
<?php
if(isset($msg))
{
    echo $msg;
}
?>



</div>
</div>

<?php include_once('include/footer.php'); ?>