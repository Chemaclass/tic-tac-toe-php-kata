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
     * @param list<Player> $players
     */
    public function __construct(Board $board, array $players)
    {
        $this->board = $board;
        $this->players = $players;
    }

    public function askInputForCurrentPlayer(int $int, int $int1): BoardResult
    {
        // check if winner & check if draw & switch player
        return new BoardResult();
        // return new BoardResult($this->board, $this->players, $this->currentPlayer);
    }
}
