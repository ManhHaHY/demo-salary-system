<?php

namespace App;


use App\Models\Bonus;
use PHPUnit\Framework\TestCase;

class BonusTest extends TestCase
{
    public function testBonusOlderThanFifty()
    {
        $bonus = Bonus::oldBonus(51, 1000);
        $this->assertEquals(70, $bonus);
    }

    public function testBonusYoungerThanFifty()
    {
        $bonus = Bonus::oldBonus(28, 1000);
        $this->assertEquals(0, $bonus);
    }
}