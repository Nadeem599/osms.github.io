<?php
session_start();
define('TITLE','requester');
define('PAGE','requester');
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
        <p class="bg-danger text-center text-white p-2 mb-0">List of Requesters</p>
        <?php
        $sql = " select * from registration ";
        $result = $con->query($sql);
        if($result->num_rows> 0)
        {
            echo '
            <table class="table bg-light table-bordered table-hover table-sm  table-striped">
                <thead>
                   <tr>
                    <th>User Id</th>
                    <th>User Name</th>
                    <th>User Email</th>
                    <th>Action</th>
                   </tr>
                </thead>
                <tbody>';
                    while($row = $result->fetch_assoc())
                    {
                    echo '<tr>';
                      echo   '<td>'.$row['u_id'].'</td>';
                      echo   '<td>'.$row['u_name'].'</td>';
                      echo   '<td>'.$row['u_email'].'</td>';
                      echo '<td>';
                      echo'<form action="editrequester.php" class="float-right" method="POST">';
                            echo '<input type="text" name="id" hidden  class="form-control" value='.$row["u_id"]. '>';
                            echo '<button type="submit" name="edit"  class="btn btn-info "><i class="fa fa-edit" ></i></button>';
                            echo'</form>';
                            echo'<form action="deleterequesterinfo.php" class="float-right mr-1"  method="POST">';
                            echo '<input type="text" name="id" hidden  class="form-control" value='.$row["u_id"]. '>';
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
    <a href="insertrequester.php" class="btn btn-danger float-right"><i class="fa fa-plus "></i></a>
</div>



</div>
</div>
<?php include_once('include/footer.php'); ?>