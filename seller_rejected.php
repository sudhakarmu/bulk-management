<?php
include('security.php') ;
include('includes/header.php');
include('includes/navbar.php');
?><?php if($_SESSION['ROLE']=="admin")
{
  ?>  <div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Sellers</h1>
</div>
<?php
if(isset($_GET['revieve']))
{
    $id = htmlentities($_GET['revieve']);

    $query = "UPDATE users SET status=1 WHERE id='$id'";

    $result = mysqli_query($con, $query);
}

?>
<!--Page Heading ends-->
<div class="card shadow mb-6">
            <div class="card-header py-3 col-lg-12">
              <h6 class="m-1 font-weight-bold text-primary">Sellers  &nbsp;
                  <!-- Button trigger modal -->

                </h6>
            </div>
            <div class="card-body">
            <?php
            if(isset($_SESSION['success']) && ($_SESSION['success'])!='')
            {
                echo '<h2 class="bg-success" style="color:white;">'.$_SESSION['success'].'</h2>';
                unset($_SESSION['success']);
            }
            if(isset($_SESSION['status']) && ($_SESSION['status'])!='')
            {
                echo '<h2 class="bg-danger" style="color:white;">'.$_SESSION['status'].'</h2>';
                unset($_SESSION['status']);
            }
            ?>
  <div class="content-panel">
            <div class="adv-table">
              <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
                <thead>
                  <tr>
                      <th>Username</th>
                      <th>Email</th>
                      <th>Password</th>
                      <th>Photo</th>
                      <th>Document</th>
                      <th>Aadhar</th>
                      <th>Revieve</th>
                  </tr>
                </thead>
                <?php
                  require 'database/dbconfig.php';
                  $query = "SELECT * FROM users WHERE status=2 AND usertype='owner'";
                  $result = mysqli_query($con,$query);
                ?>
        <tbody>
                  <?php 
                    if(mysqli_num_rows($result)>0)
                    {
                        while($row = mysqli_fetch_assoc($result))
                        {
                          
                    ?>
                  <tr>
                    <td><?php echo $row['username']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['password']; ?></td>
                    <td><img src="<?php echo $row['photo']; ?>" width="80px;"></td>
                    <td><a class="btn btn-info" href="<?php echo $row['document']; ?>" download>Download</a></td>
                    <td><a class="btn btn-warning" href="<?php echo $row['aadhar']; ?>" download>Download</a></td>
                          <td><a href="view_seller.php?revieve=<?php echo $row['id']; ?>" class="btn btn-danger">Revieve</a></td>
                  </tr>
                                      <?php 
                        }
                    }
                  
                    ?>
                  </tbody>

              </table>
            </div>
          </div>
            </div>
          </div>
          </div

<?php
}
else{
  echo "<center><h2 class='text-dark'> Error 404 not found</h2></center>";
  }
include('includes/scripts.php');
include('includes/footer.php');
?>