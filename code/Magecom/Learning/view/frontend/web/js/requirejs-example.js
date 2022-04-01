
define(['jquery'], function($){
    'use strict';

    return function(config, element) {
        $.getJSON(config.base_url + "rest/V1/directory/currency", function(result) {
           element.innerText = JSON.stringify(result, null, 2);
        });
        console.log("element :", element);
        console.log("I am loaded by require JS and module!", config);
    }
});
