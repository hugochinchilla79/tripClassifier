<?php

Class Location {
    public $departures;
    public $destinations;
    public $allLocations;
    public $boardingPasses;
    
    function __construct($departures,$destinations, $allLocations, $boardingPasses){
        $this->departures = $departures;
        $this->destinations = $destinations;
        $this->allLocations = $allLocations;
        $this->boardingPasses = $boardingPasses;
    }
    
    function getDepartures(){
        return $this->departures;
    }
    
    function getDestinations() {
        return $this->destinations;
    }
    
    function getAllLocations() {
        return $this->allLocations;
    }
    
    function getFirstPlace() {
       $array = array_diff($this->allLocations,$this->destinations);
       return end($array);
    }
    
    function getLastPlace() {
        $array = array_diff($this->allLocations, $this->departures);
        return end($array);
    }
    
    function orderBoardingPasses() {
        $firstPlace = $this->getFirstPlace();
        $lastPlace = $this->getLastPlace();        
        $endTrip = false;
        $orderedBoardingPasses = [];
        while(!$endTrip){
            if($firstPlace===$lastPlace){
                $endTrip = true;
            }else{
                $boardingPass = $this->boardingPasses[$firstPlace];
                $orderedBoardingPasses[$firstPlace] = $boardingPass;
                $firstPlace = $boardingPass->destination;
            }            
        }
        
        return $orderedBoardingPasses;
    }
    
}
