<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../boot/css/bootstrap.min.css">
    <link rel="stylesheet" href="../boot/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="../boot/css/style1.css">
    <title>
        <?php echo TITLE; ?>
    </title>


</head>

<body>
    <nav class="navbar navbar-dark   bg-danger ">
        <a href="" class="navbar-brand">Admin Panel</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
    </nav>


    <div class="row">
        <div class="  col-lg-2 jumbotron p-0 navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item"><a
                        class="nav-link px-2 <?php if(PAGE=='adminprofile'){ echo'bg-danger text-white'; } ?>"
                        href="adminprofile.php"><i class="fa fa-tachometer mr-1"></i>Dashboard</a></li>
                <li class="nav-item "><a href="work.php"
                        class="nav-link px-2 <?php if(PAGE=='Work Order'){ echo'bg-danger text-white'; } ?>"><i
                            class="fa fa-first-order mr-1"></i>Work Order</a></li>
                <li class="nav-item"><a href="requests.php"
                        class=" nav-link px-2 <?php if(PAGE=='requests'){ echo'bg-danger text-white'; } ?>"><i
                            class="fa fa-align-justify mr-1"></i>Requests</a></li>
                <li class="nav-item "><a href="products.php"
                        class=" nav-link px-2 <?php if(PAGE=='products'){ echo'bg-danger text-white'; } ?>"><i
                            class="fa fa-file-image-o mr-1"></i>Products</a></li>
                <li class="nav-item "><a href="technician.php"
                        class=" nav-link px-2 <?php if(PAGE=='technician'){ echo'bg-danger text-white'; } ?>"><i
                            class="fa fa-automobile mr-1"></i>Technician</a></li>
                <li class="nav-item "><a href="requester.php"
                        class=" nav-link px-2 <?php if(PAGE=='requester'){ echo'bg-danger text-white'; } ?>"><i
                            class="fa fa-user mr-1"></i>Requester</a></li>
                <li class="nav-item "><a href="sellproductreport.php"
                        class=" nav-link px-2 <?php if(PAGE=='sellproductreport'){ echo'bg-danger text-white'; } ?>"><i
                            class="fa fa-sellsy mr-1"></i>Sell Product</a></li>
                <li class="nav-item "><a href="workreport.php"
                        class=" nav-link px-2 <?php if(PAGE=='workreport'){ echo'bg-danger text-white'; } ?>"><i
                            class="fa fa-table mr-1"></i>Work Report</a></li>
                <li class="nav-item "><a href="changepassword.php"
                        class=" nav-link px-2 <?php if(PAGE=='changepassword'){ echo'bg-danger text-white'; } ?>"><i
                            class="fa fa-key mr-1"></i>Change Password</a></li>
                <li class="nav-item "><a href="logout.php"
                        class=" nav-link px-2 <?php if(PAGE=='logout'){ echo'bg-danger text-white'; } ?>"><i
                            class="fa fa-lock mr-1"></i>Logout</a></li>
            </ul>
        </div>