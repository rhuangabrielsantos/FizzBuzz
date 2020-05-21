<?php

namespace Boilerplate;

class FifteenDivisor implements DivisorHandler
{
    private const DIVISOR_OUTPUT = 'FizzBuzz';
    private const DIVISOR = 15;

    private ?DivisorHandler $nextDivisor;

    public function __construct(?DivisorHandler $nextDivisor)
    {
        $this->nextDivisor = $nextDivisor;
    }

    public function handleInteger(int $number): string
    {
        if (self::canHandleNumber($number)) {
            return self::DIVISOR_OUTPUT;
        }

        if ($this->hasNextDivisor()) {
            return $this->nextDivisor->handleInteger($number);
        }

        return self::castNumberToString($number);
    }

    private static function canHandleNumber(int $number): bool
    {
        return $number % self::DIVISOR === 0;
    }

    private function hasNextDivisor(): bool
    {
        return !is_null($this->nextDivisor);
    }

    private static function castNumberToString(int $number): string
    {
        return strval($number);
    }
}
