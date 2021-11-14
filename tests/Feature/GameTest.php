<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Board;
use App\Game;
use App\Player;
use PHPUnit\Framework\TestCase;

final class GameTest extends TestCase
{
    /**
     *  o x x
     *  x x o
     *  o o x
     */
    public function test_game_when_it_is_a_draw(): void
    {
//        $this->markTestSkipped();

        $board = Board::create();
        $players = [new Player('O'), new Player('X')];
        $game = new Game($board, $players);

//      loop:
//        $game->askInputForCurrentPlayer();
//        $game->isCurrentPlayerWin();
//        $game->nextTurn();
//        $game->getCurrentGameState();

        $game->nextPlay(1, 1); // check if winner & check if draw & switch player
        $game->nextPlay(2, 0); // check if winner & check if draw & switch player
        $game->nextPlay(0, 2); // check if winner & check if draw & switch player
        $game->nextPlay(0, 0); // check if winner & check if draw & switch player
        $game->nextPlay(1, 0); // check if winner & check if draw & switch player
        $game->nextPlay(1, 2); // check if winner & check if draw & switch player
        $game->nextPlay(2, 2); // check if winner & check if draw & switch player
        $game->nextPlay(2, 1); // check if winner & check if draw & switch player
        $boardResult = $game->nextPlay(0, 1); // check if winner & check if draw & switch player

        self::assertSame('draw', $boardResult->state());
        //self::assertSame('X,O,draw,unfinished', $boardResult->state());

//        self::assertSame([
//            ['o,x,x'],
//            ['x', 'x', 'o'],
//            ['o', 'o', 'x'],
//        ], $boardResult->gameState());
    }
}
