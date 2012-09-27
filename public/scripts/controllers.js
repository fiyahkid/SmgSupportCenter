angular.module('SmgSupportCenter', [])
	.config(['$routeProvider' , function($routeProvider) {
		// Add a basic route to load the template
		$routeProvider
			.when('/get-list', {templateUrl: 'index/get-list', controller: 'GetListCtrl'}) //wenn url: SmgSupportCenter/public/index/#/get-list
			.when('/login', {templateUrl: 'auth/login', controller: 'LoginCtrl'}) //wenn url: SmgSupportCenter/public/index/#/login
			.otherwise({ templateUrl: 'index/main', controller: 'MainCtrl' }); //SmgSupportCenter/public/index/#/IRGENDWAS ANDERES
	}])
	.service('ticketsystemService', function($http){
		var self = this;
		this.tickets = [],
		this.getList = function(offset){
			return $http.get(baseUrl + '/request/get-list/offset/' + offset).success(function(res){
				var i = 0;
				for (i;i<res.length; i++) {
					self.tickets.push(res[i]);	
				}
			});
		}

		return {
			tickets: this.tickets,
			getList: this.getList
		}		
	})
	.controller('MainCtrl', ['$scope', function MainCtrl($scope) {
		console.log('Hallo');
	}])
	.controller('LoginCtrl', ['$scope', function MainCtrl($scope) {
		console.log('Login');
	}])
	.controller('GetListCtrl', ['$scope', 'ticketsystemService', function GetListCtrl ($scope, ticketsystemService) {
		$scope.showLoading = false;
		$scope.results = ticketsystemService.tickets;
		$scope.getList = function() {
			$scope.showLoading = true;
			ticketsystemService.getList($scope.results.length).success(function(res) {
				$scope.showLoading = false;
			})
		}

		if ($scope.results.length === 0) {
			$scope.getList();
		}
	}])
