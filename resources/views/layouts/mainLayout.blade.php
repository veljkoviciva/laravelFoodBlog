<!DOCTYPE html>
<html lang="en" ng-app="myApp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <title>{{config('app.name', 'FoodBlog')}}</title>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular-route.js"></script>
</head>
<body>
    @include('include/navbar')
    <div class="container">
        @include('include/messages')
        @yield('content')
    </div>
    {{-- <div class="container-fluid">
        <div ng-include="'htmlAngularJS/footer.html'"></div>
    </div> --}}

    {{-- <script src="/js/bootstrap.bundle.min.js"></script> --}}
    <script>
        var app = angular.module("myApp", []);
    app.controller("myCtrl", function ($scope) {
        $scope.izraz = "Proba angulara";

    });
    </script>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="/js/bootstrap.bundle.min.js"></script>
</body>
</html>