<?php

namespace Test\Boilerplate;

use Boilerplate\DivisorHandler;

class TestDivisorHandler implements DivisorHandler
{
    private bool $canHandleNumber;
    private string $output;

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
