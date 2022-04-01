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
 * @copyright Copyright (c) 2018 Magecom, Inc. (http://www.magecom.net)
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

namespace Magecom\Learning\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

/**
 * ItemsSearchResultsInterface interface
 *
 * @category Magecom
 * @package Magecom_Module
 * @author Magecom
 */
interface ItemsSearchResultsInterface extends SearchResultsInterface
{
    /**
     * Get items list.
     *
     * @return \Magecom\Learning\Api\Data\ItemsInterface[]
     */
    public function getItems();

    /**
     * Set pages list.
     *
     * @param \Magecom\Learning\Api\Data\ItemsInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
