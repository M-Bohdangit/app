<?php

//3. Добавить в таблицу Продажи поле Стоимость единицы товара

namespace DCKAP\TaskDB\Setup\Patch\Schema;

use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\Setup\Patch\SchemaPatchInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class AddColumn implements SchemaPatchInterface
{
  private $moduleDataSetup;

  public function __construct(
    ModuleDataSetupInterface $moduleDataSetup
  ) {
    $this->moduleDataSetup = $moduleDataSetup;
  }
  /**
   * create a new column
   */
  public function apply()
  {
    $this->moduleDataSetup->startSetup();
    $this->moduleDataSetup->getConnection()->addColumn(
      $this->moduleDataSetup->getTable('table_sales'),
      'price_product',
      [
        'type' => Table::TYPE_INTEGER,
        'padding' => 10, 'nullable' => true, 'unsigned' => true,
        'comment' => 'Price',
      ]
    );
    $this->moduleDataSetup->endSetup();
  }


  public static function getDependencies()
  {
    return [];
  }

  public function getAliases()
  {
    return [];
  }
}
