<?php

namespace Magecom\Learning\Model\Config\Source;

class Testoptions implements \Magento\Framework\Option\ArrayInterface
{
    public function toOptionArray()
    {
        // TODO: Implement toOptionArray() method.
        return [
            ['value' => 0, 'label' => 'Zero'],
            ['value' => 1, 'label' => 'First'],
            ['value' => 2, 'label' => 'Second']
        ];
    }
}
