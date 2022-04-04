<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace NBG\B2B\Model;

use Magento\Framework\Api\DataObjectHelper;
use Magento\Framework\Api\ExtensibleDataObjectConverter;
use Magento\Framework\Api\ExtensionAttribute\JoinProcessorInterface;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Reflection\DataObjectProcessor;
use Magento\Store\Model\StoreManagerInterface;
use NBG\B2B\Api\B2BRepositoryInterface;
use NBG\B2B\Api\Data\B2BInterfaceFactory;
use NBG\B2B\Api\Data\B2BSearchResultsInterfaceFactory;
use NBG\B2B\Model\ResourceModel\B2B as ResourceB2B;
use NBG\B2B\Model\ResourceModel\B2B\CollectionFactory as B2BCollectionFactory;

class B2BRepository implements B2BRepositoryInterface
{

    protected $resource;

    protected $b2BFactory;

    protected $b2BCollectionFactory;

    protected $searchResultsFactory;

    protected $dataObjectHelper;

    protected $dataObjectProcessor;

    protected $dataB2BFactory;

    protected $extensionAttributesJoinProcessor;

    private $storeManager;

    private $collectionProcessor;

    protected $extensibleDataObjectConverter;

    /**
     * @param ResourceB2B $resource
     * @param B2BFactory $b2BFactory
     * @param B2BInterfaceFactory $dataB2BFactory
     * @param B2BCollectionFactory $b2BCollectionFactory
     * @param B2BSearchResultsInterfaceFactory $searchResultsFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param DataObjectProcessor $dataObjectProcessor
     * @param StoreManagerInterface $storeManager
     * @param CollectionProcessorInterface $collectionProcessor
     * @param JoinProcessorInterface $extensionAttributesJoinProcessor
     * @param ExtensibleDataObjectConverter $extensibleDataObjectConverter
     */
    public function __construct(
        ResourceB2B $resource,
        B2BFactory $b2BFactory,
        B2BInterfaceFactory $dataB2BFactory,
        B2BCollectionFactory $b2BCollectionFactory,
        B2BSearchResultsInterfaceFactory $searchResultsFactory,
        DataObjectHelper $dataObjectHelper,
        DataObjectProcessor $dataObjectProcessor,
        StoreManagerInterface $storeManager,
        CollectionProcessorInterface $collectionProcessor,
        JoinProcessorInterface $extensionAttributesJoinProcessor,
        ExtensibleDataObjectConverter $extensibleDataObjectConverter
    ) {
        $this->resource = $resource;
        $this->b2BFactory = $b2BFactory;
        $this->b2BCollectionFactory = $b2BCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        $this->dataB2BFactory = $dataB2BFactory;
        $this->dataObjectProcessor = $dataObjectProcessor;
        $this->storeManager = $storeManager;
        $this->collectionProcessor = $collectionProcessor;
        $this->extensionAttributesJoinProcessor = $extensionAttributesJoinProcessor;
        $this->extensibleDataObjectConverter = $extensibleDataObjectConverter;
    }

    /**
     * {@inheritdoc}
     */
    public function save(\NBG\B2B\Api\Data\B2BInterface $b2B)
    {
        /* if (empty($b2B->getStoreId())) {
            $storeId = $this->storeManager->getStore()->getId();
            $b2B->setStoreId($storeId);
        } */
        
        $b2BData = $this->extensibleDataObjectConverter->toNestedArray(
            $b2B,
            [],
            \NBG\B2B\Api\Data\B2BInterface::class
        );
        
        $b2BModel = $this->b2BFactory->create()->setData($b2BData);
        
        try {
            $this->resource->save($b2BModel);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the b2B: %1',
                $exception->getMessage()
            ));
        }
        return $b2BModel->getDataModel();
    }

    /**
     * {@inheritdoc}
     */
    public function get($b2BId)
    {
        $b2B = $this->b2BFactory->create();
        $this->resource->load($b2B, $b2BId);
        if (!$b2B->getId()) {
            throw new NoSuchEntityException(__('B2B with id "%1" does not exist.', $b2BId));
        }
        return $b2B->getDataModel();
    }

    /**
     * {@inheritdoc}
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
        $collection = $this->b2BCollectionFactory->create();
        
        $this->extensionAttributesJoinProcessor->process(
            $collection,
            \NBG\B2B\Api\Data\B2BInterface::class
        );
        
        $this->collectionProcessor->process($criteria, $collection);
        
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($criteria);
        
        $items = [];
        foreach ($collection as $model) {
            $items[] = $model->getDataModel();
        }
        
        $searchResults->setItems($items);
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }

    /**
     * {@inheritdoc}
     */
    public function delete(\NBG\B2B\Api\Data\B2BInterface $b2B)
    {
        try {
            $b2BModel = $this->b2BFactory->create();
            $this->resource->load($b2BModel, $b2B->getEntityId());
            $this->resource->delete($b2BModel);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the B2B: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function deleteById($b2BId)
    {
        return $this->delete($this->get($b2BId));
    }
}

