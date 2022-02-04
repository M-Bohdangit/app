<?php

namespace TestTasks\Timer\ViewModel;

use Magento\Catalog\Api\Data\ProductInterface;
use Magento\CatalogRule\Model\Rule;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\View\Element\Block\ArgumentInterface;
use TestTasks\Timer\Registry\CurrentProduct;

class ViewModel implements ArgumentInterface
{

    /**
     * Rule collection
     *
     * @var object
     */
    protected $rules;
    /**
     * Catalog session
     *
     * @var currentProduct
     */
    protected CurrentProduct $currentProduct;
    /**


    /**
     * Constructor
     *
     * @param CurrentProduct $currentProduct CurrentProduct
     * @param Rule $rules Rule
     */
    public function __construct(
        CurrentProduct $currentProduct,
        Rule           $rules,
    ) {

        $this->rules = $rules;
        $this->currentProduct = $currentProduct;
    }



    /**
     * Get current product
     *
     * @return ProductInterface
     */
    public function getCurrentProduct(): ProductInterface
    {

        return $this->currentProduct->get();
    }

    /**
     * Get current product simple
     *
     * @return bool
     */
    public function isSimpleProduct(): bool
    {
        if ($this->getCurrentProduct()->getTypeId() == 'simple') {
            return true;
        }
        return false;
    }

    /**
     * Special Price End
     *
     * @return string
     */
    public function getSpecialPriceEnd(): string
    {
        if ($this->isSimpleProduct()) {
            $currentProduct = $this->getCurrentProduct();
            $priceEnd = $currentProduct->getSpecialToDate();
            if ($priceEnd !== false) {
                $date = date_create($priceEnd);
                return $date->Format('Y-m-d');
            }
            return '';
        }
        return '';
    }

    /**
     * Get rule price end date
     *
     * @return mixed
     *
     * @throws LocalizedException
     */
    public function getRulePriceEnd()
    {
        if ($this->isSimpleProduct()) {
            $rulesResoutseCollection = $this->rules->getResourceCollection();
            $rules = $rulesResoutseCollection->addFieldToFilter('is_active', 1);
            $productId = $this->getCurrentProduct()->getData('entity_id');
            $date = 9999999;
            if (isset($rules)) {
                foreach ($rules as $rule) {
                    if (isset($rule->getMatchingProductIds()[$productId][1])) {
                        $toDate = $rule->getToDate();
                        if ($date > $toDate) {
                            $date = $toDate;
                        }
                    }
                }
                if ($date) {
                    return date_create($date)->Format('Y-m-d');
                }
                return null;
            }
            return null;
        }
    }

    /**
     * Get rules names
     *
     * @return mixed
     *
     * @throws LocalizedException
     */
    public function getRulesNames()
    {
        if ($this->isSimpleProduct()) {
            $rulesResoutseCollection = $this->rules->getResourceCollection();
            $rules = $rulesResoutseCollection->addFieldToFilter('is_active', 1);
            $productId = $this->getCurrentProduct()->getData('entity_id');
            $names = [];
            if (isset($rules)) {
                foreach ($rules as $rule) {
                    if (isset($rule->getMatchingProductIds()[$productId][1])) {
                        $ruleName = $rule->getName();
                        $ruleDate = $rule->getToDate();
                        $names[] = ['name' => $ruleName, 'date' => $ruleDate];
                    }
                }
                return $names;
            }
            return null;
        }
        return null;
    }

    /**
     * Get smallest date
     *
     * @return mixed
     * @throws LocalizedException
     */
    public
    function getSmallestDate()
    {
        if ($this->isSimpleProduct()) {
            $endSpecialPrice = $this->getSpecialPriceEnd();
            $endRulePrice = $this->getRulePriceEnd();
            if ($endSpecialPrice == null && $endRulePrice !== null) {
                return $endRulePrice;
            }
            if ($endSpecialPrice !== null && $endRulePrice == null) {
                return $endSpecialPrice;
            }

            if ($endSpecialPrice > $endRulePrice) {
                return $endRulePrice;
            } else if ($endSpecialPrice < $endRulePrice) {
                return $endSpecialPrice;
            } else if ($endSpecialPrice == $endRulePrice) {
                return $endSpecialPrice;
            }
        }
    }
}

