<?php

namespace Perspective\BDPractice\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class InstallData implements InstallDataInterface
{
  protected $_postFactory;
  public function __construct(\Perspective\BDPractice\Model\PostFactory $postFactory)
  {
    $this->_postFactory = $postFactory;
  }
  public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
  {
    $data = [
      [
        'IDCat' => "5",
        'IDProd' => "15",
        'TextRev' => "Review1, Affirm Water Bottle ",
        'Name' => "Denis",
        'Email' => "Denis@mail.com"
      ],
      [
        'IDCat' => "5",
        'IDProd' => "15",
        'TextRev' => "Review2, Affirm Water Bottle great product",
        'Name' => "Sofia",
        'Email' => "Sofia@mail.com"
      ],
      [
        'IDCat' => "5",
        'IDProd' => "15",
        'TextRev' => "Review3, Affirm Water Bottle  terrible product",
        'Name' => "Filip",
        'Email' => "Filip@mail.com"
      ],
      [
        'IDCat' => "16",
        'IDProd' => "438",
        'TextRev' => "Review4, Gobi HeatTec® Tee",
        'Name' => "Marina",
        'Email' => "Marina@mail.com"
      ],
      [
        'IDCat' => "18",
        'IDProd' => "732",
        'TextRev' => "Review5, Caesar Warm-Up Pant",
        'Name' => "Vaso",
        'Email' => "Vaso@mail.com"
      ],
      [
        'IDCat' => "5",
        'IDProd' => "17",
        'TextRev' => "Review6, Affirm Water Bottle  ",
        'Name' => "Gera",
        'Email' => "Gera@mail.com"
      ],
    ];

    foreach ($data as $elem) {
      $post = $this->_postFactory->create();
      $post->addData($elem)->save();
    }
  }
}
