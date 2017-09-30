<?php
require './Classes/BoardingPass.php';
require './Classes/Locations.php';
require './Utils/Parse.php';
 
//Make sure that it is a POST request.
if(strcasecmp($_SERVER['REQUEST_METHOD'], 'POST') != 0){
    throw new Exception('Request method must be POST!');
}
  
//Receive the RAW post data.
$content = trim(file_get_contents("php://input"));
$decoded = json_decode($content);

try {
	$boardingPasses = convertToBoardingPass($decoded);
	$location = getDeparturesAndDestinations($boardingPasses);
	echo json_encode(returnInstructions($location->orderBoardingPasses()));
}catch(Exception $e){
	header('HTTP/1.1 400 Bad Request', true, 400);
	throw new Exception('An error has ocurred');
}
	

?>