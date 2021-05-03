<!DOCTYPE html>
<html>
<head>
	<title></title>
	    <!-- bootstrap -->
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>

    <style type="text/css">
    	.table-responsive {
    		padding:60px;
    		margin-right: 15px;
  margin-top: 30px;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.10);
    	}
    </style>
</head>
<body>

</body>
</html>

<?php
$con = mysqli_connect('localhost', 'root', '$w9Ygsh36f{fcdGP', 'btcloginsystem');
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

include('php/settings.inc.php');
$result = mysqli_query($con,"SELECT * FROM WITHDRAW WHERE id = '$userID';");


echo
"

<div class='table-responsive'> 
	<h2>Withdraw History</h2>
<table class='table table-striped table-sm'>
<tr>
<th>Withdraw amount</th>
<th>BTC Address</th>
<th>Status</th>
</tr>
";

while($row = mysqli_fetch_array($result))
{

echo "<tr>";
echo "<td>" . $row['withdrawAmount'] . "</td>";
echo "<td>" . $row['btcAddress'] . "</td>";	
echo "<td>" . $row['status'] . "</td>"; 
echo "</tr>";	
}
echo "</table>"	

?>