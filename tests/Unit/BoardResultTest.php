<?php

declare(strict_types=1);

namespace Tests\Unit;

use App\Board;
use PHPUnit\Framework\TestCase;

final class BoardResultTest extends TestCase
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
}
