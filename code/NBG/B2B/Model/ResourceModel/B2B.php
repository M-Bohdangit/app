<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace NBG\B2B\Model\ResourceModel;

class B2B extends \Magento\Eav\Model\Entity\AbstractEntity
{

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->setType('nbg_b2b_offer_item');
    }
}

