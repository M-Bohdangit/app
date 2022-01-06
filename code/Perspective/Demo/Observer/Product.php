<?php

namespace Perspective\Demo\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class Product implements ObserverInterface
{
  public function execute(Observer $observer)
  {
    $collection = $observer->getEvent()->getData('collection');
    foreach ($collection as $product) {
      $price = $product->getData('price');
      $name = $product->getData('name');
      if ($price < 60) {
        $name .= ' - Так дешево!';
      } else {
        $name .= ' - Очень дорого!';
      }
      $product->setData('name', $name);
    }
  }
}
