<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Mageap\Teston\Model;

use Mageap\Teston\Api\Data\PostInterface;
use Mageap\Teston\Api\Data\PostInterfaceFactory;
use Magento\Framework\Api\DataObjectHelper;

class Post extends \Magento\Framework\Model\AbstractModel
{

    protected $postDataFactory;

    protected $dataObjectHelper;

    protected $_eventPrefix = 'mageap_teston_post';

    /**
     * @param \Magento\Framework\Model\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param PostInterfaceFactory $postDataFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param \Mageap\Teston\Model\ResourceModel\Post $resource
     * @param \Mageap\Teston\Model\ResourceModel\Post\Collection $resourceCollection
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        PostInterfaceFactory $postDataFactory,
        DataObjectHelper $dataObjectHelper,
        \Mageap\Teston\Model\ResourceModel\Post $resource,
        \Mageap\Teston\Model\ResourceModel\Post\Collection $resourceCollection,
        array $data = []
    ) {
        $this->postDataFactory = $postDataFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
    }

    /**
     * Retrieve post model with post data
     * @return PostInterface
     */
    public function getDataModel()
    {
        $postData = $this->getData();
        
        $postDataObject = $this->postDataFactory->create();
        $this->dataObjectHelper->populateWithArray(
            $postDataObject,
            $postData,
            PostInterface::class
        );
        
        return $postDataObject;
    }
}

