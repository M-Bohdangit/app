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
use NBG\B2B\Api\Data\NbgB2bOfferCustomerInterface;
use NBG\B2B\Api\Data\NbgB2bOfferCustomerInterfaceFactory;
use NBG\B2B\Api\Data\NbgB2bOfferCustomerSearchResultsInterfaceFactory;
use NBG\B2B\Api\NbgB2bOfferCustomerRepositoryInterface;
use NBG\B2B\Model\ResourceModel\NbgB2bOfferCustomer as ResourceNbgB2bOfferCustomer;
use NBG\B2B\Model\ResourceModel\NbgB2bOfferCustomer\CollectionFactory as NbgB2bOfferCustomerCollectionFactory;

class NbgB2bOfferCustomerRepository implements NbgB2bOfferCustomerRepositoryInterface
{

    /**
     * @var NbgB2bOfferCustomerInterfaceFactory
     */
    protected $nbgB2bOfferCustomerFactory;

    /**
     * @var NbgB2bOfferCustomerCollectionFactory
     */
    protected $nbgB2bOfferCustomerCollectionFactory;

    /**
     * @var CollectionProcessorInterface
     */
    protected $collectionProcessor;

    /**
     * @var ResourceNbgB2bOfferCustomer
     */
    protected $resource;

    /**
     * @var NbgB2bOfferCustomer
     */
    protected $searchResultsFactory;


    /**
     * @param ResourceNbgB2bOfferCustomer $resource
     * @param NbgB2bOfferCustomerInterfaceFactory $nbgB2bOfferCustomerFactory
     * @param NbgB2bOfferCustomerCollectionFactory $nbgB2bOfferCustomerCollectionFactory
     * @param NbgB2bOfferCustomerSearchResultsInterfaceFactory $searchResultsFactory
     * @param CollectionProcessorInterface $collectionProcessor
     */
    public function __construct(
        ResourceNbgB2bOfferCustomer $resource,
        NbgB2bOfferCustomerInterfaceFactory $nbgB2bOfferCustomerFactory,
        NbgB2bOfferCustomerCollectionFactory $nbgB2bOfferCustomerCollectionFactory,
        NbgB2bOfferCustomerSearchResultsInterfaceFactory $searchResultsFactory,
        CollectionProcessorInterface $collectionProcessor
    ) {
        $this->resource = $resource;
        $this->nbgB2bOfferCustomerFactory = $nbgB2bOfferCustomerFactory;
        $this->nbgB2bOfferCustomerCollectionFactory = $nbgB2bOfferCustomerCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->collectionProcessor = $collectionProcessor;
    }

    /**
     * @inheritDoc
     */
    public function save(
        NbgB2bOfferCustomerInterface $nbgB2bOfferCustomer
    ) {
        try {
            $this->resource->save($nbgB2bOfferCustomer);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the nbgB2bOfferCustomer: %1',
                $exception->getMessage()
            ));
        }
        return $nbgB2bOfferCustomer;
    }

    /**
     * @inheritDoc
     */
    public function get($nbgB2bOfferCustomerId)
    {
        $nbgB2bOfferCustomer = $this->nbgB2bOfferCustomerFactory->create();
        $this->resource->load($nbgB2bOfferCustomer, $nbgB2bOfferCustomerId);
        if (!$nbgB2bOfferCustomer->getId()) {
            throw new NoSuchEntityException(__('nbg_b2b_offer_customer with id "%1" does not exist.', $nbgB2bOfferCustomerId));
        }
        return $nbgB2bOfferCustomer;
    }

    /**
     * @inheritDoc
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
        $collection = $this->nbgB2bOfferCustomerCollectionFactory->create();
        
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
        NbgB2bOfferCustomerInterface $nbgB2bOfferCustomer
    ) {
        try {
            $nbgB2bOfferCustomerModel = $this->nbgB2bOfferCustomerFactory->create();
            $this->resource->load($nbgB2bOfferCustomerModel, $nbgB2bOfferCustomer->getNbgB2bOfferCustomerId());
            $this->resource->delete($nbgB2bOfferCustomerModel);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the nbg_b2b_offer_customer: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * @inheritDoc
     */
    public function deleteById($nbgB2bOfferCustomerId)
    {
        return $this->delete($this->get($nbgB2bOfferCustomerId));
    }
}

