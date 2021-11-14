<?php

namespace Tests\Unit;

use App\Player;
use PHPUnit\Framework\TestCase;

class PlayerTest extends TestCase
{
    public function test_should_create_a_player(): void
    {
        $symbol = 'O';
        $name = 'Chema';
        $player = new Player($symbol, $name);

        self::assertSame($symbol, $player->symbol());
        self::assertSame($name, $player->name());
    }

    public function test_should_create_a_player_without_name(): void
    {
        $symbol = 'O';
        $player = new Player($symbol);

        self::assertSame($symbol, $player->symbol());
        self::assertSame($symbol, $player->name());
    }
}
