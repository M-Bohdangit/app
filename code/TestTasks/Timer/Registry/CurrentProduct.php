<?php


namespace TestTasks\Timer\Registry;

use Magento\Catalog\Api\Data\ProductInterface;
use Magento\Catalog\Api\Data\ProductInterfaceFactory;

class CurrentProduct
{
    /**
     * ProductInterface
     *
     * @var ProductInterface
     */
    protected ProductInterface $product;

    /**
     * ProductInterfaceFactory
     *
     * @var ProductInterfaceFactory
     */
    protected ProductInterfaceFactory $productFactory;

    /**
     * Constructor
     *
     * @param ProductInterfaceFactory $productFactory
     */
    public function __construct(ProductInterfaceFactory $productFactory)
    {
        $this->productFactory = $productFactory;
    }

    /**
     * ProductInterface
     *
     * @param ProductInterface $product
     *
     * @return void
     */
    public function set(ProductInterface $product): void
    {
        $this->product = $product;
    }

    /**
     * @return ProductInterface
     */
    public function get(): ProductInterface
    {
        return $this->product ?? $this->createNullProduct();
    }

    /**
     * @return ProductInterface
     */
    private function createNullProduct(): ProductInterface
    {
        return $this->productFactory->create();
    }
}
