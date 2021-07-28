<?php
include('security.php') ;
include('includes/header.php');
include('includes/navbar.php');
?><?php if($_SESSION['ROLE']=="owner" || $_SESSION['ROLE']=="admin")
{
  ?>  <div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Orders</h1>
</div>
<?php
if(isset($_GET['accept']))
{
    $id = $_GET['accept'];

    $query = "UPDATE orders SET `order_status`='Accepted' WHERE id='$id'";

    $result = mysqli_query($con, $query);
}
if(isset($_GET['reject']))
{
    $id = htmlentities($_GET['reject']);

    $query = "UPDATE orders SET order_status='Rejected' WHERE id='$id'";

    $result = mysqli_query($con, $query);
}
if(isset($_GET['deliver']))
{
    $id = htmlentities($_GET['deliver']);

    $query = "UPDATE orders SET order_status='Delivered' WHERE id='$id'";

    $result = mysqli_query($con, $query);
}

?>
<!--Page Heading ends-->
<div class="card shadow mb-6">
            <div class="card-header py-3 col-lg-12">
              <h6 class="m-1 font-weight-bold text-primary">Orders  &nbsp;
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
                      <th>Customer Name</th>
                      <th>Address</th>
                      <th>Number</th>
                      <th>Order Status</th>
                      <th>Location</th>
                      <?php if($_SESSION['ROLE']=="admin"){ ?><th>Bulk Name<?php } ?>
                      <th>Accept</th>
                      <th>Reject</th>
                      <th>Delivered</th>
                  </tr>
                </thead>
                <?php
                  require 'database/dbconfig.php';
                  if($_SESSION['ROLE']=="admin"){
                    $query = "SELECT * FROM orders WHERE status=1";
                  }
                  if($_SESSION['ROLE']=="owner"){
                      $name = $_SESSION['name'];
                    $query = "SELECT * FROM orders WHERE `status`=1 AND `bulk_name`='$name'";
                  }
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
                    <td><?php echo $row['customer_name']; ?></td>
                    <td><?php echo $row['customer_address']; ?></td>
                    <td><?php echo $row['customer_number']; ?></td>
                    <td>
            <?php $strings = $row['location'];
                  $arrays = explode(',', $strings);
            ?>
            <iframe src="http://maps.google.com/maps?q=<?php echo $arrays[0]; ?>,<?php echo $arrays[1]; ?>&z=16&output=embed" height="200" width="200"></iframe>

             
            </td>
                    <td><?php echo $row['order_status']; ?></td>
                    <?php if($_SESSION['ROLE']=="admin"){ ?><td><?php echo $row['bulk_name']; ?></td><?php } ?>
                    <td><a href="orders.php?accept=<?php echo $row['id']; ?>" class="btn btn-success">Accept</a></td>
                    <td><a href="orders.php?reject=<?php echo $row['id']; ?>" class="btn btn-danger">Reject</a></td>
                    <td><a href="orders.php?deliver=<?php echo $row['id']; ?>" class="btn btn-warning">Delivered</a></td>

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