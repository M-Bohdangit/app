<?php


namespace Mageplaza\HelloWorld\Block;

class Index extends \Magento\Framework\View\Element\Template
{
  public function __construct(
    \Magento\Backend\Block\Template\Context $context,
    array $data = []
  ) {

    parent::__construct($context, $data);
  }

  /**
   * hello
   * @return string 
   */
  public function getText()
  {
    return ("hello world");
  }
}
