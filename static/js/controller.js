// Defining angularjs application.
    var postApp = angular.module('postApp', []);
    // Controller function and passing $http service and $scope var.
    postApp.controller('postController', function($scope, $http) {

			//lo seteamos al comenzar como false
			$scope.FormVisibility = false;
			// funcion que muestra la caja de respuesta
			$scope.ShowForm = function(){

				$scope.FormVisibility = true;
				// mostramos en consola FormVisibility true : false
				//console.log($scope.FormVisibility)
			}


			// create a blank object to handle form data.
      //  $scope.respuesta = {};
      // calling our submit function.
        $scope.submitForm = function() {
        // Posting data to php file
        $http({
          method  : 'POST',
          url     : 'model/Respuestass.php',
          data    : $scope.respuesta.msg, //forms user object
          headers : {'Content-Type': 'application/x-www-form-urlencoded'}
         })
          .success(function(data) {
            if (data.errors) {
              $scope.message = data.message;
							console.log($scope.message);
              // Showing errors.
              // $scope.errorName = data.errors.name;
              // $scope.errorUserName = data.errors.username;
              // $scope.errorEmail = data.errors.email;
            } else {
              $scope.message = data.message;
							console.log($scope.message);
            }
          });
        };

        $scope.enviar = function(){
      		$http.post('model/Respuesta.php', {
      			data: {respuesta: $scope.respuesta}
      		}).success(function(data){

            $scope.message = data.message;
            console.log('$scope.message');
          	// $scope.campeonato.nombre = '';
      			// $scope.campeonato.descripcion = '';
      			// $scope.campeonato.integrantes = [];
      			console.log(response);
      		}).error(function(){
      			alert('Error al intentar crear una respuesta en el ticket.');
      		});
      	};


    });
