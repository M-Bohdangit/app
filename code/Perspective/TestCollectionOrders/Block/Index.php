<?php

namespace Perspective\TestCollectionOrders\Block;

class Index extends \Magento\Framework\View\Element\Template
{

	private $data;
	private $context;
	private $orderCollectionFactory;

	public function __construct(
		\Magento\Backend\Block\Template\Context $context,
		\Magento\Sales\Model\ResourceModel\Order\CollectionFactory $orderCollectionFactory,
		array $data = []

	) {
		$this->orderCollectionFactory = $orderCollectionFactory;

		parent::__construct($context, $data);
	}

	public function getCustomerOrder()
	{
		$customerId = 1;
		$customerOrder = $this->orderCollectionFactory->create()
			->addFieldToFilter('customer_id', $customerId);
		return $customerOrder->getData();
	}
}
