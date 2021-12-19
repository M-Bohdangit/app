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
  /**
   * 
   * @return \Perspective\BDPractice\Model\ResourceModel\Post\Collection;
   *  */

  public function getPostCollection()
  {
    $post = $this->postCollectionFactory->create();
    $post->addFieldToSelect('*');
    return $post;
  }
  /**
   * 111
   * @return \Perspective\BDPractice\Model\ResourceModel\Post\Collection;
   *  */
  public function getPostCollectionForTwoCategories()
  {
    $post = $this->postCollectionFactory->create();
    $post->addFieldToSelect('*')->addFieldToFilter('IDCat', ['in' => [5, 16]]);
    return $post;
  }
  /**
   * 222
   * @return \Perspective\BDPractice\Model\ResourceModel\Post\Collection;
   *  */
  public function getPostCollectionForProduct()
  {
    $post = $this->postCollectionFactory->create();
    $post->addFieldToSelect('*')->addFieldToFilter('IDProd', ['eq' => 17]);
    return $post;
  }
}
