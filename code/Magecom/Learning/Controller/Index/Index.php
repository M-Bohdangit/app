<?php

/**
 * Magecom
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to info@magecom.net so we can send you a copy immediately.
 *
 * @category  Magecom
 * @package   Magecom_Module
 * @copyright Copyright (c) ${YEAR} Magecom, Inc. (http://www.magecom.net)
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

namespace Magecom\Learning\Controller\Index;

use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\App\Action\Action;
use Psr\Log\LoggerInterface;
use Monolog\Logger;

/**
 * Magecom_Learning_Controller_Index_Index class
 *
 * @category Magecom
 * @package  Magecom_Learning
 * @author   Magecom
 */
class Index extends Action
{
    /**
     * PageFactory
     *
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $resultPageFactory;

    /**
     * Logger Class
     *
     * @var \Magento\Framework\Logger\Monolog
     */
    protected $logger;

    /**
     * Index constructor.
     *
     * @param Context     $context           Context
     * @param PageFactory $resultPageFactory PageFactory
     * @param Logger      $logger            LoggerInterface
     */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory,
        LoggerInterface $logger
    ) {
        $this->resultPageFactory = $resultPageFactory;
        $this->logger = $logger;
        parent::__construct($context);
    }

    /**
     * Short Description
     *
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface|void
     */
    public function execute()
    {
        $debugInfo = [
            'module'     => $this->getRequest()->getModuleName(),
            'controller' => $this->getRequest()->getControllerName(),
            'action'     => $this->getRequest()->getActionName()
        ];
        $this->logger->log(
            Logger::DEBUG,
            'Test debug',
            $debugInfo
            );
        $this->logger->log(Logger::INFO, 'Test Info', $debugInfo);
        $this->logger->log(Logger::NOTICE, 'Test Notice', $debugInfo);
        $this->logger->log(Logger::WARNING, 'Test Warning', $debugInfo);
        $this->logger->log(Logger::ERROR, 'Test Error', $debugInfo);
        $this->logger->log(Logger::CRITICAL, 'Test Critical', $debugInfo);
        $this->logger->log(Logger::ALERT, 'Test Alert', $debugInfo);
        $this->logger->log(Logger::EMERGENCY, 'Test Emergency', $debugInfo);
        $resultPage = $this->resultPageFactory->create();
        return $resultPage;
    }
}
