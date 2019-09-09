<?php

declare(strict_types=1);

namespace Boilerplate;

class FizzBuzz
{
    public static function calculateFizzBuzzFromInt(int $number): string
    {
        if (self::isNumberNegativeOrZero($number)) {
            throw new \OutOfRangeException('You must pass positive numbers only');
        }

        if ($number % 15 === 0) {
            return 'FizzBuzz';
        }

        if ($number % 5 === 0) {
            return 'Buzz';
        }

        if ($number % 3 === 0) {
            return 'Fizz';
        }

        return strval($number);
    }

    private static function isNumberNegativeOrZero(int $number): bool
    {
        return $number <= 0;
    }
}
