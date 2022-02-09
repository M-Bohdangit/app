<?php

namespace TestTasks\DiscountSocialProducts\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Store\Model\ScopeInterface;

class Data extends AbstractHelper
{

    const XML_PATH_SOCIALATTRIBUTE = 'socialattribute/';

    /**
     * Get Config Value
     *
     * @param $field field
     * @param $storeId
     *
     * @return mixed
     */
    public function getConfigValue($field, $storeId = null)
    {
        return $this->scopeConfig->getValue($field, ScopeInterface::SCOPE_STORE, $storeId);
    }

    /**
     * Get General Config
     *
     * @param $code
     * @param $storeId
     *
     * @return mixed
     */
    public function getGeneralConfig($code, $storeId = null)
    {
        return $this->getConfigValue(self::XML_PATH_SOCIALATTRIBUTE . 'general/' . $code, $storeId);
    }

    /**
     * Get Discount Day Enable
     *
     * @param $code
     * @param $storeId
     *
     * @return mixed
     */
    public function getDiscountDayEnable($code, $storeId = null)
    {
        return $this->getConfigValue(self::XML_PATH_SOCIALATTRIBUTE . 'check_1/' . $code, $storeId);
    }

    /**
     * Get Discount Day
     *
     * @param $code
     * @param $storeId
     *
     * @return mixed
     */
    public function getDiscountDay($code, $storeId = null)
    {
        return $this->getConfigValue(self::XML_PATH_SOCIALATTRIBUTE . 'discount_day/' . $code, $storeId);
    }

    /**
     * Get Discount Time Enable
     *
     * @param $code
     * @param $storeId
     *
     * @return mixed
     */
    public function getDiscountTimeEnable($code, $storeId = null)
    {
        return $this->getConfigValue(self::XML_PATH_SOCIALATTRIBUTE . 'check_2/' . $code, $storeId);
    }

    /**
     * Get Time Start
     *
     * @param $code
     * @param $storeId
     *
     * @return mixed
     */
    public function getTimeStart($code, $storeId = null)
    {
        return $this->getConfigValue(self::XML_PATH_SOCIALATTRIBUTE . 'time_start/' . $code, $storeId);
    }

    /**
     * Get Time End
     *
     * @param $code
     * @param $storeId
     *
     * @return mixed
     */
    public function getTimeEnd($code, $storeId = null)
    {
        return $this->getConfigValue(self::XML_PATH_SOCIALATTRIBUTE . 'time_end/' . $code, $storeId);
    }

    /**
     * Get Cron Enable
     *
     * @param $code
     * @param $storeId
     *
     * @return mixed mixed
     */
    public function getCronEnable($code, $storeId = null)
    {
        return $this->getConfigValue(self::XML_PATH_SOCIALATTRIBUTE . 'enable_cron/' . $code, $storeId);
    }

    /**
     * Get Discount Category
     *
     * @param $code
     * @param $storeId
     *
     * @return mixed
     */
    public function getDiscountCategory($code, $storeId = null)
    {
        return $this->getConfigValue(self::XML_PATH_SOCIALATTRIBUTE . 'discount_category/' . $code, $storeId);
    }

}
