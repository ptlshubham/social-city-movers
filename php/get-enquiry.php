<?php 
//Show data from database using ajax, jquery and php on page load
// Show data from database on page load using php, ajax and jquery
$host = "localhost";
$dbUser = "root";
$password = "";
$database = "movers";

$dbConn = new mysqli($host,$dbUser,$password,$database);

if($dbConn->connect_error)
{
	die("Database Connection Error, Error No.: ".$dbConn->connect_errno." | ".$dbConn->connect_error);
}


$qry = "select name, email, moving_date, specialized, pickup_address, drop_address,contact,createddate from enquiry";

$rs = $dbConn->query($qry);

$fetchAllData = $rs->fetch_all(MYSQLI_ASSOC);

$createTable = '<table>';
$createTable .= '<tr>';
$createTable .= '<th>Date</th>';
$createTable .= '<th>Name</th>';
$createTable .= '<th>Email</th>';
$createTable .= '<th>Moving Date</th>';
$createTable .= '<th>Specialized Moving</th>';
$createTable .= '<th>Pickup Address</th>';
$createTable .= '<th>Drop Address</th>';
$createTable .= '<th>Contact</th>';
$createTable .= '</tr>';


foreach($fetchAllData as $customerData)
{
	$createTable .= '<tr>';
	$createTable .= '<td>'.$customerData['createddate'].'</td>';
	$createTable .= '<td>'.$customerData['name'].'</td>';
	$createTable .= '<td>'.$customerData['email'].'</td>';
	$createTable .= '<td>'.$customerData['moving_date'].'</td>';
	$createTable .= '<td>'.$customerData['specialized'].'</td>';
	$createTable .= '<td>'.$customerData['pickup_address'].'</td>';
	$createTable .= '<td>'.$customerData['drop_address'].'</td>';
	$createTable .= '<td>'.$customerData['contact'].'</td>';

	$createTable .= '</tr>';	
}

$createTable .= '</table>';

echo $createTable;

$rs->close();

$dbConn->close();

?>