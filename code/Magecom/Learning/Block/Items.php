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

use Magento\Framework\View\Element\Template;
use Magecom\Learning\Model\ItemsRepository;
use Magento\Backend\Block\Template\Context;
use Magento\Framework\Api\SearchCriteriaBuilder;

/**
 * Magecom_Learning_Block_Items class
 *
 * @category Magecom
 * @package  Magecom_Learning
 * @author   Magecom
 */
class Items extends Template
{
    /**
     * Item
     *
     * @var \Magecom\Learning\Model\ItemsRepository
     */
    protected $_items;

    /**
     * Search Criteria
     *
     * @var Magento\Framework\Api\SearchCriteriaBuilder
     */
    protected $_searchCriteriaBuilder;

    /**
     * Items constructor.
     *
     * @param Context $context
     * @param \Magecom\Learning\Model\ItemsRepository $items
     * @param \Magento\Framework\Api\SearchCriteriaBuilder $searchCriteriaBuilder
     * @param array $data
     */
    public function __construct(
        Context $context,
        ItemsRepository $items,
        SearchCriteriaBuilder $searchCriteriaBuilder,
        array $data = []
    ) {
        $this->_items= $items;
        $this->_searchCriteriaBuilder = $searchCriteriaBuilder;
        parent::__construct($context, $data);
    }

    /**
     * Items Collection
     *
     * @return Magecom\Learning\Api\Data\ItemsSearchResultsInterface
     */
    public function getItemsCollection()
    {
        $items = $this->_items->getList($this->_searchCriteriaBuilder->create());
        return $items;
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
}
