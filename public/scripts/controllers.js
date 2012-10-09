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
	
	.controller('GetListCtrl', ['$rootScope', '$scope', '$http', 'ticketsystemService', function GetListCtrl ($rootScope, $scope, $http, ticketsystemService) {
		$scope.page = 1;
		$scope.offset = 10;
		$scope.results = ticketsystemService.tickets;
		$rootScope.showLoading = $scope.results.length > 0 ? false : true;		

		$scope.getOlder = function() {
			$scope.page++;
			$rootScope.showLoading = false;
			var pageOffset = ($scope.page -1) * $scope.offset;
			ticketsystemService.getList( pageOffset ).success(function(res){
				$scope.results = res;
				$rootScope.showLoading = false;
			})
		}
		$scope.getNewer = function() {
			$scope.page--;
			$rootScope.showLoading = false;
			var pageOffset = ($scope.page -1) * $scope.offset;
			ticketsystemService.getList( pageOffset ).success(function(res){
				$scope.results = res;
				$rootScope.showLoading = false;
			})
		}

		$scope.showTicket = function() {
			console.log($scope.results[IdTicketsystem]);
		}

		if ($scope.results.length === 0) {
			$rootScope.showLoading = false;
			ticketsystemService.getList(0).success(function(res){
				$scope.results = res;
				$rootScope.showLoading = false;
			})
		}

	}])
.directive('loadingScreen', ['$rootScope', '$parse', function($rootScope, $parse) {
	return {
		restrict: 'E',
		template: '<div style="color:#08C;" class="modal fade hide" id="myModal" tabindex="-1" role="dialog" data-backdrop="true" aria-labelledby="myModalLabel" aria-hidden="true"> ' +
  				  '<div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>' + 
    			  '<h3 id="myModalLabel">Lädt...</h3></div><div class="modal-body"><p>Lädt...</p></div><div class="modal-footer">' + 
                  '<!--<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button><button class="btn btn-primary">Save changes</button>-->' + 
                  '</div></div>',
		link: function($scope, $elem, attrs) {
			var modalElem = $elem.find('#myModal');
			$rootScope.$watch( 'showLoading', function(newValue, oldValue){
				if (newValue) {
					modalElem.modal('show');
				} else {
					modalElem.modal('hide');
				}
			}, true);
		}
	}
}])
