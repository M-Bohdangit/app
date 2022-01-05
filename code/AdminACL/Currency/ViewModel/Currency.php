<?php

namespace AdminACL\Currency\ViewModel;

class Currency implements \Magento\Framework\View\Element\Block\ArgumentInterface
{
	protected $_registry;
	protected $helperData;

	public function __construct(
		\AdminACL\Currency\Helper\Data $helperData,
		\Magento\Framework\Registry  $registry


	) {
		$this->helperData = $helperData;
		$this->_registry = $registry;
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
	 * check, instead of comma - dot
	 *
	 * @return string
	 */
	public function checkUah()
	{
		$a = $this->helperData->getCurrencyConfig('display_uah');
		$uah = str_replace(',', '.', $a);
		return $uah;
	}
	/**
	 * check, instead of comma - dot
	 *
	 * @return string
	 */
	public function checkRub()
	{
		$b = $this->helperData->getCurrencyConfig('display_rub');
		$rub = str_replace(',', '.', $b);
		return $rub;
	}
	/**
	 * check, instead of comma - dot
	 *
	 * @return string
	 */
	public function checkEuro()
	{
		$c = $this->helperData->getCurrencyConfig('display_euro');
		$euro = str_replace(',', '.', $c);
		return $euro;
	}


	/**
	 * @return string
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
	 * @return string
	 */
	public function getPriceInRub()
	{
		if ($this->helperData->getCurrencyConfig('RUB')) {
			$result = $this->checkRub() * $this->getCurrentProduct()->getFinalPrice();
			return  $result . ' RUB';
		}
	}

	/**
	 * @return string
	 */
	public function getPriceInEuro()
	{
		if ($this->helperData->getCurrencyConfig('EURO')) {
			$result = $this->checkEuro() * $this->getCurrentProduct()->getFinalPrice();
			return  $result . ' EURO';
		}
	}
}
