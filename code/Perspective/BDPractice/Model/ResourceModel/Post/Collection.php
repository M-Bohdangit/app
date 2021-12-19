<?php

namespace Perspective\BDPractice\Model\ResourceModel\Post;

class Collection extends
\Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
  protected $_idFieldName = 'ID';
  protected $_eventPrefix = 'perspective_bdpractice_post_collection';
  protected $_eventObject = 'post_collection';
  /**
   * Define resource model
   *
   * @return void
   */
  protected function _construct()
  {
    $this->_init(
      'Perspective\BDPractice\Model\Post',
      'Perspective\BDPractice\Model\ResourceModel\Post'
    );
  }
}
