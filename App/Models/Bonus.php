<?php

namespace App\Models;

class Bonus
{
    const OLD_BONUS = 7;

    /**
     * Calculate bonus for employee have age older than 50
     *
     * @param int $age
     * @param float $salary
     * @return float|int
     */
    public static function oldBonus(int $age, float $salary)
    {
        if ($age > 50) {
            $bonus = $salary * self::OLD_BONUS / 100;
            return $bonus;
        }
        return 0;
    }
}
