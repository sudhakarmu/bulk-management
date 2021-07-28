<!DOCTYPE html>
<html lang="en">
<?php
session_start();
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
    <div class="clothes_main section ">
        <div class="container">
            <div class="row">
                <div class="col-xl-3">
                <?php
                                  require 'database/dbconfig.php';

                  $querys = "SELECT DISTINCT city FROM users WHERE status=1 AND usertype='owner' AND order_accept='1'";
                  $results = mysqli_query($con,$querys);
                    if(mysqli_num_rows($results)>0)
                    {
                        while($rows = mysqli_fetch_assoc($results))
                        {
                          
                    ?>
                    <a href="index.php?city=<?php echo $rows['city']; ?>" style="color:white"><?php echo $rows['city']; ?></a><br>
                    <?php
                        }
                    }
                    ?>
                </div>
            <?php
            if(isset($_GET['city']))
            {
                $city = $_GET['city'];
                $query = "SELECT * FROM users WHERE status=1 AND usertype='owner' AND order_accept='1' AND city='$city'";
            }
            else{
                $query = "SELECT * FROM users WHERE `status`=1 AND `usertype`='owner' AND `order_accept`='1'";
            }
                  $result = mysqli_query($con,$query);
                    if(mysqli_num_rows($result)>0)
                    {
                        while($row = mysqli_fetch_assoc($result))
                        {
                          
                    ?>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                    <div class="sport_product">
                        <figure><img src="<?php echo $row['photo']; ?>" alt="img" style="width:70px;height:70px;"/></figure>
                        <h4>Petrol Price: ₹<strong class="price_text"><?php echo $row['petrol_price']; ?></strong></h4>
                        <h4>Charge: ₹<strong class="price_text"><?php echo $row['charge']; ?></strong></h4>
                        <h4>Bulk Name: <?php echo $row['username']; ?></h4>
                        <h4>Address: <?php echo $row['address']; ?></h4>
                        <a href="book.php?id=<?php echo $row['id']; ?>" class="btn btn-success">Order</a>
                    </div>
                </div>
                <?php
                        }
                    }
                    ?>
             </div>
            </div>
           </div>
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