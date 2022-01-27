<?php

namespace  Learning\AirFreight\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Store\Model\ScopeInterface;

class Data extends AbstractHelper
{
    const XML_PATH_AIRFREIGHT = 'airfreight/';

    public function getConfigValue($field, $storeId = null)
    {
        return $this->scopeConfig->getValue($field, ScopeInterface::SCOPE_STORE, $storeId);
    }

    public function getGeneralConfig($code, $storeId = null)
    {
        return $this->getConfigValue(self::XML_PATH_AIRFREIGHT . 'general/' . $code, $storeId);
    }
    public function getBalloonConfig($code, $storeId = null)
    {
        return $this->getConfigValue(self::XML_PATH_AIRFREIGHT . 'balloon/' . $code, $storeId);
    }
    public function getCharterConfig($code, $storeId = null)
    {
        return $this->getConfigValue(self::XML_PATH_AIRFREIGHT . 'charter/' . $code, $storeId);
    }
    public function getSpeedConfig($code, $storeId = null)
    {
        return $this->getConfigValue(self::XML_PATH_AIRFREIGHT . 'speed/' . $code, $storeId);
    }
    public function getSpaceshipConfig($code, $storeId = null)
    {
        return $this->getConfigValue(self::XML_PATH_AIRFREIGHT . 'spaceship/' . $code, $storeId);
    }
}
