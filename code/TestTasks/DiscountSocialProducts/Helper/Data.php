<?php

namespace TestTasks\DiscountSocialProducts\Helper;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Store\Model\ScopeInterface;
use Magento\Framework\App\Config\Storage\WriterInterface;
use Magento\Framework\App\Helper\Context;

class Data extends AbstractHelper
{

    const XML_PATH_SOCIALATTRIBUTE = 'socialattribute/';
    /**
     * @var WriterInterface;
     */
    protected $configWriter;

    /**
     * Constructor
     *
     * @param Context         $context      Context
     * @param WriterInterface $configWriter WriterInterface
     */
    public function __construct(
        Context         $context,
        WriterInterface $configWriter
    ) {
        parent::__construct($context);
        $this->configWriter = $configWriter;
    }

    /**
     * @param $field   $field
     * @param $storeId $storeId
     *
     * @return mixed
     */
    public function getConfigValue($field, $storeId = null)
    {
        return $this->scopeConfig->getValue($field, ScopeInterface::SCOPE_STORE, $storeId);
    }

    /**
     * @param $code    $code
     * @param $storeId $storeId
     *
     * @return mixed
     */
    public function getGeneralConfig($code, $storeId = null)
    {
        return $this->getConfigValue(self::XML_PATH_SOCIALATTRIBUTE . 'general/' . $code, $storeId);
    }

    /**
     * @param $code    $code
     * @param $storeId $storeId
     *
     * @return mixed
     */
    public function getCronConfig($code, $storeId = null)
    {

        return $this->getConfigValue(self::XML_PATH_SOCIALATTRIBUTE . 'cron/' . $code, $storeId);
    }

    /**
     * @param $value $value
     *
     * @return void
     */
    public function setCronConfig($value)
    {
        return $this->configWriter->save(self::XML_PATH_SOCIALATTRIBUTE . 'cron/enable_cron', $value, $scope = ScopeConfigInterface::SCOPE_TYPE_DEFAULT, $scopeId = 0);
    }

}
