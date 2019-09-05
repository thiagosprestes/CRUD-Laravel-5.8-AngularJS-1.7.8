var app = angular.module('app', ['ngRoute']);

app.config(['$routeProvider', function($routeProvider) {
    $routeProvider
    .when('/', {
        templateUrl: 'app/templates/index.html',
        controller: 'appController'
    })
    .when('/dados', {
        templateUrl: 'app/templates/dados.html',
        controller: 'dadosController'
    })
}])
