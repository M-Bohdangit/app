<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace NBG\B2B\Setup;

use Magento\Eav\Setup\EavSetup;

class B2BSetup extends EavSetup
{

    public function getDefaultEntities()
    {
        return [
             \NBG\B2B\Model\B2B::ENTITY => [
                'entity_model' => \NBG\B2B\Model\ResourceModel\B2B::class,
                'table' => 'nbg_b2b_entity',
                'attributes' => [
                    'title' => [
                        'type' => 'static'
                    ]
                ]
            ]
        ];
    }
}

