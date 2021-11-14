<?php

declare(strict_types=1);

namespace App;

final class Game
{
    private Board $board;

    /** @var list<Player> */
    private array $players;

    private Player $currentPlayer;

    /**
     * todo: Pick a random player?
     *
     * @param list<Player> $players
     */
    public function __construct(Board $board, array $players)
    {
        $this->guardNumberPlayers($players);

        $this->board = $board;
        $this->players = $players;
        $this->currentPlayer = $players[0];
    }

    public function nextPlay(int $x, int $y): BoardResult
    {
        $this->board->addPoint(
            $this->currentPlayer->symbol(),
            new Point($x, $y)
        );

        if ($this->board->checkIfWinner()) {
            return new BoardResult(
                $this->players,
                $this->currentPlayer,
                sprintf(GameStates::WIN, $this->currentPlayer->name()),
                $this->board->totalTurns(),
                $this->board->currentBoard()
            );
        }

        $this->board->checkIfDraw();

        $this->switchPlayer();

        return new BoardResult(
            $this->players,
            $this->currentPlayer,
            $this->board->state(),
            $this->board->totalTurns(),
            $this->board->currentBoard()
        );
    }

    /**
     * @param list<Player> $players
     */
    private function guardNumberPlayers(array $players): void
    {
        if (2 !== count($players)) {
            throw new \RuntimeException('Number of players must be 2');
        }
    }
}
