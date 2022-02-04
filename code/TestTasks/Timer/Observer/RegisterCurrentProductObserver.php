<?php

namespace TestTasks\Timer\Observer;

use Magento\Catalog\Api\Data\ProductInterface;
use Magento\Framework\Event\Observer as Event;
use Magento\Framework\Event\ObserverInterface;
use TestTasks\Timer\Registry\CurrentProduct;

class RegisterCurrentProductObserver implements ObserverInterface
{
    /**
     * CurrentProduct
     * @var CurrentProduct
     */
    protected $currentProduct;

    public function __construct(CurrentProduct $currentProduct)
    {
        $this->currentProduct = $currentProduct;
    }

    public function execute(Event $event)
    {
        /**
         * @var ProductInterface $product
         */
        $product = $event->getData('product');
        $this->currentProduct->set($product);
    }
}
