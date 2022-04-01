<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace NBG\B2B\Setup\Patch\Data;

use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;
use NBG\B2B\Setup\B2BSetup;
use NBG\B2B\Setup\B2BSetupFactory;

class DefaultB2BEntity implements DataPatchInterface
{

    /**
     * @var ModuleDataSetupInterface
     */
    private $moduleDataSetup;
    /**
     * @var B2BSetup
     */
    private $b2BSetupFactory;

    /**
     * Constructor
     *
     * @param ModuleDataSetupInterface $moduleDataSetup
     * @param B2BSetupFactory $b2BSetupFactory
     */
    public function __construct(
        ModuleDataSetupInterface $moduleDataSetup,
        B2BSetupFactory $b2BSetupFactory
    ) {
        $this->moduleDataSetup = $moduleDataSetup;
        $this->b2BSetupFactory = $b2BSetupFactory;
    }

    /**
     * {@inheritdoc}
     */
    public function apply()
    {
        $this->moduleDataSetup->getConnection()->startSetup();
        /** @var B2BSetup $customerSetup */
        $b2BSetup = $this->b2BSetupFactory->create(['setup' => $this->moduleDataSetup]);
        $b2BSetup->installEntities();
        

        $this->moduleDataSetup->getConnection()->endSetup();
    }

    /**
     * {@inheritdoc}
     */
    public function getAliases()
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public static function getDependencies()
    {
        return [
        
        ];
    }
}

