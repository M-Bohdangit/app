<?php

namespace Perspective\TestQty\Block;

class Index extends \Magento\Framework\View\Element\Template
{

	protected $_stockItemRepository;

	public function __construct(
		\Magento\Backend\Block\Template\Context $context,
		\Magento\CatalogInventory\Model\Stock\StockItemRepository $stockItemRepository,
		\Magento\Catalog\Model\ProductFactory $ProductFactory,
		array $data = []
	) {
		$this->ProductFactory = $ProductFactory;
		$this->_stockItemRepository = $stockItemRepository;
		parent::__construct($context, $data);
	}

	public function getStockItem($productId)
	{
		return $this->_stockItemRepository->get($productId);
	}
}
