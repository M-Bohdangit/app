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
     * Constructor
     *
     * @param CurrentProduct $currentProduct CurrentProduct
     * @param Rule           $rules          Rule
     */
    public function __construct(
        CurrentProduct $currentProduct,
        Rule           $rules
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
    public function isCurrentProductSimple(): bool
    {
        if ($this->getCurrentProduct()->getTypeId() == 'simple') {
            return true;
        }
        return false;
    }

    /**
     *
     * @return string
     */
    public function getSpecialPriceEnd()
    {
        if ($this->isCurrentProductSimple()) {
            $currentProduct = $this->getCurrentProduct();
            $specialPriceEndDate = $currentProduct->getSpecialToDate();
            if ($specialPriceEndDate !== false) {
                if ($specialPriceEndDate !== null) {
                    $date = date_create($specialPriceEndDate);
                    return $date->Format('Y-m-d');
                }
                return null;
            }
            return null;
        }
        return null;
    }

    /**
     * Get rule price end date
     *
     * @return mixed
     * @throws LocalizedException
     */
    public function getRulePriceEndDate()
    {
        if ($this->isCurrentProductSimple()) {
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
                    $test = date_create($date)->Format('Y-m-d');
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
     * @throws LocalizedException
     */
    public function getRulesNames()
    {
        if ($this->isCurrentProductSimple()) {
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
    public function getSmallestDate()
    {
        if ($this->isCurrentProductSimple()) {
            $specialPriceEndaDate = $this->getSpecialPriceEnd();
            $rulePriceEndDate = $this->getRulePriceEndDate();
            if ($specialPriceEndaDate == null &&  $rulePriceEndDate !== null) {
                return  $rulePriceEndDate;
            }
            if ($specialPriceEndaDate !== null &&  $rulePriceEndDate == null) {
                return  $specialPriceEndaDate;
            }

            if ($specialPriceEndaDate >  $rulePriceEndDate) {
                return  $rulePriceEndDate;
            } elseif ($specialPriceEndaDate <  $rulePriceEndDate) {
                return  $specialPriceEndaDate;
            } elseif ($specialPriceEndaDate ==  $rulePriceEndDate) {
                return  $specialPriceEndaDate;
            }
        }
    }
}
