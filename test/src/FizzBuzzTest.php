<?php

namespace Test\Boilerplate;

use Boilerplate\FifteenDivisor;
use Boilerplate\FiveDivisor;
use Boilerplate\FizzBuzz;
use Boilerplate\ThreeDivisor;
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

    /**
     * @dataProvider provideSomeMultiplesOfFifteen
     * @param int $multipleOfFifteen
     */
    public function testFizzBuzzGivenMultiplesOfFifteenShouldReturnFizzBuzz(int $multipleOfFifteen): void
    {
        $divisorHandler = (new FifteenDivisor(null));

        $fizzBuzzResult = FizzBuzz::calculateFizzBuzzFromInt($multipleOfFifteen, $divisorHandler);

        Assert::assertEquals('FizzBuzz', $fizzBuzzResult);
    }

    public static function provideSomeMultiplesOfFive(): array {
        return [
            [5],
            [10],
        ];
    }

    /**
     * @dataProvider provideSomeMultiplesOfFive
     * @param int $multipleOfFive
     */
    public function testFizzBuzzGivenMultiplesOfFiveShouldReturnBuzz(int $multipleOfFive): void
    {
        $divisorHandler = (new FiveDivisor(null));

        $fizzBuzzResult = FizzBuzz::calculateFizzBuzzFromInt($multipleOfFive, $divisorHandler);

        Assert::assertEquals('Buzz', $fizzBuzzResult);
    }

    public static function provideSomeMultiplesOfThree(): array {
        return [
            [3],
            [6],
            [9],
        ];
    }

    /**
     * @dataProvider provideSomeMultiplesOfThree
     * @param int $multiplesOfThree
     */
    public function testFizzBuzzGivenMultiplesOfThreeShouldReturnFizz(int $multiplesOfThree): void
    {
        $divisorHandler = (new ThreeDivisor(null));

        $fizzBuzzResult = FizzBuzz::calculateFizzBuzzFromInt($multiplesOfThree, $divisorHandler);

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

    /**
     * @dataProvider provideSomeNumbersNotDivisibleByDivisors
     * @param int $number
     */
    public function testFizzBuzzGivenNumberNotDivisibleByAnyOfTheDivisorsShouldReturnNumber(int $number): void
    {
        $divisorHandler =
            (new FifteenDivisor(
                (new FiveDivisor(
                    (new ThreeDivisor(null))
                ))
            ));

        $fizzBuzzResult = FizzBuzz::calculateFizzBuzzFromInt($number, $divisorHandler);

        Assert::assertEquals($number, $fizzBuzzResult);
    }

    public function testFizzBuzzGivenZeroShouldThrowException(): void
    {
        $number = 0;
        $divisorHandler =
            (new FifteenDivisor(
                (new FiveDivisor(
                    (new ThreeDivisor(null))
                ))
            ));

        $this->expectException(OutOfRangeException::class);
        $this->expectExceptionMessage('You must pass positive numbers only');

        FizzBuzz::calculateFizzBuzzFromInt($number, $divisorHandler);
    }

    public function testFizzBuzzGivenNegativeNumberShouldThrowException(): void
    {
        $number = -15;
        $divisorHandler =
            (new FifteenDivisor(
                (new FiveDivisor(
                    (new ThreeDivisor(null))
                ))
            ));

        $this->expectException(OutOfRangeException::class);
        $this->expectExceptionMessage('You must pass positive numbers only');

        FizzBuzz::calculateFizzBuzzFromInt($number, $divisorHandler);
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

    /**
     * @dataProvider provideIntegersFromOneToSixteen
     * @param int $number
     * @param string $expected_output
     */
    public function testFizzBuzzGivenNumbersFrom1To16ShouldReturnExpectedString(int $number, string $expected_output): void
    {
        $divisorHandler =
            (new FifteenDivisor(
                (new FiveDivisor(
                    (new ThreeDivisor(null))
                ))
            ));

        $fizzBuzzOutput = FizzBuzz::calculateFizzBuzzFromInt($number, $divisorHandler);
        Assert::assertEquals($expected_output, $fizzBuzzOutput);
    }
}
