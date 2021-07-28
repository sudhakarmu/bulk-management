<?php

include('security.php');
include('includes/header.php');
include('includes/navbar.php');

?>


        <div class="chat-room mt">
          <aside class="mid-side">
            <div class="chat-room-head">
              <h3>Pending</h3>

            </div>
            <?php
                  require 'database/dbconfig.php';
                  if($_SESSION['ROLE']=="admin"){
                    $query = "SELECT * FROM orders WHERE order_status='Pending'";
                  }
                  if($_SESSION['ROLE']=="owner"){
                      $name = $_SESSION['name'];
                      $query = "SELECT * FROM orders WHERE order_status='Pending' AND `bulk_name`='$name'";
                  }
                  $result = mysqli_query($con,$query);
                ?>
                                  <?php 
                    if(mysqli_num_rows($result)>0)
                    {
                        while($row = mysqli_fetch_assoc($result))
                        {
                          
                    ?>
            <div class="room-desk">
              <h4 class="pull-left"><?php echo $row['customer_name']; ?></h4>
              <div class="room-box">
                <h5 class="text-primary"><?php echo $row['customer_address']; ?></h5>
                <h5 class="text-primary">Landmark: <?php echo $row['landmark']; ?></h5>
                <p><?php echo $row['customer_number']; ?></p>
                        <?php if(isset($_SESSION['ROLE'])=="admin"){ ?> <p><span class="text-muted">Assigned :</span> <?php echo $row['bulk_name']; ?> </p><?php } ?>
            <?php $strings = $row['location'];
                  $arrays = explode(',', $strings);
            ?>
            <iframe src="http://maps.google.com/maps?q=<?php echo $arrays[0]; ?>,<?php echo $arrays[1]; ?>&z=16&output=embed" height="200" width="200"></iframe>
              </div>

            </div>
            <?php 
                        }
                    }
                  
                    ?>
          </aside>

        </div>
        <!-- page end-->
  

<?php

include('includes/scripts.php');
include('includes/footer.php');

?>