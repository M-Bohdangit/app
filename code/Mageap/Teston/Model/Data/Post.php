<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Mageap\Teston\Model\Data;

use Mageap\Teston\Api\Data\PostInterface;

class Post extends \Magento\Framework\Api\AbstractExtensibleObject implements PostInterface
{

    /**
     * Get post_id
     * @return string|null
     */
    public function getPostId()
    {
        return $this->_get(self::POST_ID);
    }

    /**
     * Set post_id
     * @param string $postId
     * @return \Mageap\Teston\Api\Data\PostInterface
     */
    public function setPostId($postId)
    {
        return $this->setData(self::POST_ID, $postId);
    }

    /**
     * Retrieve existing extension attributes object or create a new one.
     * @return \Mageap\Teston\Api\Data\PostExtensionInterface|null
     */
    public function getExtensionAttributes()
    {
        return $this->_getExtensionAttributes();
    }

    /**
     * Set an extension attributes object.
     * @param \Mageap\Teston\Api\Data\PostExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(
        \Mageap\Teston\Api\Data\PostExtensionInterface $extensionAttributes
    ) {
        return $this->_setExtensionAttributes($extensionAttributes);
    }
}

