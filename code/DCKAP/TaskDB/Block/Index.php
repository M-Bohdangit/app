<?php

namespace DCKAP\TaskDB\Block;

class Index extends \Magento\Framework\View\Element\Template
{
  protected $_salesFactory;

  public function __construct(
    \Magento\Framework\View\Element\Template\Context $context,
    \DCKAP\TaskDB\Model\SalesFactory $salesFactory
  ) {
    parent::__construct($context);
    $this->_salesFactory = $salesFactory;
  }

  public function getAllProduct()
  {
    $post = $this->_salesFactory->create();
    $collection = $post->getCollection();
    return $collection;
  }

  public function getByProduct($product)
  {
    $collection = $this->_salesFactory->create()->getCollection()
      ->addFieldToFilter('product_name', $product);
    return $collection;
  }
}
