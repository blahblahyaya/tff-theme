'use strict';

angular.module('fabfitApp')
    .factory('FabfitBox', ['$http', '$q', 'appInfo', function($http, $q, appInfo) {

        var myfabfit = {
            boxes: [],
            selected: 0,
            images: []
        };

        return {
            get: function() {
                var deferred = $q.defer();
                $http.get(appInfo.siteUrl + appInfo.fabfitboxUrl + appInfo.customerId)
                    .then(function(data) {
                        myfabfit.boxes = data.data;
                        deferred.resolve(myfabfit.boxes);
                    }, function(failed) {
                        console.log(failed);
                        deferred.reject(failed);
                    })

                return deferred.promise;
            },
            boxes: function() {
                return myfabfit.boxes;
            },
            getImages: function(ids) {
                var deferred = $q.defer();
                $http.get(appInfo.siteUrl + appInfo.fabfitImageUrl + ids)
                    .then(function(data) {
                        myfabfit.images = data.data;
                        deferred.resolve(myfabfit.images);
                    }, function(failed) {
                        console.log(failed);
                        deferred.reject(failed);
                    })

                return deferred.promise;
            },
            mergeImages: function(box) {
                angular.forEach(myfabfit.images, function(image) {
                    var product = box.acf.products.find(function(item) {
                        return +item.ID === +image.ID;
                    });
                    if (product) {
                        product.image_url = image.image_url;
                        product.width = image.width;
                        product.height = image.height;
                        product.price = image.price;
                        product.selected = false;
                        product.return = false;
                    }
                })
            },
            addToCart: function(id, cb, fb) {
                $http.post(appInfo.siteUrl + appInfo.addToCartUrl, { id: id })
                    .then(function(data) {
                        cb(data);
                    }, function(failed) {
                        console.error(failed);
                    })
            },
            completed: function(id, cb, fb) {
                $http.get(appInfo.siteUrl + appInfo.completeBoxUrl + '?id=' + id)
                    .then(function(data) {
                        cb(data)
                    }, function(err) {
                        console.error(err);
                    })
            },
            feedback: function(id, feedbackList, cb) {
                var feedback = '';
                if (feedbackList.length > 0) {
                    for (var i = 0; i < feedbackList.length; i++) {
                        feedback += '<p>I am ';
                        feedback += feedbackList[i].return ? 'returning ' : 'keeping ';
                        feedback += feedbackList[i].name + ' because:</p>\n';
                        feedback += '<ul>';
                        if (feedbackList[i].comments) {
                            for (var j = 0; j < feedbackList[i].comments.length; j++) {
                                feedback += '<li>' + feedbackList[i].comments[j] + '</li>\n';
                            }
                        }
                        feedback += '</ul>\n';
                    }
                }

                $http.post(appInfo.siteUrl + appInfo.feedbackUrl, { id: id, feedback: feedback })
                    .then(function(data) {
                        cb(data)
                    }, function(err) {
                        console.error(err);
                    })
            }
        }

    }]);