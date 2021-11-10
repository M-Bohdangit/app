<?php

namespace Perspective\CurrentProdCat\Block;

use Magento\Catalog\Api\Data\ProductInterface;

class Index extends \Magento\Framework\View\Element\Template
{
	protected $_registry;

	public function __construct(
		\Magento\Backend\Block\Template\Context $context,
		\Magento\Framework\Registry $registry,
		array $data = []
	) {
		$this->registry = $registry;
		parent::__construct($context, $data);
	}

	public function prepareLayout()
	{
		return parent::prepareLayout();
	}
	/**
	 * Get current category
	 * 
	 *  @return mixed */

	public function getCurrentCategory()
	{
		return $this->registry->registry('current_category');
	}
	/**
	 * Get current product
	 * 
	 *  @return mixed */

	public function getCurrentProduct()
	{
		return $this->registry->registry('current_product');
	}
}
