<?php

if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip = $_SERVER['REMOTE_ADDR'];
}


//check ip 
if ($ip == '54.204.57.82') {

	$db = mysqli_connect('localhost', 'root', '$w9Ygsh36f{fcdGP', 'btcloginsystem');

	//get params
	$offerid = $_GET['offerid'];
	$offername = $_GET['offername'];
	$pay = $_GET['pay'];
	$coins = $_GET['coins'];
	$userid = $_GET['userid'];
	$status = $_GET['status'];
	$userip = $_GET['userip'];
    $txid = $_GET['txid'];
    $timestamp = $_GET['timestamp'];

    //check if lead is completed and payable
    if ($status == "1") {

            $sql = "SELECT * FROM USER_INFO WHERE id='$userid';";
    $result = mysqli_query($db, $sql);
    $resultCheck = mysqli_num_rows($result);
    if ($resultCheck > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
        $totalBalance = $row['totalbalance'];
        $currentBalance = $row['currentBalance'];
      }
    }
    
    		$db = mysqli_connect('localhost', 'root', '$w9Ygsh36f{fcdGP', 'btcloginsystem');

            $add = $coins + $currentBalance;

            //add to db
                mysqli_query($db, "UPDATE USER_INFO SET currentBalance = '$add', totalbalance = '$add' WHERE id='$userid';");


    	//add to db
    	$query = "INSERT INTO OFFERS (offerid, offername, pay, coins, userid, status, userip, txid, timestamp) 
          VALUES('$offerid', '$offername', '$pay', '$coins', '$userid', '$status', '$userip', '$txid', '$timestamp')";
         mysqli_query($db, $query);
    } else if ($status == "3") {
    	//chargeback detected rip
    }
} else {
	die();
}

?>