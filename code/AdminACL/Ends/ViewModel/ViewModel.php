<?php

namespace AdminACL\Ends\ViewModel;

class ViewModel implements \Magento\Framework\View\Element\Block\ArgumentInterface
{
  protected $_registry;
  protected $helperData;
  protected $_stockItemRepository;

  public function __construct(
    \AdminACL\Ends\Helper\CustomData $helperData,
    \Magento\CatalogInventory\Model\Stock\StockItemRepository $stockItemRepository,
    \Magento\Framework\Registry $registry

  ) {


    $this->helperData = $helperData;
    $this->_registry = $registry;
    $this->_stockItemRepository = $stockItemRepository;
  }
  /**
   * 
   * @return current_product  
   */
  public function getCurrentProduct()
  {
    if ($this->helperData->getGeneralConfig('enable')) {
      return $this->_registry->registry('current_product');
    }
    return null;
  }

  /**
   * 
   * @return str
   */
  public function getQuantity()
  {
    $currentProd = $this->getCurrentProduct()->getEntityId();
    $prodQty = $this->_stockItemRepository->get($currentProd);

    return $prodQty->getQty() . ' units left';
  }
}
