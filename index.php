<?php 

include("class_diplomskiRadovi.php");
include("curl.php");

//$objekt = new diplomskiRadovi("123","324","444,","RSD");
//print_r($objekt);

$firstObject = new diplomskiRadovi($data["oib"], $data["text"], $data["link"], $data["title"]);
echo "<div style='margin-top:5rem; margin-bottom:5rem; border: solid black; display: flex; flex-flow: column wrap; justify-content: center; align-items: center;'>
    <h1>This is first object</h1>
    <span style='width:70%'>".print_r($firstObject, true)."</span>
    </div>";
    //print_r($firstObject);
    
$titles = $dom->find('.fusion-post-content-container p');
$articleNumber = count($titles);

//print_r($articleNumber);    

$firstObject->save($articleNumber);

$firstObject->read();
    

?>