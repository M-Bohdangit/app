<?php

/**
 * Magecom
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to info@magecom.net so we can send you a copy immediately.
 *
 * @category  Magecom
 * @package   Magecom_Module
 * @copyright Copyright (c) ${YEAR} Magecom, Inc. (http://www.magecom.net)
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

namespace  Magecom\Learning\Setup;

use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

/**
 * Class UpgradeSchema
 *
 * Short Description
 *
 * Long Description
 *
 * @category Magecom\Learning\Setup\UpgradeSchema
 * @package  Magecom_Learning
 * @author   Max Dmitriev <mdmitriev@magecom.us>
 * @license  http://www.gnu.org/licenses/gpl.html GPL v3
 * @link     http://magecom.us
 */
class UpgradeSchema implements UpgradeSchemaInterface
{
    /**
     * UpgradeSchema
     *
     * @param SchemaSetupInterface   $setup   SchemaSetupInterface
     * @param ModuleContextInterface $context ModuleContextInterface
     *
     * @return Null
     */
    public function upgrade(
        SchemaSetupInterface $setup,
        ModuleContextInterface $context
    ) {
        if (version_compare($context->getVersion(), '0.0.2') < 0) {
            $installer = $setup;

            $installer->startSetup();

            $connection = $setup->getConnection();

            $connection->addColumn(
                $setup->getTable('items'),
                'status',
                [
                    'type' => \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                    'default' => 0,
                    'unsigned' => true,
                    'comment' => 'Status Field'
                ]
            );

            $installer->endSetup();
        }
    }
}
