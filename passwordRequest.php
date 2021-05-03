<?php


// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if (isset($_POST["passwordReset"])) {  

    $emailTo = $_POST['passwordReset'];

// connect to the database
    $db = mysqli_connect('localhost', 'root', '$w9Ygsh36f{fcdGP', 'btcloginsystem');

    $code = uniqid(true);
    $query = mysqli_query($db, "INSERT INTO RESET_PASSWORDS(code, email) VALUES ('$code', '$emailTo')");
    if (!$query) {
        exit("error");
    }
    // Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);
try {
    //Server settings
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'jpantonios2@gmail.com';                     // SMTP username
    $mail->Password   = 'tjhadimiycrnnfbw';                               // SMTP password
    $mail->SMTPSecure = 'ssl';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 465;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('jpantonios2@gmail.com', 'Earn Coins');
    $mail->addAddress("$emailTo");     // Add a recipient
    $mail->addReplyTo('jpantonios2@gmail.com', 'No reply');

    // Content
    $url = "https://earncoins.io/passwordReset.php?code=$code";
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Earn Coins, Password Reset';
    $mail->Body    = "	<p>Dear User</p>
    					<p>Thank you for using your Earn Coins.</p>
    					<p>We received a request to e-mail you a password reset.</p>
                        <p>Click this <a href='$url'>link.</a></p>
                        <p>If you did not request this please ignore.</p>
                        <p>Sincerely,</p>
                        <p>Earn Coins (;</p>";
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
exit();
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

    <style type="text/css">
        .reset-sec {
            margin-top: 25px;
            margin-bottom: 25px;
        }

    </style>

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
              <a style="color: #ffffff;" class="nav-link" href="#">Contact</a>
            </li>
            <li class="nav-item">
              <a style="color: #ffffff;" class="nav-link" href="#">F.A.Q</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <section class="reset-sec">

        <div class="container">
        
  <form method="POST">

    <h2 style="text-align: center;">Reset Password</h2>
    <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Email" name="passwordReset" required>
        <button class="btn btn-lg btn-primary btn-block" type="resetPwd" name="submit">Reset</button>
     </form>
     </div>
    </section>


    <section>
      <div class="jumbotron jumbotron-fluid social">
        <div class="container">
          <h2>Stay connected</h2>
          <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
          <div class="social-icons">
            <a class="social-icon social-icon--twitter">
              <i class="fab fa-twitter fa-xs"></i>
              <div class="tooltip">Twitter</div>
            </a>
            <a class="social-icon social-icon--facebook">
              <i class="fab fa-facebook-f fa-xs"></i>
              <div class="tooltip">Facebook</div>
            </a>
            <a class="social-icon social-icon--steam">
              <i class="fab fa-steam-symbol fa-xs   "></i>
              <div class="tooltip">Steam</div>
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
              <p class="text-white"><i class="fa fa-phone mx-2"></i>+614.940.7927</p>
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
