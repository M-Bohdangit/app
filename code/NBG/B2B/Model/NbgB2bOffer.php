<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace NBG\B2B\Model;

use Magento\Framework\Model\AbstractModel;
use NBG\B2B\Api\Data\NbgB2bOfferInterface;

class NbgB2bOffer extends AbstractModel implements NbgB2bOfferInterface
{

    /**
     * @inheritDoc
     */
    public function _construct()
    {
        $this->_init(\NBG\B2B\Model\ResourceModel\NbgB2bOffer::class);
    }

    /**
     * @inheritDoc
     */
    public function getNbgB2bOfferId()
    {
        return $this->getData(self::NBG_B2B_OFFER_ID);
    }

    /**
     * @inheritDoc
     */
    public function setNbgB2bOfferId($nbgB2bOfferId)
    {
        return $this->setData(self::NBG_B2B_OFFER_ID, $nbgB2bOfferId);
    }

    /**
     * @inheritDoc
     */
    public function getB2bOfferId()
    {
        return $this->getData(self::B2B_OFFER_ID);
    }

    /**
     * @inheritDoc
     */
    public function setB2bOfferId($b2bOfferId)
    {
        return $this->setData(self::B2B_OFFER_ID, $b2bOfferId);
    }

    /**
     * @inheritDoc
     */
    public function getB2bOfferShippingCost()
    {
        return $this->getData(self::B2B_OFFER_SHIPPING_COST);
    }

    /**
     * @inheritDoc
     */
    public function setB2bOfferShippingCost($b2bOfferShippingCost)
    {
        return $this->setData(self::B2B_OFFER_SHIPPING_COST, $b2bOfferShippingCost);
    }

    /**
     * @inheritDoc
     */
    public function getB2bOfferCreatedById()
    {
        return $this->getData(self::B2B_OFFER_CREATED_BY_ID);
    }

    /**
     * @inheritDoc
     */
    public function setB2bOfferCreatedById($b2bOfferCreatedById)
    {
        return $this->setData(self::B2B_OFFER_CREATED_BY_ID, $b2bOfferCreatedById);
    }

    /**
     * @inheritDoc
     */
    public function getB2bOfferCreatedByLabel()
    {
        return $this->getData(self::B2B_OFFER_CREATED_BY_LABEL);
    }

    /**
     * @inheritDoc
     */
    public function setB2bOfferCreatedByLabel($b2bOfferCreatedByLabel)
    {
        return $this->setData(self::B2B_OFFER_CREATED_BY_LABEL, $b2bOfferCreatedByLabel);
    }

    /**
     * @inheritDoc
     */
    public function getB2bOfferCreatedAt()
    {
        return $this->getData(self::B2B_OFFER_CREATED_AT);
    }

    /**
     * @inheritDoc
     */
    public function setB2bOfferCreatedAt($b2bOfferCreatedAt)
    {
        return $this->setData(self::B2B_OFFER_CREATED_AT, $b2bOfferCreatedAt);
    }

    /**
     * @inheritDoc
     */
    public function getB2bOfferMailText()
    {
        return $this->getData(self::B2B_OFFER_MAIL_TEXT);
    }

    /**
     * @inheritDoc
     */
    public function setB2bOfferMailText($b2bOfferMailText)
    {
        return $this->setData(self::B2B_OFFER_MAIL_TEXT, $b2bOfferMailText);
    }

    /**
     * @inheritDoc
     */
    public function getB2bOfferClosedAt()
    {
        return $this->getData(self::B2B_OFFER_CLOSED_AT);
    }

    /**
     * @inheritDoc
     */
    public function setB2bOfferClosedAt($b2bOfferClosedAt)
    {
        return $this->setData(self::B2B_OFFER_CLOSED_AT, $b2bOfferClosedAt);
    }

    /**
     * @inheritDoc
     */
    public function getB2bOfferClosedAs()
    {
        return $this->getData(self::B2B_OFFER_CLOSED_AS);
    }

    /**
     * @inheritDoc
     */
    public function setB2bOfferClosedAs($b2bOfferClosedAs)
    {
        return $this->setData(self::B2B_OFFER_CLOSED_AS, $b2bOfferClosedAs);
    }

    /**
     * @inheritDoc
     */
    public function getB2bOfferValidUntil()
    {
        return $this->getData(self::B2B_OFFER_VALID_UNTIL);
    }

    /**
     * @inheritDoc
     */
    public function setB2bOfferValidUntil($b2bOfferValidUntil)
    {
        return $this->setData(self::B2B_OFFER_VALID_UNTIL, $b2bOfferValidUntil);
    }
}

