define([
    'uiComponent',
    'jquery',
    'ko'
], function (Component, $, ko) {
    'use strict';
    return Component.extend({
        reviewerName: ko.observable('gu'),
        reviewerMessage: ko.observable('ju'),
        isLoading: ko.observable(false),
        url: '',
        initialize: function () {
            this._super();
            this.nextReview();
            return this;
        },
        nextReview: function () {
            this.isLoading(true);
            var self = this;
            $.ajax({
                url: self.url,
                type: "post",
                dataType: "json"})
                .done(function (data) {
                    if (JSON.parse(data).name && JSON.parse(data).message) {
                        self.reviewerName(JSON.parse(data).name);
                        self.reviewerMessage(JSON.parse(data).message);
                    }
                }).always(function () {
                self.isLoading(false);
            });
        }
    });
});
