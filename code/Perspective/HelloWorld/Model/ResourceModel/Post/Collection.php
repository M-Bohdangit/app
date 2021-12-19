<?php

namespace Perspective\HelloWorld\Model\ResourceModel\Post;

class Collection extends
\Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
  /**
   * Define resource model
   *
   * @return void
   */
  protected function _construct()
  {
    $this->_init(
      'Perspective\HelloWorld\Model\Post',
      'Perspective\HelloWorld\Model\ResourceModel\Post'
    );
  }
}
