<?php

namespace App\Models;

class Tax
{

    /** @var float */
    public $taxAmount;

    /**
     * Tax constructor.
     * @param $taxAmount
     */
    public function __construct($taxAmount)
    {
        $this->taxAmount = $taxAmount;
    }

    /**
     * @return float
     */
    public function taxAmount()
    {
        return $this->taxAmount;
    }

    /**
     * @param float $taxAmount
     */
    public function add(float $taxAmount)
    {
        $this->taxAmount = $this->taxAmount + $taxAmount;
    }

    /**
     * @param float $taxAmount
     */
    public function subtract(float $taxAmount)
    {
        $this->taxAmount = $this->taxAmount - $taxAmount;
    }

    /**
     * @param float $salary
     * @return float|int
     */
    public function calculateTax(float $salary)
    {
        $result = $salary * $this->taxAmount / 100;
        return $result;
    }
}
