<?php

namespace Perspective\ProductCollectionCategoryPrice\ViewModel;

use Magento\Catalog\Api\ProductRepositoryInterface;

class Index implements \Magento\Framework\View\Element\Block\ArgumentInterface
{

    /**
     * @var \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory
     */
    protected $productCollectionFactory;
    /**
     * @param mixed[]  $collection
     */
    public $collection;

    public function __construct(
        \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory

    ) {
        $this->productCollectionFactory = $productCollectionFactory;
    }

    /**
     *
     *  @param array<int>  
     * @return \Magento\Catalog\Model\ResourceModel\Product\Collection 
     */
    public function getProductCollectionByCategories($ids)
    {
        $collection = $this->productCollectionFactory->create();
        $collection->addAttributeToSelect('*');
        $collection->addCategoriesFilter(['in' => $ids]);
        return $collection;
    }
    /**
     * @return mixed 
     */
    public function show($collection)
    {
        if (!is_null($collection))
            foreach ($collection as $product) {
                echo '<h3>Name - ' . $product->getName() . '<br />' . 'Price - ' . $product->getPrice() . '<br />' . 'Sku - ' . $product->getSku() . '</h3><br />' . '<br />';
            }
    }
    /**
     * @return mixed 
     */
    public function showTable($collection)
    {
        if (!is_null($collection))
            foreach ($collection as $product) {
                if ($product->getPrice() < 60 && $product->getPrice() > 50) {
                    echo '<tr><td><b>' . $product->getName() . '</b></td><td><b>' . $product->getSku() . '</b></td><td><b>' . $product->getPrice() . '</b></td></tr>';
                }
            }
    }
}
