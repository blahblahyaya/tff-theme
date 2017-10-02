'use strict';


angular.module('fabfitApp', [
        'ngSanitize',
        'ui.router',
        'btorfs.multiselect'
    ])
    .value('appInfo', {
        siteUrl: appInfo.siteUrl,
        fabfitboxUrl: appInfo.fabfitboxUrl,
        fabfitImageUrl: appInfo.fabfitImageUrl,
        addToCartUrl: appInfo.addToCartUrl,
        customerId: appInfo.customerId,
        imgUrl: appInfo.imgUrl,
        templateUrl: appInfo.templateUrl,
        completeBoxUrl: appInfo.completeBoxUrl,
        feedbackUrl: appInfo.feedbackUrl,
        nonce: appInfo.nonce,
        cartEmpty: appInfo.is_empty
    })
    .config(function($stateProvider, $urlRouterProvider, $httpProvider) {

        $urlRouterProvider.otherwise('/');
        $stateProvider
            .state('index', {
                url: '/',
                templateUrl: appInfo.templateUrl + '/main.html',
                controller: 'MainCtrl'
            })
            .state('myfabfit', {
                url: '/myfabfit',
                templateUrl: appInfo.templateUrl + '/myfabfit.html',
                controller: 'MyfabfitCtrl'
            })
            .state('box', {
                url: '/box/:id',
                templateUrl: appInfo.templateUrl + '/box.html',
                controller: 'BoxCtrl'
            });
    });