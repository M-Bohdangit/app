<?php

namespace Perspective\Demo\Model;

class Product extends \Magento\Catalog\Model\Product
{
  /**
   * get Name;
   *
   * @return string
   */
  public function getName()
  {
    $name = parent::getName();
    $price = $this->getData('price');
    if ($price < 60) {
      $name .= ' - Так дешево!!!';
    } else {
      $name .= ' - Очень дорого!!!';
    }
    return $name;
  }
}
