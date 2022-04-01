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
 * @copyright Copyright (c) 2018 Magecom, Inc. (http://www.magecom.net)
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

namespace Magecom\Learning\Model;

use Magecom\Learning\Api\Data;
use Magecom\Learning\Api\ItemsRepositoryInterface;
use Magento\Framework\Api\DataObjectHelper;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Reflection\DataObjectProcessor;
use Magecom\Learning\Model\ResourceModel\Items as ResourceItems;
use Magecom\Learning\Model\ResourceModel\Items\CollectionFactory as ItemsCollectionFactory;
use Magento\Framework\App\ObjectManager;
use Magento\Framework\Api\SearchCriteria\CollectionProcessor;
use Magento\Framework\Api\SearchCriteria as ApiSearchCriteria;

/**
 * ItemsRepository class
 *
 * @category Magecom
 * @package Magecom_Module
 * @author Magecom
 */
class ItemsRepository implements ItemsRepositoryInterface
{
    /**
     * @var ResourceItems
     */
    protected $resource;
    /**
     * @var ItemsFactory
     */
    protected $itemsFactory;
    /**
     * @var ItemsCollectionFactory
     */
    protected $itemsCollectionFactory;
    /**
     * @var Data\ItemsSearchResultsInterfaceFactory
     */
    protected $searchResultsFactory;
    /**
     * @var DataObjectHelper
     */
    protected $dataObjectHelper;
    /**
     * @var Data\PageInterfaceFactory
     */
    protected $dataItemsFactory;
    /**
     * @var DataObjectProcessor
     */
    protected $dataObjectProcessor;

    /**
     * @var CollectionProcessorInterface
     */
    private $collectionProcessor;
    /**
     * @param ResourceItems $resource
     * @param ItemsFactory $itemsFactory
     * @param Data\ItemsInterfaceFactory $dataItemsFactory
     * @param ItemsCollectionFactory $itemsCollectionFactory
     * @param Data\ItemsSearchResultsInterfaceFactory $searchResultsFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param DataObjectProcessor $dataObjectProcessor
     * @param CollectionProcessorInterface $collectionProcessor
     */
    public function __construct(
        ResourceItems $resource,
        ItemsFactory $itemsFactory,
        Data\ItemsInterfaceFactory $dataItemsFactory,
        ItemsCollectionFactory $itemsCollectionFactory,
        Data\ItemsSearchResultsInterfaceFactory $searchResultsFactory,
        DataObjectHelper $dataObjectHelper,
        DataObjectProcessor $dataObjectProcessor,
        CollectionProcessorInterface $collectionProcessor = null
    ) {
        $this->resource = $resource;
        $this->itemsFactory = $itemsFactory;
        $this->itemsCollectionFactory = $itemsCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        $this->dataItemsFactory = $dataItemsFactory;
        $this->dataObjectProcessor = $dataObjectProcessor;
        $this->collectionProcessor = $collectionProcessor ?: $this->getCollectionProcessor();
    }

    /**
     * Save Page data
     *
     * @param \Magecom\Learning\Api\Data\ItemsInterface $items
     * @return Items
     * @throws CouldNotSaveException
     */
    public function save(Data\ItemsInterface $items)
    {
        try {
            $this->resource->save($items);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(
                __('Could not save the items: %1', $exception->getMessage()),
                $exception
            );
        }
        return $items;
    }

    /**
     * Load Items data by given Items Identity
     *
     * @param string $itemsId
     * @return Items
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getById($itemsId)
    {
        $items = $this->itemsFactory->create();
        $items->load($itemsId);
        if (!$items->getId()) {
            throw new NoSuchEntityException(__('Items with id "%1" does not exist.', $itemsId));
        }
        return $items;
    }
    /**
     * Load Page data collection by given search criteria
     *
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @SuppressWarnings(PHPMD.NPathComplexity)
     * @param \Magento\Framework\Api\SearchCriteriaInterface $criteria
     * @return \Magecom\Learning\Api\Data\ItemsSearchResultsInterface
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $criteria)
    {
        /** @var \Magecom\Learning\Model\ResourceModel\Items\Collection $collection */
        $collection = $this->itemsCollectionFactory->create();

        $this->collectionProcessor->process($criteria, $collection);

        /** @var Data\ItemsSearchResultsInterface $searchResults */
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($criteria);
        $searchResults->setItems($collection->getItems());
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }
    /**
     * Delete Items
     *
     * @param \Magecom\Learning\Api\Data\ItemsInterface $items
     * @return bool
     * @throws CouldNotDeleteException
     */
    public function delete(Data\ItemsInterface $items)
    {
        try {
            $this->resource->delete($items);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the items: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }
    /**
     * Delete Page by given Items Identity
     *
     * @param string $itemsId
     * @return bool
     * @throws CouldNotDeleteException
     * @throws NoSuchEntityException
     */
    public function deleteById($itemsId)
    {
        return $this->delete($this->getById($itemsId));
    }
    /**
     * Retrieve collection processor
     *
     * @deprecated 101.1.0
     * @return CollectionProcessorInterface
     */
    private function getCollectionProcessor()
    {
        if (!$this->collectionProcessor) {
            $this->collectionProcessor = ObjectManager::getInstance()->get(
                CollectionProcessor::class
            );
        }
        return $this->collectionProcessor;
    }
}
