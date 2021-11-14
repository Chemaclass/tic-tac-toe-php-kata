<?php

declare(strict_types=1);

namespace App;

final class BoardResult
{
    /**
     * @param List<Player> $players
     */
    public function __construct(Board $board, array $players, Player $currentPlayer)
    {
    }
}
