<?php

namespace AdminACL\Ends\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Store\Model\ScopeInterface;

class CustomData extends AbstractHelper
{
    const XML_PATH_ENDS = 'ends/';

    public function getConfigValue($field, $storeId = null)
    {
        return $this->scopeConfig->getValue($field, ScopeInterface::SCOPE_STORE, $storeId);
    }

    public function getGeneralConfig($code, $storeId = null)
    {
        return $this->getConfigValue(self::XML_PATH_ENDS . 'general/' . $code, $storeId);
    }
}
