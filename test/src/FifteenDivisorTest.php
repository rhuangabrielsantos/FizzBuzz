<?php

namespace Test\Boilerplate;

use Boilerplate\FifteenDivisor;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;

class FifteenDivisorTest extends TestCase
{
    public function testFifteenDivisorGivenMultipleOfFifteenAndNoNextDivisorShouldReturnFizzBuzz(): void
    {
        $divisor = new FifteenDivisor($nextDivisor = null);
        $output = $divisor->handleInteger($number = 15);
        Assert::assertEquals('FizzBuzz', $output);
    }

    public function testFifteenDivisorGivenNotMultipleOfFifteenAndNoNextDivisorShouldReturnNumber(): void
    {
        $divisor = new FifteenDivisor($nextDivisor = null);
        $output = $divisor->handleInteger($number = 13);
        Assert::assertEquals('13', $output);
    }

    public function testFifteenDivisorGivenMultipleOfFifteenAndNextDivisorShouldReturnFizzBuzz(): void
    {
        $nextDivisor = new TestDivisorHandler($canHandleNumber = true, $output = 'ai papai');

        $divisor = new FifteenDivisor($nextDivisor);

        $output = $divisor->handleInteger($number = 15);
        Assert::assertEquals('FizzBuzz', $output);
    }

    public function testFifteenDivisorGivenNotMultipleOfFifteenAndNextDivisorShouldReturnNextDivisorExpectedNumber(): void
    {
        $nextDivisor = new TestDivisorHandler($canHandleNumber = true, $output = 'ai papai');

        $divisor = new FifteenDivisor($nextDivisor);

        $output = $divisor->handleInteger($number = 9);
        Assert::assertEquals('ai papai', $output);
    }
}
