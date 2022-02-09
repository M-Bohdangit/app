<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

/**
 * Backend Model for product alerts
 *
 * @author Magento Core Team <core@magentocommerce.com>
 */

namespace TestTasks\DiscountSocialProducts\Cron\Model\Config\Backend\Product;

/**
 * Cron job Alert configuration
 */
class CronDisable extends \Magento\Framework\App\Config\Value
{
    /**
     * Cron string path
     */
    const CRON_STRING_PATH_DISABLE = 'crontab/default/jobs/discount_disable/schedule/cron_expr';
    /**
     * Cron model path
     */
    const CRON_MODEL_PATH_DISABLE = 'crontab/default/jobs/discount_disable/run/model';

    /**
     * @var \Magento\Framework\App\Config\ValueFactory
     */
    protected $_configValueFactory;

    /**
     * @var string
     */
    protected $_runModelPath = '';

    /**
     * @param \Magento\Framework\Model\Context                        $context
     * @param \Magento\Framework\Registry                             $registry
     * @param \Magento\Framework\App\Config\ScopeConfigInterface      $config
     * @param \Magento\Framework\App\Cache\TypeListInterface          $cacheTypeList
     * @param \Magento\Framework\App\Config\ValueFactory              $configValueFactory
     * @param \Magento\Framework\Model\ResourceModel\AbstractResource $resource
     * @param \Magento\Framework\Data\Collection\AbstractDb           $resourceCollection
     * @param string                                                  $runModelPath
     * @param array                                                   $data
     */
    public function __construct(
        \Magento\Framework\Model\Context                        $context,
        \Magento\Framework\Registry                             $registry,
        \Magento\Framework\App\Config\ScopeConfigInterface      $config,
        \Magento\Framework\App\Cache\TypeListInterface          $cacheTypeList,
        \Magento\Framework\App\Config\ValueFactory              $configValueFactory,
        \Magento\Framework\Model\ResourceModel\AbstractResource $resource = null,
        \Magento\Framework\Data\Collection\AbstractDb           $resourceCollection = null,
                                                                $runModelPath = '',
        array                                                   $data = []
    ) {
        $this->_runModelPath = $runModelPath;
        $this->_configValueFactory = $configValueFactory;
        parent::__construct($context, $registry, $config, $cacheTypeList, $resource, $resourceCollection, $data);
    }

    /**
     * @inheritdoc
     *
     * @return $this
     * @throws \Exception
     */
    public function afterSave()
    {
        $timeEnd = $this->getData('groups/general/fields/time_end/value');

        $frequency = $this->getData('groups/general/fields/discount_day/value');
        $category = $this->getData('groups/general/fields/discount_category/value');
        if ($category !== null) {
            $cronExprArray = [
                (int)$timeEnd[1], //Minute
                (int)$timeEnd[0], //Hour
                $frequency, //Day of the Month
                '*', //Month of the Year
                '*', //Day of the Week
            ];

            $cronExprString = join(' ', $cronExprArray);

            try {
                $this->_configValueFactory->create()->load(
                    self::CRON_STRING_PATH_DISABLE,
                    'path'
                )->setValue(
                    $cronExprString
                )->setPath(
                    self::CRON_STRING_PATH_DISABLE
                )->save();
                $this->_configValueFactory->create()->load(
                    self::CRON_MODEL_PATH_DISABLE,
                    'path'
                )->setValue(
                    $this->_runModelPath
                )->setPath(
                    self::CRON_MODEL_PATH_DISABLE
                )->save();
            } catch (\Exception $e) {
                throw new \Exception(__('We can\'t save the cron expression.'));
            }

            return parent::afterSave();
        } else {
            return null;
        }
    }

}

