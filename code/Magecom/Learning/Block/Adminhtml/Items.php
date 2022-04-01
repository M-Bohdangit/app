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

namespace Magecom\Learning\Block\Adminhtml;

use Magento\Backend\Block\Widget\Grid\Container;

class Items extends Container
{
    protected function _construct()
    {
        $this->_blockGroup = 'Magecom_Learning';
        $this->_controller = 'adminhtml_learning';

        parent::_construct();
    }
}
