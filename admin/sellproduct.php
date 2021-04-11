<?php
session_start();
define('TITLE','sellproduct');
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
    if(isset($_POST['sell']))
    {
        $id = $_POST['id'];
        $sql = " select * from assets where asset_id = '$id'";
        $result = $con->query($sql);
        $row = $result->fetch_assoc();

    }
    ?>
        <?php

if(isset($_POST['submit']))
{
    if(empty($_POST['id'])||empty($_POST['customername'])||empty($_POST['customeraddress'])||empty($_POST['productname'])||empty($_POST['available'])||empty($_POST['quantity'])||empty($_POST['sellingprice'])||empty($_POST['totalprice'])||empty($_POST['date']))
    {
        $msg = '<div class="alert alert-warning mt-2 alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert">&times;</button>All fields are required</div>';
    }
    else
    { 
    
            $id =mysqli_real_escape_string($con, trim($_POST['id']));
            $id = htmlentities($id,ENT_QUOTES);       
            $customername =mysqli_real_escape_string($con, trim($_POST['customername']));
            $customername = htmlentities($customername,ENT_QUOTES);
            $customeraddress =mysqli_real_escape_string($con, trim($_POST['customeraddress']));
            $customeraddress = htmlentities($customeraddress,ENT_QUOTES);
            $productname =mysqli_real_escape_string($con, trim($_POST['productname']));
            $productname = htmlentities($productname,ENT_QUOTES);
           // $total =mysqli_real_escape_string($con, trim($_POST['total']));
           // $total = htmlentities($total,ENT_QUOTES);
            $available =mysqli_real_escape_string($con, trim($_POST['available']));
            $available = htmlentities($available,ENT_QUOTES);
            $quantity =mysqli_real_escape_string($con, trim($_POST['quantity']));
            $quantity = htmlentities($quantity,ENT_QUOTES);
            $sellingprice =mysqli_real_escape_string($con, trim($_POST['sellingprice']));
            $sellingprice = htmlentities($sellingprice,ENT_QUOTES);
            $totalprice =mysqli_real_escape_string($con, trim($_POST['totalprice']));
            $totalprice = htmlentities($totalprice,ENT_QUOTES);
            $date =mysqli_real_escape_string($con, trim($_POST['date']));
            $date = htmlentities($date,ENT_QUOTES);


            $last = $available - $quantity;



        $sql = " insert into sellproductbill(spc_name,spc_address,sp_name,sp_quantity,esp_price,spt_price,sp_date) values('$customername','$customeraddress','$productname','$quantity','$sellingprice','$totalprice','$date') ";
        if($con->query($sql) == true)
        
        {
            $billid = mysqli_insert_id($con);
            $_SESSION['billid'] = $billid;

            $sql = " update assets set asset_available = '$last' where asset_id = '$id' ";
            $con->query($sql);

            $msg = '<div class="alert alert-warning mt-2 alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert">&times;</button>Sell Product bill is inserted successfully</div>';

            header('Location:printbill.php');
            
        }
        else
        {
            $msg = '<div class="alert alert-warning mt-2 alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert">&times;</button>Sell Product bill is not inserted successfully</div>';
        }
    }
}

?>
        


<form action="" method="post" class="jumbotron mt-5 ">
<div class="form-group">
                    <label for="id" class="font-weight-bold"><i class="fa fa-user-plus mr-1"></i>id</label>
                    <input type="text" readonly name="id" class="form-control" id="id" placeholder="id" value="<?php 
                    if(!empty($row['asset_id'])) { echo $row['asset_id']; } 
                    ?>">
                </div>
                <div class="form-group">
                    <label for="customername" class="font-weight-bold"><i class="fa fa-user-plus mr-1"></i>customer name</label>
                    <input type="text" name="customername" class="form-control" id="customername" placeholder="customer name">
                </div>
                
                <div class="form-group">
                    <label for="customeraddress" class="font-weight-bold "><i class="fa fa-windows  mr-1"></i>customer address</label>
                   <input type="text" name="customeraddress" class="form-control" id="customeraddress" placeholder="customer address" >
                </div>
               
                <div class="form-group">
                    <label for="productname" class="font-weight-bold"><i class="fa fa-phone-square fa-1x mr-1"></i>product name</label>
                   <input type="text" name="productname" readonly class="form-control" id="productname" placeholder="product name" value="<?php 
                    if(!empty($row['asset_name'])) { echo $row['asset_name']; } 
                    ?>">
                </div>
                <div class="form-group">
                    <label for="available" class="font-weight-bold"><i class="fa fa-envelope mr-1"></i>available</label>
                   <input type="text" readonly name="available" class="form-control" id="available" placeholder="available" onkeypress ="digitFunction(event)" value="<?php 
                    if(!empty($row['asset_available'])) 
                    { 
                        echo $row['asset_available']; 
                        $msg1 = '<div class="alert alert-warning mt-2 alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert">&times;</button>product is available</div>';
                    }
                    else
                    {
                        echo "product is not available. Now you can't do order.";
                        $msg1 = '<div class="alert alert-warning mt-2 alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert">&times;</button>product is not available</div>';
                    } 
                    ?>">
                    <?php
            if(isset($msg1))
            {
                echo $msg1;
            }
            ?>
                </div>
                <div class="form-group">
                    <label for="quantity" class="font-weight-bold"><i class="fa fa-envelope mr-1"></i>quantity</label>
                   <input type="text" name="quantity" class="form-control" id="quantity" placeholder="quantity" onkeypress ="digitFunction(event)">
                </div>
                <div class="form-group">
                    <label for="sellingprice" class="font-weight-bold"><i class="fa fa-envelope mr-1"></i>Each Selling Price</label>
                   <input type="text" name="sellingprice" readonly class="form-control" id="sellingprice" placeholder="Selling Price" onkeypress ="digitFunction(event)" value="<?php 
                    if(!empty($row['asset_sellingprice'])) { echo $row['asset_sellingprice']; } 
                    ?>">
                </div>
                <div class="form-group">
                    <label for="totalprice" class="font-weight-bold"><i class="fa fa-envelope mr-1"></i>Total Price</label>
                   <input type="text" name="totalprice" class="form-control" id="totalprice" placeholder="Total Price" onkeypress ="digitFunction(event)">
                </div>
                <div class="form-group">
                    <label for="date" class="font-weight-bold"><i class="fa fa-envelope mr-1"></i>date</label>
                   <input type="date" name="date" class="form-control" id="date" placeholder="date">
                </div>
            <div class="text-center">
                
            
                <input type="submit" class="btn btn-success " value="Submit" name="submit">
           
               
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