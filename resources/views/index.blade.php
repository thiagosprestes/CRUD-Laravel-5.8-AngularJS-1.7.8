<!DOCTYPE html>
<html lang="pt-BR" ng-app="app">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('node_modules/@fortawesome/fontawesome-free/css/all.min.css') }}">
    
    <title>Espetinhos</title>
</head>
<body>
    <div class="d-flex" id="wrapper">

        <!-- Sidebar -->
        <div class="bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading bg-primary text-white">Espetinhos</div>
            <div class="list-group list-group-flush">
                <a href="{{ url('/#!/') }}" class="list-group-item list-group-item-action bg-white"><i class="fas fa-file-alt"></i> Registrar venda</a>
                <a href="{{ url('/#!/dados') }}" class="list-group-item list-group-item-action bg-white"><i class="fas fa-database"></i> Dados diários</a>
                <a href="#" class="list-group-item list-group-item-action bg-white"><i class="fa fa-sign-out-alt"></i> Sair</a>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-dark bg-primary border-bottom">
                <button class="btn btn-primary" id="menu-toggle"><i class="fa fa-bars"></i></button>
            </nav>
            <div ng-view style="padding-top: 10px;"></div>
        </div>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>

    <!--Angular-->
    <script src="{{ asset('node_modules/angular/angular.min.js') }}"></script>
    <script src="{{ asset('node_modules/angular-route/angular-route.min.js') }}"></script>

    <!--Routes-->
    <script src="{{ asset('app/routes.js') }}"></script>

    <!--Controllers-->
    <script src="{{ asset('app/controllers/appController.js') }}"></script>
    <script src="{{ asset('app/controllers/dadosController.js') }}"></script>

    <!--Factories-->
    <script src="{{ asset('app/factories/appService.js') }}"></script>
    <script src="{{ asset('app/factories/dadosService.js') }}"></script>

    <script src="{{ asset('node_modules/angular-locale/angular-locale_pt-br.js') }}"></script>
    <script src="{{ asset('node_modules/jquery-mask-plugin/dist/jquery.mask.min.js') }}"></script>

    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    </script>
</body>
</html