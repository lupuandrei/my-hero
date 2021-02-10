var app = angular.module('app', ['toastr']);

app.controller("BattleController", function ($scope, $http, toastr, BattleService) {
    $scope.battle = null;
    $scope.error = null;

    $scope.battleAction = function () {
        BattleService.index().then(function (battle) {
            const message = $scope.battle == null ? "The battle has stated" : "A new battle has begun";
            toastr.success(message);
            $scope.battle = battle;
        }, function (error) {
            toastr.error(error.toString());
            $scope.error = error;
        });
    }

});

app.service("BattleService", function ($http) {
    this.index = () => {
        return $http.get("/api/battle").then((response) => {
            return response.data;
        });
    }
});
