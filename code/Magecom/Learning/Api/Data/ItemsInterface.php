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

namespace Magecom\Learning\Api\Data;

/**
 * Magecom_Learning_API_ItemsRepositoryInterface interface
 *
 * @category Magecom
 * @package  Magecom_Learning
 * @author   Magecom
 */
interface ItemsInterface
{
    /**
     * Get ID
     *
     * @return int|null
     */
    public function getId();
    /**
     * Get title
     *
     * @return string|null
     */
    public function getTitle();

    /**
     * Get content
     *
     * @return string|null
     */
    public function getContent();

    /**
     * Get url_key
     *
     * @return string|null
     */
    public function getUrlKey();
    /**
     * Get creation_time
     *
     * @return string|null
     */
    public function getCreationTime();
    /**
     * Get update_time
     *
     * @return string|null
     */
    public function getUpdateTime();
    /**
     * Set ID
     *
     * @param int $id
     * @return \Magecom\Learning\Api\Data\ItemsInterface
     */
    public function setId($id);

    /**
     * Set title
     *
     * @param string $title
     * @return \Magecom\Learning\Api\Data\ItemsInterface
     */
    public function setTitle($title);
    /**
     * Set content
     *
     * @param string $content
     * @return \Magecom\Learning\Api\Data\ItemsInterface
     */
    public function setContent($content);
    /**
     * Set url key
     *
     * @param string $urlKey
     * @return \Magecom\Learning\Api\Data\ItemsInterface
     */
    public function setUrlKey($urlKey);

    /**
     * Set creation time
     *
     * @param string $creationTime
     * @return \Magecom\Learning\Api\Data\ItemsInterface
     */
    public function setCreationTime($creationTime);

    /**
     * Set update time
     *
     * @param string $updateTime
     * @return \Magecom\Learning\Api\Data\ItemsInterface
     */
    public function setUpdateTime($updateTime);
}
