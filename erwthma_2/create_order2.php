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

$s_weight = $_POST["weight"];
$s_type = $_POST["type"];
$s_sender = $_POST["sender"];
$s_recipient = $_POST["recipient"];
$s_origin = $_POST["origin"];
$s_dest = $_POST["destination"];
$s_date = $_POST["date"];
$s_time = $_POST["time"];
$s_store = $_POST["dest_store"];

$cities= array("Αλεξανδρούπολη"=>"AL","Ηράκλειο"=>"HR","Ασπρόπυργος"=>"AS","Πάτρα"=>"PA","Ιωάννινα"=>"IO","Θεσσαλονίκη"=>"TH","Λάρισα"=>"LA",
          "Καλαμάτα"=>"KA","Μυτιλήνη"=>"MI");
$o="0";	
$d="0";		   
foreach($cities as $key => $value) {	
    
	if( $s_origin == $key){
	    $o = $value;
	}	
    if ($s_dest == $key){
		$d = $value;
	} 
}

$city= array("Αλεξανδρούπολη"=>5,"Ηράκλειο"=>6,"Ασπρόπυργος"=>3,"Πάτρα"=>2,"Ιωάννινα"=>1,"Θεσσαλονίκη"=>0,"Λάρισα"=>4,
          "Καλαμάτα"=>7,"Μυτιλήνη"=>8);
$or=0;	
$ds=0;		   
foreach($city as $key => $value) {	
    
	if( $s_origin == $key){
	    $or = $value;
	}	
    if ($s_dest == $key){
		$ds = $value;
	} 
}      
			   
$s_num = $o.time().$d;

if (isset($_SESSION['session_username']) && !empty($_SESSION['session_username'])) {

$unm=$_SESSION['session_username'];
$query = "SELECT * FROM local_employee WHERE username='$unm'";
$res = $conn->query($query);
$row = $res->fetch_array(MYSQLI_ASSOC);
$apot=$row["local_store"];


$q = "SELECT * FROM local_store WHERE Όνομα='$apot'";
$result = $conn->query($q);
if ($result->num_rows > 0) {
	//echo "geia";
}
$r = $result->fetch_array(MYSQLI_ASSOC);
$apotelesma=$r["Πόλη"];


$sql = "INSERT INTO package (TRN, Βάρος, Τύπος, Αποστολέας, Παραλήπτης, Έναρξη, Προορισμός, Ημ_Καταχώρησης, Ώρα_Καταχώρησης,Τοποθεσία,Local_start,Local_dest,status)
VALUES ('$s_num', '$s_weight', '$s_type','$s_sender','$s_recipient', '$s_origin','$s_dest', '$s_date','$s_time','$apotelesma','$apot','$s_store','posted')";


   if ($conn->query($sql) === TRUE) {
	
    //echo "New record created successfully";
	
} else {
    //echo "Error: " . $sql . "<br>" . $conn->error;
}


$graph = array();

$graph[0][1] = 1;
$graph[0][3] = 1;
$graph[0][4] = 1;
$graph[0][5] = 1;

$graph[1][0] = 1;
$graph[1][2] = 1;

$graph[2][3] = 1;
$graph[2][1] = 1;
$graph[2][7] = 1;

$graph[3][2] = 1;
$graph[3][0] = 1;
$graph[3][4] = 1;
$graph[3][7] = 1;
$graph[3][6] = 1;
$graph[3][8] = 1;
$graph[3][5] = 1;

$graph[4][0] = 1;
$graph[4][3] = 1;

$graph[5][0] = 1;
$graph[5][3] = 1;
$graph[5][6] = 1;

$graph[6][3] = 1;
$graph[6][7] = 2;
$graph[6][5] = 1;

$graph[7][3] = 1;
$graph[7][6] = 2;
$graph[7][2] = 1;

$graph[8][3] = 1;



$cost=array(100,100,100,100,100,100);


$g = array();

$g[0][1] = 1;
$g[0][3] = 5;
$g[0][4] = 1;
$g[0][5] = 3;

$g[1][0] = 1;
$g[1][2] = 3;

$g[2][3] = 2;
$g[2][1] = 3;
$g[2][7] = 2;

$g[3][2] = 2;
$g[3][0] = 5;
$g[3][4] = 2;
$g[3][7] = 3;
$g[3][6] = 10;
$g[3][8] = 8;
$g[3][5] = 10;

$g[4][0] = 1;
$g[4][3] = 2;

$g[5][0] = 3;
$g[5][3] = 10;
$g[5][6] = 15;

$g[6][3] = 10;
$g[6][7] = 4;
$g[6][5] = 15;

$g[7][3] = 3;
$g[7][6] = 4;
$g[7][2] = 2;

$g[8][3] = 3;


$cos=array(100,100,100,100,100,100);




}
$conn->close(); 


