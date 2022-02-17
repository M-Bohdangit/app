<?php

namespace TestTasks\DiscountSocialProducts\ViewModel;

use Magento\Framework\Registry;
use Magento\Framework\View\Element\Block\ArgumentInterface;
use TestTasks\DiscountSocialProducts\Helper\Data;

class CustomViewModel implements ArgumentInterface
{
    /**
     * @var Registry;
     */
    protected $_registry;
    /**
     * @var Data;
     */
    protected $helperData;

    /**
     * /**
     *
     * @param Data     $helperData Data
     * @param Registry $registry   Registry
     */
    public function __construct(
        Data     $helperData,
        Registry $registry
    ) {
        $this->helperData = $helperData;
        $this->_registry = $registry;
    }

    public function getCurrentProduct()
    {
        if ($this->helperData->getGeneralConfig('enable')) {
            return $this->_registry->registry('current_product');
        }
    }

    /**
     * @return mixed|void
     */
    public function getPercentDiscount()
    {
        if ($this->helperData->getGeneralConfig('enable')) {
            return $this->helperData->getGeneralConfig('display_social');
        }
    }

    /**
     * Get regular price
     *
     * @return mixed
     */
    public function getRegularPrice()
    {
        return $this->getCurrentProduct()->getPriceInfo()->getPrice('regular_price')->getValue();
    }

    /**
     * Show message
     *
     * @return string
     */
    public function showMessage(): string
    {
        if ($this->helperData->getCronConfig('enable_cron') && $this->getCurrentProduct()->getData('discount_social_attribute')) {
            return 'There is a grace period, the price $' . $this->getRegularPrice() . ' is reduced by ' . $this->getPercentDiscount() . ' %';
        }
        return '';
    }
}
