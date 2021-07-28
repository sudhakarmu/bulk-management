<?php
include('security.php');
include('includes/header.php');
include('includes/navbar.php');

?>
<?php

if(isset($_GET['price']))
{
$price = $_GET['price'];
$sql = "UPDATE `users` SET `petrol_price`='$price'";
$res = mysqli_query($con,$sql);
}

if(isset($_GET['charge']))
{
$charge = $_GET['charge'];
$name = $_SESSION['username'];
$sql = "UPDATE `users` SET `charge`='$charge' WHERE `email`='$name'";
$res = mysqli_query($con,$sql);
}

?>

        <!-- page start-->

            <!-- /row -->
            <div class="row">

              <!-- /col-md-4-->
              <!-- DIRECT MESSAGE PANEL -->
              <?php if($_SESSION['ROLE']=="admin"){ ?>
                <div class="col-md-4 mb">
                <div class="green-panel pn">
                                    <div class="green-header">
                                        <h5>Total Sellers</h5>
                                    </div>

                                    <p class="mt"><b>                      <?php 

require 'database/dbconfig.php';

$query = "SELECT id FROM users WHERE status=1 AND `usertype`='owner'";

$result = mysqli_query($con, $query); 

$row = mysqli_num_rows($result);

echo "<h3>$row</h3>";
?></b><br/> Sellers</p>
                                </div>
                            </div>
              <div class="col-md-8 mb">
                <div class="message-p pn">
                  <div class="message-header">
                    <h5>Update Petrol Price</h5>
                  </div>
                  <div class="row">
                    <div class="col-md-9">
                      <?php
                      $sqli = "SELECT * FROM users";
                      $res = mysqli_query($con,$sqli);
                      $row = mysqli_fetch_assoc($res);
                      ?>
                      <p>Current Petrol Price: <?php echo $row['petrol_price']; ?></p>
                      <form class="form-inline" role="form">
                        <div class="form-group">
                          <input type="text" class="form-control" id="exampleInputText" name="price" placeholder="Petrol Price">
                        </div>
                        <button type="submit" class="btn btn-default">Send</button>
                      </form>
                    </div>
                  </div>

              </div>


              <?php } ?>
              <?php if($_SESSION['ROLE']=="owner"){ ?>
              <div class="col-md-8 mb">
                <div class="message-p pn">
                  <div class="message-header">
                    <h5>Update Delivery Charge</h5>
                  </div>
                  <div class="row">
                    <div class="col-md-9">
                      <?php
                      $name = $_SESSION['username'];
                      $sqlis = "SELECT * FROM users WHERE email='$name'";
                      $ress = mysqli_query($con,$sqlis);
                      $rows = mysqli_fetch_assoc($ress);
                      ?>
                      <p>Current Charge: <?php echo $rows['charge']; ?></p>
                      <form class="form-inline" role="form">
                        <div class="form-group">
                          <input type="text" class="form-control" id="exampleInputText" name="charge" placeholder="Delivery Charge">
                        </div>
                        <button type="submit" class="btn btn-default">Send</button>
                      </form>
                    </div>
                  </div>
              </div><?php } ?>
                <!-- /Message Panel-->
              </div>
              <!-- /col-md-8  -->
            </div>


          <!-- /col-lg-9 END SECTION MIDDLE -->

        </div>

<?php

include('includes/scripts.php');
include('includes/footer.php');

?>