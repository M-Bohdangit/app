<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace NBG\B2B\Controller\Adminhtml\Nbgb2boffercustomer;

class Edit extends \NBG\B2B\Controller\Adminhtml\Nbgb2boffercustomer
{

    protected $resultPageFactory;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\Registry $coreRegistry
     * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\Registry $coreRegistry,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory
    ) {
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context, $coreRegistry);
    }

    /**
     * Edit action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        // 1. Get ID and create model
        $id = $this->getRequest()->getParam('nbg_b2b_offer_customer_id');
        $model = $this->_objectManager->create(\NBG\B2B\Model\NbgB2bOfferCustomer::class);
        
        // 2. Initial checking
        if ($id) {
            $model->load($id);
            if (!$model->getId()) {
                $this->messageManager->addErrorMessage(__('This Nbg B2B Offer Customer no longer exists.'));
                /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
                $resultRedirect = $this->resultRedirectFactory->create();
                return $resultRedirect->setPath('*/*/');
            }
        }
        $this->_coreRegistry->register('nbg_b2b_nbg_b2b_offer_customer', $model);
        
        // 3. Build edit form
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $this->initPage($resultPage)->addBreadcrumb(
            $id ? __('Edit Nbg B2B Offer Customer') : __('New Nbg B2B Offer Customer'),
            $id ? __('Edit Nbg B2B Offer Customer') : __('New Nbg B2B Offer Customer')
        );
        $resultPage->getConfig()->getTitle()->prepend(__('Nbg B2B Offer Customers'));
        $resultPage->getConfig()->getTitle()->prepend($model->getId() ? __('Edit Nbg B2B Offer Customer %1', $model->getId()) : __('New Nbg B2B Offer Customer'));
        return $resultPage;
    }
}

