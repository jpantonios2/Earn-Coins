<?php 
  session_start();  
  
  $db = mysqli_connect('localhost', 'root', '$w9Ygsh36f{fcdGP', 'btcloginsystem');
  
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
  include('php/withdraw.php');
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
<form style="margin-top: 15px;" method="POST" action="withdraw.php">
                <?php if(($errors)) : ?>  
              <div class="alert alert-danger" role="alert" style="color: white;background-color: #ff1010;border-color: #ff1010;">
                <?php include('php/errors.php'); ?> 
              </div>
              <?php  endif ?>
  <div class="form-group">
    <h2>Withdraw</h2>
    <label for="exampleInputEmail1">BTC Address</label>
    <input type="" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="address" required>
    <small id="emailHelp" class="form-text text-muted">We'll never share your Address with anyone else.</small>
    <label for="exampleInputEmail1">Amount</label>
    <input type="" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="amount" required>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="passwordWithdraw" required>
  </div>
  <button type="submit" class="btn btn-primary" name="withdraw">Withdraw</button>
</form>

<?php 
  include('withdrawData.php');
 ?>
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