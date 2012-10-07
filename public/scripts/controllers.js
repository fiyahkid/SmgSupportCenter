angular.module('SmgSupportCenter', [])
	.config(['$routeProvider' , function($routeProvider) {
		// Add a basic route to load the template
		$routeProvider
			.when('/get-list', {templateUrl: 'index/get-list', controller: 'GetListCtrl'}) //wenn url: SmgSupportCenter/public/index/#/get-list
			.when('/login', {templateUrl: 'auth/login', controller: 'LoginCtrl'}) //wenn url: SmgSupportCenter/public/index/#/login
			.when('/ticketsystem', {templateUrl: 'index/ticketsystem', controller: 'TicketsystemCtrl'}) //wenn url: SmgSupportCenter/public/index/#/ticketsystem
			.when('/ticketsystem/:site', {templateUrl: 'index/ticketsystem', controller: 'TicketsystemCtrl'}) //wenn url: SmgSupportCenter/public/index/#/ticketsystem
			.when('/eingang', {templateUrl: 'ticketsystem/eingang', controller: 'EingangCtrl'}) //wenn url: SmgSupportCenter/public/index/#/eingang
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
	.controller('TicketsystemCtrl', ['$scope', '$routeParams', function MainCtrl($scope, $routeParams) {
		var site = $routeParams.site || 'eingang'; //entweder was in der url steht oder standard: eingang

		$scope.nav = [
			{
				href: 'eingang',					// link wie er dann an die url angeängt wird... => http://localhost/SmgSupportCenter/public/#/ticketsystem/eingang
				template: 'ticketsystem/eingang',	// link zur view die geladen wird
				text: 'Eingang'						// text auf dem button
			},
			{
				href: 'section2',
				template: 'ticketsystem/section2',
				text: 'Section2'
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
	.controller('EingangCtrl', ['$scope', function MainCtrl($scope) {
		console.log('Eingang');
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
