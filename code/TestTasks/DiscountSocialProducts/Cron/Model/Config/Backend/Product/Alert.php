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

use Exception;
use Magento\Framework\App\Cache\TypeListInterface;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\App\Config\Value;
use Magento\Framework\App\Config\ValueFactory;
use Magento\Framework\Data\Collection\AbstractDb;
use Magento\Framework\Model\Context;
use Magento\Framework\Model\ResourceModel\AbstractResource;
use Magento\Framework\Registry;

/**
 * Cron job Alert configuration
 */
class Alert extends Value
{
    /**
     * Cron string path
     */
    const CRON_STRING_PATH = 'crontab/discount_product_group_custom/jobs/discount_enab/schedule/cron_expr';

    const CRON_STRING_PATH_DISABLE = 'crontab/discount_product_group_custom/jobs/discount_disable/schedule/cron_expr';

    /**
     * Cron model path
     */
    const CRON_MODEL_PATH = 'crontab/discount_product_group_custom/jobs/discount_enab/run/model';

    const CRON_MODEL_PATH_DISABLE = 'crontab/discount_product_group_custom/jobs/discount_disable/run/model';

    /**
     * @var ValueFactory
     */
    protected $_configValueFactory;

    /**
     * @var string
     */
    protected $_runModelPath = '';

    /**
     * @param Context              $context
     * @param Registry             $registry
     * @param ScopeConfigInterface $config
     * @param TypeListInterface    $cacheTypeList
     * @param ValueFactory         $configValueFactory
     * @param AbstractResource     $resource
     * @param AbstractDb           $resourceCollection
     * @param string               $runModelPath
     * @param array                $data
     */
    public function __construct(
        Context              $context,
        Registry             $registry,
        ScopeConfigInterface $config,
        TypeListInterface    $cacheTypeList,
        ValueFactory         $configValueFactory,
        AbstractResource     $resource = null,
        AbstractDb           $resourceCollection = null,
        $runModelPath = '',
        array                $data = []
    ) {
        $this->_runModelPath = $runModelPath;
        $this->_configValueFactory = $configValueFactory;
        parent::__construct(
            $context, $registry, $config, $cacheTypeList,
            $resource, $resourceCollection, $data
        );
    }

    /**
     * @inheritdoc
     *
     * @return $this
     * @throws Exception
     */
    public function afterSave()
    {

        $timeStart = $this->getData('groups/general/fields/time_start/value');
        if ($timeStart == null) {
            $timeStart = ["*", "*", "*"];
        }

        $timeEnd = $this->getData('groups/general/fields/time_end/value');

        $frequency = $this->getData('groups/general/fields/discount_day/value');
        if ($frequency == null) {
            $frequency = "*";
        }
        if ($timeEnd == null && $frequency > 0) {
            $timeEnd = ["23", "59", "00"];
        }

        //        $cronExprArray = [
        //            $timeStart == null ? '*' : $timeStart[1], //Minute
        //            $timeStart == null ? '*' : $timeStart[0], //Hour
        //            $frequency == null ? '*' : $frequency, //Day of the Month
        //            '*', //Month of the Year
        //            '*', //Day of the Week
        //        ];
        $cronExprArray = [
            $timeStart[1], //Minute
            $timeStart[0], //Hour
            $frequency, //Day of the Month
            '*', //Month of the Year
            '*', //Day of the Week
        ];

        $cronExprArray1 = [
            $timeEnd[1], //Minute
            $timeEnd[0], //Hour
            $frequency, //Day of the Month
            '*', //Month of the Year
            '*', //Day of the Week
        ];

        //        $cronExprArray1 = [
        //            $timeEnd == null ? '*' : $timeEnd[1], //Minute
        //            $timeEnd == null ? '*' : $timeEnd[0], //Hour
        //            $frequency == null ? '*' : $frequency, //Day of the Month
        //            '*', //Month of the Year
        //            '*', //Day of the Week
        //        ];

        $cronExprString = implode(' ', $cronExprArray);
        $cronExprString1 = implode(' ', $cronExprArray1);

        try {
            $this->_configValueFactory->create()->load(
                self::CRON_STRING_PATH,
                'path'
            )->setValue(
                $cronExprString
            )->setPath(
                self::CRON_STRING_PATH
            )->save();
            $this->_configValueFactory->create()->load(
                self::CRON_MODEL_PATH,
                'path'
            )->setValue(
                $this->_runModelPath
            )->setPath(
                self::CRON_MODEL_PATH
            )->save();
        } catch (Exception $e) {
            throw new Exception(__('We can\'t save the cron expression.'));
        }

        try {
            $this->_configValueFactory->create()->load(
                self::CRON_STRING_PATH_DISABLE,
                'path'
            )->setValue(
                $cronExprString1
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
        } catch (Exception $e) {
            throw new Exception(__('We can\'t save the cron expression.'));
        }

        return parent::afterSave();
    }

}

