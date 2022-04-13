<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace NBG\B2B\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface NbgB2bOfferRepositoryInterface
{

    /**
     * Save nbg_b2b_offer
     * @param \NBG\B2B\Api\Data\NbgB2bOfferInterface $nbgB2bOffer
     * @return \NBG\B2B\Api\Data\NbgB2bOfferInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(
        \NBG\B2B\Api\Data\NbgB2bOfferInterface $nbgB2bOffer
    );

    /**
     * Retrieve nbg_b2b_offer
     * @param string $nbgB2bOfferId
     * @return \NBG\B2B\Api\Data\NbgB2bOfferInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function get($nbgB2bOfferId);

    /**
     * Retrieve nbg_b2b_offer matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \NBG\B2B\Api\Data\NbgB2bOfferSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * Delete nbg_b2b_offer
     * @param \NBG\B2B\Api\Data\NbgB2bOfferInterface $nbgB2bOffer
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(
        \NBG\B2B\Api\Data\NbgB2bOfferInterface $nbgB2bOffer
    );

    /**
     * Delete nbg_b2b_offer by ID
     * @param string $nbgB2bOfferId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($nbgB2bOfferId);
}

