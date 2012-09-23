/*
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
*/

angular.module('SmgSupportCenter', [])
       .service('ticketsystemService', function($http){
            return {
                getList:function(){
                    //$scope.url = baseUrl + '/request/get-list/';

                    //console.log($scope.url);

                    $http.get(baseUrl + '/request/get-list');
                    /*
                    .success(function(data){
                        $scope.data = data;
                        $scope.result = $scope.data;
                    */
                    }
            }
                
    })
    .controller('GetListCtrl', ['$scope', 'ticketsystemService', function ($scope, ticketsystemService) {
                $scope.getList = getList.getList().success(function(res) {
                    $scope.results = res;
                })
            }])​​