<?php

namespace Perspective\HelloWorld\Setup;

use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;

class UpgradeData implements UpgradeDataInterface
{
  protected $_postFactory;
  public function __construct(\Perspective\HelloWorld\Model\PostFactory $postFactory)
  {
    $this->_postFactory = $postFactory;
  }
  public function upgrade(
    ModuleDataSetupInterface $setup,
    ModuleContextInterface $context
  ) {
    if (version_compare(
      $context->getVersion(),
      '1.4.0',
      '<'
    )) {
      $data = [
        'name' => "Post3",
        'post_content' => "TestPost3",
        'url_key' => '/magento-2-module-development/magento-2-post3.html',
        'tags' => 'magento 2,perspective helloworld',
        'status' => 1
      ];
      $post = $this->_postFactory->create();
      $post->addData($data)->save();
    }
  }
}
