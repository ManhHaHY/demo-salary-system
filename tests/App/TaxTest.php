<?php

namespace App;


use App\Models\Tax;
use PHPUnit\Framework\TestCase;

class TaxTest extends TestCase
{
    public function testTaxInit()
    {
        $tax = new Tax(20);
        $this->assertNotEmpty($tax);
        $this->assertInstanceOf(Tax::class, $tax);
        $this->assertEquals(20, $tax->taxAmount);
    }

    public function testTaxAdd()
    {
        $tax = new Tax(20);
        $tax->add(2);
        $this->assertEquals(22, $tax->taxAmount);
    }

    public function testTaxSubtract()
    {
        $tax = new Tax(20);
        $tax->subtract(2);
        $this->assertEquals(18, $tax->taxAmount);
    }

    public function testTaxCalculateForEmployeeHaveLessThanTwoKids()
    {
        $tax = new Tax(20);
        $taxFee = $tax->calculateTax(1000);
        $this->assertEquals(200, $taxFee);
    }

    public function testTaxCalculateForEmployeeHaveMoreThanTwoKids()
    {
        // decrease 2% tax
        $tax = new Tax(20);
        $tax->subtract(2);
        $taxFee = $tax->calculateTax(1000);
        $this->assertEquals(180, $taxFee);
    }
}