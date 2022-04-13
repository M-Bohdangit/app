<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace NBG\B2B\Controller\Adminhtml\Nbgb2bofferitem;

class Delete extends \NBG\B2B\Controller\Adminhtml\Nbgb2bofferitem
{

    /**
     * Delete action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        // check if we know what should be deleted
        $id = $this->getRequest()->getParam('nbg_b2b_offer_item_id');
        if ($id) {
            try {
                // init model and delete
                $model = $this->_objectManager->create(\NBG\B2B\Model\NbgB2bOfferItem::class);
                $model->load($id);
                $model->delete();
                // display success message
                $this->messageManager->addSuccessMessage(__('You deleted the Nbg B2B Offer Item.'));
                // go to grid
                return $resultRedirect->setPath('*/*/');
            } catch (\Exception $e) {
                // display error message
                $this->messageManager->addErrorMessage($e->getMessage());
                // go back to edit form
                return $resultRedirect->setPath('*/*/edit', ['nbg_b2b_offer_item_id' => $id]);
            }
        }
        // display error message
        $this->messageManager->addErrorMessage(__('We can\'t find a Nbg B2B Offer Item to delete.'));
        // go to grid
        return $resultRedirect->setPath('*/*/');
    }
}

