<?php

declare(strict_types=1);

namespace Tests\Unit;

use App\Board;
use App\BoardResult;
use App\Game;
use App\Player;
use PHPUnit\Framework\TestCase;
use RuntimeException;

final class GameTest extends TestCase
{
    private const SYMBOL_X = 'X';

    private const SYMBOL_O = 'O';

    public function test_create_game_with_2_players(): void
    {
        $game = new Game(Board::create(), [new Player(self::SYMBOL_X), new Player(self::SYMBOL_O)]);
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
        new Game(Board::create(), [new Player(self::SYMBOL_X)]);
    }

    public function test_create_game_with_three_players(): void
    {
        $this->expectException(RuntimeException::class);
        new Game(Board::create(), [
            new Player(self::SYMBOL_X),
            new Player(self::SYMBOL_X),
            new Player(self::SYMBOL_X),
        ]);
    }

    public function test_next_play(): void
    {
        $game = new Game(Board::create(), [new Player(self::SYMBOL_X), new Player(self::SYMBOL_O)]);

        $expected = new BoardResult(
            [new Player(self::SYMBOL_X), new Player(self::SYMBOL_O)],                 # players
            new Player(self::SYMBOL_O),                                    # currentPlayer
            'unfinished',                                       # gameState
            1,                                                  # totalTurns
            [['X', null, null], [null, null, null], [null, null, null]] # board
        );

        self::assertEquals($expected, $game->nextPlay(0, 0));
    }
}
