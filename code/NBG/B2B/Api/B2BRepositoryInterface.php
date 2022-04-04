<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace NBG\B2B\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface B2BRepositoryInterface
{

    /**
     * Save B2B
     * @param \NBG\B2B\Api\Data\B2BInterface $b2B
     * @return \NBG\B2B\Api\Data\B2BInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(\NBG\B2B\Api\Data\B2BInterface $b2B);

    /**
     * Retrieve B2B
     * @param string $entityId
     * @return \NBG\B2B\Api\Data\B2BInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function get($entityId);

    /**
     * Retrieve B2B matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \NBG\B2B\Api\Data\B2BSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * Delete B2B
     * @param \NBG\B2B\Api\Data\B2BInterface $b2B
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(\NBG\B2B\Api\Data\B2BInterface $b2B);

    /**
     * Delete B2B by ID
     * @param string $entityId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($entityId);
}

