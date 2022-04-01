<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace NBG\B2B\Api\Data;

interface B2BSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get B2B list.
     * @return \NBG\B2B\Api\Data\B2BInterface[]
     */
    public function getItems();

    /**
     * Set title list.
     * @param \NBG\B2B\Api\Data\B2BInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}

