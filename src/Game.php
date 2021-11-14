<?php

declare(strict_types=1);

namespace App;

final class Game
{
    private Board $board;

    /** @var list<Player> */
    private array $players;

    private ?Player $currentPlayer = null;

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

    public function askInputForCurrentPlayer(int $x, int $y): BoardResult
    {
        // check if winner & check if draw & switch player

        return new BoardResult($this->board, $this->players, $this->currentPlayer);
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
