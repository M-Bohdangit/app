<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace NBG\B2B\Api\Data;

interface NbgB2bOfferItemInterface
{

    const B2B_OFFER_ITEM_OFFER_ID = 'b2b_offer_item_offer_id';
    const B2B_OFFER_ITEM_RESERVED_UNTIL = 'b2b_offer_item_reserved_until';
    const B2B_OFFER_ITEM_CUSTOM_SHIPPING_COST = 'b2b_offer_item_custom_shipping_cost';
    const B2B_OFFER_ITEM_SHOW_LINK_TO_SHOP = 'b2b_offer_item_show_link_to_shop';
    const B2B_OFFER_ITEM_CUSTOM_DESCRIPTION = 'b2b_offer_item_custom_description';
    const NBG_B2B_OFFER_ITEM_ID = 'nbg_b2b_offer_item_id';
    const B2B_OFFER_ITEM_CUSTOM_PRICE = 'b2b_offer_item_custom_price';
    const B2B_OFFER_ITEM_CUSTOM_TITLE = 'b2b_offer_item_custom_title';
    const B2B_OFFER_ITEM_STOCK_ID = 'b2b_offer_item_stock_id';

    /**
     * Get nbg_b2b_offer_item_id
     * @return string|null
     */
    public function getNbgB2bOfferItemId();

    /**
     * Set nbg_b2b_offer_item_id
     * @param string $nbgB2bOfferItemId
     * @return \NBG\B2B\NbgB2bOfferItem\Api\Data\NbgB2bOfferItemInterface
     */
    public function setNbgB2bOfferItemId($nbgB2bOfferItemId);

    /**
     * Get b2b_offer_item_stock_id
     * @return string|null
     */
    public function getB2bOfferItemStockId();

    /**
     * Set b2b_offer_item_stock_id
     * @param string $b2bOfferItemStockId
     * @return \NBG\B2B\NbgB2bOfferItem\Api\Data\NbgB2bOfferItemInterface
     */
    public function setB2bOfferItemStockId($b2bOfferItemStockId);

    /**
     * Get b2b_offer_item_offer_id
     * @return string|null
     */
    public function getB2bOfferItemOfferId();

    /**
     * Set b2b_offer_item_offer_id
     * @param string $b2bOfferItemOfferId
     * @return \NBG\B2B\NbgB2bOfferItem\Api\Data\NbgB2bOfferItemInterface
     */
    public function setB2bOfferItemOfferId($b2bOfferItemOfferId);

    /**
     * Get b2b_offer_item_custom_title
     * @return string|null
     */
    public function getB2bOfferItemCustomTitle();

    /**
     * Set b2b_offer_item_custom_title
     * @param string $b2bOfferItemCustomTitle
     * @return \NBG\B2B\NbgB2bOfferItem\Api\Data\NbgB2bOfferItemInterface
     */
    public function setB2bOfferItemCustomTitle($b2bOfferItemCustomTitle);

    /**
     * Get b2b_offer_item_custom_description
     * @return string|null
     */
    public function getB2bOfferItemCustomDescription();

    /**
     * Set b2b_offer_item_custom_description
     * @param string $b2bOfferItemCustomDescription
     * @return \NBG\B2B\NbgB2bOfferItem\Api\Data\NbgB2bOfferItemInterface
     */
    public function setB2bOfferItemCustomDescription($b2bOfferItemCustomDescription);

    /**
     * Get b2b_offer_item_custom_price
     * @return string|null
     */
    public function getB2bOfferItemCustomPrice();

    /**
     * Set b2b_offer_item_custom_price
     * @param string $b2bOfferItemCustomPrice
     * @return \NBG\B2B\NbgB2bOfferItem\Api\Data\NbgB2bOfferItemInterface
     */
    public function setB2bOfferItemCustomPrice($b2bOfferItemCustomPrice);

    /**
     * Get b2b_offer_item_custom_shipping_cost
     * @return string|null
     */
    public function getB2bOfferItemCustomShippingCost();

    /**
     * Set b2b_offer_item_custom_shipping_cost
     * @param string $b2bOfferItemCustomShippingCost
     * @return \NBG\B2B\NbgB2bOfferItem\Api\Data\NbgB2bOfferItemInterface
     */
    public function setB2bOfferItemCustomShippingCost($b2bOfferItemCustomShippingCost);

    /**
     * Get b2b_offer_item_reserved_until
     * @return string|null
     */
    public function getB2bOfferItemReservedUntil();

    /**
     * Set b2b_offer_item_reserved_until
     * @param string $b2bOfferItemReservedUntil
     * @return \NBG\B2B\NbgB2bOfferItem\Api\Data\NbgB2bOfferItemInterface
     */
    public function setB2bOfferItemReservedUntil($b2bOfferItemReservedUntil);

    /**
     * Get b2b_offer_item_show_link_to_shop
     * @return string|null
     */
    public function getB2bOfferItemShowLinkToShop();

    /**
     * Set b2b_offer_item_show_link_to_shop
     * @param string $b2bOfferItemShowLinkToShop
     * @return \NBG\B2B\NbgB2bOfferItem\Api\Data\NbgB2bOfferItemInterface
     */
    public function setB2bOfferItemShowLinkToShop($b2bOfferItemShowLinkToShop);
}

