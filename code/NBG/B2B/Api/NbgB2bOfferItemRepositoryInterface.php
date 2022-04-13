<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace NBG\B2B\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface NbgB2bOfferItemRepositoryInterface
{

    /**
     * Save nbg_b2b_offer_item
     * @param \NBG\B2B\Api\Data\NbgB2bOfferItemInterface $nbgB2bOfferItem
     * @return \NBG\B2B\Api\Data\NbgB2bOfferItemInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(
        \NBG\B2B\Api\Data\NbgB2bOfferItemInterface $nbgB2bOfferItem
    );

    /**
     * Retrieve nbg_b2b_offer_item
     * @param string $nbgB2bOfferItemId
     * @return \NBG\B2B\Api\Data\NbgB2bOfferItemInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function get($nbgB2bOfferItemId);

    /**
     * Retrieve nbg_b2b_offer_item matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \NBG\B2B\Api\Data\NbgB2bOfferItemSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * Delete nbg_b2b_offer_item
     * @param \NBG\B2B\Api\Data\NbgB2bOfferItemInterface $nbgB2bOfferItem
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(
        \NBG\B2B\Api\Data\NbgB2bOfferItemInterface $nbgB2bOfferItem
    );

    /**
     * Delete nbg_b2b_offer_item by ID
     * @param string $nbgB2bOfferItemId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($nbgB2bOfferItemId);
}

