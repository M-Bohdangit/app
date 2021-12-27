<?php

namespace DCKAP\TaskDB\Model\ResourceModel\Sales;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
  protected function _construct()
  {
    $this->_init(
      'DCKAP\TaskDB\Model\Sales',
      'DCKAP\TaskDB\Model\ResourceModel\Sales'
    );
  }
}
