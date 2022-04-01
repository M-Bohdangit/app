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

namespace Magecom\Learning\Api;

use Magento\Framework\Api\SearchCriteriaInterface;
use Magecom\Learning\Api\Data\ItemsInterface;

/**
 * Magecom_Learning_Api_ItemsRepositoryInterface interface
 *
 * @category Magecom
 * @package  Magecom_Learning
 * @author   Magecom
 */
interface ItemsRepositoryInterface
{
    /**
     * Save page.
     *
     * @param \Magecom\Learning\Api\Data\ItemsInterface $items
     * @return \Magecom\Learning\Api\Data\ItemsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(ItemsInterface $items);
    /**
     * Retrieve items.
     *
     * @param int $itemsId
     * @return \Magecom\Learning\Api\Data\ItemsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getById($itemsId);
    /**
     * Retrieve items matching the specified criteria.
     *
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Magecom\Learning\Api\Data\ItemsSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(SearchCriteriaInterface $searchCriteria);
    /**
     * Delete items.
     *
     * @param \Magecom\Learning\Api\Data\ItemsInterface $items
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(ItemsInterface $items);
    /**
     * Delete items by ID.
     *
     * @param int $itemsId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($itemsId);
}
