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

namespace Magecom\Learning\Block;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\Encryption\EncryptorInterface;
use Magento\Framework\View\Element\Template;
use Magento\Framework\ObjectManagerInterface;

/**
 * Magecom_Learning_Block_Main class
 *
 * @category Magecom
 * @package  Magecom_Learning
 * @author   Magecom
 */
class Main extends Template
{

    private $objectManager;
    /**
     * @var ScopeConfigInterface
     */
    private $config;
    /**
     * @var EncryptorInterface
     */
    private $encryptor;

    public function __construct(
        ObjectManagerInterface $objectManager,
        Template\Context $context,
        ScopeConfigInterface $config,
        EncryptorInterface $encryptor,
        array $data = []
    )
    {
        $this->objectManager = $objectManager;
        parent::__construct($context, $data);
        $this->config = $config;
        $this->encryptor = $encryptor;
    }

    public function getEncrypted()
    {
        return $this->encryptor->decrypt($this->config->getValue('testsection/testgroup2/password'));
    }

    /**
     * Learning Index Index URL
     *
     * @return string
     */
    public function getLearningIndexIndexUrl()
    {
        return $this->getUrl('learning');
    }
    /**
     * Learning Index Front URL
     *
     * @return string
     */
    public function getLearningIndexFrontUrl()
    {
        return $this->getUrl('learning/index/front');
    }
    /**
     * Learning Front Index URL
     *
     * @return string
     */
    public function getLearningFrontIndexUrl()
    {
        return $this->getUrl('learning/front/index');
    }
    /**
     * Learning Front Front URL
     *
     * @return string
     */
    public function getLearningFrontFrontUrl()
    {
        return $this->getUrl('learning/front/front');
    }

    public function getProducts()
    {
        $productRepo = $this->objectManager->get('Magento\Catalog\Api\ProductRepositoryInterface');

        $product = $productRepo->get('24-MB01');
        echo $product->getExtensionAttributes()->getSalesInformation()->getQty() . "\n";
        $product1 = $productRepo->get('24-MB04');
        echo $product1->getExtensionAttributes()->getSalesInformation()->getQty() . "\n";
        echo $product->getExtensionAttributes()->getSalesInformation()->getQty() . "\n";
    }
}
