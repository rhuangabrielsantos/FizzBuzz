<?php

namespace Test\Boilerplate;

use Boilerplate\ThreeDivisor;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;

class ThreeDivisorTest extends TestCase
{
    public static function provideSomeMultiplesOfTre(): array {
        return [
            [3],
            [6],
            [9],
        ];
    }

    /**
     * @dataProvider provideSomeMultiplesOfTre
     * @param int $multiplesOfTre
     */
    public function testTreDivisorGivenMultipleOfTreAndNoNextDivisorShouldReturnFizz(int $multiplesOfTre) : void
    {
        $divisor = new ThreeDivisor(null);
        $output = $divisor->handleInteger($multiplesOfTre);
        Assert::assertEquals('Fizz', $output);
    }

    public static function provideSomeNotMultiplesOfTre(): array {
        return [
            [1],
            [2],
            [4],
        ];
    }

    /**
     * @dataProvider provideSomeNotMultiplesOfTre
     * @param int $notMultiplesOfTre
     */
    public function testThreeDivisorGivenNotMultipleOfThreeAndNoNextDivisorShouldReturnNumber(int $notMultiplesOfTre) : void
    {
        $divisor = new ThreeDivisor(null);
        $output = $divisor->handleInteger($notMultiplesOfTre);
        Assert::assertEquals($notMultiplesOfTre, $output);
    }
}
