<?php

namespace AdminACL\Currency\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Store\Model\ScopeInterface;

class Data extends AbstractHelper
{
    const XML_PATH_CURRENCY = 'currency/';

    public function getConfigValue($field, $storeId = null)
    {
        return $this->scopeConfig->getValue($field, ScopeInterface::SCOPE_STORE, $storeId);
    }

    public function getCurrencyConfig($code, $storeId = null)
    {
        return $this->getConfigValue(self::XML_PATH_CURRENCY . 'general/' . $code, $storeId);
    }
}
