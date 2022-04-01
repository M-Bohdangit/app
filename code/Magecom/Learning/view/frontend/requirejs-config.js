var config = {
    deps: ["Magecom_Learning/js/all-pages"],
    shim: {
        "Magento_Catalog/js/view/compare-products": {
            deps: ["Magecom_Learning/js/before-compare-products"]
        }
    },
    map: {
        '*': {
            'coffee': 'Magecom_Learning/js/requirejs-example'
        }
    },
    config: {
        mixins: {
            "Magento_Checkout/js/checkout-data": {
                "Magecom_Learning/js/checkout-data-mixin": true
            },
            "Magento_Catalog/js/catalog-add-to-cart": {
                "Magecom_Learning/js/add-to-cart-mixin-test": true
            }
        }
    }
}
