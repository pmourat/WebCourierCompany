<?php
session_start();
?>
<?php
 
$servername = "localhost";
$username = "root";
$password = "";
$db = "hermes_courier";

// Create 
$conn = new mysqli($servername, $username, $password, $db);

mysqli_set_charset($conn,"utf8");


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//echo "Connected successfully  ";

$request= $_POST["trn"];

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">

<link rel="stylesheet" type="text/css" href="menu_style.css">
<link href='https://fonts.googleapis.com/css?family=Poiret One' rel='stylesheet'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
#mnm{
    
    margin-top:90px;
	margin-right:600px;
	margin-left:10px;
	font-style:italic;
	color:white;
	text-decoration:none;
	font-family: "Times New Roman";
}
#lista{
	
	margin-top:30px;
	margin-right:600px;
	margin-left:30px;
	font-style:italic;
	color:white;
	font-family: "Times New Roman";
}

</style>
</head>

<body>



<ul>
  <p id="master">HERMES COURIER</p><br>
  <li><a href="home.html"><i class="fa fa-home"></i> Home</a></li>
  <li><a href="new_order.html"><i class="fa fa-map-pin"></i> New Order</a>
  
 
  </li>
  <li><a href="track_order.html"><i class="fa fa-user-circle"></i> Track Order</a>
 
   </li>
  <li><a href="delivery_conf.html"><i class="fa fa-user-circle-o"></i> Delivery Confirmation</a>
 
  </li>
  <li><a href="index.php"><i class="fa fa-sign-out"></i> Logout</a></li>
 
  
</ul>
<br>
<p id="mnm">Το πακέτο έχει περάσει από τις εξής τοποθεσίες:</p>
<div id="lista">

<?php 
if (isset($_SESSION['session_username']) && !empty($_SESSION['session_username'])) {

$query = "SELECT * FROM locations WHERE tracking_number='$request'";
$result = $conn->query($query);
if ($result->num_rows > 0) {
   while ($r= $result->fetch_assoc()){ 
	  echo $r["location"]."<br>";
   }
 }
}
?>
</div>


</body>
</html>