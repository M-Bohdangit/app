<?php

namespace Perspective\BDPractice\Block;

class Index extends \Magento\Framework\View\Element\Template
{
  protected $postCollectionFactory;

  public function __construct(
    \Magento\Framework\View\Element\Template\Context $context,
    \Perspective\BDPractice\Model\ResourceModel\Post\CollectionFactory $postCollectionFactory,
    array $data = []
  ) {
    $this->postCollectionFactory = $postCollectionFactory;
    parent::__construct($context, $data);
  }


  public function getPostCollection()
  {
    $post = $this->postCollectionFactory->create();
    $post->addFieldToSelect('*');
    return $post;
  }

  public function getPostCollectionForTwoCategories()
  {
    $post = $this->postCollectionFactory->create();
    $post->addFieldToSelect('*')->addFieldToFilter('IDCat', ['in' => [5, 16]]);
    return $post;
  }

  public function getPostCollectionForProduct()
  {
    $post = $this->postCollectionFactory->create();
    $post->addFieldToSelect('*')->addFieldToFilter('IDProd', ['eq' => 17]);
    return $post;
  }
}
