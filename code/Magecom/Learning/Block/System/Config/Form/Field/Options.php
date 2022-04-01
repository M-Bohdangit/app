<?php

namespace Magecom\Learning\Block\System\Config\Form\Field;

use Magecom\Learning\Model\Config\Source\Testoptions;
use Magento\Backend\Block\Template\Context;
use Magento\Config\Model\Config\Source\Yesno;
use Magento\Framework\Data\Form\Element\Factory;

class Options extends \Magento\Config\Block\System\Config\Form\Field\FieldArray\AbstractFieldArray
{
    /**
     * @var Factory
     */
    private $elementFactory;
    /**
     * @var Yesno
     */
    private $yesno;
    /**
     * @var Testoptions
     */
    private $testoptions;

    /**
     * @param Context $context
     * @param Factory $elementFactory
     * @param Yesno $yesno
     * @param Testoptions $testoptions
     * @param array $data
     */
    public function __construct(
        Context $context,
        Factory $elementFactory,
        Yesno $yesno,
        Testoptions $testoptions,
        array $data = []
    ) {
        $this->elementFactory = $elementFactory;
        parent::__construct($context, $data);
        $this->yesno = $yesno;
        $this->testoptions = $testoptions;
    }

    /**
     * Initialise form fields
     *
     * @return void
     */
    protected function _construct()
    {
        $this->addColumn('search', ['label' => __('Method Label')]);
        $this->addColumn('value', ['label' => __('Delivery Days')]);
        $this->addColumn('business', ['label' => __('Is Business')]);
        $this->addColumn('unlimited', ['label' => __('Is Unlimited')]);
        $this->_addAfter = false;
        $this->_addButtonLabel = __('Add Method');
        parent::_construct();
    }

    /**
     * Render array cell for prototypeJS template
     *
     * @param string $columnName
     * @return string
     */
    public function renderCellTemplate($columnName)
    {
        if ($columnName === 'business' && isset($this->_columns[$columnName])) {
            $element = $this->elementFactory->create('checkbox');
            $element->setForm(
                $this->getForm()
            )->setName(
                $this->_getCellInputElementName($columnName)
            )->setHtmlId(
                $this->_getCellInputElementId('<%- _id %>', $columnName)
            )->setValues(
                $this->yesno->toOptionArray()
            );
            return str_replace("\n", '', $element->getElementHtml());
        }
        if ($columnName === 'unlimited' && isset($this->_columns[$columnName])) {
            $element = $this->elementFactory->create('select');
            $element->setForm(
                $this->getForm()
            )->setName(
                $this->_getCellInputElementName($columnName)
            )->setHtmlId(
                $this->_getCellInputElementId('<%- _id %>', $columnName)
            )->setValues(
                $this->testoptions->toOptionArray()
            );
            return str_replace("\n", '', $element->getElementHtml());
        }

        return parent::renderCellTemplate($columnName);
    }
}
