<?php

namespace Learning\AirFreight\ViewModel;

class ViewModel implements \Magento\Framework\View\Element\Block\ArgumentInterface
{
  protected $_registry;
  protected $helperData;

  public function __construct(
    \Learning\AirFreight\Helper\Data $helperData,
    \Magento\Framework\Registry $registry,
    array $data = []
  ) {
    $this->helperData = $helperData;
    $this->_registry = $registry;
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
  public function getAirShippingMethod()
  {
    if ($this->helperData->getGeneralConfig('enable')) {
      if ($this->getCurrentProduct()->getData('air_freight')) {
        $airShippingMethod = $this->getCurrentProduct()->getData('air_freight');
        return $airShippingMethod;
      }
    }
  }

  /**
   * 
   * @return str
   */
  public function getAirShippingPriceBallon()
  {
    if ($this->helperData->getGeneralConfig('enable')) {
      if ($this->getAirShippingMethod() === 'balloon') {
        if ($this->helperData->getGeneralConfig('display_balloonlbs') < $this->getCurrentProduct()->getData('weight')) {
          $airShippingPrice = ($this->getCurrentProduct()->getData('weight') - $this->helperData->getGeneralConfig('display_balloonlbs')) * $this->helperData->getGeneralConfig('display_balloonpr');
          return $airShippingPrice;
        }
      }
    }
  }

  /**
   * 
   * @return str
   */
  public function getAirShippingPriceCharterPlane()
  {
    if ($this->helperData->getGeneralConfig('enable')) {
      if ($this->getAirShippingMethod() === 'charter-plane') {
        if ($this->helperData->getGeneralConfig('display_charterlbs') < $this->getCurrentProduct()->getData('weight')) {
          $airShippingPrice = ($this->getCurrentProduct()->getData('weight') - $this->helperData->getGeneralConfig('display_charterlbs')) * $this->helperData->getGeneralConfig('display_charterpr');
          return $airShippingPrice;
        }
      }
    }
  }

  /**
   * 
   * @return str
   */
  public function getAirShippingPriceHightSpeedPlane()
  {
    if ($this->helperData->getGeneralConfig('enable')) {
      if ($this->getAirShippingMethod() === 'high-speed-plane') {
        if ($this->helperData->getGeneralConfig('display_speedlbs') < $this->getCurrentProduct()->getData('weight')) {
          $airShippingPrice = ($this->getCurrentProduct()->getData('weight') - $this->helperData->getGeneralConfig('display_speedlbs')) * $this->helperData->getGeneralConfig('display_speedpr');
          return $airShippingPrice;
        }
      }
    }
  }

  /**
   * 
   * @return str
   */
  public function getAirShippingPriceSpaceShip()
  {
    if ($this->helperData->getGeneralConfig('enable')) {
      if ($this->getAirShippingMethod() === 'spaceship') {
        if ($this->helperData->getGeneralConfig('display_spaceshiplbs') < $this->getCurrentProduct()->getData('weight')) {
          $airShippingPrice = ($this->getCurrentProduct()->getData('weight') - $this->helperData->getGeneralConfig('display_spaceshiplbs')) * $this->helperData->getGeneralConfig('display_spaceshippr');
          return $airShippingPrice;
        }
      }
    }
  }

  /**
   * 
   *
   * @return str
   */
  public function getСhoiceShipping()
  {
    if ($this->getAirShippingPriceBallon() > 0) {

      return $this->getAirShippingPriceBallon();
    } elseif ($this->getAirShippingPriceCharterPlane() > 0) {

      return $this->getAirShippingPriceCharterPlane();
    } elseif ($this->getAirShippingPriceHightSpeedPlane() > 0) {

      return $this->getAirShippingPriceHightSpeedPlane();
    } elseif ($this->getAirShippingPriceSpaceShip() > 0) {

      return $this->getAirShippingPriceSpaceShip();
    }
  }





  /**
   * 
   * @return str
   */
  public function getAirShippingMessage()
  {
    if ($this->helperData->getGeneralConfig('enable')) {
      if ($this->getAirShippingMethod()) {
        return '<hr />For carriage: ' . $this->getAirShippingMethod() . '<br /> will be charged an additional charge: $' . $this->getСhoiceShipping() . '<hr />';
      }
    }
  }
}
