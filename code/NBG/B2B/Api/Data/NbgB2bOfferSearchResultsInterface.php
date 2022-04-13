<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace NBG\B2B\Api\Data;

interface NbgB2bOfferSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get nbg_b2b_offer list.
     * @return \NBG\B2B\Api\Data\NbgB2bOfferInterface[]
     */
    public function getItems();

    /**
     * Set b2b_offer_id list.
     * @param \NBG\B2B\Api\Data\NbgB2bOfferInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}

