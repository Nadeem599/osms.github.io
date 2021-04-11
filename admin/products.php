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

<div class=" mt-5 mx-2">
        <p class="bg-danger text-center text-white p-2 mb-0">All Product details</p>
        <?php
        $sql = " select * from assets ";
        $result = $con->query($sql);
        if($result->num_rows> 0)
        {
            echo '
            <table class="table bg-light table-bordered table-hover table-sm  table-striped">
                <thead>
                   <tr>
                    <th>Asset Id</th>
                    <th>Asset Name</th>
                    <th>Asset DOP</th>
                    <th>Asset available</th>
                    <th>Asset Total</th>
                    <th>Original Cost</th>
                    <th>Selling Cost</th>
                    <th>Action</th>
                   </tr>
                </thead>
                <tbody>';
                    while($row = $result->fetch_assoc())
                    {
                    echo '<tr>';
                      echo   '<td>'.$row['asset_id'].'</td>';
                      echo   '<td>'.$row['asset_name'].'</td>';
                      echo   '<td>'.$row['asset_date'].'</td>';
                      echo   '<td>'.$row['asset_available'].'</td>';
                      echo   '<td>'.$row['asset_total'].'</td>';
                      echo   '<td>'.$row['asset_originalprice'].'</td>';
                      echo   '<td>'.$row['asset_sellingprice'].'</td>';
                      echo '<td>';
                            echo'<form action="editproduct.php" class="float-right " method="POST">';
                            echo '<input type="text" name="id" hidden  class="form-control" value='.$row["asset_id"]. '>';
                            echo '<button type="submit" name="edit"  class="btn btn-info"><i class="fa fa-edit" ></i></button>';
                            echo'</form>';
                            echo'<form action="sellproduct.php" class="float-right mr-1" method="POST">';
                            echo '<input type="text" name="id" hidden  class="form-control" value='.$row["asset_id"]. '>';
                            echo '<button type="submit" name="sell"  class="btn btn-info"><i class="fa fa-cart-plus" ></i></button>';
                            echo'</form>';
                            echo'<form action="deleteproduct.php" class="float-right mr-1"  method="POST">';
                            echo '<input type="text" name="id" hidden  class="form-control" value='.$row["asset_id"]. '>';
                            echo '<button type="submit" name="delete"  class="btn btn-danger"><i class="fa fa-cut" ></i></button>';
                            echo'</form>';
                      echo '</td>';
                      echo '</tr>'; 
                    }

              echo ' </tbody>
            </table>
           ';
        }
        else
        {
            echo '0 result';
        }
        ?>
    </div>

<div class="mt-4 mx-2">
    <a href="insertproduct.php" class="btn btn-danger float-right"><i class="fa fa-plus "></i></a>
</div>



</div>
</div>
<?php include_once('include/footer.php'); ?>