define([
    'uiComponent',
    'jquery',
    'ko',
    'mage/translate'
], function (Component, $, ko, $t) {
    'use strict';
    return Component.extend({
        qnt: ko.observable(''),
        isLoading: ko.observable(false),
        url: '',
        initialize: function () {
            this._super();
            return this;
        },
        getQnt: function () {
            this.isLoading(true);
            var self = this;
            console.log(self.product_id);
            $.ajax({
                url: self.url,
                type: "post",
                data: 'product_id=' + self.product_id,
                dataType: "json"})
                .done(function (data) {
                    if (JSON.parse(data)) {
                        self.qnt($t('Quantity available product: ') + JSON.parse(data));
                    }
                }).always(function () {
                self.isLoading(false);
            });
        }
    });
});
