<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Mageap\Teston\Model;

use Mageap\Teston\Api\Data\PostInterfaceFactory;
use Mageap\Teston\Api\Data\PostSearchResultsInterfaceFactory;
use Mageap\Teston\Api\PostRepositoryInterface;
use Mageap\Teston\Model\ResourceModel\Post as ResourcePost;
use Mageap\Teston\Model\ResourceModel\Post\CollectionFactory as PostCollectionFactory;
use Magento\Framework\Api\DataObjectHelper;
use Magento\Framework\Api\ExtensibleDataObjectConverter;
use Magento\Framework\Api\ExtensionAttribute\JoinProcessorInterface;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Reflection\DataObjectProcessor;
use Magento\Store\Model\StoreManagerInterface;

class PostRepository implements PostRepositoryInterface
{

    protected $resource;

    protected $postFactory;

    protected $postCollectionFactory;

    protected $searchResultsFactory;

    protected $dataObjectHelper;

    protected $dataObjectProcessor;

    protected $dataPostFactory;

    protected $extensionAttributesJoinProcessor;

    private $storeManager;

    private $collectionProcessor;

    protected $extensibleDataObjectConverter;

    /**
     * @param ResourcePost $resource
     * @param PostFactory $postFactory
     * @param PostInterfaceFactory $dataPostFactory
     * @param PostCollectionFactory $postCollectionFactory
     * @param PostSearchResultsInterfaceFactory $searchResultsFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param DataObjectProcessor $dataObjectProcessor
     * @param StoreManagerInterface $storeManager
     * @param CollectionProcessorInterface $collectionProcessor
     * @param JoinProcessorInterface $extensionAttributesJoinProcessor
     * @param ExtensibleDataObjectConverter $extensibleDataObjectConverter
     */
    public function __construct(
        ResourcePost $resource,
        PostFactory $postFactory,
        PostInterfaceFactory $dataPostFactory,
        PostCollectionFactory $postCollectionFactory,
        PostSearchResultsInterfaceFactory $searchResultsFactory,
        DataObjectHelper $dataObjectHelper,
        DataObjectProcessor $dataObjectProcessor,
        StoreManagerInterface $storeManager,
        CollectionProcessorInterface $collectionProcessor,
        JoinProcessorInterface $extensionAttributesJoinProcessor,
        ExtensibleDataObjectConverter $extensibleDataObjectConverter
    ) {
        $this->resource = $resource;
        $this->postFactory = $postFactory;
        $this->postCollectionFactory = $postCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        $this->dataPostFactory = $dataPostFactory;
        $this->dataObjectProcessor = $dataObjectProcessor;
        $this->storeManager = $storeManager;
        $this->collectionProcessor = $collectionProcessor;
        $this->extensionAttributesJoinProcessor = $extensionAttributesJoinProcessor;
        $this->extensibleDataObjectConverter = $extensibleDataObjectConverter;
    }

    /**
     * {@inheritdoc}
     */
    public function save(
        \Mageap\Teston\Api\Data\PostInterface $post
    ) {
        /* if (empty($post->getStoreId())) {
            $storeId = $this->storeManager->getStore()->getId();
            $post->setStoreId($storeId);
        } */
        
        $postData = $this->extensibleDataObjectConverter->toNestedArray(
            $post,
            [],
            \Mageap\Teston\Api\Data\PostInterface::class
        );
        
        $postModel = $this->postFactory->create()->setData($postData);
        
        try {
            $this->resource->save($postModel);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the post: %1',
                $exception->getMessage()
            ));
        }
        return $postModel->getDataModel();
    }

    /**
     * {@inheritdoc}
     */
    public function get($postId)
    {
        $post = $this->postFactory->create();
        $this->resource->load($post, $postId);
        if (!$post->getId()) {
            throw new NoSuchEntityException(__('Post with id "%1" does not exist.', $postId));
        }
        return $post->getDataModel();
    }

    /**
     * {@inheritdoc}
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
        $collection = $this->postCollectionFactory->create();
        
        $this->extensionAttributesJoinProcessor->process(
            $collection,
            \Mageap\Teston\Api\Data\PostInterface::class
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
    public function delete(
        \Mageap\Teston\Api\Data\PostInterface $post
    ) {
        try {
            $postModel = $this->postFactory->create();
            $this->resource->load($postModel, $post->getPostId());
            $this->resource->delete($postModel);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the Post: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function deleteById($postId)
    {
        return $this->delete($this->get($postId));
    }
}

