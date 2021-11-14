<?php

declare(strict_types=1);

namespace Tests\Unit;

use App\Board;
use App\Game;
use App\Player;
use PHPUnit\Framework\TestCase;
use RuntimeException;

final class GameTest extends TestCase
{
    public function test_create_game_with_2_players(): void
    {
        $game = new Game(Board::create(), [new Player('X'), new Player('O')]);
        self::assertInstanceOf(Game::class, $game);
    }

    public function test_create_game_without_players(): void
    {
        $this->expectException(RuntimeException::class);
        new Game(Board::create(), []);
    }

    public function test_create_game_with_one_player(): void
    {
        $this->expectException(RuntimeException::class);
        new Game(Board::create(), [new Player('X')]);
    }

    public function test_create_game_with_three_players(): void
    {
        $this->expectException(RuntimeException::class);
        new Game(Board::create(), [new Player('X'), new Player('X'), new Player('X')]);
    }
}
