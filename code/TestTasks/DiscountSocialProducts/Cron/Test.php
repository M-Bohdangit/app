<?php

namespace TestTasks\DiscountSocialProducts\Cron;

use Magento\Framework\App\Cache\Frontend\Pool;
use Magento\Framework\App\Cache\TypeListInterface;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\App\Config\Storage\WriterInterface;
use Psr\Log\LoggerInterface;
use TestTasks\DiscountSocialProducts\Helper\Data;
use Magento\Framework\App\ResourceConnection;

class Test
{

    protected LoggerInterface $_logger;
    protected WriterInterface $configWriter;
    protected ScopeConfigInterface $scopeConfig;
    protected TypeListInterface $_cacheTypeList;
    protected Pool $_cacheFrontendPool;
    protected ScopeConfigInterface $_scopeConfig;
    protected Data $helperData;
    protected ResourceConnection $_connect;

    /**
     * @param LoggerInterface      $logger            LoggerInterface
     * @param WriterInterface      $configWriter      WriterInterface
     * @param ScopeConfigInterface $scopeConfig       ScopeConfigInterface
     * @param Pool                 $cacheFrontendPool Pool
     * @param TypeListInterface    $cacheTypeList     TypeListInterface
     * @param Data                 $helperData        Data
     */
    public function __construct(
        LoggerInterface      $logger,
        WriterInterface      $configWriter,
        ScopeConfigInterface $scopeConfig,
        Pool                 $cacheFrontendPool,
        TypeListInterface    $cacheTypeList,
        Data                 $helperData,
        ResourceConnection   $connect
    ) {
        $this->_logger = $logger;
        $this->configWriter = $configWriter;
        $this->_scopeConfig = $scopeConfig;
        $this->_cacheFrontendPool = $cacheFrontendPool;
        $this->_cacheTypeList = $cacheTypeList;
        $this->helperData = $helperData;
        $this->_connect = $connect;
    }



    /**
     * Enuble rules and changes the values in the
     * rules in the database to the value from the admin panel
     *
     * @return void
     */
    public function enableRules()
    {
        $cron = ($this->helperData->getCronConfig('enable_cron')) ? 0 : 1;
        $this->helperData->setCronConfig($cron);
        $connection = $this->_connect->getConnection();
        $tableName = $connection->getTableName("catalogrule");
        $discount = ['is_active' => $cron,'discount_amount' => $this->helperData->getGeneralConfig('display_social')];
        $where = ['rule_id = ?' => '5'];
        $connection->update($tableName, $discount, $where);

        $path = 'socialattribute/cron/enable_cron';
        $value = '1';

        $this->configWriter->save(
            $path,
            $value,
            $scope = $this->_scopeConfig::SCOPE_TYPE_DEFAULT, $scopeId = 0
        );
        /* Apply all catalog rules */
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $rule = $objectManager->get('Magento\CatalogRule\Model\Rule\Job');
        $rule->applyAll();

        /* get all types of cache in system */
        $allTypes = array_keys($this->_cacheTypeList->getTypes());

        /* Clean cached data for specific cache type */
        foreach ($allTypes as $type) {
            $this->_cacheTypeList->cleanType($type);
        }

        /* flushed the Entire cache storage from system, Works like Flush Cache
        Storage button click on System -> Cache Management */
        foreach ($this->_cacheFrontendPool as $cacheFrontend) {
            $cacheFrontend->getBackend()->clean();
        }
    }

    /**
     * Disable rules
     *
     * @return void
     */
    public function disableRules()
    {
        $cron = ($this->helperData->getCronConfig('enable_cron')) ? 0 : 1;
        $this->helperData->setCronConfig($cron);
        $connection = $this->_connect->getConnection();
        $tableName = $connection->getTableName("catalogrule");
        $discount = ['is_active' => $cron];
        $where = ['rule_id = ?' => '5'];
        $connection->update($tableName, $discount, $where);

        $path = 'socialattribute/cron/enable_cron';
        $value = '0';

        $this->configWriter->save(
            $path,
            $value,
            $scope = $this->_scopeConfig::SCOPE_TYPE_DEFAULT, $scopeId = 0
        );
        /* Apply all catalog rules */
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $rule = $objectManager->get('Magento\CatalogRule\Model\Rule\Job');
        $rule->applyAll();


        /* get all types of cache in system */
        $allTypes = array_keys($this->_cacheTypeList->getTypes());

        /* Clean cached data for specific cache type */
        foreach ($allTypes as $type) {
            $this->_cacheTypeList->cleanType($type);
        }

        /* flushed the Entire cache storage from system, Works like Flush Cache
        Storage button click on System -> Cache Management */
        foreach ($this->_cacheFrontendPool as $cacheFrontend) {
            $cacheFrontend->getBackend()->clean();
        }
    }


}