?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Control Panel</title>
<link rel="stylesheet" type="text/css" href="menu_style.css">
<link href='https://fonts.googleapis.com/css?family=Poiret One' rel='stylesheet'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
#minima{
	margin-top:100px;
	font-size:18px;
	font-family:"Poiret One";
	color:white;
	font-style:italic;
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

<div id="minima">
<?php

  require_once("file:///C:/wamp64/www/sample/web2017/erwthma_2/lib/qrlib/qrlib.php");
  
   $p_name="file:///C:/wamp64/www/sample/web2017/erwthma_2/eikona.png";
   QRcode::png($s_num,$p_name);
    echo "New record created successfully!<br><br>";
    echo '<img src="./eikona.png" alt="qr code" >';
    echo "<br><br>";
  //echo '<img src=".$p_name">';
 
?>
<?php 


if ($s_type=="απλό"){
$mon=array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
function shortestPath($a, $b,array $graph,$i,array $cost,array $g,array $cos,$city,$mon) {
	//$this->graph = $graph;   
 

//initialize the array for storing
$S = array();//the nearest path with its parent and weight
$Q = array();//the left nodes without the nearest path
foreach(array_keys($graph) as $val) $Q[$val] = 99999;
$Q[$a] = 0;



//start calculating
while(!empty($Q)){
	$min = array_search(min($Q), $Q);//the most min weight
	if($min == $b) break;
	foreach($graph[$min] as $key=>$val) if(!empty($Q[$key]) && $Q[$min] + $val < $Q[$key]) {
		$Q[$key] = $Q[$min] + $val;
		$S[$key] = array($min, $Q[$key]);
	}
	unset($Q[$min]);
}

//list the path
$path = array();
$pos = $b;

//No way found
if (!array_key_exists($b, $S)) {
    echo "Found no way.";
    return;
}

while($pos != $a){
	$path[] = $pos;
	$pos = $S[$pos][0];
}
$path[] = $a;
$path = array_reverse($path);

if ( $cost[$i-1]< $S[$b][1]){
	if ($i-1==1){
	echo "Η διαδρομή που θα ακολουθήσει το πακέτο είναι:<br>";
	foreach($mon as $key => $value) {
		
		foreach($city as $k => $val) {
			
			if ($value==$val){
				echo $k."<br>";
			}
		}
	}
    }
	
	return 1;
}
else {
	//echo "From $a to $b";
    //echo "<br />The length is ".$S[$b][1];
    //echo "<br />Path is ".implode('->', $path);
    //echo "<br>";
	$path2=array();
	$mon=array_merge($path2,$path);
	
    $graph1=array();
    $result=array_merge($graph1,$graph);
    $result[$path[0]][$path[1]]=99999;
 
	$cost=array($S[$b][1],$S[$b][1],$S[$b][1],$S[$b][1],$S[$b][1],$S[$b][1]);
	//echo $i;
    return shortestPath($a, $b,$result,$i+1,$cost,$g,$cos,$city,$mon);
	
}
   }
//----------------------------------------------------Cost-----------------------------------------------------------


$res=array(0,0,0,0,0,0,0,0,0,0,0,);
function shortestPathCost($a, $b,array $g,$i,array $cos,array $graph,$cost,$city,$res,$mon) {
	//$this->graph = $graph;   
 

//initialize the array for storing
$S = array();//the nearest path with its parent and weight
$Q = array();//the left nodes without the nearest path
foreach(array_keys($g) as $val) $Q[$val] = 99999;
$Q[$a] = 0;



//start calculating
while(!empty($Q)){
	$min = array_search(min($Q), $Q);//the most min weight
	if($min == $b) break;
	foreach($g[$min] as $key=>$val) if(!empty($Q[$key]) && $Q[$min] + $val < $Q[$key]) {
		$Q[$key] = $Q[$min] + $val;
		$S[$key] = array($min, $Q[$key]);
	}
	unset($Q[$min]);
}

$path = array();
    $pos = $b;

    //No way found
    if (!array_key_exists($b, $S)) {
      echo "Found no way.";
     return;
    }

    while($pos != $a){
	  $path[] = $pos;
	  $pos = $S[$pos][0];
    }
    $path[] = $a;
   $path = array_reverse($path);
   


if ( $cos[$i-1]< $S[$b][1]){
	if ($i-1>1){
		shortestPath($a,$b,$graph,1,$cost,$g,$cos,$city,$mon);	
	}
	if (($i-1)==1){
	echo "Η διαδρομή που θα ακολουθήσει το πακέτο είναι:<br>";
	foreach($res as $key => $value) {
		
		foreach($city as $k => $val) {
			
			if ($value==$val){
				echo $k."<br>";
			}
		}
	}
	}
	return 1;
}
else {
	//echo "From $a to $b";
    //echo "<br />The length is ".$S[$b][1];
    //echo "<br />Path is ".implode('->', $path);
   //list the path
    $path2=array();
	$res=array_merge($path2,$path);
	
	echo "<br>";
	
    $graph1=array();
    $result=array_merge($graph1,$g);
    $result[$path[0]][$path[1]]=99999;
 
	$cos=array($S[$b][1],$S[$b][1],$S[$b][1],$S[$b][1],$S[$b][1],$S[$b][1]);
	//echo $i;
    return shortestPathCost($a, $b,$result,$i+1,$cos,$graph,$cost,$city,$res,$mon);
	

}
   }

shortestPathCost($or,$ds,$g,1,$cos,$graph,$cost,$city,$res,$mon);
	
}
else {
	$mon=array(0,0,0,0,0,0,0,0,0,0,0,0,0,0);
	function shortestPathCost($a, $b,array $g,$i,array $cos,array $graph, array $cost,$city,$mon) {
	//$this->graph = $graph;   
 

//initialize the array for storing
$S = array();//the nearest path with its parent and weight
$Q = array();//the left nodes without the nearest path
foreach(array_keys($g) as $val) $Q[$val] = 99999;
$Q[$a] = 0;



//start calculating
while(!empty($Q)){
	$min = array_search(min($Q), $Q);//the most min weight
	if($min == $b) break;
	foreach($g[$min] as $key=>$val) if(!empty($Q[$key]) && $Q[$min] + $val < $Q[$key]) {
		$Q[$key] = $Q[$min] + $val;
		$S[$key] = array($min, $Q[$key]);
	}
	unset($Q[$min]);
}

//list the path
$path = array();
$pos = $b;

//No way found
if (!array_key_exists($b, $S)) {
    echo "Found no way.";
    return;
}

while($pos != $a){
	$path[] = $pos;
	$pos = $S[$pos][0];
}
$path[] = $a;
$path = array_reverse($path);

//echo "egw eimai to ".$i."<br>";

//echo "egw eimai to cost".$cos[$i-1]."<br>";
//echo "egw eimai to S".$S[$b][1]."<br>";

if ( $cos[$i-1]< $S[$b][1]){
	
	if ($i-1==1){
	echo "Η διαδρομή που θα ακολουθήσει το πακέτο είναι:<br>";
	foreach($mon as $key => $value) {
		
		foreach($city as $k => $val) {
			
			if ($value==$val){
				echo $k."<br>";
			}
		}
	}
    }
	
	return 1;
}
else {
	//echo "From $a to $b";
    //echo "<br />The length is ".$S[$b][1];
    //echo "<br />Path is ".implode('->', $path);
    //echo "<br>";
	
	$path2=array();
	$mon=array_merge($path2,$path);
	
    $graph1=array();
    $result=array_merge($graph1,$g);
    $result[$path[0]][$path[1]]=99999;
 
	$cos=array($S[$b][1],$S[$b][1],$S[$b][1],$S[$b][1],$S[$b][1],$S[$b][1]);
	//echo $i;
    return shortestPathCost($a, $b,$result,$i+1,$cos,$graph,$cost,$city,$mon);
	

}
   }


//---------------------------------------------------------Time---------------------------------------------------------------


$res=array(0,0,0,0,0,0,0,0,0,0,0,0,0,0);
function shortestPath($a, $b,array $graph,$i,array $cost,array $g,array $cos,$city,$res,$mon) {
	//$this->graph = $graph;   
 

//initialize the array for storing
$S = array();//the nearest path with its parent and weight
$Q = array();//the left nodes without the nearest path
foreach(array_keys($graph) as $val) $Q[$val] = 99999;
$Q[$a] = 0;



//start calculating
while(!empty($Q)){
	$min = array_search(min($Q), $Q);//the most min weight
	if($min == $b) break;
	foreach($graph[$min] as $key=>$val) if(!empty($Q[$key]) && $Q[$min] + $val < $Q[$key]) {
		$Q[$key] = $Q[$min] + $val;
		$S[$key] = array($min, $Q[$key]);
	}
	unset($Q[$min]);
}

//list the path
$path = array();
$pos = $b;


/*************************malkies
$count=0;
foreach ($graph[$a] as $key=>$value){
	$count++;
}
if ($count==2 && $i==3){
	    //echo "mpika".<br>;
		//shortestPathCost($a,$b,$g,1,$cos,$graph,$cost,$city,$mon);
      		
	print_r($res);
	echo "<br>";
	$temp=array();
	$res2=array_merge($temp,$res)
	foreach ($res as $key=>$value){
	 foreach ($res as $k=>$v){
		  print_r($graph[$value][$v]);
		  break;
	  }
    }
	
	
}
*/



//No way found
if (!array_key_exists($b, $S)) {
    echo "Found no way.";
    return;
	
}

while($pos != $a){
	$path[] = $pos;
	$pos = $S[$pos][0];
}
$path[] = $a;
$path = array_reverse($path);



//echo "egw eimai to ".$i."<br>";

//echo "egw eimai to cost".$cost[$i-1]."<br>";
//echo "egw eimai to S".$S[$b][1]."<br>";

if ( $cost[$i-1]< $S[$b][1]){
	  //echo "egw eimai to ".$i."<br>";
	if ($i-1>1){
		//echo "egw eimai to ".$i."<br>";
		shortestPathCost($a,$b,$g,1,$cos,$graph,$cost,$city,$mon);	
	}
	if (($i-1)==1){
	echo "Η διαδρομή που θα ακολουθήσει το πακέτο είναι:<br>";
	foreach($res as $key => $value) {
		
		foreach($city as $k => $val) {
			
			if ($value==$val){
				echo $k."<br>";
			}
		}
	}
	}
	
	return 1;
}
else {
	
	//echo "From $a to $b";
   // echo "<br />The length is ".$S[$b][1];
    //echo "<br />Path is ".implode('->', $path);
	
	
	//print_r($path);
    echo "<br>";
	$path2=array();
	$res=array_merge($path2,$path);
	
    $graph1=array();
    $result=array_merge($graph1,$graph);
    $result[$path[0]][$path[1]]=99999;
 
	$cost=array($S[$b][1],$S[$b][1],$S[$b][1],$S[$b][1],$S[$b][1],$S[$b][1]);
	//echo $i;
    return shortestPath($a, $b,$result,$i+1,$cost,$g,$cos,$city,$res,$mon);
	
}
   }

shortestPath($or,$ds,$graph,1,$cost,$g,$cos,$city,$res,$mon);
	
}

 ?>
</div>
</body>
</html>


