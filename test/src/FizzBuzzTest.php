<?php

namespace Test\Boilerplate;

use Boilerplate\FizzBuzz;
use OutOfRangeException;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;

class FizzBuzzTest extends TestCase
{
    public static function provideSomeMultiplesOfFifteen(): array {
        return [
            [15],
            [30],
            [45],
        ];
    }

    /** @dataProvider provideSomeMultiplesOfFifteen */
    public function testFizzBuzzGivenMultiplesOfFifteenShouldReturnFizzBuzz(int $multipleOfFifteen): void
    {
        $fizzBuzzResult = FizzBuzz::calculateFizzBuzzFromInt($multipleOfFifteen);

        Assert::assertEquals('FizzBuzz', $fizzBuzzResult);
    }

    public static function provideSomeMultiplesOfFive(): array {
        return [
            [5],
            [10],
        ];
    }

    /** @dataProvider provideSomeMultiplesOfFive */
    public function testFizzBuzzGivenMultiplesOfFiveShouldReturnBuzz(int $multipleOfFive): void
    {
        $fizzBuzzResult = FizzBuzz::calculateFizzBuzzFromInt($multipleOfFive);

        Assert::assertEquals('Buzz', $fizzBuzzResult);
    }

    public static function provideSomeMultiplesOfThree(): array {
        return [
            [3],
            [6],
            [9],
        ];
    }

    /** @dataProvider provideSomeMultiplesOfThree */
    public function testFizzBuzzGivenMultiplesOfThreeShouldReturnFizz(int $multiplesOfThree): void
    {
        $fizzBuzzResult = FizzBuzz::calculateFizzBuzzFromInt($multiplesOfThree);

        Assert::assertEquals('Fizz', $fizzBuzzResult);
    }

    public static function provideSomeNumbersNotDivisibleByDivisors(): array {
        return [
            [1],
            [2],
            [4],
            [7],
            [8],
            [11],
        ];
    }

    /** @dataProvider provideSomeNumbersNotDivisibleByDivisors */
    public function testFizzBuzzGivenNumberNotDivisibleByAnyOfTheDivisorsShouldReturnNumber(int $number): void
    {
        $fizzBuzzResult = FizzBuzz::calculateFizzBuzzFromInt($number);

        Assert::assertEquals($number, $fizzBuzzResult);
    }

    public function testFizzBuzzGivenZeroShouldThrowException(): void
    {
        $number = 0;

        $this->expectException(OutOfRangeException::class);
        $this->expectExceptionMessage('You must pass positive numbers only');

        FizzBuzz::calculateFizzBuzzFromInt($number);
    }

    public function testFizzBuzzGivenNegativeNumberShouldThrowException(): void
    {
        $number = -15;

        $this->expectException(OutOfRangeException::class);
        $this->expectExceptionMessage('You must pass positive numbers only');

        FizzBuzz::calculateFizzBuzzFromInt($number);
    }

    public static function provideIntegersFromOneToSixteen(): array {
        return [
            // number      expected_output
            [1          , '1'],
            [2          , '2'],
            [3          , 'Fizz'],
            [4          , '4'],
            [5          , 'Buzz'],
            [6          , 'Fizz'],
            [7          , '7'],
            [8          , '8'],
            [9          , 'Fizz'],
            [10         , 'Buzz'],
            [11         , '11'],
            [12         , 'Fizz'],
            [13         , '13'],
            [14         , '14'],
            [15         , 'FizzBuzz'],
            [16         , '16'],
        ];
    }

    /** @dataProvider provideIntegersFromOneToSixteen */
    public function testFizzBuzzGivenNumbersFrom1To16ShouldReturnExpectedString(int $number, string $expected_output): void
    {
        $fizzBuzzOutput = FizzBuzz::calculateFizzBuzzFromInt($number);
        Assert::assertEquals($expected_output, $fizzBuzzOutput);
    }
}
