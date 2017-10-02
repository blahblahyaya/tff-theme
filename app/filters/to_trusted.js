'use strict';

angular.module('fabfitApp')
    .filter('to_trusted', function($sce) {
        return function(input) {
            return $sce.trustAsHtml(input);
        };
    });