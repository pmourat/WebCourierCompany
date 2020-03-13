<?php
 
$servername = "localhost";
$username = "root";
$password = "";
$db = "hermes_courier";


$conn = new mysqli($servername, $username, $password, $db);

mysqli_set_charset($conn,"utf8");


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


$request= $_POST["zip"];
$query = "SELECT * FROM zip_code WHERE ΤΚ='$request'";
$result = $conn->query($query);


 if ($result->num_rows > 0) {

  $row = $result->fetch_array(MYSQLI_ASSOC);
  $apot=$row["Πόλη"];
  $q = "SELECT Γ_Πλάτος,Γ_Μήκος FROM local_store WHERE Πόλη='$apot'";
  $res = $conn->query($q);
  if ($res->num_rows > 0) {
	  $r = $res->fetch_array(MYSQLI_ASSOC);
	  $platos=$r["Γ_Πλάτος"];
	  $mhkos=$r["Γ_Μήκος"];
	  //echo $platos;
	  //echo $mhkos;
  }
  
  
 }
 
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Control Panel</title>
<link rel="stylesheet" type="text/css" href="menu.css">
<link href='https://fonts.googleapis.com/css?family=Poiret One' rel='stylesheet'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> 
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  

<style>



#form {
	margin-right:0px;
}

.navbar navbar-inverse {
	background-color:rgba(45, 45, 125, 0.48);
	font-family:  'Poiret One';
	color:white;	
}
.navbar-header {
	
	font-family:  'Poiret One';
	color:white;	
}
.nav navbar-nav {
	background-color:rgba(45, 45, 125, 0.48);
	font-family:  'Poiret One';
	color:white;	
}
.container-fluid {
	background-color:rgba(45, 45, 125, 0.48);
	font-family:  'Poiret One';
	color:white;	
}
</style>

</head>

<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Hermes Courier</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="parcel_tracking.html"><i class="fa fa-envelope-o"></i> Parcel Tracking</a></li>
      <li><a href="map.php"><i class="fa fa-dot-circle-o"></i> Branch Locations</a></li>
      <li><a href="store_locator.html"><i class="fa fa-map-pin"></i> Nearest Store Locator</a></li> 
    </ul>
  </div>
</nav>
   







<div id="map"  style="width:800px; height:500px; margin:120px auto;"></div>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDV8XerR6qhJwHCUYWmzitbiME_A-4y2Tg"></script>

<script>

var valp=<?php echo $platos; ?>;
var valm=<?php echo $mhkos; ?>;


    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 6,
      center: new google.maps.LatLng(39.479966, 22.540245),
      
    });

    

    var mark;
                   mark = new google.maps.Marker({
                     position: new google.maps.LatLng(valp,valm),
                     map: map
                   });

      

</script>

 



</body>
</html>