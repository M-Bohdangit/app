<?php

namespace Perspective\TestListPaymentMethods\Block;

class Index extends \Magento\Framework\View\Element\Template
{
	/**
	 * Order Payment
	 *
	 * @var \Magento\Sales\Model\ResourceModel\Order\Payment\Collection
	 */
	protected $_orderPayment;

	/**
	 * Payment Helper Data
	 *
	 * @var \Magento\Payment\Helper\Data
	 */
	protected $_paymentHelper;

	/**
	 * Payment Model Config
	 *
	 * @var \Magento\Payment\Model\Config
	 */
	protected $_paymentConfig;

	/**
	 * @param \Magento\Backend\Block\Template\Context $context
	 * @param \Magento\Payment\Helper\Data $paymentHelper
	 * @param array $data
	 */
	public function __construct(
		\Magento\Backend\Block\Template\Context $context,
		\Magento\Payment\Helper\Data $paymentHelper,
		array $data = []
	) {
		$this->_paymentHelper = $paymentHelper;
		parent::__construct($context, $data);
	}

	/**
	 * Get all payment methods
	 * 
	 * @return array
	 */
	public function getAllPaymentMethods()
	{
		return $this->_paymentHelper->getPaymentMethods();
	}
}
