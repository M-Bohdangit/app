<?php

namespace Perspective\Demo\Plugins;

class Product
{
  /**
   * Undocumented function
   *
   * @param \Magento\Catalog\Model\Product $product
   * @param  String $name
   * 
   */
  public function afterGetName(\Magento\Catalog\Model\Product $product, $name)
  {
    // $price = $product->getData('price');
    // if ($price < 60) {
    //   $name .= ' - Так дешево!';
    // } else {
    //   $name .= ' - Очень дорого!';
    // }
    return $name;
  }
}
