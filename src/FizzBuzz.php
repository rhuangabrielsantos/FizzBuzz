<?php

declare(strict_types=1);

namespace Boilerplate;

use OutOfRangeException;

class FizzBuzz
{
    public static function calculateFizzBuzzFromInt(int $number): string
    {
        if (self::isNumberNegativeOrZero($number)) {
            throw new OutOfRangeException('You must pass positive numbers only');
        }

        return
            (new FifteenDivisor(
                (new FiveDivisor(
                    (new ThreeDivisor(null))
                ))
            ))->handleInteger($number);

    }

    private static function isNumberNegativeOrZero(int $number): bool
    {
        return $number <= 0;
    }
}
