<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace NBG\B2B\Model;

use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use NBG\B2B\Api\Data\NbgB2bOfferItemInterface;
use NBG\B2B\Api\Data\NbgB2bOfferItemInterfaceFactory;
use NBG\B2B\Api\Data\NbgB2bOfferItemSearchResultsInterfaceFactory;
use NBG\B2B\Api\NbgB2bOfferItemRepositoryInterface;
use NBG\B2B\Model\ResourceModel\NbgB2bOfferItem as ResourceNbgB2bOfferItem;
use NBG\B2B\Model\ResourceModel\NbgB2bOfferItem\CollectionFactory as NbgB2bOfferItemCollectionFactory;

class NbgB2bOfferItemRepository implements NbgB2bOfferItemRepositoryInterface
{

    /**
     * @var NbgB2bOfferItem
     */
    protected $searchResultsFactory;

    /**
     * @var NbgB2bOfferItemCollectionFactory
     */
    protected $nbgB2bOfferItemCollectionFactory;

    /**
     * @var NbgB2bOfferItemInterfaceFactory
     */
    protected $nbgB2bOfferItemFactory;

    /**
     * @var CollectionProcessorInterface
     */
    protected $collectionProcessor;

    /**
     * @var ResourceNbgB2bOfferItem
     */
    protected $resource;


    /**
     * @param ResourceNbgB2bOfferItem $resource
     * @param NbgB2bOfferItemInterfaceFactory $nbgB2bOfferItemFactory
     * @param NbgB2bOfferItemCollectionFactory $nbgB2bOfferItemCollectionFactory
     * @param NbgB2bOfferItemSearchResultsInterfaceFactory $searchResultsFactory
     * @param CollectionProcessorInterface $collectionProcessor
     */
    public function __construct(
        ResourceNbgB2bOfferItem $resource,
        NbgB2bOfferItemInterfaceFactory $nbgB2bOfferItemFactory,
        NbgB2bOfferItemCollectionFactory $nbgB2bOfferItemCollectionFactory,
        NbgB2bOfferItemSearchResultsInterfaceFactory $searchResultsFactory,
        CollectionProcessorInterface $collectionProcessor
    ) {
        $this->resource = $resource;
        $this->nbgB2bOfferItemFactory = $nbgB2bOfferItemFactory;
        $this->nbgB2bOfferItemCollectionFactory = $nbgB2bOfferItemCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->collectionProcessor = $collectionProcessor;
    }

    /**
     * @inheritDoc
     */
    public function save(
        NbgB2bOfferItemInterface $nbgB2bOfferItem
    ) {
        try {
            $this->resource->save($nbgB2bOfferItem);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the nbgB2bOfferItem: %1',
                $exception->getMessage()
            ));
        }
        return $nbgB2bOfferItem;
    }

    /**
     * @inheritDoc
     */
    public function get($nbgB2bOfferItemId)
    {
        $nbgB2bOfferItem = $this->nbgB2bOfferItemFactory->create();
        $this->resource->load($nbgB2bOfferItem, $nbgB2bOfferItemId);
        if (!$nbgB2bOfferItem->getId()) {
            throw new NoSuchEntityException(__('nbg_b2b_offer_item with id "%1" does not exist.', $nbgB2bOfferItemId));
        }
        return $nbgB2bOfferItem;
    }

    /**
     * @inheritDoc
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
        $collection = $this->nbgB2bOfferItemCollectionFactory->create();
        
        $this->collectionProcessor->process($criteria, $collection);
        
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($criteria);
        
        $items = [];
        foreach ($collection as $model) {
            $items[] = $model;
        }
        
        $searchResults->setItems($items);
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }

    /**
     * @inheritDoc
     */
    public function delete(
        NbgB2bOfferItemInterface $nbgB2bOfferItem
    ) {
        try {
            $nbgB2bOfferItemModel = $this->nbgB2bOfferItemFactory->create();
            $this->resource->load($nbgB2bOfferItemModel, $nbgB2bOfferItem->getNbgB2bOfferItemId());
            $this->resource->delete($nbgB2bOfferItemModel);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the nbg_b2b_offer_item: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * @inheritDoc
     */
    public function deleteById($nbgB2bOfferItemId)
    {
        return $this->delete($this->get($nbgB2bOfferItemId));
    }
}

