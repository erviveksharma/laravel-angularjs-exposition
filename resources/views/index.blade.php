<!DOCTYPE html>
<html lang="en" ng-app="expositionApp">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Virtual Exposition Application</title>

    <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <script src="bower_components/angular/angular.js"></script>
    <script src="bower_components/lodash/lodash.js"></script>
    <script src="bower_components/angular-route/angular-route.min.js"></script>
    <script src="bower_components/angular-local-storage/dist/angular-local-storage.min.js"></script>
    <script src="bower_components/restangular/dist/restangular.min.js"></script>
    <script src='bower_components/angular-simple-logger/dist/angular-simple-logger.min.js'></script>
    <script src='bower_components/angular-google-maps/dist/angular-google-maps.min.js'></script>
    <script src='bower_components/ng-file-upload-shim/ng-file-upload-shim.min.js'></script>
    <script src='bower_components/ng-file-upload/ng-file-upload.min.js'></script>
    <script src='bower_components/angular-messages/angular-messages.min.js'></script>

    <script src="js/app.js"></script>
    <script src="js/controllers.js"></script>
    <script src="js/services.js?version=5"></script>

</head>

<body>
<div class="container">
    <div class="row">
        <a href="#/"><h1>Virtual Exposition Application</h1></a>
        <div ng-view></div>
    </div>
    <hr>
    <div class="row">Virtual Exposition Application : 2016</div>
</div>

<script src="bower_components/jquery/dist/jquery.min.js"></script>
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>