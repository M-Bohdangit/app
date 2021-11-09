<?php

namespace Perspective\ProductByID\Block;

class Index extends \Magento\Framework\View\Element\Template
{
	protected $_productRepository;
	protected $helper;

	public function __construct(
		\Magento\Backend\Block\Template\Context $context,
		\Magento\Catalog\Model\ProductRepository $productRepository,
		\Perspective\ProductByID\Helper\ProductById $helper,
		array $data = []
	) {
		$this->_productRepository = $productRepository;
		$this->helper = $helper;
		parent::__construct($context, $data);
	}
	/**
	 * Get product by id 
	 *
	 * @param int $Id
	 * @return \Magento\Catalog\Model\ProductRepository
	 */

	public function getProductById()
	{
		// return $this->_productRepository->getById($id);
		return $this->helper->getProductById();
	}
	/**
	 * Get product by sku
	 *
	 * @param string $sku
	 * 
	 * @return \Magento\Catalog\Model\ProductRepository
	 */
	public function getProductBySku()
	{
		// return $this->_productRepository->get($sku);
		return $this->helper->getProductBySku();
	}
	/**
	 *  Hello
	 * 
	 * @return string 
	 */
	public function getHello()
	{
		//return "hello";
		return $this->helper->getHello();
	}
}
