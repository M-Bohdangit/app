<?php

namespace Perspective\BDPractice\Block;

class Category extends \Magento\Framework\View\Element\Template
{
  protected $postCollectionFactory;
  protected $productRepository;
  protected $productImageHelper;
  protected $registry;

  public function __construct(
    \Magento\Framework\View\Element\Template\Context $context,
    \Perspective\BDPractice\Model\ResourceModel\Post\CollectionFactory $postCollectionFactory,
    \Magento\Catalog\Model\ProductRepository $productRepository,
    \Magento\Catalog\Helper\Image $productImageHelper,
    \Magento\Framework\Registry $registry,
    array $data = []
  ) {

    $this->postCollectionFactory = $postCollectionFactory;
    $this->productRepository = $productRepository;
    $this->productImageHelper = $productImageHelper;
    $this->registry = $registry;
    parent::__construct($context, $data);
  }

  
  public function getPostCollectionForCategory()
  {
    $category = 18;
    $post = $this->postCollectionFactory->create();
    $post->addFieldToSelect('*')->addFieldToFilter('IDCat', ['in' => [$category]]);
    return $post;
  }
  
  public function getProductById($id)
  {
    return $this->productRepository->getById($id);
  }

  
  public function getProductImageUrl($product, $imageId, $attributes = [])
  {
    return $this->productImageHelper->init($product, $imageId, $attributes)->getUrl();
  }

  
  public function getPostCollectionForProductId($id)
  {
    $post = $this->postCollectionFactory->create();
    $post->addFieldToSelect('*')->addFieldToFilter('IDProd', ['eq' => $id]);
    return $post;
  }

  public function getCurrentProduct()
  {
    return $this->registry->registry('current_product');
  }
}
