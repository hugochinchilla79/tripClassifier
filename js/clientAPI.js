var app = angular.module('app', []);

app.controller('apiController',function($scope,$http){
   $scope.boardingPasses = [ 
       {
        departure: "Aeropuerto de México",
        destination: "Ciudad de México",
        transport: "Bus",
        seat: "",
        door: ""
        },
       {
        departure: "Ciudad de México",
        destination: "Ciudad de Juárez",
        transport: "Tren",
        seat: "2B",
        door: ""
       },
       {
        departure: "Aeropuerto Monseñor Arnulfo Romero",
        destination: "Aeropuerto de México",
        transport: "Avión",
        seat: "79P",
        door: "7B"
       },
       {
        departure: "Ciudad de Juárez",
        destination: "Aeropuerto JFK",
        transport: "Avión",
        seat: "97C",
        door: "55A"           
       },
       {
        departure: "Aeropuerto JFK",
        destination: "Ciudad de Nueva York",
        transport: "Bus",
        seat: "",
        door: ""
       }
    ];
    $scope.instructions = "";
    $scope.random = function() {
            var j, x, i;
            for (i = $scope.boardingPasses.length; i; i--) {
                j = Math.floor(Math.random() * i);
                x = $scope.boardingPasses[i - 1];
                $scope.boardingPasses[i - 1] = $scope.boardingPasses[j];
                $scope.boardingPasses[j] = x;
            }
    };
    
    
    $scope.sendAPI = function () {        
        var request = $http({
            method: "post",
            url: "index.php",
            data: JSON.stringify($scope.boardingPasses),
            headers: { 'Content-Type': 'application/json' }
        }).then(function(a){
            $scope.instructions = a.data;
        }).error(function(error,status){
            alert("Ha ocurrido un error con los datos de prueba");
        });
    };
});


