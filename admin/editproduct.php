<?php
session_start();
define('TITLE','edittechnician');
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
    if(isset($_POST['edit']))
    {
        $id = $_POST['id'];
        $sql = " select * from assets where asset_id = '$id'";
        $result = $con->query($sql);
        $row = $result->fetch_assoc();

    }
    ?>
        <?php

if(isset($_POST['update']))
{
    if(empty($_POST['name'])||empty($_POST['dop'])||empty($_POST['available'])||empty($_POST['total'])||empty($_POST['originalprice'])||empty($_POST['sellingprice']))
    {
        $msg = '<div class="alert alert-warning mt-2 alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert">&times;</button>All fields are required</div>';
    }
    else
    {   
            $id =mysqli_real_escape_string($con, trim($_POST['id']));
            $id = htmlentities($id,ENT_QUOTES);       
            $name =mysqli_real_escape_string($con, trim($_POST['name']));
            $name = htmlentities($name,ENT_QUOTES);
            $dop =mysqli_real_escape_string($con, trim($_POST['dop']));
            $dop = htmlentities($dop,ENT_QUOTES);
            $available =mysqli_real_escape_string($con, trim($_POST['available']));
            $available = htmlentities($available,ENT_QUOTES);
            $total =mysqli_real_escape_string($con, trim($_POST['total']));
            $total = htmlentities($total,ENT_QUOTES);
            $originalprice =mysqli_real_escape_string($con, trim($_POST['originalprice']));
            $originalprice = htmlentities($originalprice,ENT_QUOTES);
            $sellingprice =mysqli_real_escape_string($con, trim($_POST['sellingprice']));
            $sellingprice = htmlentities($sellingprice,ENT_QUOTES);
        $sql = " update  assets set asset_name = '$name', asset_date = '$dop', asset_available = '$available', asset_total = '$total', asset_originalprice = '$originalprice', asset_sellingprice = '$sellingprice'  where asset_id = '$id'";
        if($con->query($sql) == true)
        
        {
            $msg = '<div class="alert alert-warning mt-2 alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert">&times;</button>Product info is Updated</div>';
            
        }
        else
        {
            $msg = '<div class="alert alert-warning mt-2 alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert">&times;</button>Product info is not Updated</div>';
        }
    }
}

?>
        


<form action="" method="post" class="jumbotron mt-5 pt-0">
<h5 class="text-center">Update All Products</h5>
<div class="form-group">
                    <label for="id" class="font-weight-bold"><i class="fa fa-user-plus mr-1"></i>id</label>
                    <input type="text" readonly name="id" class="form-control" id="id" placeholder="id" value="<?php 
                    if(!empty($row['asset_id'])) { echo $row['asset_id']; } 
                    ?>">
                </div>
                <div class="form-group">
                    <label for="name" class="font-weight-bold"><i class="fa fa-user-plus mr-1"></i>name</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="name" value="<?php 
                    if(!empty($row['asset_name'])) { echo $row['asset_name']; } 
                    ?>">
                </div>
                
                <div class="form-group">
                    <label for="dop" class="font-weight-bold "><i class="fa fa-windows  mr-1"></i>Date of Purchase</label>
                   <input type="date" name="dop" class="form-control" id="dop" placeholder="Date of Purchase" value="<?php 
                    if(!empty($row['asset_date'])) { echo $row['asset_date']; } 
                    ?>">
                </div>
               
                <div class="form-group">
                    <label for="available" class="font-weight-bold"><i class="fa fa-phone-square fa-1x mr-1"></i>Available Product</label>
                   <input type="text" name="available" class="form-control" id="available" placeholder="Available Product" onkeypress ="digitFunction(event)" value="<?php 
                    if(!empty($row['asset_available'])) 
                    { 
                        echo $row['asset_available']; 
                    }
                   
                    ?>">
                </div>
                
                <div class="form-group">
                    <label for="total" class="font-weight-bold"><i class="fa fa-envelope mr-1"></i>Total Product</label>
                   <input type="text" name="total" class="form-control" id="total" placeholder="Total Product" onkeypress ="digitFunction(event)" value="<?php 
                    if(!empty($row['asset_total'])) { echo $row['asset_total']; } 
                    ?>">
                </div>
                <div class="form-group">
                    <label for="originalprice" class="font-weight-bold"><i class="fa fa-envelope mr-1"></i>Original Price</label>
                   <input type="text" name="originalprice" class="form-control" id="originalprice" placeholder="Original Price" onkeypress ="digitFunction(event)" value="<?php 
                    if(!empty($row['asset_originalprice'])) { echo $row['asset_originalprice']; } 
                    ?>">
                </div>
                <div class="form-group">
                    <label for="sellingprice" class="font-weight-bold"><i class="fa fa-envelope mr-1"></i>Selling Price</label>
                   <input type="text" name="sellingprice" class="form-control" id="sellingprice" placeholder="Selling Price" onkeypress ="digitFunction(event)" value="<?php 
                    if(!empty($row['asset_sellingprice'])) { echo $row['asset_sellingprice']; } 
                    ?>">
                </div>
            <div class="text-center">
                
            
                <input type="submit" class="btn btn-success " value="Update" name="update">
           
               
                <a href="products.php" class="btn btn-dark">Close</a>
            </div>
            <?php
            if(isset($msg))
            {
                echo $msg;
            }
            ?>
    </form>










</div>
</div>




<?php include_once('include/footer.php'); ?>