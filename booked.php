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
    <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">
  <link href="lib/advanced-datatable/css/demo_page.css" rel="stylesheet" />
  <link href="lib/advanced-datatable/css/demo_table.css" rel="stylesheet" />
  <link rel="stylesheet" href="lib/advanced-datatable/css/DT_bootstrap.css" />
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<!-- body -->

<body class="main-layout product_pagr">

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

    <div class="container-fluid">


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

              <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
                <thead>
                  <tr>
                      <th>Customer Name</th>
                      <th>Address</th>
                      <th>Number</th>
                      <th>Landmark</th>
                      <th>Location</th>
                      <th>Order Status</th>

                  </tr>
                </thead>
                <?php
                  require 'database/dbconfig.php';
                  $email = $_SESSION['username'];
                    $query = "SELECT * FROM orders WHERE status=1 AND `customer_email`='$email'";

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
                    <td><?php echo $row['landmark']; ?></td>
                    <td>
            <?php $strings = $row['location'];
                  $arrays = explode(',', $strings);
            ?>
            <iframe src="http://maps.google.com/maps?q=<?php echo $arrays[0]; ?>,<?php echo $arrays[1]; ?>&z=16&output=embed" height="200" width="200"></iframe>

             
            </td>
                    <td><?php echo $row['order_status']; ?></td>
                  </tr>
                                      <?php 
                        }
                    }
                  
                    ?>
                  </tbody>

              </table>
            </div>
     <!-- footer start-->
     <div id="plant " class="footer layout_padding ">
         <div class="container ">
            <p>© 2021 All Rights Reserved.</a></p>
         </div>
      </div>

                
</body>
<script type="text/javascript" language="javascript" src="lib/advanced-datatable/js/jquery.dataTables.js"></script>
  <script type="text/javascript" src="lib/advanced-datatable/js/DT_bootstrap.js"></script>
  <!--common script for all pages-->
  <script src="lib/common-scripts.js"></script>
  <!--script for this page-->
  <script type="text/javascript">
    /* Formating function for row details */
    function fnFormatDetails(oTable, nTr) {
      var aData = oTable.fnGetData(nTr);
      var sOut = '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">';
      sOut += '<tr><td>Rendering engine:</td><td>' + aData[1] + ' ' + aData[4] + '</td></tr>';
      sOut += '<tr><td>Link to source:</td><td>Could provide a link here</td></tr>';
      sOut += '<tr><td>Extra info:</td><td>And any further details here (images etc)</td></tr>';
      sOut += '</table>';

      return sOut;
    }

    $(document).ready(function() {
      /*
       * Insert a 'details' column to the table
       */
      var nCloneTh = document.createElement('th');
      var nCloneTd = document.createElement('td');
      nCloneTd.innerHTML = '<img src="lib/advanced-datatable/images/details_open.png">';
      nCloneTd.className = "center";

      $('#hidden-table-info thead tr').each(function() {
        this.insertBefore(nCloneTh, this.childNodes[0]);
      });

      $('#hidden-table-info tbody tr').each(function() {
        this.insertBefore(nCloneTd.cloneNode(true), this.childNodes[0]);
      });

      /*
       * Initialse DataTables, with no sorting on the 'details' column
       */
      var oTable = $('#hidden-table-info').dataTable({
        "aoColumnDefs": [{
          "bSortable": false,
          "aTargets": [0]
        }],
        "aaSorting": [
          [1, 'asc']
        ]
      });

      /* Add event listener for opening and closing details
       * Note that the indicator for showing which row is open is not controlled by DataTables,
       * rather it is done here
       */
      $('#hidden-table-info tbody td img').live('click', function() {
        var nTr = $(this).parents('tr')[0];
        if (oTable.fnIsOpen(nTr)) {
          /* This row is already open - close it */
          this.src = "lib/advanced-datatable/media/images/details_open.png";
          oTable.fnClose(nTr);
        } else {
          /* Open this row */
          this.src = "lib/advanced-datatable/images/details_close.png";
          oTable.fnOpen(nTr, fnFormatDetails(oTable, nTr), 'details');
        }
      });
    });
  </script>
</html>