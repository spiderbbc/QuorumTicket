function TicketController ($scope) {
	// primer controlador
	

	//lo seteamos al comenzar como false
	$scope.FormVisibility = false;
	
	$scope.ShowForm = function(){

		$scope.FormVisibility = true;
		// mostramos en consola FormVisibility true : false
		//console.log($scope.FormVisibility)
	}
}