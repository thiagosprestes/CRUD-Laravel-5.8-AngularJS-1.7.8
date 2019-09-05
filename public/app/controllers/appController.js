app.controller('appController', function ($scope, $timeout, appService) {

	let data = new Date;
	let dia = data.getDate().toString();
	let mes = (data.getMonth() + 1).toString(); 
	let ano = data.getFullYear();

	let diaF = (dia.length == 1) ? '0' + dia : dia;
	let mesF = (mes.length == 1) ? '0' + mes : mes;

	$scope.mostrarFormVenda = function () {
		$scope.botao = "Registrar";
		$("#data").val(`${diaF}/${mesF}/${ano}`);
		$("#formVenda").slideToggle('slow');
	}

	$scope.somarValores = function () {
		let qtdEspCarne = $scope.venda.qtdEspetinhosCarne;
		let qtdEspFrango = $scope.venda.qtdEspetinhosFrango;
		let qtdSanduiches = $scope.venda.sanduiches;

		let totEspCarne = qtdEspCarne * 3.00;
		let totEspFrango = qtdEspFrango * 2.50;
		let totSanchuiches = qtdSanduiches * 6.00;

		let soma = (parseFloat(totEspCarne) || 0) + (parseFloat(totEspFrango) || 0) + (parseFloat(totSanchuiches) || 0);

		let res = soma.toFixed(2);

		$scope.venda.total = res.replace('.', ',');
	}

	$scope.reset = function () {
		delete $scope.venda;
		$scope.registrarVenda.$setPristine();
	}

	$scope.mostrarMsg = function () {
		$timeout( function(){
            $scope.msg = '';
        }, 3000 );
	}
	
    $scope.registrar = function () {
        if($scope.venda.id){
			$scope.botao = "Salvar alterações"
			appService.editarVenda($scope.venda).then(function(response){
				$scope.reset();
				$("#formVenda").slideToggle('slow');
				$scope.mostrarMsg();
				$scope.msg = "Dados atualizados com sucesso";
				$scope.listar();
			});
		}else{
			appService.registrarVenda($scope.venda).then(function(response){
				$scope.reset();
				$("#formVenda").slideToggle('slow');
				$scope.mostrarMsg();
				$scope.msg = "Venda registrada com sucesso";
				$scope.listar();
			});
		}
	}
	
	$scope.listar = function () {
		appService.listarVendas().then(function (response) {
			$scope.vendas = response.data;
		});
	}

	$scope.editar = function (data) {
		$scope.venda = data;
		$scope.botao = "Registrar alterações";
		$("#formVenda").slideDown('slow');
	}

	$scope.excluir = function (data) {
		if (confirm("Tem certeza que deseja excluir?")) {
			appService.excluirVenda(data).then(function (response) {
				$scope.mostrarMsg();
				$scope.msg = "Venda excluída com sucesso";
				$scope.listar();
			});	
		}
	}

	$(document).ready(function () {
		$('#data').mask('00/00/0000');
		$('#total').mask('#.##0,00', {reverse:true});
	});
});