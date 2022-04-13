<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace NBG\B2B\Model;

use Magento\Framework\Model\AbstractModel;
use NBG\B2B\Api\Data\NbgB2bOfferCustomerInterface;

class NbgB2bOfferCustomer extends AbstractModel implements NbgB2bOfferCustomerInterface
{

    /**
     * @inheritDoc
     */
    public function _construct()
    {
        $this->_init(\NBG\B2B\Model\ResourceModel\NbgB2bOfferCustomer::class);
    }

    /**
     * @inheritDoc
     */
    public function getNbgB2bOfferCustomerId()
    {
        return $this->getData(self::NBG_B2B_OFFER_CUSTOMER_ID);
    }

    /**
     * @inheritDoc
     */
    public function setNbgB2bOfferCustomerId($nbgB2bOfferCustomerId)
    {
        return $this->setData(self::NBG_B2B_OFFER_CUSTOMER_ID, $nbgB2bOfferCustomerId);
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
    public function getB2bOfferCustomer()
    {
        return $this->getData(self::B2B_OFFER_CUSTOMER);
    }

    /**
     * @inheritDoc
     */
    public function setB2bOfferCustomer($b2bOfferCustomer)
    {
        return $this->setData(self::B2B_OFFER_CUSTOMER, $b2bOfferCustomer);
    }

    /**
     * @inheritDoc
     */
    public function getB2bOfferCustomerReceivedMail()
    {
        return $this->getData(self::B2B_OFFER_CUSTOMER_RECEIVED_MAIL);
    }

    /**
     * @inheritDoc
     */
    public function setB2bOfferCustomerReceivedMail($b2bOfferCustomerReceivedMail)
    {
        return $this->setData(self::B2B_OFFER_CUSTOMER_RECEIVED_MAIL, $b2bOfferCustomerReceivedMail);
    }

    /**
     * @inheritDoc
     */
    public function getB2bOfferCustomerReceivedMailDate()
    {
        return $this->getData(self::B2B_OFFER_CUSTOMER_RECEIVED_MAIL_DATE);
    }

    /**
     * @inheritDoc
     */
    public function setB2bOfferCustomerReceivedMailDate($b2bOfferCustomerReceivedMailDate)
    {
        return $this->setData(self::B2B_OFFER_CUSTOMER_RECEIVED_MAIL_DATE, $b2bOfferCustomerReceivedMailDate);
    }
}

