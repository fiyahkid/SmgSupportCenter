angular.module('SmgSupportCenter', [])
	.config(['$routeProvider' , function($routeProvider) {
		// Add a basic route to load the template
		$routeProvider
			.when('/get-list', {templateUrl: 'index/get-list', controller: 'GetListCtrl'}) //wenn url: SmgSupportCenter/public/index/#/get-list
			.when('/get-search-list', {templateUrl: 'request/get-search-list', controller: 'SearchCtrl'}) //wenn url: SmgSupportCenter/public/index/#/get-search-list
			.when('/login', {templateUrl: 'auth/login', controller: 'LoginCtrl'}) //wenn url: SmgSupportCenter/public/index/#/login
			.when('/ticketsystem', {templateUrl: 'index/ticketsystem', controller: 'TicketsystemCtrl'}) //wenn url: SmgSupportCenter/public/index/#/ticketsystem
			.when('/ticketsystem/:site', {templateUrl: 'index/ticketsystem', controller: 'TicketsystemCtrl'}) //wenn url: SmgSupportCenter/public/index/#/ticketsystem
			//.when('/eingang', {templateUrl: 'ticketsystem/eingang', controller: 'EingangCtrl'}) //wenn url: SmgSupportCenter/public/index/#/eingang
			.otherwise({ templateUrl: 'index/main', controller: 'MainCtrl' }); //SmgSupportCenter/public/index/#/IRGENDWAS ANDERES
	}])
	.service('ticketsystemService', ['$rootScope', '$http', function($rootScope, $http){
		
		var self = this;
		this.tickets = [];
		this.getList = function(offset, keywords){
			return $http.get(baseUrl + '/request/get-list/offset/' + offset + '/search/' + keywords).success(function(res){
				self.tickets = res;
				$rootScope.$broadcast('new-search-results', res);
			});
		}

		return {
			tickets: this.tickets,
			getList: this.getList
		}		
	}])
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
	.controller('MainCtrl', ['$rootScope', '$scope', 'ticketsystemService', function MainCtrl($rootScope, $scope, ticketsystemService) {
		$scope.keywords = '';
		$scope.search = function() {
			$rootScope.showLoading = true;
			ticketsystemService.getList(0, $scope.keywords).success(function(){
				$rootScope.showLoading = false;
			})
		}
	}])
	.controller('GetListCtrl', ['$rootScope', '$scope', '$http', 'ticketsystemService', function GetListCtrl ($rootScope, $scope, $http, ticketsystemService) {
		$scope.page = 1;
		$scope.offset = 10;
		$scope.results = [];
		$scope.$on('new-search-results', function(e, val){
			$scope.results = val;
		});
		$rootScope.showLoading = $scope.results.length > 0 ? false : true;

		$scope.getOlder = function() {
			$scope.page++;
			$rootScope.showLoading = true;
			var pageOffset = ($scope.page -1) * $scope.offset;
			ticketsystemService.getList( pageOffset, $scope.keywords ).success(function(res){
				$rootScope.showLoading = false;
				$scope.currentMsg = res[0];
			})
			console.log($scope.keywords);
		}
		$scope.getNewer = function() {
			$scope.page--;
			$rootScope.showLoading = true;
			var pageOffset = ($scope.page -1) * $scope.offset;
			ticketsystemService.getList( pageOffset, $scope.keywords ).success(function(res){
				$rootScope.showLoading = false;
				$scope.currentMsg = res[0];
			})
		}

		$scope.showMessage = function(index) {
			$scope.currentMsg = $scope.results[index];
		}

		if ($scope.results.length === 0) {

			$rootScope.showLoading = true;

			ticketsystemService.getList(0, $scope.keywords).success(function(res){
				$rootScope.showLoading = false;
			})
		}

	}])
.directive('loadingScreen', ['$rootScope', '$parse', function($rootScope, $parse) {
	return {
		restrict: 'E',
		scope: {
			show: '='
		},
		template: '<div class="label label-info">Info</div>',
		link: function($scope, $elem, attrs) {
			// $scope.$watch( 'showLoading', function(newValue, oldValue){
			// 	console.log($scope.show);
			// 	if ($scope.show) {
			// 		$elem.show();
			// 	} else {
			// 		$elem.hide();
			// 	}
			// }, true);
		}
	}
}])
