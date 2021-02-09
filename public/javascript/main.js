var app = angular.module('app', []);

app.controller("BattleController", function($scope, $http, BattleService) {
    $scope.battle = null;
    $scope.error = null;

    $scope.battleAction = function () {
        BattleService.index().then(function (battle){
            $scope.battle = battle;
            console.log(battle);
        }, function (error){
            $scope.error = error;
        });
    }

});

app.service("BattleService", function($http) {
    this.index = () => {
        return $http.get("/api/battle").then((response) => {
            return response.data;
        });
    }
});
