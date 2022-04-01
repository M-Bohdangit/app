<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace NBG\B2B\Model\ResourceModel\B2B;

class Collection extends \Magento\Eav\Model\Entity\Collection\AbstractCollection
{

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(
            \NBG\B2B\Model\B2B::class,
            \NBG\B2B\Model\ResourceModel\B2B::class
        );
    }
}

