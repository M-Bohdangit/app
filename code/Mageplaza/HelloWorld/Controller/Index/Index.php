<?php

namespace Mageplaza\HelloWorld\Controller\Index;

class Index extends \Magento\Framework\App\Action\Action
{
  // protected $pageFactory;

  // public function __construct(
  //   \Magento\Framework\App\Action\Context $context,
  //   \Magento\Framework\View\Result\PageFactory $pageFactory
  // ) {
  //   $this->pageFactory = $pageFactory;
  //   parent::__construct($context);
  // }

  // public function execute()
  // {
  //   $page = $this->pageFactory->create();
  //   return $page;
  // }

  public function execute()
  {
    die("Hello World");
  }
}
