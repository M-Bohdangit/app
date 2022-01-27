<?php

namespace Learning\SocialAttribute\ViewModel;

class CustomViewModel implements \Magento\Framework\View\Element\Block\ArgumentInterface
{
  protected $helperData;
  protected $productRepository;

  public function __construct(
    \Learning\SocialAttribute\Helper\Data $helperData,
    \Magento\Catalog\Model\ProductRepository $productRepository,
    \Magento\Framework\Registry $registry
  ) {
    $this->helperData = $helperData;
    $this->_productRepository = $productRepository;
    $this->_registry = $registry;
  }

  /**
   * 
   * @return str
   */
  public function getSocial($_product)
  {
    if ($this->helperData->getGeneralConfig('enable')) {
      $currentProduct = $this->_productRepository->getById($_product->getData('entity_id'));
      if ($currentProduct->getData('social_attribute')) {
        return '<b>SOCIAL PRODUCT</b>';
      }
    }
  }
  /** 
   * 
   * @return Magento\Catalog\Model\Product\Interceptor _eventObject: "product"
   */
  public function getCurrentProduct()
  {
    if ($this->helperData->getGeneralConfig('enable')) {
      $currentProduct = $this->_registry->registry('current_product');
      return $currentProduct;
    }
  }

  /**
   * 
   * @return str
   */
  public function getSocialFinalPrice()
  {

    if ($this->helperData->getGeneralConfig('enable') && $this->getCurrentProduct()->getData('social_attribute')) {
      $SocialFinalPrice = $this->getCurrentProduct()->getFinalPrice() - ($this->getCurrentProduct()->getFinalPrice() / 100) * $this->helperData->getGeneralConfig('display_social');
      return 'Discount : ' . $this->helperData->getGeneralConfig('display_social') . '%<br /> <br /> <b>Final price : $' . $SocialFinalPrice . '</b>';
    }
  }
}
