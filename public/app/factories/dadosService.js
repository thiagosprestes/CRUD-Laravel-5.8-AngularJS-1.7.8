app.factory('dadosService', function ($http) {
    return {
        listaDados: function() {
            return $http.get('dados');
        }
    }
})