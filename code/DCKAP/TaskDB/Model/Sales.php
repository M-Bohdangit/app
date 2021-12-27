<?php

namespace DCKAP\TaskDB\Model;

use Magento\Framework\Model\AbstractModel;

class Sales extends AbstractModel
{
  protected function _construct()
  {
    $this->_init("DCKAP\TaskDB\Model\ResourceModel\Sales");
  }
}
