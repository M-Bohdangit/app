<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace NBG\B2B\Api\Data;

interface B2BInterface extends \Magento\Framework\Api\ExtensibleDataInterface
{

    const TITLE = 'title';
    const ENTITY_ID = 'entity_id';

    /**
     * Get entity_id
     * @return string|null
     */
    public function getEntityId();

    /**
     * Set entity_id
     * @param string $entityId
     * @return \NBG\B2B\Api\Data\B2BInterface
     */
    public function setEntityId($entityId);

    /**
     * Get title
     * @return string|null
     */
    public function getTitle();

    /**
     * Set title
     * @param string $title
     * @return \NBG\B2B\Api\Data\B2BInterface
     */
    public function setTitle($title);

    /**
     * Retrieve existing extension attributes object or create a new one.
     * @return \NBG\B2B\Api\Data\B2BExtensionInterface|null
     */
    public function getExtensionAttributes();

    /**
     * Set an extension attributes object.
     * @param \NBG\B2B\Api\Data\B2BExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(
        \NBG\B2B\Api\Data\B2BExtensionInterface $extensionAttributes
    );
}

