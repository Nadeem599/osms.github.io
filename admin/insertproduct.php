<?php
session_start();
define('TITLE','insertproducts');
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

if(isset($_REQUEST['insert']))
{
    if(empty($_POST['name'])||empty($_POST['dop'])||empty($_POST['available'])||empty($_POST['total'])||empty($_POST['originalprice'])||empty($_POST['sellingprice']))
    {
        $msg = '<div class="alert alert-warning mt-2 alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert">&times;</button>All fields are required</div>';
    }
    else
    {
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
            $sql = " insert into assets(asset_name,asset_date,asset_available,asset_total,asset_originalprice,asset_sellingprice) values('$name','$dop','$available','$total','$originalprice','$sellingprice') ";
            if($con->query($sql) == true)
            {
                $msg = '<div class="alert alert-success mt-2 alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert">&times;</button>New product is inserted</div>';
            }
            else
            {
                $msg = '<div class="alert alert-danger mt-2 alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert">&times;</button>New product is not inserted</div>';
            }
        }
    }


?>

<div class="container pt-5 mb-5" id="registration">
    <h3 class="text-center text-danger mb-4">Add a new Product</h3>
    <div class="row">
        <div class="col-sm-6 offset-sm-3">
            <?php
    if(isset($msg))
    {
        echo $msg;
       
    }
    ?>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6 offset-sm-3">
        <div class="jumbotron bg-danger shadow shadow-lg p-5">
            <form action="" class=" p-4   bg-info " method="POST">
                
                <div class="form-group">
                    <label for="name" class="font-weight-bold"><i class="fa fa-user-plus mr-1"></i>name</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="name">
                </div>
                
                <div class="form-group">
                    <label for="dop" class="font-weight-bold "><i class="fa fa-windows  mr-1"></i>Date of Purchase</label>
                   <input type="date" name="dop" class="form-control" id="dop" placeholder="Date of Purchase">
                </div>
               
                <div class="form-group">
                    <label for="available" class="font-weight-bold"><i class="fa fa-phone-square fa-1x mr-1"></i>Available Product</label>
                   <input type="text" name="available" class="form-control" id="available" placeholder="Available Product" onkeypress ="digitFunction(event)">
                </div>
                
                <div class="form-group">
                    <label for="total" class="font-weight-bold"><i class="fa fa-envelope mr-1"></i>Total Product</label>
                   <input type="text" name="total" class="form-control" id="total" placeholder="Total Product" onkeypress ="digitFunction(event)">
                </div>
                <div class="form-group">
                    <label for="originalprice" class="font-weight-bold"><i class="fa fa-envelope mr-1"></i>Original Price</label>
                   <input type="text" name="originalprice" class="form-control" id="originalprice" placeholder="Original Price" onkeypress ="digitFunction(event)">
                </div>
                <div class="form-group">
                    <label for="sellingprice" class="font-weight-bold"><i class="fa fa-envelope mr-1"></i>Selling Price</label>
                   <input type="text" name="sellingprice" class="form-control" id="sellingprice" placeholder="Selling Price" onkeypress ="digitFunction(event)">
                </div>
               
                
                    
                <input type="submit" class="btn btn-danger  shadow-sm" name="insert" value="Insert">
                <a href="products.php" class='btn  btn-dark'>Close</a>
                
               

            </form>
            </div>

        </div>
    </div>
</div>
<!-- end registration -->
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