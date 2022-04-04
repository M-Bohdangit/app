<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Mageap\Teston\Api\Data;

interface PostSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get Post list.
     * @return \Mageap\Teston\Api\Data\PostInterface[]
     */
    public function getItems();

    /**
     * Set post_id list.
     * @param \Mageap\Teston\Api\Data\PostInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}

