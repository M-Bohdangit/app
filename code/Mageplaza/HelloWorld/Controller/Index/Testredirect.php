<?php

declare(strict_types=1);

namespace Mageplaza\HelloWorld\Controller\Index;

use Magento\Framework\App\ActionInterface;

class Testredirect implements ActionInterface
{
  /***
@var \Magento\Framework\Controller\Result\RedirectFactory
   */
  protected $redirectFactory;
  public function __construct(\Magento\Framework\Controller\Result\RedirectFactory $redirectFactory)
  {
    $this->redirectFactory = $redirectFactory;
  }
  public function execute()
  {
    return $this->redirectFactory->create()
      ->setUrl('/hello-world/index/testjson');
  }
}
