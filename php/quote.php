<?php
// $servername = "31.220.59.174";
// $username = "root";
// $password = "Csquare@123";
// $database = "angrez";
$servername = "localhost";
$username = "root";
$password = "";
$database = "movers";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
     
}


echo "Connected successfully";

$firstname = $_REQUEST['fname'];
$lastname = $_REQUEST['lname'];
$contactno = $_REQUEST['contactno'];
$email = $_REQUEST['email'];
$movingdate = $_REQUEST['movingdate'];
$specializedmoving=$_REQUEST['specializedmoving'];
$pickup = $_REQUEST['pickup'];
$drop = $_REQUEST['drop'];
 
$sql = "INSERT INTO `enquiry`(`fname`, `lname`, `contactno`, `email`, `moving_date`, `specialized`, `pickup_address`, `drop_address`, `createddate`) VALUES
('$firstname','$lastname', '$contactno', '$email', '$movingdate', '$specializedmoving','$pickup','$drop',CURRENT_TIMESTAMP);";
if (mysqli_query($conn, $sql)) {
      echo "New record created successfully";
	$arrResult = array ('response'=>'success');


} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	$arrResult = array ('response'=>'error','errorMessage'=>$e->errorMessage());

}
mysqli_close($conn);
?>
<script language="javascript">
    window.open("index.html","_self");
</script>