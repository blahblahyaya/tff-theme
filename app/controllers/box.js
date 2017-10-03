'use strict';

angular.module('fabfitApp')
    .controller('BoxCtrl', function($scope, $stateParams, $state, FabfitBox) {
        //Checking for FabFit boxes
        if (!FabfitBox.boxes().length) {
            $state.go('index');
            return;
        }

        var boxId = $stateParams.id || 0;
        var productIds = [];
        var checkoutProducts = [];
        var feedback = [];
        $scope.loadingMessage = 'LOADING YOUR FABFIT BOX';
        $scope.loading = true;
        $scope.box = FabfitBox.boxes()[boxId];
        $scope.pending = $scope.box.acf.products.length;

        angular.forEach($scope.box.acf.products, function(item) {
            productIds.push(item.ID);
        });

        FabfitBox.getImages(productIds.join(',')).then(function(images) {
            FabfitBox.mergeImages($scope.box);
            $scope.loading = false;
        });

        $scope.customerOptions = [];

        $scope.addProduct = function(p) {
            $scope.pending -= 1;
            checkoutProducts.push(p.ID);
        }

        $scope.removeProduct = function(p) {
            $scope.pending -= 1;
            var productIndex = checkoutProducts.indexOf(p.ID);
            if (productIndex > -1) {
                checkoutProducts.splice(productIndex, 1);
            }
        }

        var updateFeedBack = function() {
            angular.forEach($scope.box.acf.products, function(item) {
                var prod = feedback.find(function(p) {
                    return p.ID == item.ID;
                });
                if (prod) {
                    prod.customerOptions = item.customerOptions;
                    prod.return = item.return;
                } else {
                    feedback.push({ ID: item.ID, comments: item.customerOptions, name: item.post_name, return: item.return })
                }
            });
        }

        $scope.setBack = function() {
            $scope.pending += 1;
        }

        $scope.completePurchase = function() {
            $scope.loadingMessage = 'Building your order';
            $scope.loading = true;
            completeCheckout();
        }

        var completeCheckout = function() {
            updateFeedBack();
            if (checkoutProducts.length > 0) {
                var id = checkoutProducts.pop();
                FabfitBox.addToCart(id, completeCheckout);
            } else {
                FabfitBox.feedback($scope.box.id, feedback, function() {
                    FabfitBox.completed($scope.box.id, function() {
                        window.location = '/checkout';
                    });
                })
            }

        }

        $scope.keepitOptions = [
            'The fit is great',
            'I love the color',
            'I love the fabric',
            'The price is right',
            'I\'m too lazy to return it'
        ];

        $scope.returnOptions = [
            'The fit is not great',
            'I hate the color',
            'It is expensive',
            'The jeans are too long'
        ];

    });