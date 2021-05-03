<!DOCTYPE html>
<html>
<head>
	<title></title>
	    <!-- bootstrap -->
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
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
$result = mysqli_query($con,"SELECT * FROM OFFERS WHERE userid = '$userID';");


echo
"
<div class='table-responsive'> 
<table class='table table-striped table-sm'>
<tr>
<th>Offer ID</th>
<th>Offer Name</th>
<th>Coins Earned</th>
</tr>
";

while($row = mysqli_fetch_array($result))
{

echo "<tr>";
echo "<td>" . $row['offerid'] . "</td>";
echo "<td>" . $row['offername'] . "</td>";
echo "<td>" . $row['coins'] . "</td>";
	
echo "</tr>";	
}
echo "</table>"	
?>