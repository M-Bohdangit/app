<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace NBG\B2B\Model;

use Magento\Framework\Api\DataObjectHelper;
use NBG\B2B\Api\Data\B2BInterface;
use NBG\B2B\Api\Data\B2BInterfaceFactory;

class B2B extends \Magento\Framework\Model\AbstractModel
{

    const ENTITY = 'nbg_b2b_offer_customer';
    protected $b2bDataFactory;

    protected $dataObjectHelper;

    protected $_eventPrefix = 'nbg_b2b_offer_customer';

    /**
     * @param \Magento\Framework\Model\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param B2BInterfaceFactory $b2bDataFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param \NBG\B2B\Model\ResourceModel\B2B $resource
     * @param \NBG\B2B\Model\ResourceModel\B2B\Collection $resourceCollection
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        B2BInterfaceFactory $b2bDataFactory,
        DataObjectHelper $dataObjectHelper,
        \NBG\B2B\Model\ResourceModel\B2B $resource,
        \NBG\B2B\Model\ResourceModel\B2B\Collection $resourceCollection,
        array $data = []
    ) {
        $this->b2bDataFactory = $b2bDataFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
    }

    /**
     * Retrieve b2b model with b2b data
     * @return B2BInterface
     */
    public function getDataModel()
    {
        $b2bData = $this->getData();

        $b2bDataObject = $this->b2bDataFactory->create();
        $this->dataObjectHelper->populateWithArray(
            $b2bDataObject,
            $b2bData,
            B2BInterface::class
        );

        return $b2bDataObject;
    }
}

