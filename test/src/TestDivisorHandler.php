<?php

namespace Test\Boilerplate;

use Boilerplate\DivisorHandler;

class TestDivisorHandler implements DivisorHandler
{
    /** @var bool */
    private $canHandleNumber;

    /** @var string */
    private $output;

    public function __construct(bool $canHandleNumber, string $output)
    {
        $this->canHandleNumber = $canHandleNumber;
        $this->output = $output;
    }

    public function handleInteger(int $number): string
    {
        if (!$this->canHandleNumber) {
            return strval($number);
        }

        return $this->output;
    }
}
