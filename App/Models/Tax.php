<?php

namespace App\Models;

class Tax
{

    /** @var float */
    public $taxAmount;

    public function __construct($taxAmount)
    {
        $this->taxAmount = $taxAmount;
    }
    public function taxAmount()
    {
        return $this->taxAmount;
    }

    public function add(float $taxAmount)
    {
        $this->taxAmount = $this->taxAmount + $taxAmount;
    }
    public function subtract(float $taxAmount)
    {
        $this->taxAmount = $this->taxAmount - $taxAmount;
    }

    public function calculateTax(float $salary)
    {
        $result = $salary * $this->taxAmount / 100;
        return $result;
    }
}
