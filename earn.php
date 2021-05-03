<?php 
  session_start(); 
  
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
<html lang="en" >
  <head>

    <meta charset="UTF-8">
    
    <title>Earn coins | Dashboard</title>

    <!-- css -->
    <link rel="stylesheet" type="text/css" href="assets/stylesheets/earn.css?<?php echo time(); ?>">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

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

   
  <?php 

    include('php/settings.inc.php');

    echo 
    	'
    	<div class="card text-center">
  <div class="card-header">
    <ul class="nav nav-pills card-header-pills">
        <li class="nav-item">
        <a class="nav-link" href="#">Adwall</a>
      </li>
        <li class="nav-item">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">More walls coming soon!</a>
      </li>
    </ul>
  </div>
  <div class="card-body">
       		<iframe src="https://asmwall.com/adwall/publisher/115262/profile/17266?subid1=' . $userID . '" frameborder="0" allowfullscreen height="800px" width="1300px;"></iframe>
  </div>
</div>
   		';
 

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

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>