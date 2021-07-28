<!DOCTYPE html>
<html lang="en">
<?php
session_start();
require 'database/dbconfig.php';
if(!isset($_SESSION['customer']))
{
    header('location:signin.php');
}
?>
<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>ALL</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="csss/bootstrap.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="csss/style.css">
    <!-- Responsive-->
    <link rel="stylesheet" href="csss/responsive.css">
    <!-- fevicon -->
    <link rel="icon" href="imagess/fevicon.png" type="image/gif" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="csss/jquery.mCustomScrollbar.min.css">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/csss/font-awesome.css">
    <!-- owl stylesheets -->
    <link rel="stylesheet" href="csss/owl.carousel.min.css">
    <link rel="stylesheet" href="csss/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<!-- body -->

<body class="main-layout product_pagr">
    <!-- loader  -->
    <div class="loader_bg">
        <div class="loader"><img src="imagess/loading.gif" alt="#" /></div>
    </div>
    <!-- end loader -->
    <!-- header -->
    <header class="section">
        <!-- header inner -->
        <div class="header_main">
            <div class="header_main">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                            <div class="full">
                                <div class="center-desk">
                                    <div class="logo">
                                        <a href="index.php"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                            <div class="menu-area">
                                <div class="limit-box">
                                    <nav class="main-menu">
                                        <ul class="menu-area-main">
                                            <li> <a href="index.php">Home</a> </li>
                                          <li><a href="login.php">Bulk owner Login</a></li>
                                          <?php
                                            if(!isset($_SESSION['customer'])){
                                            ?>
                                            <li> <a href="signin.php">Login</a> </li> <?php }else
                                            { ?>
                                                                                    <li><a href="booked.php">Your orders</a></li>

                                                    <form action="logout_customer.php" method="post">
            <button type="submit" name="logout_btn" class="btn btn-success logout">Logout</button>
          </form>
                                            <?php
                                            } ?>   
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end header inner -->
    </header>
    <!-- end header -->
    </header>
    <!-- end header -->

    <!-- plant -->
    <div id="plant" class="section  product">
        <div class="container">
            <div class="row">
                <div class="col-md-12 ">
                    <div class="titlepage">
                        <h2><strong class="black"> Book</strong> Petrol</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php if(isset($_GET['id'])){ ?>
    <div class="clothes_main section ">
        <div class="container">
            <div class="row">
            <?php
                  require 'database/dbconfig.php';
                  $id = $_GET['id'];
                  $query = "SELECT * FROM users WHERE status=1 AND id='$id'";
                  $result = mysqli_query($con,$query);
                ?>
                <?php 
                    if(mysqli_num_rows($result)>0)
                    {
                        while($row = mysqli_fetch_assoc($result))
                        {
                          
                    ?>
                    <form action="code.php" method="post">
                        <?php
                        $email = $_SESSION['username'];
                        $sql = "SELECT * FROM customer WHERE email='$email'";
                        $qry = mysqli_query($con,$sql);
                        $rows = mysqli_fetch_array($qry);
                        ?>
                            <div class="form-group">
                                <input type="hidden" name="username" value="<?php echo $rows['username']; ?>">
                                <input type="hidden" name="bulk_name" value="<?php echo $row['username']; ?>">
                                <input type="hidden" name="phone" value="<?php echo $rows['phone']; ?>">
                                <input type="hidden" name="amount" value="<?php echo $row['petrol_price']; ?>">
                                <input type="hidden" name="charge" value="<?php echo $row['charge']; ?>">
                                <input type="text" class="form-control" name="address" placeholder="Your address here" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="litre" placeholder="Litres of petrol" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="landmark" placeholder="Enter landmark" required>
                            </div>
                            <div id="mapholder"></div>
                            <div class="form-group">

<input type="button" onclick="getLocation();" value="Get Location" class="btn btn-info" required/>
<input type="hidden" name="location" id="location" required>

                            <script type="text/javascript">
         function showLocation(position) {
            var latitude = position.coords.latitude;
            var longitude = position.coords.longitude;
            var latlongvalue = position.coords.latitude + ","
            + position.coords.longitude;
            var img_url = "https://maps.googleapis.com/maps/api/staticmap?center="+latlongvalue+"&zoom=14&size=400x300&key=AIzaSyAa8HeLH2lQMbPeOiMlM9D1VxZ7pbGQq8o";
            document.getElementById("mapholder").innerHTML =
            "<img src='"+img_url+"'>";
            document.getElementById("location").value = latlongvalue;
         }
         function errorHandler(err) {
            if(err.code == 1) {
               alert("Error: Access is denied!");
            } else if( err.code == 2) {
               alert("Error: Position is unavailable!");
            }
         }
         function getLocation(){
            if(navigator.geolocation){
               // timeout at 60000 milliseconds (60 seconds)
               var options = {timeout:60000};
               navigator.geolocation.getCurrentPosition
               (showLocation, errorHandler, options);
            } else{
               alert("Sorry, browser does not support geolocation!");
            }
         }
      </script>
                                  </div>

                            <div class="form-group">
                                <button type="submit" name="book" class="btn btn-success">Confirm Booking</button>
                            </div>
                    </form>
                <?php
                        }
                    }
                    ?>
             </div>
            </div>
           </div>
           <?php
}
?>
      </div>
      <!-- end plant -->
     <!-- footer start-->
      <div id="plant " class="footer layout_padding ">
         <div class="container ">
            <p>© 2021 All Rights Reserved.</a></p>
         </div>
      </div>

      <!-- Javascript files-->
      <script src="jss/jquery.min.js "></script>
      <script src="jss/popper.min.js "></script>
      <script src="jss/bootstrap.bundle.min.js "></script>
      <script src="jss/jquery-3.0.0.min.js "></script>
      <script src="jss/plugin.js "></script>
      <!-- sidebar -->
      <script src="jss/jquery.mCustomScrollbar.concat.min.js "></script>
      <script src="jss/custom.js "></script>
      <!-- javascript --> 
      <script src="jss/owl.carousel.js "></script>
      <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js "></script>
      <script>
         $(document).ready(function(){
         $(".fancybox ").fancybox({
         openEffect: "none ",
         closeEffect: "none "
         });
         
         $(".zoom ").hover(function(){
         
         $(this).addClass('transition');
         }, function(){
         
         $(this).removeClass('transition');
         });
         });
         
      </script> 


</body>
</html>