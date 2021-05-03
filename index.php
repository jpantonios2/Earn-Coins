<?php 
  session_start(); 
  $db = mysqli_connect('localhost', 'root', '$w9Ygsh36f{fcdGP', 'btcloginsystem');
  
  if (isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You're already signed in";
    header('location: dashboard.php');
  }
  ?>
<?php include('php/signup.inc.php') ?>
<?php 
  if (isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: dashboard.php');
  }
  ?>
<!DOCTYPE html>
<html>
  <head>

    <title>Earn Coins | Home</title>

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="assets/stylesheets/style.css?<?php echo time(); ?>">
    <link rel="stylesheet" type="text/css" href="assets/stylesheets/signup.css?<?php echo time(); ?>">
    <link rel="stylesheet" type="text/css" href="assets/stylesheets/login.css?<?php echo time(); ?>">

    <!-- bootstrap -->
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <script type="text/javascript" src=bootstrap/js/bootstrap.min.js"></script>

    <!-- fontawsome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-159408807-1"></script>

    <script src="https://apis.google.com/js/platform.js" async defer></script>

    <meta name="google-signin-client_id" content="YOUR_CLIENT_ID.apps.googleusercontent.com">

    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', 'UA-159408807-1');
    </script>

     <script src="https://www.google.com/recaptcha/api.js"></script>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="background-color: #1b2431 !important;">
      <div class="container">
        <a class="navbar-brand" href="#">
          <h3 class="my-4 text-white">Earn<span style="margin-left= -3px" class="mx-2 font-italic text-warning">Coins</span></h3>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a style="color: #ffffff;" class="nav-link" href="comingsoon.php">Contact</a>
            </li>
            <li class="nav-item">
              <a style="color: #ffffff;" class="nav-link" href="comingsoon.php">F.A.Q</a>
            </li>
            <li class="nav-item">
              <button type="button" class="btn btn-outline-light" data-toggle="modal" data-target="#signupModal" ><i class="fas fa-sign-out-alt"></i> Sign up</button>
            <li class="nav-item">
              <button type="button" class="btn btn-outline-light" data-toggle="modal" data-target="#loginModal"><i class="fas fa-user"></i> Login</button>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <main>
      <div class="jumbotron jumbotron-fluid slant">
        <div class="container">
          <h1 class="display-4">Amazing Rewards</h1>
          <p class="lead">Earn amazing rewards by completing tasks</p>
          <button type="button" class="btn btn-light btn-lg btn-get-started" data-toggle="modal" data-target="#signupModal" style="border-radius: 30px;">Get Started</button>
        </div>
      </div>
    </main>

    <!-- Signup Modal -->
    <div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">Sign up</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
          <!--   <button type="button" class="btn btn-primary btn-lg btn-block" style="background-color: red;"><i class="fab fa-google"></i> Sign in with google</button>
            <button type="button" class="btn btn-primary btn-lg btn-block" style="background-color: #2a475e;"><i class="fab fa-steam-symbol"></i> Sign in with steam</button>
            <button type="button" class="btn btn-primary btn-lg btn-block" style="background-color: #7289da;"><i class="fab fa-steam-symbol"></i> Sign in with Discord</button>
            <hr> -->
            <form class="form-signin" method="post" action="index.php">
              <?php include('php/signup.inc.php'); ?> 
                <?php include('php/referral.php'); ?>
                  <?php if(($errorSignup)) : 
                        header('location: passwordRequest.php');

                    ?>
                <div class="alert alert-danger" role="alert" style="color: white;background-color: #ff1010;border-color: #ff1010;">
                  <i class="fas fa-exclamation-triangle"></i>
                  <?php include('php/errorSignup.php'); ?> 
                </div>
                <?php  endif ?>
                
                <h1 class="h3 mb-3 font-weight-normal">Sign up</h1>
                <label for="inputEmail" class="sr-only">Email address</label>
                <input type="email" id="inputEmail"  class="form-control" placeholder="Email address" name="email" autofocus required>
                <label for="inputUserName" class="sr-only">Username</label>
                <input type="username" id="inputUserName" class="form-control" placeholder="Username" name="uname" required>
                <label for="inputPassword" class="sr-only">Password</label>
                <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="pwd" style="margin-bottom: 10px !important;" required>
                <label for="inputConfirmPassword" class="sr-only">Confirm Password</label>
                <input type="password" id="inputCofirmPassword" class="form-control" placeholder="Confirm Password" name="confirmPwd" required>
                <br>
                <button class="btn btn-lg btn-primary btn-block" type="submit" name="signup-submit">Register</button>
                <br> 
                <div class="form-signup">
                  <p class="mt-5 mb-3 text-muted" style="margin-top:0px !important;">&copy; 2017-2019  <a class="mt-5 mb-3" text-muted href="index.php">Home</a></p>
                </div>
            </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--Login Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">Login</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
          <!--   <button type="button" class="btn btn-primary btn-lg btn-block" style="background-color: red;"><i class="fab fa-google"></i> Sign in with google</button>
            <button type="button" class="btn btn-primary btn-lg btn-block" style="background-color: #2a475e;"><i class="fab fa-steam-symbol"></i> Sign in with steam</button>
            <button type="button" class="btn btn-primary btn-lg btn-block" style="background-color: #7289da;"><i class="fab fa-steam-symbol"></i> Sign in with Discord</button>
            <hr> -->
            <div class="signup-from">
              <form class="form-signin" action="index.php" method="post">
                <?php if(($errors)) : ?>
                <div class="alert alert-danger" role="alert" style="color: white;background-color: #ff1010;border-color: #ff1010;">
                  <i class="fas fa-exclamation-triangle"></i>
                  <?php include('php/errors.php'); ?> 
                </div>
                <?php  endif ?>
                <h1 class="h3 mb-3 font-weight-normal">Login</h1>
                <label for="inputUserName" class="sr-only" >Username</label>
                <input type="text" name="uname" class="form-control" placeholder="Username" required>
                <label for="inputPassword" class="sr-only" >Password</label>
                <input type="password" name="pwd" class="form-control" placeholder="Password" required>
                <div class="checkbox mb-3">
                  <br>
                  <label><input type="checkbox" value="remember-me"> Remember me</label>
                </div>
                <button class="btn btn-lg btn-primary btn-block" type="submit" name="login">Sign in</button>
                <br>
                <p><a href="passwordRequest.php">Forgot Password?</a></p>
                <p class="mt-5 mb-3 text-muted" style="margin-top: 0px !important; text-align: center;">&copy; 2017-2019  <a class="mt-5 mb-3" text-muted href="index.php">Home</a></p>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--Forgot Pwd Modal -->
    <div class="modal fade" id="forgotpwdModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <a href="phpReset.php"><h5 class="modal-title" id="exampleModalCenterTitle">Forgot Password</h5></a>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
          	<h5 class="h5 mb-5 font-weight-normal">An email will be sent with instructions</h5>
            <div class="signup-from">
              <form class="form-signin" method="POST">
        		    <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Email" name="passwordReset" required>
                <button class="btn btn-lg btn-primary btn-block" type="resetPwd" name="resetButton">Reset</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!--Forgot Username Modal -->
    <div class="modal fade" id="usernameModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">Forgot Username</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
          	<h5 class="h5 mb-5 font-weight-normal">An email will be sent with instructions</h5>
            <div class="signup-from">
              <form class="form-signin" action="index.php" method="post">
        		<input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Email" name="usernameReset" required>
                <button class="btn btn-lg btn-primary btn-block" type="resetUsername" name="resetUsername">Reset</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <section class="py-5" id="services" style="margin-top: -90px;">
      <div class="container py-5">
        <div class="row mb-5">
          <div class="col text-center">
            <h2>Just a few steps...</h2>
          </div>
        </div>
        <div class="row text-center">
          <div class="col-md-6 col-lg-3">
            <div class="mb-5 m-md-0">
              <i class="fas fa-users fa-5x text-info" style="color: #212529  !important;"></i>
              <br>
              <h5 class="name-steps">Create Account</h5>
              <p>Create an account in just a few steps to get started.</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="mb-5 m-md-0">
              <i class="fas fa-check-square fa-5x text-info" style="color: #212529  !important;;"></i>
              <br>
              <h5 class="name-steps">Complete Offers</h5>
              <p>Complete offers at the comfort of your computer.</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="mb-5 m-md-0">
              <i class="fas fas fa-gem fa-5x text-info" style="color: #212529  !important;"></i>
              <br>
              <h5 class="name-steps">Earn Gems</h5>
              <p >Once finished watch the coins come in.</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="mb-5 m-md-0">
              <i class="fab fa-bitcoin fa-5x text-info" style="color: #212529 !important;"></i>
              <br>
              <h5 class="name-steps">Withdraw Bitcoin</h5>
              <p>Withdraw your coins to your crypto wallet.</p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section>
      <div class="jumbotron jumbotron-fluid social">
        <div class="container">
          <h2>Stay connected</h2>
          <p class="lead">Follow us on all social media so you can recieve updates as soon as they come!</p>
          <div class="social-icons">
            <a class="social-icon social-icon--twitter">
              <i class="fab fa-twitter fa-xs"></i>
            </a>
            <a class="social-icon social-icon--facebook">
              <i class="fab fa-facebook-f fa-xs"></i>
            </a>
            <a class="social-icon social-icon--steam">
              <i class="fab fa-steam-symbol fa-xs	"></i>
            </a>
          </div>
        </div>
      </div>
    </section>
    <footer style="background-color: #ffb9af !important;">
      <div class="container">
        <div class="row ">
          <div class="col-md-4 text-center text-md-left ">
            <div class="py-0">
              <h3 class="my-4 text-white">Earn<span class="mx-2 font-italic text-warning ">Coins</span></h3>
              <p class="footer-links font-weight-bold">
                <a class="text-white" href="dashboard.php">Home</a>
                |
                <a class="text-white" href="#" data-toggle="modal" data-target="#signupModal">Sign up</a>
                |
                <a class="text-white" href="#" data-toggle="modal" data-target="#loginModal">Login</a>
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
                  <li><a class="footer-link" href="#" data-toggle="modal" data-target="#loginModal">Login</a></li>
                  <li><a class="footer-link" href="#" data-toggle="modal" data-target="#signupModal">Sign up</a></li>
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
      <div style="text-align: center; background-color: #ffb5b4;">
        <p style="color: #ffffff;">&copy; Copyright 2020 Earn Coins Ltd.</p>
      </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>