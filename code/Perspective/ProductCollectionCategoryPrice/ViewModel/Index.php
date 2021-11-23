<?php

namespace Perspective\ProductCollectionCategoryPrice\ViewModel;

use Magento\Catalog\Api\ProductRepositoryInterface;

class Index implements \Magento\Framework\View\Element\Block\ArgumentInterface
{

    /**
     * @var \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory
     */
    protected $productCollectionFactory;

    public function __construct(
        \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory

    ) {
        $this->productCollectionFactory = $productCollectionFactory;
    }

    /**
     * 
     * @param array $ids 
     * @return \Magento\Catalog\Model\ResourceModel\Product\Collection
     */
    public function getProductCollectionByCategories(array $ids)
    {
        $collection = $this->productCollectionFactory->create();
        $collection->addAttributeToSelect('*');
        $collection->addCategoriesFilter(['in' => $ids]);
        return $collection;
    }
}
