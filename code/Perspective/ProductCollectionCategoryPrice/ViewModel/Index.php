<?php

namespace Perspective\ProductCollectionCategoryPrice\ViewModel;

use Magento\Catalog\Api\ProductRepositoryInterface;

class Index implements \Magento\Framework\View\Element\Block\ArgumentInterface
{

  /**
   * @var \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory
   */
  protected $_productCollectionFactory;

  public function __construct(
    \Magento\Backend\Block\Template\Context $context,
    \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory,
    array $data = []
  ) {
    $this->_productCollectionFactory = $productCollectionFactory;
  }

  /**
   * 
   * @param array $ids 
   * @return \Magento\Catalog\Model\ResourceModel\Product\Collection
   */
  public function getProductCollectionByCategories(array $ids)
  {
    $collection = $this->_productCollectionFactory->create();
    $collection->addAttributeToSelect('*');
    $collection->addCategoriesFilter(['in' => $ids]);
    return $collection;
  }
}
