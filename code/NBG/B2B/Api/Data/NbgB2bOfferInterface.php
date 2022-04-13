<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace NBG\B2B\Api\Data;

interface NbgB2bOfferInterface
{

    const B2B_OFFER_SHIPPING_COST = 'b2b_offer_shipping_cost';
    const B2B_OFFER_MAIL_TEXT = 'b2b_offer_mail_text';
    const B2B_OFFER_CREATED_BY_ID = 'b2b_offer_created_by_id';
    const B2B_OFFER_CREATED_BY_LABEL = 'b2b_offer_created_by_label';
    const B2B_OFFER_CLOSED_AT = 'b2b_offer_closed_at';
    const B2B_OFFER_CLOSED_AS = 'b2b_offer_closed_as';
    const B2B_OFFER_CREATED_AT = 'b2b_offer_created_at';
    const NBG_B2B_OFFER_ID = 'nbg_b2b_offer_id';
    const B2B_OFFER_ID = 'b2b_offer_id';
    const B2B_OFFER_VALID_UNTIL = 'b2b_offer_valid_until';

    /**
     * Get nbg_b2b_offer_id
     * @return string|null
     */
    public function getNbgB2bOfferId();

    /**
     * Set nbg_b2b_offer_id
     * @param string $nbgB2bOfferId
     * @return \NBG\B2B\NbgB2bOffer\Api\Data\NbgB2bOfferInterface
     */
    public function setNbgB2bOfferId($nbgB2bOfferId);

    /**
     * Get b2b_offer_id
     * @return string|null
     */
    public function getB2bOfferId();

    /**
     * Set b2b_offer_id
     * @param string $b2bOfferId
     * @return \NBG\B2B\NbgB2bOffer\Api\Data\NbgB2bOfferInterface
     */
    public function setB2bOfferId($b2bOfferId);

    /**
     * Get b2b_offer_shipping_cost
     * @return string|null
     */
    public function getB2bOfferShippingCost();

    /**
     * Set b2b_offer_shipping_cost
     * @param string $b2bOfferShippingCost
     * @return \NBG\B2B\NbgB2bOffer\Api\Data\NbgB2bOfferInterface
     */
    public function setB2bOfferShippingCost($b2bOfferShippingCost);

    /**
     * Get b2b_offer_created_by_id
     * @return string|null
     */
    public function getB2bOfferCreatedById();

    /**
     * Set b2b_offer_created_by_id
     * @param string $b2bOfferCreatedById
     * @return \NBG\B2B\NbgB2bOffer\Api\Data\NbgB2bOfferInterface
     */
    public function setB2bOfferCreatedById($b2bOfferCreatedById);

    /**
     * Get b2b_offer_created_by_label
     * @return string|null
     */
    public function getB2bOfferCreatedByLabel();

    /**
     * Set b2b_offer_created_by_label
     * @param string $b2bOfferCreatedByLabel
     * @return \NBG\B2B\NbgB2bOffer\Api\Data\NbgB2bOfferInterface
     */
    public function setB2bOfferCreatedByLabel($b2bOfferCreatedByLabel);

    /**
     * Get b2b_offer_created_at
     * @return string|null
     */
    public function getB2bOfferCreatedAt();

    /**
     * Set b2b_offer_created_at
     * @param string $b2bOfferCreatedAt
     * @return \NBG\B2B\NbgB2bOffer\Api\Data\NbgB2bOfferInterface
     */
    public function setB2bOfferCreatedAt($b2bOfferCreatedAt);

    /**
     * Get b2b_offer_mail_text
     * @return string|null
     */
    public function getB2bOfferMailText();

    /**
     * Set b2b_offer_mail_text
     * @param string $b2bOfferMailText
     * @return \NBG\B2B\NbgB2bOffer\Api\Data\NbgB2bOfferInterface
     */
    public function setB2bOfferMailText($b2bOfferMailText);

    /**
     * Get b2b_offer_closed_at
     * @return string|null
     */
    public function getB2bOfferClosedAt();

    /**
     * Set b2b_offer_closed_at
     * @param string $b2bOfferClosedAt
     * @return \NBG\B2B\NbgB2bOffer\Api\Data\NbgB2bOfferInterface
     */
    public function setB2bOfferClosedAt($b2bOfferClosedAt);

    /**
     * Get b2b_offer_closed_as
     * @return string|null
     */
    public function getB2bOfferClosedAs();

    /**
     * Set b2b_offer_closed_as
     * @param string $b2bOfferClosedAs
     * @return \NBG\B2B\NbgB2bOffer\Api\Data\NbgB2bOfferInterface
     */
    public function setB2bOfferClosedAs($b2bOfferClosedAs);

    /**
     * Get b2b_offer_valid_until
     * @return string|null
     */
    public function getB2bOfferValidUntil();

    /**
     * Set b2b_offer_valid_until
     * @param string $b2bOfferValidUntil
     * @return \NBG\B2B\NbgB2bOffer\Api\Data\NbgB2bOfferInterface
     */
    public function setB2bOfferValidUntil($b2bOfferValidUntil);
}

