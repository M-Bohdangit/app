<?php

namespace AdminACL\Currency\Block;

class Index extends \Magento\Framework\View\Element\Template
{
	protected $_registry;
	protected $helperData;

	public function __construct(
		\AdminACL\Currency\Helper\Data $helperData,
		\Magento\Backend\Block\Template\Context $context,
		\Magento\Framework\Registry  $registry,
		array $data = []

	) {
		$this->helperData = $helperData;
		$this->_registry = $registry;
		parent::__construct($context, $data);
	}

	/**
	 * @return current_product
	 */
	public function getCurrentProduct()
	{
		if ($this->helperData->getCurrencyConfig('enable'))
			return $this->_registry->registry('current_product');
	}


	/**
	 * @return string 
	 *  check, instead of comma - dot
	 */
	public function checkUah()
	{
		$a = $this->helperData->getCurrencyConfig('display_uah');
		$uah = str_replace(',', '.', $a);
		return $uah;
	}
	/**
	 * @return string 
	 *  check, instead of comma - dot
	 */
	public function checkRub()
	{
		$b = $this->helperData->getCurrencyConfig('display_rub');
		$rub = str_replace(',', '.', $b);
		return $rub;
	}
	/**
	 * @return string 
	 *  check, instead of comma - dot
	 */
	public function checkEuro()
	{
		$c = $this->helperData->getCurrencyConfig('display_euro');
		$euro = str_replace(',', '.', $c);
		return $euro;
	}


	/**
	 * @return str
	 */
	public function getPriceInUah()
	{
		$uah = $this->helperData->getCurrencyConfig('display_uah');

		if ($this->helperData->getCurrencyConfig('UAH')) {
			$result = $this->checkUah() * $this->getCurrentProduct()->getFinalPrice();
			return  $result . ' UAH';
		}
	}

	/**
	 * @return str
	 */
	public function getPriceInRub()
	{
		if ($this->helperData->getCurrencyConfig('RUB')) {
			$result = $this->checkRub() * $this->getCurrentProduct()->getFinalPrice();
			return  $result . ' RUB';
		}
	}

	/**
	 * @return str
	 */
	public function getPriceInEuro()
	{
		if ($this->helperData->getCurrencyConfig('EURO')) {
			$result = $this->checkEuro() * $this->getCurrentProduct()->getFinalPrice();
			return  $result . ' EURO';
		}
	}
}
