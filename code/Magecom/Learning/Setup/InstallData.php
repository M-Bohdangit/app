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

namespace Magecom\Learning\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

/**
 * Magecom_Learning_Setup_InstallData class
 *
 * @category Magecom
 * @package  Magecom_Learning
 * @author   Max Dmitriev <mdmitriev@magecom.us>
 * @license  http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @link     http://www.magecom.net
 */
class InstallData implements InstallDataInterface
{
    /**
     * Install Method
     *
     * @param ModuleDataSetupInterface $setup   ModuleDataSetupInterface
     * @param ModuleContextInterface   $context ModuleContextInterface
     *
     * @return null
     */
    public function install(
        ModuleDataSetupInterface $setup,
        ModuleContextInterface $context
    ) {
        $setup->startSetup();

        $data = [[
            'title' => 'Test title 1',
            'content' => 'Test content 1',
            'url_key' => 'test_url_key_1',
            'creation_time' => new \Zend_Db_Expr('now()'),
        ],[
            'title' => 'Test title 2',
            'content' => 'Test content 2',
            'url_key' => 'test_url_key_2',
            'creation_time' => new \Zend_Db_Expr('now()'),
        ],[
            'title' => 'Test title 3',
            'content' => 'Test content 3',
            'url_key' => 'test_url_key_3',
            'creation_time' => new \Zend_Db_Expr('now()'),
        ]];

        $dataCols = [
            'title',
            'content',
            'url_key',
            'creation_time'
        ];

        $dataValues = [[
            'Test title 4',
            'Test Content 4',
            'test_url_key_4',
            new \Zend_Db_Expr('now()')
        ],[
            'Test title 4',
            'Test Content 4',
            'test_url_key_4',
            new \Zend_Db_Expr('now()')
        ]];

        $setup->getConnection()
            ->insertMultiple($setup->getTable('items'), $data);

        $setup->getConnection()
            ->insertArray($setup->getTable('items'), $dataCols, $dataValues);

        $setup->endSetup();
    }
}
