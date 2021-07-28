<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>ALL</title>
  <!-- Favicons -->
  <script type='text/javascript' src='js/jquery-2.2.3.min.js'></script>

  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">
  <link rel="stylesheet" href="css/jquery-ui.css" />
    <script src="js/jquery-ui.js"></script>
    <script src="js/state.js?v=1.0"></script>
  <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
</head>

<body>
  <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
  <div id="login-page">
    <div class="container">
      <form class="form-login" method="POST" action="code.php" enctype="multipart/form-data">
        <h2 class="form-login-heading">Sign Up now</h2>
        <div class="login-wrap">
        <div class="form-group">
    <label for="InputUsername">Username</label>
    <input type="username" class="form-control" name="username" id="InputUsername" aria-describedby="usernameHelp" placeholder="Enter Username">
  </div>
  <div class="form-group">
    <label for="InputEmail">Email address</label>
    <input type="email" class="form-control" id="InputEmail" name="email" aria-describedby="emailHelp" placeholder="Enter email">
  </div>
  <div class="form-group">
    <label for="InputPassword">Password</label>
    <input type="password" class="form-control" id="InputPassword" name="password" placeholder="Enter Password">
  </div>
  <div class="form-group">
    <label for="InputConfirmPassword">Confirm Password</label>
    <input type="password" class="form-control" id="InputConfirmPassword" name="confirmpassword" placeholder="Please Confirm Password">
  </div>
  <div class="form-group">
    <label for="InputConfirmPassword">Address</label>
    <input type="text" class="form-control" id="InputConfirmPassword" name="address" placeholder="Enter address">
  </div>
  
  <div class="form-group">
		<label>State name:</label>
				<input type="hidden" name="country" id="countryId" value="IN"/>
				<select name="state_select" class="states order-alpha js-example-basic-single form-control" id="stateId">
				<option value="">Select State</option>
      </select>
    </div>
      <div class="form-group">
		<label>City name:</label>
				<select name="city_select" class="cities order-alpha js-example-basic-single form-control" id="cityId">
					<option value="">Select City</option>
			</select>

  <div class="form-group">
    <label for="Bulk">Bulk Photo</label>
    <input type="file" class="form-control" name="photo">
  </div>  
  <div class="form-group">
    <label for="Bulk">Bulk Registration Document</label>
    <input type="file" class="form-control" name="document">
  </div>  
  <div class="form-group">
    <label for="Bulk">Bulk Registerer Aadhar</label>
    <input type="file" class="form-control" name="aadhar">
  </div>  
  <div class="form-group">
   <input type="hidden" name="usertype" value="owner">
          <button class="btn btn-theme btn-block" type="submit" name="submit"><i class="fa fa-lock"></i> SIGN UP</button>
          <hr>
          <div class="registration">
            Already have an account?<br/>
            <a class="" href="login.php">
              Login 
              </a>
          </div>
        </div>
        </form>


    </div>
  </div>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <!--BACKSTRETCH-->
  <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
  <script type="text/javascript" src="lib/jquery.backstretch.min.js"></script>
  <script>
    $.backstretch("img/login-bg.jpg", {
      speed: 500
    });
  </script>
</body>

</html>
