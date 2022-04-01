<?php

/**
 * Magecom
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to info@magecom.net so we can send you a copy immediately.
 *
 * @category  Magecom
 * @package   Magecom_Module
 * @copyright Copyright (c) ${YEAR} Magecom, Inc. (http://www.magecom.net)
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

namespace Magecom\Learning\Model;

use Magento\Framework\Model\AbstractModel;
use Magento\Framework\Model\Context;
use Magento\Framework\Registry;
use Magento\Framework\Model\ResourceModel\AbstractResource;
use Magento\Framework\Data\Collection\AbstractDb;

/**
 * Magecom_Learning_Model_Items class
 *
 * @category Magecom
 * @package  Magecom_Learning
 * @author   Magecom
 */
class Items extends AbstractModel
{
    /**
     * Items constructor.
     *
     * @param Context          $context            Context
     * @param Registry         $registry           PageFactory
     * @param AbstractResource $resource           PageFactory
     * @param AbstractDb       $resourceCollection PageFactory
     * @param array            $data               PageFactory
     *
     * @return null
     */
    public function __construct(
        Context $context,
        Registry $registry,
        AbstractResource $resource = null,
        AbstractDb $resourceCollection = null,
        array $data = []
    ) {
        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
    }

    /**
     * Items constructor.
     *
     * @return null
     */
    public function _construct()
    {
        $this->_init(ResourceModel\Items::class);
    }
}
