<?php

namespace Perspective\ProductByID\Helper;

use Magento\Catalog\Api\Data\ProductInterface;
use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Helper\Context;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\App\RequestInterface;

class ProductById extends AbstractHelper
{
  private $productRepository;
  protected $request;

  public function __construct(
    Context $context,
    ProductRepositoryInterface $productRepository,
    RequestInterface $request
  ) {
    parent::__construct($context);
    $this->productRepository = $productRepository;
    $this->request = $request;
  }

  /**
   * @return ProductInterface|string
   */
  public function getProductById()
  {
    try {
      return $this->productRepository->getById(
        $this->request->getParam('productId', -1)
      );
    } catch (NoSuchEntityException $exception) {
      return 'not_found_product';
    }
  }

  /**
   * @return ProductInterface|string
   */
  public function getProductBySku()
  {
    try {
      return $this->productRepository->get(
        $this->request->getParam('productSku', -1)
      );
    } catch (NoSuchEntityException $exception) {
      return 'not_found_product';
    }
  }
  /**
   *  Hello
   * 
   * @return string 
   */
  public function getHello()
  {
    return "hello";
  }
}
