<?php
/**
 * Magecom
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to info@magecom.net so we can send you a copy immediately.
 *
 * @category  Magecom
 * @package   Magecom_Module
 * @copyright Copyright (c) 2018 Magecom, Inc. (http://www.magecom.net)
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

namespace Magecom\Learning\Model\Items\Source;

use Magento\Framework\Data\OptionSourceInterface;
use Magecom\Learning\Model\System\Config\State as ConfigState;

/**
 * State class
 *
 * @category Magecom
 * @package Magecom_Module
 * @author Magecom
 */
class State implements OptionSourceInterface
{
    /**
     * @var Magecom\Learning\Model\System\Config\State
     */
    protected $itemsState;

    /*
     * Constructor
     *
     * @param Magecom\Learning\Model\System\Config\State $itemsState
     */
    public function __construct(ConfigState $itemsState)
    {
        $this->itemsState = $itemsState;
    }

    /**
     * Get options
     *
     * @return array
     */
    public function toOptionArray()
    {
        $availableOptions = $this->itemsState->toOptionArray();
        $options = [];
        foreach ($availableOptions as $key => $value) {
            $options[] = [
                'label' => $value,
                'value' => $key,
            ];
        }
        return $options;
    }
}
