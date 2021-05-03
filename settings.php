<?php 
  session_start();  
  
  $db = mysqli_connect('localhost', 'root', 'p[V1tQ?16Q295C$x', 'btcloginsystem');
  
  if (!isset($_SESSION['email'])) {
      $_SESSION['email'];
    }
  if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: index.php');
  }
  if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: index.php");
  }
  
  ?> 
<!DOCTYPE html>
<html>
  <head>

    <title>Earn Coins | settings</title>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- css -->
    <link rel="stylesheet" type="text/css" href="assets/stylesheets/settings.css?<?php echo time(); ?>">

    <!-- bootstrap -->
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>

    <!-- fontawsome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-159408807-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', 'UA-159408807-1');
    </script>
    
  </head>
  <body>
    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="#">Earn <span class="font-italic text-warning">Coins</a>
      <div class="sign-out-inline my-2 my-lg-0">
        <?php  if (isset($_SESSION['username'])) : ?>
        <a href="?logout='1" style="color: #ffffff;">Sign out</a> 
        <?php endif ?>
      </div>
    </nav>
    <!-- partial:index.partial.html -->
    <nav class="menu" tabindex="0">
      <div class="smartphone-menu-trigger"></div>
      <header class="avatar">
        <img src="assets/imgs/default-user-image.png"/>
        <h2><?php echo $_SESSION['username']?></h2>
      </header>
      <ul>
        <a href="dashboard.php">
          <li tabindex="0" class="icon-dashboard"><span>Dashboard</span></li>
        </a>
        <a href="earn.php">
          <li tabindex="0" class="icon-earn"><span>Earn</span></li>
        </a>
        <a href="withdraw.php">
          <li tabindex="0" class="icon-withdraw"><span>Withdraw</span></li>
        </a>
        <a href="settings.php">
          <li tabindex="0" class="icon-settings"><span>Settings</span></li>
        </a>
        <a href="promote.php">
          <li tabindex="0" class="icon-promote"><span>Promote</span></li>
        </a>
      </ul>
      <ul>
        <p style="margin-left: 20px;"><strong>Coming soon</strong></p>
        <li tabindex="0" class="icon-casino"><span>Casino</span></li>
        <li tabindex="0" class="icon-deposit"><span>Deposit</span></li>
        <li tabindex="0" class="icon-mining"><span>Crypto Mining</span></li>
      </ul>
    </nav>
    <div class="jumbotron">
      <h1 class="display-4">Welcome</h1>
    </div>
    <form method="POST" action="settings.php">
      <?php include('php/settings.inc.php'); ?> 
      <div class="settings-top">
        <h1>Settings</h1>
        <p>Please make sure that your information below is accurate and up-to-date at all times. Your information will only be viewable by Earncoins team. If you do not wish to provide your information to our advertisers, simply do not do those offers that request it - however you still have to have your information filled out below if you wish to receive rewards from Earn Coins. At no time should fake or fraud information be used.</p>
      </div>
      <h1>Login Information</h1>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputUsername">Username</label>
          <input type="username" class="form-control" id="inputUsername" placeholder="<?php echo $usernamePlace;?>" readonly>
        </div>
        <div class="form-group col-md-6">
          <label for="inputEmail">Email</label>
          <input type="email" class="form-control" id="inputEmail" placeholder="<?php echo $emailPlace;?>" readonly>
        </div>
      </div>
      <h1>Personal Information</h1>
      <div class="form-row">
        <div class="form-group col-md-6"> 
          <label for="inputEmail4">First Name</label>
          <input name="first" type="firstName" class="form-control" id="firstName" placeholder="First Name" value="<?php echo $fnamePlace;?>">
        </div>
        <div class="form-group col-md-6">
          <label for="inputPassword4">Last Name</label>
          <input name="lastName" type="lastName" class="form-control" id="inputLastName" placeholder="Last Name" value="<?php echo $lnamePlace;?>">
        </div>
      </div>
      <div class="form-group">
        <label for="inputAddress2">Address 1</label>
        <input type="text" class="form-control" name="address" id="inputAddress1" placeholder="Address" value="<?php echo $addressPlace;?>">
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputCity">City</label>
          <input type="text" class="form-control" name="city" id="inputCity" placeholder="City" value="<?php echo $cityPlace;?>">
        </div>
        <div class="form-group col-md-4">
          <label for="inputState">State</label>
          <select name="state" id="inputState" class="form-control">
            <option selected><?php echo $statePlace; ?></option>
            <option value="AL">Alabama</option>
            <option value="AK">Alaska</option>
            <option value="AZ">Arizona</option>
            <option value="AR">Arkansas</option>
            <option value="CA">California</option>
            <option value="CO">Colorado</option>
            <option value="CT">Connecticut</option>
            <option value="DE">Delaware</option>
            <option value="DC">District Of Columbia</option>
            <option value="FL">Florida</option>
            <option value="GA">Georgia</option>
            <option value="HI">Hawaii</option>
            <option value="ID">Idaho</option>
            <option value="IL">Illinois</option>
            <option value="IN">Indiana</option>
            <option value="IA">Iowa</option>
            <option value="KS">Kansas</option>
            <option value="KY">Kentucky</option>
            <option value="LA">Louisiana</option>
            <option value="ME">Maine</option>
            <option value="MD">Maryland</option>
            <option value="MA">Massachusetts</option>
            <option value="MI">Michigan</option>
            <option value="MN">Minnesota</option>
            <option value="MS">Mississippi</option>
            <option value="MO">Missouri</option>
            <option value="MT">Montana</option>
            <option value="NE">Nebraska</option>
            <option value="NV">Nevada</option>
            <option value="NH">New Hampshire</option>
            <option value="NJ">New Jersey</option>
            <option value="NM">New Mexico</option>
            <option value="NY">New York</option>
            <option value="NC">North Carolina</option>
            <option value="ND">North Dakota</option>
            <option value="OH">Ohio</option>
            <option value="OK">Oklahoma</option>
            <option value="OR">Oregon</option>
            <option value="PA">Pennsylvania</option>
            <option value="RI">Rhode Island</option>
            <option value="SC">South Carolina</option>
            <option value="SD">South Dakota</option>
            <option value="TN">Tennessee</option>
            <option value="TX">Texas</option>
            <option value="UT">Utah</option>
            <option value="VT">Vermont</option>
            <option value="VA">Virginia</option>
            <option value="WA">Washington</option>
            <option value="WV">West Virginia</option>
            <option value="WI">Wisconsin</option>
            <option value="WY">Wyoming</option>
          </select>
        </div>
        <div class="form-group col-md-2">
          <label for="inputZip">Zip</label>
          <input type="text" class="form-control" name="ZIP" id="inputZip" placeholder="ZIP" value="<?php echo $zipPlace;?>">
        </div>
      </div>
      <button type="submit" name="update" class="btn btn-primary">Update</button>
    </form>
    <footer style="background-color: #343a40   !important; margin-top: 50px;     box-shadow: 0 50vh 0 50vh #343a40;">
      <div class="container">
        <div class="row ">
          <div class="col-md-4 text-center text-md-left ">
            <div class="py-0">
              <h3 class="my-4 text-white">Earn<span class="mx-2 font-italic text-warning ">Coins</span></h3>
              <p class="footer-links font-weight-bold">
                <a class="text-white" href="dashboard.php">Home</a>
              <p class="text-white"><i class="fa fa-envelope  mx-2"></i><a href="mailto:admin@earncoins.com" style="text-decoration: none; color: #ffffff;">admin@earncoins.com</a></p>
              </p>
            </div>
          </div>
          <div class="col-md-4 text-white text-center text-md-left ">
            <div class="py-2 my-4">
              <div>
                <p><strong>Navagation</strong></p>
                <ul class="footer-nav">
                  <li><a class="footer-link" href="index.php">Home</a></li>
                  <li><a class="footer-link" href="comingsoon.php">Contact</a></li>
                  <li><a class="footer-link" href="comingsoon.php">F.A.Q</a></li>
                  <li><a class="footer-link" href="comingsoon.php">About us</a></li>
                </ul>
              </div>
              <div> 
              </div>
              <div>
              </div>
            </div>
          </div>
          <div class="col-md-4 text-white my-4 text-center text-md-left ">
            <div class="py-2">
              <P><strong>Policies and terms</strong></P>
              <ul class="footer-nav">
                <li><a class="footer-link" href="comingsoon.php">Terms</a></li>
                <li><a class="footer-link" href="comingsoon.php">Privacy Policy</a></li>
              </ul>
            </div>
            <div class="py-2">
              <P><strong>Social Media</strong></P>
              <a href="#"><i class="fab fa-facebook fa-2x mx-3" style="color: #ffffff; margin-left: 0px !important;"></i></a>
              <a href="#"><i class="fab fa-steam fa-2x mx-3" style="color: #ffffff"></i></a>
              <a href="#"><i class="fab fa-twitter fa-2x mx-3" style="color: #ffffff"></i></a>
              <a href="#"><i class="fab fa-discord fa-2x mx-3" style="color: #ffffff"></i></a>
            </div>
          </div>
        </div>
      </div>
      <div style="text-align: center; background-color: #343a40;">
        <p style="color: #ffffff;">&copy; Copyright 2020 Earn Coins Ltd.</p>
      </div>
    </footer>
  </body>
</html>