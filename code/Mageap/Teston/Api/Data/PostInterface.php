<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Mageap\Teston\Api\Data;

interface PostInterface extends \Magento\Framework\Api\ExtensibleDataInterface
{

    const POST_ID = 'post_id';

    /**
     * Get post_id
     * @return string|null
     */
    public function getPostId();

    /**
     * Set post_id
     * @param string $postId
     * @return \Mageap\Teston\Api\Data\PostInterface
     */
    public function setPostId($postId);

    /**
     * Retrieve existing extension attributes object or create a new one.
     * @return \Mageap\Teston\Api\Data\PostExtensionInterface|null
     */
    public function getExtensionAttributes();

    /**
     * Set an extension attributes object.
     * @param \Mageap\Teston\Api\Data\PostExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(
        \Mageap\Teston\Api\Data\PostExtensionInterface $extensionAttributes
    );
}

