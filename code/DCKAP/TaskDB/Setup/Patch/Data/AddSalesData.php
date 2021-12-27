<?php

namespace DCKAP\TaskDB\Setup\Patch\Data;

use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\Setup\Patch\PatchVersionInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use DCKAP\TaskDB\Model\SalesFactory;
use DCKAP\TaskDB\Model\ResourceModel\Sales;

class AddSalesData implements DataPatchInterface, PatchVersionInterface
{
  private $salesFactory;
  private $salesResource;
  private $moduleDataSetup;

  public function __construct(
    SalesFactory $salesFactory,
    Sales $salesResource,
    ModuleDataSetupInterface $moduleDataSetup
  ) {
    $this->salesFactory = $salesFactory;
    $this->salesResource = $salesResource;
    $this->moduleDataSetup = $moduleDataSetup;
  }

  /**
   * Install data row into table
   */
  // Заполнить таблицу пятью записями о продажах. Предусмотреть, чтобы две продажи имели одинаковое название товара.

  public function apply()
  {

    $this->moduleDataSetup->startSetup();

    $saleDT1 = $this->salesFactory->create();
    $saleDT1->setProductName('Pants')
      ->setQuantity(10)
      ->setDate('2021-12-27')
      ->setDiscount(0.1)
      ->setPriceProduct(10);
    $this->salesResource->save($saleDT1);

    $saleDT2 = $this->salesFactory->create();
    $saleDT2->setProductName('Pants')
      ->setQuantity(20)
      ->setDate('2021-12-27')
      ->setDiscount(0.2)
      ->setPriceProduct(20);
    $this->salesResource->save($saleDT2);

    $saleDT3 = $this->salesFactory->create();
    $saleDT3->setProductName('T-shirt')
      ->setQuantity(30)
      ->setDate('2021-12-27')
      ->setDiscount(0.3)
      ->setPriceProduct(30);
    $this->salesResource->save($saleDT3);

    $saleDT4 = $this->salesFactory->create();
    $saleDT4->setProductName('Sweater')
      ->setQuantity(40)
      ->setDate('2021-12-27')
      ->setDiscount(0.4)
      ->setPriceProduct(40);
    $this->salesResource->save($saleDT4);

    $saleDT5 = $this->salesFactory->create();
    $saleDT5->setProductName('Pullover')
      ->setQuantity(50)
      ->setDate('2021-12-27')
      ->setDiscount(0.5)
      ->setPriceProduct(50);
    $this->salesResource->save($saleDT5);

    $saleDT6 = $this->salesFactory->create();
    $saleDT6->setProductName('Shoes')
      ->setQuantity(60)
      ->setDate('2021-12-27')
      ->setDiscount(0.6)
      ->setPriceProduct(60);
    $this->salesResource->save($saleDT6);

    $saleDT7 = $this->salesFactory->create();
    $saleDT7->setProductName('Sneakers')
      ->setQuantity(70)
      ->setDate('2021-12-27')
      ->setDiscount(0.7)
      ->setPriceProduct(70);
    $this->salesResource->save($saleDT7);

    $this->moduleDataSetup->endSetup();
  }

  public static function getDependencies()
  {
    return [];
  }

  public static function getVersion()
  {
    return '1.0.1';
  }

  public function getAliases()
  {
    return [];
  }
}
