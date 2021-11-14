<?php

declare(strict_types=1);

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

final class ChangeMeTest extends TestCase
{
    /**
     * a game has nine fields in a 3x3 grid
     * there are two players in the game (X and O)
     * a player can take a field if not already taken
     * players take turns taking fields until the game is over
     * a game is over when all fields in a column are taken by a player
     * a game is over when all fields in a row are taken by a player
     * a game is over when all fields in a diagonal are taken by a player
     * a game is over when all fields are taken
     */
    public function test_a_board_should_have_at_least_3x3_matrix(): void
    {
        $game = Game::initialize(3);
    }
}
