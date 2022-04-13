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
use NBG\B2B\Api\Data\NbgB2bOfferInterface;
use NBG\B2B\Api\Data\NbgB2bOfferInterfaceFactory;
use NBG\B2B\Api\Data\NbgB2bOfferSearchResultsInterfaceFactory;
use NBG\B2B\Api\NbgB2bOfferRepositoryInterface;
use NBG\B2B\Model\ResourceModel\NbgB2bOffer as ResourceNbgB2bOffer;
use NBG\B2B\Model\ResourceModel\NbgB2bOffer\CollectionFactory as NbgB2bOfferCollectionFactory;

class NbgB2bOfferRepository implements NbgB2bOfferRepositoryInterface
{

    /**
     * @var NbgB2bOfferInterfaceFactory
     */
    protected $nbgB2bOfferFactory;

    /**
     * @var NbgB2bOffer
     */
    protected $searchResultsFactory;

    /**
     * @var NbgB2bOfferCollectionFactory
     */
    protected $nbgB2bOfferCollectionFactory;

    /**
     * @var ResourceNbgB2bOffer
     */
    protected $resource;

    /**
     * @var CollectionProcessorInterface
     */
    protected $collectionProcessor;


    /**
     * @param ResourceNbgB2bOffer $resource
     * @param NbgB2bOfferInterfaceFactory $nbgB2bOfferFactory
     * @param NbgB2bOfferCollectionFactory $nbgB2bOfferCollectionFactory
     * @param NbgB2bOfferSearchResultsInterfaceFactory $searchResultsFactory
     * @param CollectionProcessorInterface $collectionProcessor
     */
    public function __construct(
        ResourceNbgB2bOffer $resource,
        NbgB2bOfferInterfaceFactory $nbgB2bOfferFactory,
        NbgB2bOfferCollectionFactory $nbgB2bOfferCollectionFactory,
        NbgB2bOfferSearchResultsInterfaceFactory $searchResultsFactory,
        CollectionProcessorInterface $collectionProcessor
    ) {
        $this->resource = $resource;
        $this->nbgB2bOfferFactory = $nbgB2bOfferFactory;
        $this->nbgB2bOfferCollectionFactory = $nbgB2bOfferCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->collectionProcessor = $collectionProcessor;
    }

    /**
     * @inheritDoc
     */
    public function save(NbgB2bOfferInterface $nbgB2bOffer)
    {
        try {
            $this->resource->save($nbgB2bOffer);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the nbgB2bOffer: %1',
                $exception->getMessage()
            ));
        }
        return $nbgB2bOffer;
    }

    /**
     * @inheritDoc
     */
    public function get($nbgB2bOfferId)
    {
        $nbgB2bOffer = $this->nbgB2bOfferFactory->create();
        $this->resource->load($nbgB2bOffer, $nbgB2bOfferId);
        if (!$nbgB2bOffer->getId()) {
            throw new NoSuchEntityException(__('nbg_b2b_offer with id "%1" does not exist.', $nbgB2bOfferId));
        }
        return $nbgB2bOffer;
    }

    /**
     * @inheritDoc
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
        $collection = $this->nbgB2bOfferCollectionFactory->create();
        
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
    public function delete(NbgB2bOfferInterface $nbgB2bOffer)
    {
        try {
            $nbgB2bOfferModel = $this->nbgB2bOfferFactory->create();
            $this->resource->load($nbgB2bOfferModel, $nbgB2bOffer->getNbgB2bOfferId());
            $this->resource->delete($nbgB2bOfferModel);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the nbg_b2b_offer: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * @inheritDoc
     */
    public function deleteById($nbgB2bOfferId)
    {
        return $this->delete($this->get($nbgB2bOfferId));
    }
}

