
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Trip Classifier</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  
   <style>
        body {
            display: flex;
            min-height: 100vh;
            flex-direction: column;
        }

        main {
            flex: 1 0 auto;
        }
   
    </style>

  
  
</head>
<body ng-app="app">
   <nav class="purple darken-4" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo">Trip Classifier</a>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
  </nav>
    <main>
        <div class="container" ng-controller="apiController">
            <div class="row">
            <div class="col s12 m12">
                <div class="col s6 m6">
                    <div class="row" ng-repeat="x in boardingPasses">
                        <div class="col s12 m16">
                          <div class="card blue-grey darken-1">
                            <div class="card-content white-text">
                              <span class="card-title">Boarding Pass</span>
                              Salida: {{x.departure}} <br/>
                              Destino: {{x.destination}} <br/>
                              Transporte: {{x.transport}} <br/>
                              Puerta: {{x.door}} <br/>
                              Asiento : {{x.seat}} <br/>                
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
             <div class="col s6 m6" style="margin-top:40px;">
                <a class="waves-effect waves-light btn" ng-click="random()">Random</a>
                <a class="waves-effect waves-light btn" ng-click="sendAPI()">Enviar a API</a>
                
                
                 <ul class="collection">
                    <li class="collection-item" ng-repeat="x in instructions">{{x}}</li>
                  </ul>
                
            </div>
            </div>
           
                
                
            </div>
            
            

        </div>
    </main>

 <footer class="page-footer grey darken-4">
        <div class="container">
            
        </div>
        <div class="footer-copyright">
        </div>



  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.min.js"></script>
  <script>
      (function($){
        $(function(){

          $('.button-collapse').sideNav();

        }); // end of document ready
      })(jQuery); // end of jQuery name space

  </script>
  <script src="js/angular.min.js"></script>
  <script src="js/clientAPI.js"></script>

  </body>
</html>


