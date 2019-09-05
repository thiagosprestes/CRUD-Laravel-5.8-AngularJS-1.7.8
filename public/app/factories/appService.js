app.factory('appService',function($http) {
	return {
		listarVendas: function(){
			return $http.get('vendas');
		},
		registrarVenda: function(data){
			return $http.post('vendas', data);
		},
		editarVenda: function(data){
			var id = data.id;
			delete data.id;
			return $http.put('vendas/'+id, data);
		},
		excluirVenda: function(id){
			return $http.delete('vendas/'+id)
		}
	}
});