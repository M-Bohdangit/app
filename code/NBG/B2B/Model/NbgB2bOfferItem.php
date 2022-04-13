<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace NBG\B2B\Model;

use Magento\Framework\Model\AbstractModel;
use NBG\B2B\Api\Data\NbgB2bOfferItemInterface;

class NbgB2bOfferItem extends AbstractModel implements NbgB2bOfferItemInterface
{

    /**
     * @inheritDoc
     */
    public function _construct()
    {
        $this->_init(\NBG\B2B\Model\ResourceModel\NbgB2bOfferItem::class);
    }

    /**
     * @inheritDoc
     */
    public function getNbgB2bOfferItemId()
    {
        return $this->getData(self::NBG_B2B_OFFER_ITEM_ID);
    }

    /**
     * @inheritDoc
     */
    public function setNbgB2bOfferItemId($nbgB2bOfferItemId)
    {
        return $this->setData(self::NBG_B2B_OFFER_ITEM_ID, $nbgB2bOfferItemId);
    }

    /**
     * @inheritDoc
     */
    public function getB2bOfferItemStockId()
    {
        return $this->getData(self::B2B_OFFER_ITEM_STOCK_ID);
    }

    /**
     * @inheritDoc
     */
    public function setB2bOfferItemStockId($b2bOfferItemStockId)
    {
        return $this->setData(self::B2B_OFFER_ITEM_STOCK_ID, $b2bOfferItemStockId);
    }

    /**
     * @inheritDoc
     */
    public function getB2bOfferItemOfferId()
    {
        return $this->getData(self::B2B_OFFER_ITEM_OFFER_ID);
    }

    /**
     * @inheritDoc
     */
    public function setB2bOfferItemOfferId($b2bOfferItemOfferId)
    {
        return $this->setData(self::B2B_OFFER_ITEM_OFFER_ID, $b2bOfferItemOfferId);
    }

    /**
     * @inheritDoc
     */
    public function getB2bOfferItemCustomTitle()
    {
        return $this->getData(self::B2B_OFFER_ITEM_CUSTOM_TITLE);
    }

    /**
     * @inheritDoc
     */
    public function setB2bOfferItemCustomTitle($b2bOfferItemCustomTitle)
    {
        return $this->setData(self::B2B_OFFER_ITEM_CUSTOM_TITLE, $b2bOfferItemCustomTitle);
    }

    /**
     * @inheritDoc
     */
    public function getB2bOfferItemCustomDescription()
    {
        return $this->getData(self::B2B_OFFER_ITEM_CUSTOM_DESCRIPTION);
    }

    /**
     * @inheritDoc
     */
    public function setB2bOfferItemCustomDescription($b2bOfferItemCustomDescription)
    {
        return $this->setData(self::B2B_OFFER_ITEM_CUSTOM_DESCRIPTION, $b2bOfferItemCustomDescription);
    }

    /**
     * @inheritDoc
     */
    public function getB2bOfferItemCustomPrice()
    {
        return $this->getData(self::B2B_OFFER_ITEM_CUSTOM_PRICE);
    }

    /**
     * @inheritDoc
     */
    public function setB2bOfferItemCustomPrice($b2bOfferItemCustomPrice)
    {
        return $this->setData(self::B2B_OFFER_ITEM_CUSTOM_PRICE, $b2bOfferItemCustomPrice);
    }

    /**
     * @inheritDoc
     */
    public function getB2bOfferItemCustomShippingCost()
    {
        return $this->getData(self::B2B_OFFER_ITEM_CUSTOM_SHIPPING_COST);
    }

    /**
     * @inheritDoc
     */
    public function setB2bOfferItemCustomShippingCost($b2bOfferItemCustomShippingCost)
    {
        return $this->setData(self::B2B_OFFER_ITEM_CUSTOM_SHIPPING_COST, $b2bOfferItemCustomShippingCost);
    }

    /**
     * @inheritDoc
     */
    public function getB2bOfferItemReservedUntil()
    {
        return $this->getData(self::B2B_OFFER_ITEM_RESERVED_UNTIL);
    }

    /**
     * @inheritDoc
     */
    public function setB2bOfferItemReservedUntil($b2bOfferItemReservedUntil)
    {
        return $this->setData(self::B2B_OFFER_ITEM_RESERVED_UNTIL, $b2bOfferItemReservedUntil);
    }

    /**
     * @inheritDoc
     */
    public function getB2bOfferItemShowLinkToShop()
    {
        return $this->getData(self::B2B_OFFER_ITEM_SHOW_LINK_TO_SHOP);
    }

    /**
     * @inheritDoc
     */
    public function setB2bOfferItemShowLinkToShop($b2bOfferItemShowLinkToShop)
    {
        return $this->setData(self::B2B_OFFER_ITEM_SHOW_LINK_TO_SHOP, $b2bOfferItemShowLinkToShop);
    }
}

