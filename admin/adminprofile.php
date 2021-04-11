<?php
session_start();
define('TITLE','adminprofile');
define('PAGE','adminprofile');
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

<div class="col-md-10 " style="min-height: 550px;">
    <div class="row text-center mt-5 mx-2">
        <div class="col-md-4">
            <div class="card text-white bg-danger mb-5">
                <div class="card-header">Requests Received</div>
                <div class="card-body">
                    <div class="card-title">43</div>
                    <a href="" class="btn text-white">View</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-success mb-5">
                <div class="card-header">Assigned Work</div>
                <div class="card-body">
                    <div class="card-title">52</div>
                    <a href="" class="btn text-white">View</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-info mb-5">
                <div class="card-header">No. of Technician</div>
                <div class="card-body">
                    <div class="card-title">2</div>
                    <a href="" class="btn text-white">View</a>
                </div>
            </div>
        </div>
    </div>
    <div class="text-center  mx-2">
        <p class="bg-danger text-white p-2 mb-0">List of Requesters</p>
        <?php
        $sql = " select * from registration ";
        $result = $con->query($sql);
        if($result->num_rows> 0)
        {
            echo '
            <table class="table bg-light table-bordered table-hover  table-striped">
                <thead>
                   <tr>
                    <th>User Id</th>
                    <th>User Name</th>
                    <th>User Email</th>
                   </tr>
                </thead>
                <tbody>';
                    while($row = $result->fetch_assoc())
                    {
                    echo '<tr>';
                      echo   '<td>'.$row['u_id'].'</td>';
                      echo   '<td>'.$row['u_name'].'</td>';
                      echo   '<td>'.$row['u_email'].'</td>';
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
</div>
<?php include_once('include/footer.php'); ?>