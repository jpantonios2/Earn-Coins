<!DOCTYPE html>
<html>
<head>
	<title></title>
	    <!-- bootstrap -->
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <style type="text/css">
    	.alert {
    		overflow: none;
    		z-index: 5;
    	}
    </style>
</head>
<body>

</body>
</html>

<?php 

session_start();

$db = mysqli_connect('localhost', 'root', '$w9Ygsh36f{fcdGP', 'btcloginsystem');
$errors = array(); 
$success = array(); 


  if (isset($_POST['withdraw'])) {
      $btcAddress = mysqli_real_escape_string($db, $_POST['address']);
      $amount = mysqli_real_escape_string($db, $_POST['amount']);
      $passwordWithdraw = mysqli_real_escape_string($db, $_POST['passwordWithdraw']);

      include('php/settings.inc.php');
      include('php/signup.inc.php');

      if ($amount <= 999) {
          array_push($errors, "Withdraw must be atleast 1000 coins");
      }

    
      elseif ($currentBalance >= $amount) {
      	    
      	$query = "INSERT INTO WITHDRAW (id, btcAddress, withdrawAmount)
          	VALUES('$userID', '$btcAddress', '$amount')";
			mysqli_query($db, $query); 

      	$newBal = $currentBalance - $amount;

     	$query = "UPDATE USER_INFO SET currentBalance = '$newBal' WHERE id = '$userID'";

      
      	mysqli_query($db, $query); 

      	array_push($success, "Transaction Processing");
      }
      else {
      	array_push($errors, "Insuffecient funds");
      }




  }


?>