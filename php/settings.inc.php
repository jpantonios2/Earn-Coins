<?php

session_start();

$db = mysqli_connect('localhost', 'root', '$w9Ygsh36f{fcdGP', 'btcloginsystem');

$unameID = $_SESSION['username'];

if (isset($_POST['update'])) {
	$fname = mysqli_real_escape_string($db, $_POST['first']);
	$lname = mysqli_real_escape_string($db, $_POST['lastName']);
	$address = mysqli_real_escape_string($db, $_POST['address']);
	$city = mysqli_real_escape_string($db, $_POST['city']);
	$zip = mysqli_real_escape_string($db, $_POST['ZIP']);
    $state = mysqli_real_escape_string($db, $_POST['state']);

}

	if (!empty($fname) || !empty($lname) || !empty($address) || !empty($city) || !empty($zip) || !empty($state)) {
		$query = "UPDATE USER SET state = '$state', fName = '$fname', lName = '$lname', address = '$address', city = '$city', zip = '$zip'
          WHERE username='$unameID';";
    	mysqli_query($db, $query);
	}

    $sql = "SELECT * FROM USER WHERE username='$unameID';";
    $result = mysqli_query($db, $sql);
    $resultCheck = mysqli_num_rows($result);
    if ($resultCheck > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
        $emailPlace = $row['email'];
        $usernamePlace = $row['username'];
        $fnamePlace = $row['fName'];
        $lnamePlace = $row['lName'];
        $addressPlace = $row['address'];
        $cityPlace = $row['city'];
        $zipPlace = $row['zip'];
        $statePlace = $row['state'];
        $userID = $row['id'];
        $accountCreated = $row['accountCreated'];
      }
    }

    $sql = "SELECT * FROM USER_INFO WHERE id='$userID';";
    $result = mysqli_query($db, $sql);
    $resultCheck = mysqli_num_rows($result);
    if ($resultCheck > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
        $totalBalance = $row['totalbalance'];
        $currentBalance = $row['currentBalance'];
      }
    }
    
    
//UPDATE
if (!empty($unameID)) {
//get total coins, current coins, amount of completed offers, etc.

    $result = mysqli_query($db, "SELECT * FROM OFFERS WHERE userid='$userID';");

    //total amount of offers that are completed
    $totaloffers = mysqli_num_rows($result);


    $result = mysqli_query($db, "SELECT IF(SUM(coins) IS NULL, 0, SUM(coins)) AS totalcoins FROM OFFERS WHERE userid='$userID';");

    //total amount of coins that have been earned
    $totalcoins = mysqli_fetch_assoc($result)['totalcoins'];

//check if row exists of user
    $result = mysqli_query($db, "SELECT * FROM USER_INFO WHERE id='$userID';");

    if (mysqli_num_rows($result) > 0) {

        //update
        mysqli_query($db, "UPDATE USER_INFO SET totalbalance = '$totalcoins', totaloffers = '$totaloffers', currentBalance ='$currentBalance', WHERE id='$userID';");
    } else {

        //add
          mysqli_query($db, "INSERT INTO USER_INFO (id, totalbalance, totaloffers, currentBalance) VALUES('$userID', '$totalcoins', '$totaloffers', '$currentBalance')");
    }
}
// does exist - update with above data
//does not exist - create with above data

?>