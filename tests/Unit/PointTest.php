<?php

declare(strict_types=1);

namespace Tests\Unit;

use App\Point;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

final class PointTest extends TestCase
{
    public function test_create_with_x_y(): void
    {
        $point = new Point(1, 2);
        self::assertSame(1, $point->x());
        self::assertSame(2, $point->y());
    }

    /**
     * @dataProvider providerInvalidCoordinates
     */
    public function test_invalid_x(int $x): void
    {
        $this->expectException(InvalidArgumentException::class);
        new Point($x, 0);
    }

    /**
     * @dataProvider providerInvalidCoordinates
     */
    public function test_invalid_y(int $y): void
    {
        $this->expectException(InvalidArgumentException::class);
        new Point(0, $y);
    }

    public function providerInvalidCoordinates(): iterable
    {
        yield [-2];

        yield [-1];

        yield [3];

        yield [4];
    }
}
