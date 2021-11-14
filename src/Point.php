<?php

declare(strict_types=1);

namespace App;

use InvalidArgumentException;

final class Point
{
    private int $x;

    private int $y;

    public function __construct(int $x, int $y)
    {
        try {
            $this->validatePosition($x);
            $this->validatePosition($y);
        } catch (InvalidArgumentException $e) {
            throw new InvalidArgumentException("$x,$y out of range!");
        }

        $this->x = $x;
        $this->y = $y;
    }

    public function x(): int
    {
        return $this->x;
    }

    public function y(): int
    {
        return $this->y;
    }

    private function validatePosition(int $number): void
    {
        if ($number > 2 || $number < 0) {
            throw new InvalidArgumentException();
        }
    }
}
