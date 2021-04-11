<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../boot/css/bootstrap.min.css">
    <link rel="stylesheet" href="../boot/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="../boot/css/style1.css">
    <title><?php echo TITLE; ?></title>


</head>

<body>
    <nav class="navbar navbar-dark bg-danger">
        <a href="" class="navbar-brand">User Panel</a>
    </nav>
    <div class="container-fluid">
        <div class="row">
            
            <div class="col-lg-2 bg-light">
                <nav class="navbar sticky-top mt-4 mb-4">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a class="nav-link px-2 <?php if(PAGE=='userprofile'){ echo'bg-danger text-white'; } ?>"  href="userprofile.php"><i class="fa fa-user mr-1"></i>Profile</a></li>
                        <li class="nav-item "><a href="userrequest.php" class="nav-link px-2 <?php if(PAGE=='userrequest'){ echo'bg-danger text-white'; } ?>"><i
                                    class="fa fa-universal-access mr-1"></i>Submit Request</a></li>
                        <li class="nav-item"><a href="servicestatus.php" class=" nav-link px-2 <?php if(PAGE=='servicestatus'){ echo'bg-danger text-white'; } ?>"><i
                                    class="fa fa-align-justify mr-1"></i>Service Status</a></li>
                        <li class="nav-item "><a href="changepassword.php" class=" nav-link px-2 <?php if(PAGE=='changepassword'){ echo'bg-danger text-white'; } ?>"><i
                                    class="fa fa-key mr-1"></i>Change Password</a></li>
                        <li class="nav-item "><a href="logout.php" class=" nav-link px-2 <?php if(PAGE=='logout'){ echo'bg-danger text-white'; } ?>"><i
                                    class="fa fa-lock mr-1"></i>Logout</a></li>
                    </ul>
                </nav>
            </div>