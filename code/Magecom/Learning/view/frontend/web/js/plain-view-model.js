define(['ko', 'jquery'], function (ko, $) {
   'use strict';
   return function(config) {

       let currencyInfo = ko.observable();
       $.getJSON(config.base_url + 'rest/V1/directory/currency', currencyInfo);

       const title = ko.observable("This is a test title!!!");

       title.subscribe(function (newValue) {
           console.log('New value is ', newValue);
       });

       title.subscribe(function (oldValue) {
            console.log('Old value changed from ', oldValue);
       }, this, 'beforeChange');

       const viewModel = {
           title: title,
           config: config,
           label: ko.observable('Currency Info'),
           exchange_rates: ko.observableArray([
               {
                   currency_to: 'USD',
                   rate: 1.0
               },
               {
                   currency_to: 'EUR',
                   rate: 1.12
               },
               {
                   currency_to: 'CHF',
                   rate: 1.1
               }
           ]),
           values: ko.observableArray([
               123,
               124,
               125,
               126
           ])

       };
       viewModel.output = ko.computed(function() {
           if (currencyInfo()) {
               return this.label() + ':' + JSON.stringify(currencyInfo(), null, 2);
           } else {
               return '...loading';
           }
       }.bind(viewModel));
     return viewModel;
   };
});