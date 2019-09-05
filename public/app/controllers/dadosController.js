app.controller('dadosController', function ($scope, dadosService) {

    $scope.listar = function () {
        dadosService.listaDados().then(function (response) {
            $scope.dados = response.data;
        });
    }
})