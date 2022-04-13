<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace NBG\B2B\Api\Data;

interface NbgB2bOfferCustomerInterface
{

    const B2B_OFFER_CUSTOMER_RECEIVED_MAIL_DATE = 'b2b_offer_customer_received_mail_date';
    const B2B_OFFER_ID = 'b2b_offer_id';
    const NBG_B2B_OFFER_CUSTOMER_ID = 'nbg_b2b_offer_customer_id';
    const B2B_OFFER_CUSTOMER = 'b2b_offer_customer';
    const B2B_OFFER_CUSTOMER_RECEIVED_MAIL = 'b2b_offer_customer_received_mail';

    /**
     * Get nbg_b2b_offer_customer_id
     * @return string|null
     */
    public function getNbgB2bOfferCustomerId();

    /**
     * Set nbg_b2b_offer_customer_id
     * @param string $nbgB2bOfferCustomerId
     * @return \NBG\B2B\NbgB2bOfferCustomer\Api\Data\NbgB2bOfferCustomerInterface
     */
    public function setNbgB2bOfferCustomerId($nbgB2bOfferCustomerId);

    /**
     * Get b2b_offer_id
     * @return string|null
     */
    public function getB2bOfferId();

    /**
     * Set b2b_offer_id
     * @param string $b2bOfferId
     * @return \NBG\B2B\NbgB2bOfferCustomer\Api\Data\NbgB2bOfferCustomerInterface
     */
    public function setB2bOfferId($b2bOfferId);

    /**
     * Get b2b_offer_customer
     * @return string|null
     */
    public function getB2bOfferCustomer();

    /**
     * Set b2b_offer_customer
     * @param string $b2bOfferCustomer
     * @return \NBG\B2B\NbgB2bOfferCustomer\Api\Data\NbgB2bOfferCustomerInterface
     */
    public function setB2bOfferCustomer($b2bOfferCustomer);

    /**
     * Get b2b_offer_customer_received_mail
     * @return string|null
     */
    public function getB2bOfferCustomerReceivedMail();

    /**
     * Set b2b_offer_customer_received_mail
     * @param string $b2bOfferCustomerReceivedMail
     * @return \NBG\B2B\NbgB2bOfferCustomer\Api\Data\NbgB2bOfferCustomerInterface
     */
    public function setB2bOfferCustomerReceivedMail($b2bOfferCustomerReceivedMail);

    /**
     * Get b2b_offer_customer_received_mail_date
     * @return string|null
     */
    public function getB2bOfferCustomerReceivedMailDate();

    /**
     * Set b2b_offer_customer_received_mail_date
     * @param string $b2bOfferCustomerReceivedMailDate
     * @return \NBG\B2B\NbgB2bOfferCustomer\Api\Data\NbgB2bOfferCustomerInterface
     */
    public function setB2bOfferCustomerReceivedMailDate($b2bOfferCustomerReceivedMailDate);
}

