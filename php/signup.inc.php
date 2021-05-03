<?php
session_start();

// initializing variables
$username = "";
$email  = "";
$errors = array(); 
$errorSignup = array(); 


// connect to the database
$db = mysqli_connect('localhost', 'root', '$w9Ygsh36f{fcdGP', 'btcloginsystem');

if(isset($_POST['signup-submit'])) {
	// receive all input values from the form
	$username = mysqli_real_escape_string($db, $_POST['uname']);
	$email = mysqli_real_escape_string($db, $_POST['email']);
	$password = mysqli_real_escape_string($db, $_POST['pwd']);
	$confirmPassword = mysqli_real_escape_string($db, $_POST['confirmPwd']);
	$ip = $_SERVER['REMOTE_ADDR'];
	$ipSpoof = $_SERVER['HTTP_X_FORWARDED_FOR'];
	  
	// form validation: ensure that the form is correctly filled ...
	// by adding (array_push()) corresponding error unto $errors array
	if(empty($username)) {
		array_push($errorSignup, "Username is required");
	}
	if(empty($email)) {
		array_push($errorSignup, "Email is required");
	}
	if(empty($password)) {
		array_push($errorSignup, "Password is required");
	}
	else if($password != $confirmPassword) {
		array_push($errorSignup, "The two passwords do not match");
	}

	else if(strlen($password) < 7) {
		array_push($errorSignup, "Password must be more than 7 characters");
	}

	else if (strlen($username) > 25 ) {
		array_push($errorSignup, "Password cannot be more than 25 characters");
	}

	else if($password == $email) {
		array_push($errorSignup, "Pasword cannot be your email");
	}

	else if($email == $username) {
		array_push($errorSignup, "Email can't be your username");
	}

	else if($password == $username) {
		array_push($errorSignup, "Password cannot be your username");
	}

	$user_check_query = "SELECT * FROM USER WHERE username='$username' OR email='$email' LIMIT 1";
	$result = mysqli_query($db, $user_check_query);
	$user = mysqli_fetch_assoc($result);

	if($user) {
		if($user['username'] == $username) {
			array_push($errorSignup, "Username already exists");
		}
		if ($user['email'] === $email) {
			array_push($errorSignup, "Email already exists");
		}
	}
	// Finally, register user if there are no errors in the form
	if (count($errorSignup) == 0) {

    	$password = crypt($password, "123");//encrypt the password before saving in the database

    	$query = "INSERT INTO USER (username, email, password, ip, ipSpoof, accountCreated) 
          VALUES('$username', '$email', '$password', '$ip', '$ipSpoof',  NOW())";
    	mysqli_query($db, $query);
    	$_SESSION['username'] = $username;
    	$_SESSION['success'] = "You are now logged in";
    	header('location: ../index.php');
  }
}

// LOGIN USER
if (isset($_POST['login'])) {
  $username = mysqli_real_escape_string($db, $_POST['uname']);
  $password = mysqli_real_escape_string($db, $_POST['pwd']);

  if (empty($username)) {
    array_push($errors, "Username is required");
  }
  if (empty($password)) {
    array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
 	$password = crypt($password, "123");
    $query = "SELECT * FROM USER WHERE username='$username' AND password='$password'";
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) == 1) {
      $_SESSION['username'] = $username;
      $_SESSION['success'] = "You are now logged in";
      header('location: ../dashboard.php');
    }else {
      array_push($errors, "Wrong username/password combination");
    }
  }
}

?>