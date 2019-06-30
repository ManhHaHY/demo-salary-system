<?php

namespace App;


use App\Models\Tax;
use PHPUnit\Framework\TestCase;

class TaxTest extends TestCase
{
    public $tax;

    public function __construct()
    {
        $this->tax = new Tax(20);
    }

    public function testTaxInit()
    {
        $this->assertNotEmpty($this->tax);
        $this->assertInstanceOf(Tax::class, $this->tax);
        $this->assertEquals(20, $this->tax->taxAmount);
    }

    public function testTaxAdd()
    {
        $this->tax->add(2);
        $this->assertEquals(22, $this->tax->taxAmount);
    }

    public function testTaxSubtract()
    {
        $this->tax->subtract(2);
        $this->assertEquals(18, $this->tax->taxAmount);
    }

    public function testTaxCalculateForEmployeeHaveLessThanTwoKids()
    {
        $taxFee = $this->tax->calculateTax(1000);
        $this->assertEquals(200, $taxFee);
    }

    public function testTaxCalculateForEmployeeHaveMoreThanTwoKids()
    {
        // decrease 2% tax
        $this->tax->subtract(2);
        $taxFee = $this->tax->calculateTax(1000);
        $this->assertEquals(180, $taxFee);
    }
}