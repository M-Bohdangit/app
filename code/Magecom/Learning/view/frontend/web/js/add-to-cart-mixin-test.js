define(['jquery', 'jquery/ui'], function($) {
    'use strict';

    return function(catalogAddToCart) {

        $.widget("mage.catalogAddToCart", catalogAddToCart, {
            submitForm: function(form) {
                console.log('add to cart interception');
                console.log(form);
                this._super(form);
            }
        });
        return $.mage.catalogAddToCart;
    }
});