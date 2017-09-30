<?php

require './Classes/BoardingPass.php';
require './Classes/Locations.php';
require './Utils/Parse.php';

 
class Test extends PHPUnit_Framework_TestCase {
    
   public function test() {
       
       $disorderBoardingPasses = [];       
       $boardingPass1 = new BoardingPass(); 
       $boardingPass1->departure = "Aeropuerto de México";
       $boardingPass1->destination = "Ciudad de México";
       $boardingPass1->transport = "Bus";
       $boardingPass1->seat = "";
       $boardingPass1->door = "";
       
       $boardingPass2 = new BoardingPass();
       $boardingPass2->departure = "Ciudad de México";
       $boardingPass2->destination = "Ciudad de Juárez";
       $boardingPass2->transport = "Tren";
       $boardingPass2->seat = "2B";
       $boardingPass2->door = "";
              
       $boardingPass = new BoardingPass();
       $boardingPass->departure = "Aeropuerto Monseñor Arnulfo Romero";
       $boardingPass->destination = "Aeropuerto de México";
       $boardingPass->door = "79P";
       $boardingPass->seat = "7B";
       $boardingPass->transport = "Avión";
       
       $boardingPass3 = new BoardingPass();
       $boardingPass3->departure = "Ciudad de Juárez";
       $boardingPass3->destination = "Aeropuerto JFK";
       $boardingPass3->transport = "Avión";
       $boardingPass3->seat = "97C";
       $boardingPass3->door = "55A";
              
       $boardingPass4 = new BoardingPass();
       $boardingPass4->departure = "Aeropuerto JFK";
       $boardingPass4->destination = "Ciudad de Nueva York";
       $boardingPass4->transport = "Bus";
       $boardingPass4->seat = "";
       $boardingPass4->door = "";
       
       $orderedBoardingPasses = [];
       
       $orderedBoardingPasses[$boardingPass->departure] = $boardingPass;
       $orderedBoardingPasses[$boardingPass1->departure] = $boardingPass1;
       $orderedBoardingPasses[$boardingPass2->departure] = $boardingPass2;
       $orderedBoardingPasses[$boardingPass3->departure] = $boardingPass3;
       $orderedBoardingPasses[$boardingPass4->departure] = $boardingPass4;
       
       $disorderBoardingPasses[] = $boardingPass4;
       $disorderBoardingPasses[] = $boardingPass1;
       $disorderBoardingPasses[] = $boardingPass;
       $disorderBoardingPasses[] = $boardingPass3;
       $disorderBoardingPasses[] = $boardingPass2;
             
       $boardingPasses = convertToBoardingPass($disorderBoardingPasses);
       
       $location = getDeparturesAndDestinations($boardingPasses);
       $equals = $location->orderBoardingPasses() == $orderedBoardingPasses; 
       echo readBoardingPasses($location->orderBoardingPasses());
       print_r(returnInstructions($boardingPasses));
       
       
       $this->assertEquals(true,$equals);
   }
   
   
   public function secondTest() {
       
       $disorderBoardingPasses = [];       
       $boardingPass1 = new BoardingPass(); 
       $boardingPass1->departure = "Aeropuerto de México";
       $boardingPass1->destination = "Ciudad de México";
       $boardingPass1->transport = "Bus";
       $boardingPass1->seat = "Sin número de asiento";
       $boardingPass1->door = "";
       
       $boardingPass2 = new BoardingPass();
       $boardingPass2->departure = "Ciudad de México";
       $boardingPass2->destination = "Ciudad de Juárez";
       $boardingPass2->transport = "Tren";
       $boardingPass2->seat = "2B";
       $boardingPass2->door = "";
              
       $boardingPass = new BoardingPass();
       $boardingPass->departure = "Aeropuerto Monseñor Arnulfo Romero";
       $boardingPass->destination = "Aeropuerto de México";
       $boardingPass->door = "79P";
       $boardingPass->seat = "7B";
       $boardingPass->transport = "Avión";
       
       $boardingPass3 = new BoardingPass();
       $boardingPass3->departure = "Ciudad de Juárez";
       $boardingPass3->destination = "Aeropuerto JFK";
       $boardingPass3->transport = "Avión";
       $boardingPass3->seat = "97C";
       $boardingPass3->door = "55A";
              
       $boardingPass4 = new BoardingPass();
       $boardingPass4->departure = "Aeropuerto JFK";
       $boardingPass4->destination = "Ciudad de Nueva York";
       $boardingPass4->transport = "Bus";
       $boardingPass4->seat = "Sin Asignar";
       $boardingPass4->door = "";
       
       $orderedBoardingPasses = [];
       
       $orderedBoardingPasses[$boardingPass->departure] = $boardingPass;
       $orderedBoardingPasses[$boardingPass1->departure] = $boardingPass1;
       $orderedBoardingPasses[$boardingPass2->departure] = $boardingPass2;
       $orderedBoardingPasses[$boardingPass3->departure] = $boardingPass3;
       $orderedBoardingPasses[$boardingPass4->departure] = $boardingPass4;
       
       $disorderBoardingPasses[] = $boardingPass2;
       $disorderBoardingPasses[] = $boardingPass4;
       $disorderBoardingPasses[] = $boardingPass1;
       $disorderBoardingPasses[] = $boardingPass3;
       $disorderBoardingPasses[] = $boardingPass;
             
       $boardingPasses = convertToBoardingPass($disorderBoardingPasses);
       
       $location = getDeparturesAndDestinations($boardingPasses);
       $equals = $location->orderBoardingPasses() == $orderedBoardingPasses; 
       
       $this->assertEquals(true,$equals);
   }
 
}

