angular.module('SmgSupportCenter', [])
	.config(['$routeProvider' , function($routeProvider) {
		// Add a basic route to load the template
		$routeProvider
			.when('/get-list', {templateUrl: 'index/get-list', controller: 'GetListCtrl'}) //wenn url: SmgSupportCenter/public/index/#/get-list
			.when('/login', {templateUrl: 'auth/login', controller: 'LoginCtrl'}) //wenn url: SmgSupportCenter/public/index/#/login
			.when('/ticketsystem', {templateUrl: 'index/ticketsystem', controller: 'TicketsystemCtrl'}) //wenn url: SmgSupportCenter/public/index/#/ticketsystem
			.when('/ticketsystem/:site', {templateUrl: 'index/ticketsystem', controller: 'TicketsystemCtrl'}) //wenn url: SmgSupportCenter/public/index/#/ticketsystem
			//.when('/eingang', {templateUrl: 'ticketsystem/eingang', controller: 'EingangCtrl'}) //wenn url: SmgSupportCenter/public/index/#/eingang
			.otherwise({ templateUrl: 'index/main', controller: 'MainCtrl' }); //SmgSupportCenter/public/index/#/IRGENDWAS ANDERES
	}])
	.service('ticketsystemService', function($http){
		
		var self = this;
		this.tickets = [],
		this.getList = function(offset){
			return $http.get(baseUrl + '/request/get-list/offset/' + offset).success(function(res){
				
				self.tickets = res;
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
	.controller('TicketsystemCtrl', ['$scope', '$routeParams', function MainCtrl($scope, $routeParams) {
		var site = $routeParams.site || 'eingang'; //entweder was in der url steht oder standard: eingang

		$scope.nav = [
			{
				href: 'eingang',					// link wie er dann an die url angeängt wird... => http://localhost/SmgSupportCenter/public/#/ticketsystem/eingang
				template: 'ticketsystem/eingang',	// link zur view die geladen wird
				text: 'Eingang'						// text auf dem button
			},
			{
				href: 'bearbeitung',
				template: 'ticketsystem/bearbeitung',
				text: 'Bearbeitung'
			},
			{
				href: 'ausgang',
				template: 'ticketsystem/ausgang',
				text: 'Ausgang'
			},
			{
				href: 'bla',
				template: 'ticketsystem/bla',
				text: 'Bla'
			}
		];

		this.findCurrentNav = function(site) {
			return $.grep( $scope.nav, function(val, index){
				return val.href == site;
			})[0].template;
		};

		$scope.selectedSite = this.findCurrentNav(site);
	}])
	
	.controller('GetListCtrl', ['$scope', '$http', 'ticketsystemService', function GetListCtrl ($scope, $http, ticketsystemService) {
		$scope.page = 1;
		$scope.offset = 10;
		$scope.results = ticketsystemService.tickets;

		$scope.getOlder = function() {
			$scope.page--;
			var pageOffset = ($scope.page -1) * $scope.offset;
			
			ticketsystemService.getList().success(function(res) {
				$http.get(baseUrl + '/request/get-list/offset/' + pageOffset)
				$scope.results = res;
			})
			console.log('older');
		}
		$scope.getNewer = function() {
			$scope.page++;
			var pageOffset = ($scope.page -1) * $scope.offset;
			//$http.get(baseUrl + '/request/get-list/offset/' + pageOffset)
			ticketsystemService.getList().success(function(res) {
				$http.get(baseUrl + '/request/get-list/offset/' + pageOffset)
				$scope.results = res;
			})
			console.log('newer');
		}

		if ($scope.results.length === 0) {
			$scope.getNewer();
		}

	}])
