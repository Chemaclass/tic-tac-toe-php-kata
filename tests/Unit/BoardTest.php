<?php

declare(strict_types=1);

namespace Tests\Unit;

use App\Board;
use App\Point;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

final class BoardTest extends TestCase
{
    public function test_matrix_with_size_3(): void
    {
        $board = Board::create();

        self::assertSame([
            [null, null, null],
            [null, null, null],
            [null, null, null],
        ], $board->currentBoard());
    }

    public function test_add_point(): void
    {
        $board = Board::create();
        $board->addPoint('X', new Point(0, 0));

        self::assertSame([
            ['X', null, null],
            [null, null, null],
            [null, null, null],
        ], $board->currentBoard());
    }

    public function test_add_point_was_chosen_before(): void
    {
        $this->expectException(InvalidArgumentException::class);

        $board = Board::create();
        $board->addPoint('X', new Point(0, 0));
        $board->addPoint('X', new Point(0, 0));
    }
}
