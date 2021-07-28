    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
    <!--header start-->
    <header class="header black-bg">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
      <!--logo start-->
      <a href="index.html" class="logo"><b><span>ALL</span></b></a>
      <!--logo end-->

      <div class="top-menu">
        <ul class="nav pull-right top-menu">
        <form action="logout.php" method="post">
            <button type="submit" name="logout_btn" class="btn btn-success logout">Logout</button>
          </form>
        </ul>
      </div>
    </header>
    <!--header end-->
    <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          <p class="centered"><img src="img/ui-sam.jpg" class="img-circle" width="80"></p>
          <h5 class="centered"><?php echo $_SESSION['name']; ?></h5>
          <li class="mt">
            <a href="dash.php">
              <i class="fa fa-dashboard"></i>
              <span>Dashboard</span>
              </a>
          </li>
        <?php if($_SESSION['ROLE']=="admin"){ ?>  

              <li><a href="seller.php">Accept Sellers</a></li>
              <li><a href="seller_view.php">View Seller</a></li>
              <li><a href="seller_rejected.php">Rejected Seller</a></li>
        </li> <?php } ?>
              <li><a href="orders.php">Total Orders</a></li>
              <li><a href="accepted_orders.php"> Accepted Order</a></li>
              <li><a href="pending_order.php"> Pending Order</a></li>
              <li><a href="rejected_order.php"> Rejected Order</a></li>
              <li><a href="cancelled_order.php"> Cancelled Order</a></li>
          <?php if($_SESSION['ROLE']=="admin"){ ?>          <li>
            <a href="customer.php">
              <i class="fa fa-map-marker"></i>
              <span>Customer</span>
              </a>
          </li> <?php } ?>
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">