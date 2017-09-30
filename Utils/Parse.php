<?php
//Getting the StdClass and converting to $boardingPassObject
function convertToBoardingPass($stdObject) {
    $boardingPassObject = [];
    foreach($stdObject as $val){
         $boardingPass = new BoardingPass();
        foreach($val as $key => $value ){           
            $boardingPass->{$key} = $value;            
        }
        $boardingPassObject[$val->departure] = $boardingPass;
    }
    return $boardingPassObject;
}


function getDeparturesAndDestinations($boardingPasses){
    $departures = [];
    $destinations = [];
    $allLocations = [];
    foreach($boardingPasses as $value){
        if(!in_array($value->departure,$allLocations)){
            $allLocations[] = $value->departure;
        }
        if(!in_array($value->destination,$allLocations)){
            $allLocations[] = $value->destination;
        }        
        if(!in_array($value->departure,$departures)){
            $departures[] = $value->departure;
        }
        if(!in_array($value->destination,$destinations)){
            $destinations[] = $value->destination;
        }
    }  
    $location = new Location($departures,$destinations,$allLocations,$boardingPasses);    
    return $location; 
}


function readBoardingPasses($boardingPasses) {
    $counter = 1;
    $resume = "";
    foreach($boardingPasses as $val){
        $resume = $resume."$counter. Tome el ".$val->transport." de ".$val->departure." a ".$val->destination;
        if($val->door!=""){
            $resume = $resume.". Puerta ".$val->door;
        }
        if($val->seat!=""){
            $resume = $resume.". Tome el Asiento ".$val->seat;
        }else {
            $resume = $resume.". No hay asiento asignado ".$val->seat;
        }
        
        $resume=$resume."\n";
        $counter++;
    }
    return $resume;
    
}


function returnInstructions($boardingPasses) {
    $counter = 1;
    $resume = "";
    $array = [];
    foreach($boardingPasses as $val){
        $resume = "";
        $resume = $resume."$counter. Tome el ".$val->transport." de ".$val->departure." a ".$val->destination;
        if($val->door!=""){
            $resume = $resume.". Puerta ".$val->door;
        }
        if($val->seat!=""){
            $resume = $resume.". Tome el Asiento ".$val->seat;
        }else {
            $resume = $resume.". No hay asiento asignado ".$val->seat;
        }
        
        $resume=$resume."\n";
        $counter++;
        $array[] = $resume;
    }
    return $array;
    
}









