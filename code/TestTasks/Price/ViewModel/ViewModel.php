<?php

use Magento\Framework\Registry;
use TestTasks\Price\Helper\Data;

namespace  TestTasks\Price\ViewModel;

class ViewModel implements \Magento\Framework\View\Element\Block\ArgumentInterface
{
    protected $_registry;
    protected $helperData;

    /**
     * Construct
     *
     * @param Data $helperData
     * @param Registry $registry
     */
    public function __construct(
        Data $helperData,
        Registry $registry
    ) {
        $this->helperData = $helperData;
        $this->_registry = $registry;
    }

    /**
     * Сheck if the module is enabled
     *
     * @return bull
     */
    public function getModuleEnable()
    {
        return $this->helperData->getGeneralConfig('enable');
    }


    /**
     * Get Current product
     * @return Magento\Catalog\Model\Product\Interceptor
     */
    public function getCurrentProduct()
    {

        return $this->_registry->registry('current_product');
    }

    /**
     *
     * @return string
     */
    public function getBasePrice()
    {

        if (!$this->getCurrentProduct()) {
            return null;
        }

        if ($selectValue = $this->helperData->getGeneralConfig('base_price')) {
            if ($this->getCurrentProduct()->getTypeId() == 'configurable') {
                $basePrice = $this->getCurrentProduct()->getPriceInfo()->getPrice('regular_price')->getMinRegularAmount()->getValue();
                return __('Base price: $') . $basePrice;
            }
            if ($this->getCurrentProduct()->getTypeId() == 'simple') {
                $basePrice = $this->getCurrentProduct()->getPriceInfo()->getPrice('regular_price')->getValue();
                return __('Base price: $') . $basePrice;
            }
        }

        return null;
    }

    /**
     *
     * @return string
     */
    public function getFinalPrice()
    {

        if (!$this->getCurrentProduct()) {
            return null;
        }

        if ($selectValue = $this->helperData->getGeneralConfig('final_price')) {
            if ($this->getCurrentProduct()->getTypeId() == 'configurable') {
                $finalPrice = $this->getCurrentProduct()->getPriceInfo()->getPrice('final_price')->getMinimalPrice()->getValue();
                return __('Final price: $') . $finalPrice;
            }
            if ($this->getCurrentProduct()->getTypeId() == 'simple') {
                $finalPrice = $this->getCurrentProduct()->getPriceInfo()->getPrice('final_price')->getValue();
                return __('Final price: $') . $finalPrice;
            }
        }
        return null;
    }

    /**
     *
     * @return string
     */
    public function getSpecialPrice()
    {

        if ($this->getCurrentProduct()) {
            if ($selectValue = $this->helperData->getGeneralConfig('special_price')) {
                $specialPrice = $this->getCurrentProduct()->getPriceInfo()->getPrice('special_price')->getValue();
                return __('Special price: $') . $specialPrice;
            }
        }
        return null;
    }

    /**
     *
     * @return string
     */
    public function getTierPrice()
    {

        if ($this->getCurrentProduct()) {
            if ($selectValue = $this->helperData->getGeneralConfig('tier_price')) {
                $tierPrice = $this->getCurrentProduct()->getPriceInfo()->getPrice('tier_price')->getValue();
                return __('Tier price: $') . $tierPrice;
            }
        }
        return null;
    }

    /**
     *
     * @return string
     */
    public function getRulePrice()
    {

        if ($this->getCurrentProduct()) {
            if ($selectValue = $this->helperData->getGeneralConfig('catalog_rule_price')) {
                $rulePrice = $this->getCurrentProduct()->getPriceInfo()->getPrice('catalog_rule_price')->getValue();
                return __('Catalog rule price: $') . $rulePrice;
            }
        }
        return null;
    }
}
