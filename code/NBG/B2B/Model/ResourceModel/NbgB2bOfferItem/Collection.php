<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace NBG\B2B\Model\ResourceModel\NbgB2bOfferItem;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{

    /**
     * @inheritDoc
     */
    protected $_idFieldName = 'nbg_b2b_offer_item_id';

    /**
     * @inheritDoc
     */
    protected function _construct()
    {
        $this->_init(
            \NBG\B2B\Model\NbgB2bOfferItem::class,
            \NBG\B2B\Model\ResourceModel\NbgB2bOfferItem::class
        );
    }
}

