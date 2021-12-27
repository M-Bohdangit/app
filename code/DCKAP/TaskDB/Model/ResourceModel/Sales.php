<?php

namespace DCKAP\TaskDB\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Sales extends AbstractDb
{
  public function _construct()
  {
    $this->_init("table_sales", 'id');
  }
}
