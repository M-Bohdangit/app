<?php

namespace Perspective\ProductByID\Controller\Index;

use \Magento\Framework\App\ActionInterface;
use Magento\Framework\Controller\ResultFactory;
use \Magento\Framework\App\Action\Action;

class Index extends Action
{
    public function execute()
    {
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        return $resultPage;
    }
}
