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



if (isset($_SESSION['session_username']) && $_SESSION['session_username'] == $_POST['unm'])
{   
	echo "<i>Already logged in ".$_SESSION['session_username']."!</i><br>";	
}
 else if (isset($_SESSION['session_username']) && $_SESSION['session_username'] != $_POST['unm']) 
{
    echo "<i>Somebody forgot to logout! Would you like to login to different account?</i><br>";
}
else 
{
	$user=$_POST['unm'];
    $pass=$_POST['pwd'];
    $sql = "SELECT * FROM transit_employee WHERE username='$user' AND password='$pass'";
    $result = $conn->query($sql);

  if ($result->num_rows > 0) {
	$_SESSION['session_username'] = $_POST['unm'];	
	$sql1= "SELECT transit_hub FROM transit_employee WHERE username='$user' AND password='$pass'";
	$result1 = $conn->query($sql1);
	if ($result1->num_rows > 0) {
       $row = $result1->fetch_array(MYSQLI_ASSOC);
       $x=$row["transit_hub"];	   
    } 
	$sql2 = "SELECT Πόλη FROM transit_hub WHERE Όνομα='$x'";
	$result2 = $conn->query($sql2);
	if ($result2->num_rows > 0) {
	  
	   $row1 = $result2->fetch_array(MYSQLI_ASSOC);
       $y=$row1["Πόλη"];	   
       //echo "<br> town: ". $y."<br>";
	}
	$_SESSION['loc']=$y;
  }
  
}

?>
<!DOCTYPE html>
<html>
<head>
  <title>Transit Hub</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="file:///C:/wamp64/www/sample/erwthma_2/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link href='https://fonts.googleapis.com/css?family=Poiret One' rel='stylesheet'>
  <link rel="stylesheet" type="text/css" href="style1.css">
  <style>
     .btn-group-vertical{
	     padding: 80px;
		 float:left;
         width:300px;
	     height:400px;
		 color:white;
		 border-radius:8px;
		 font-family:  'Poiret One';
		
    }
	
	
  </style>
  
  </head>
<body>

<div class="btn-group-vertical">
<a href="camera.html">
  <button type="button" class="btn btn-primary" <?php if(isset($_SESSION['session_username']) && $_SESSION['session_username'] != $_POST['unm']) 
  {echo " style='display: none'"; } ?> >Scan Package</button><br>
</a>
<a href="logout.php">
  <button type="button" class="btn btn-primary">Log out</button>
</a>  
</div>



</body>
</html>