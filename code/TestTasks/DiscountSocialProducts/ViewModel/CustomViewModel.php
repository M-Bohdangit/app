<?php

namespace TestTasks\DiscountSocialProducts\ViewModel;

use Magento\Catalog\Model\ProductRepository;
use Magento\Framework\Registry;
use TestTasks\DiscountSocialProducts\Helper\Data;

class CustomViewModel implements \Magento\Framework\View\Element\Block\ArgumentInterface
{
    protected Data $helperData;
    protected ProductRepository $productRepository;



    public function __construct(
        Data              $helperData,
        ProductRepository $productRepository,
        Registry          $registry
    ) {
        $this->helperData = $helperData;
        $this->_productRepository = $productRepository;
        $this->_registry = $registry;
    }

    public function getSocial($_product)
    {
        if ($this->helperData->getGeneralConfig('enable')) {
            $currentProduct = $this->_productRepository->getById($_product->getData('entity_id'));
            if ($currentProduct->getData('discount_social_attribute')) {
                return '<b>SOCIAL PRODUCT</b>';
            }
        }
        return '';
    }

    public function getCurrentProduct()
    {
        if ($this->helperData->getGeneralConfig('enable')) {
            $currentProduct = $this->_registry->registry('current_product');
            return $currentProduct;
        }
    }


    public function getSocialFinalPrice()
    {

        if ($this->helperData->getGeneralConfig('enable') && $this->getCurrentProduct()->getData('discount_social_attribute')) {
            $SocialFinalPrice = $this->getCurrentProduct()->getFinalPrice() - ($this->getCurrentProduct()->getFinalPrice() / 100) * $this->helperData->getGeneralConfig('display_social');
            return 'Discount : ' . $this->helperData->getGeneralConfig('display_social') . '%<br /> <br /> <b>Final price : $' . $SocialFinalPrice . '</b>';
        }
    }
}
