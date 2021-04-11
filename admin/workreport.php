<?php
session_start();
define('TITLE','sellproductreport');
define('PAGE','workreport');
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
    <form action="" method="POST" class="mt-5 mx-2 form-inline d-print-none">
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
        $sql = " select * from assignwork where assignworkr_date  between '$startdate' and '$enddate' " ;
        $result = $con->query($sql);
        
        
        if($result->num_rows > 0)
        {
            echo '<p class="bg-dark text-white text-center mt-4 p-2">Details</p> ';
            echo '<table class="table">
               <thead>
                    <tr>
                    <th>Id</th>
                    <th>Info</th>
                    <th>Description</th>
                    <th>Name</th>
                    <th>Address1</th>
                    <th>Address2</th>
                    <th>City</th>
                    <th>State</th>
                    <th>ZipCode</th>
                    <th>Mobile</th>
                    <th>Date</th>
                    <th>Technician</th>
                    </tr>
                </thead>
                </tbody>';
                while($row = $result->fetch_assoc())
                {
                    echo '<tr>';
                        echo '<td>'.$row['assignworkr_id'].'</td>';
                        echo '<td>'.$row['assignworkr_info'].'</td>';
                        echo '<td>'.$row['assignworkr_description'].'</td>';
                        echo '<td>'.$row['assignworkr_name'].'</td>';
                        echo '<td>'.$row['assignworkr_address1'].'</td>';
                        echo '<td>'.$row['assignworkr_address2'].'</td>';
                        echo '<td>'.$row['assignworkr_city'].'</td>';
                        echo '<td>'.$row['assignworkr_state'].'</td>';
                        echo '<td>'.$row['assignworkr_zip'].'</td>';
                        echo '<td>'.$row['assignworkr_mobile'].'</td>';
                        echo '<td>'.$row['assignworkr_date'].'</td>';
                        echo '<td>'.$row['assignworkr_technician'].'</td>';
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
                        <a href="workreport.php" class="btn btn-dark d-print-none">Close</a>
                    
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

<?php include_once('include/footer.php'); ?>