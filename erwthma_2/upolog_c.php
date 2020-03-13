<?php
//---------------------------------------------------------Time---------------------------------------------------------------

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




function shortestPath($a, $b,array $graph,$i,array $cost,array $g,array $cos) {
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
	
	return 1;
}
else {
	echo "From $a to $b";
    echo "<br />The length is ".$S[$b][1];
    echo "<br />Path is ".implode('->', $path);
    echo "<br>";
    $graph1=array();
    $result=array_merge($graph1,$graph);
    $result[$path[0]][$path[1]]=99999;
 
	$cost=array($S[$b][1],$S[$b][1],$S[$b][1],$S[$b][1],$S[$b][1],$S[$b][1]);
	//echo $i;
    return shortestPath($a, $b,$result,$i+1,$cost,$g,$cos);
	
}
   }
//----------------------------------------------------Cost-----------------------------------------------------------



function shortestPathCost($a, $b,array $g,$i,array $cos,array $graph,$cost) {
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

if ( $cos[$i-1]< $S[$b][1]){
	if ($i-1>1){
		shortestPath(6, 7,$graph,1,$cost,$g,$cos);
		
	}
	
	return 1;
}
else {
	echo "From $a to $b";
    echo "<br />The length is ".$S[$b][1];
    echo "<br />Path is ".implode('->', $path);
    echo "<br>";
    $graph1=array();
    $result=array_merge($graph1,$g);
    $result[$path[0]][$path[1]]=99999;
 
	$cos=array($S[$b][1],$S[$b][1],$S[$b][1],$S[$b][1],$S[$b][1],$S[$b][1]);
	//echo $i;
    return shortestPathCost($a, $b,$result,$i+1,$cos,$graph,$cost);
	

}
   }




shortestPathCost(5, 2,$g,1,$cos,$graph,$cost);


?>