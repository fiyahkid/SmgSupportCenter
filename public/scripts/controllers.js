
function GetListCtrl($scope, $http) {
	$scope.url = baseUrl + '/request/get-list/';

	
	$scope.getlist = function() {
		$http.get($scope.url).success(function(data){
			$scope.data = data;
			$scope.result = $scope.data;
		})
		
	}

	//$scope.getlist();
}