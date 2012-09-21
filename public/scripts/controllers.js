
function GetListCtrl($scope, $http, $rootScope) {
	$rootScope.url = baseUrl + '/request/get-list/';

	
	$rootScope.getlist = function() {
console.log($scope.url);
		$http.get($rootScope.url).success(function(data){
			$scope.data = data;
			$scope.result = $scope.data;
		})
		
	}

	//$scope.getlist();
}
