<?php
$graph = array();

$graph[0][1] = 1;
$graph[0][3] = 5;
$graph[0][4] = 1;
$graph[0][5] = 3;

$graph[1][0] = 1;
$graph[1][2] = 3;

$graph[2][3] = 2;
$graph[2][1] = 3;
$graph[2][7] = 2;

$graph[3][2] = 2;
$graph[3][0] = 5;
$graph[3][4] = 2;
$graph[3][7] = 3;
$graph[3][6] = 10;
$graph[3][8] = 8;
$graph[3][5] = 10;

$graph[4][0] = 1;
$graph[4][3] = 2;

$graph[5][0] = 3;
$graph[5][3] = 10;
$graph[5][6] = 15;

$graph[6][3] = 10;
$graph[6][7] = 4;
$graph[6][5] = 15;

$graph[7][3] = 3;
$graph[7][6] = 4;
$graph[7][2] = 2;

$graph[8][3] = 3;






$cost=array(100,100,100,100,100,100);

function shortestPathCost($a, $b,array $graph,$i,array $cost) {
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
    return shortestPathCost($a, $b,$result,$i+1,$cost);
	

}
   }



 shortestPathCost(6, 7,$graph,1,$cost);


?>