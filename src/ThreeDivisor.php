<?php

namespace Boilerplate;

class ThreeDivisor implements DivisorHandler
{
    private const DIVISOR_OUTPUT = 'Fizz';
    private const DIVISOR = 3;

    public function handleInteger(int $number): string
    {
        if (self::canHandleNumber($number)) {
            return self::DIVISOR_OUTPUT;
        }

        return strval($number);
    }

    /**
     * @param int $number
     * @return bool
     */
    public static function canHandleNumber(int $number): bool
    {
        return $number % self::DIVISOR == 0;
    }
}
