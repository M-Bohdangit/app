<?php

namespace Perspective\BDPractice\Model;

class Post extends \Magento\Framework\Model\AbstractModel
{
  protected function _construct()
  {
    $this->_init('Perspective\BDPractice\Model\ResourceModel\Post');
  }
}
