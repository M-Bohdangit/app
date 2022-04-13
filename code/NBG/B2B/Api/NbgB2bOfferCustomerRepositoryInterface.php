<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace NBG\B2B\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface NbgB2bOfferCustomerRepositoryInterface
{

    /**
     * Save nbg_b2b_offer_customer
     * @param \NBG\B2B\Api\Data\NbgB2bOfferCustomerInterface $nbgB2bOfferCustomer
     * @return \NBG\B2B\Api\Data\NbgB2bOfferCustomerInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(
        \NBG\B2B\Api\Data\NbgB2bOfferCustomerInterface $nbgB2bOfferCustomer
    );

    /**
     * Retrieve nbg_b2b_offer_customer
     * @param string $nbgB2bOfferCustomerId
     * @return \NBG\B2B\Api\Data\NbgB2bOfferCustomerInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function get($nbgB2bOfferCustomerId);

    /**
     * Retrieve nbg_b2b_offer_customer matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \NBG\B2B\Api\Data\NbgB2bOfferCustomerSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * Delete nbg_b2b_offer_customer
     * @param \NBG\B2B\Api\Data\NbgB2bOfferCustomerInterface $nbgB2bOfferCustomer
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(
        \NBG\B2B\Api\Data\NbgB2bOfferCustomerInterface $nbgB2bOfferCustomer
    );

    /**
     * Delete nbg_b2b_offer_customer by ID
     * @param string $nbgB2bOfferCustomerId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($nbgB2bOfferCustomerId);
}

