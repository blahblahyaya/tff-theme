'use strict';

angular.module('fabfitApp')
    .controller('MainCtrl', function($scope, FabfitBox, appInfo) {
        $scope.assetsUrl = appInfo.imgUrl;
        $scope.cartEmpty = appInfo.cartEmpty;
        $scope.editCart = function() {
            window.location = '/cart';
        }
        $scope.completePurchase = function() {
            window.location = '/checkout';
        }
        FabfitBox.get().then(function(data) {
            $scope.boxes = data;
        }, function() {
            $scope.boxes = [];
        })
    });