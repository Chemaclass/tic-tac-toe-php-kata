<?php

namespace Tests\Unit;

use App\GameStates;
use Generator;
use PHPUnit\Framework\TestCase;

class GameStatesTest extends TestCase
{
    public function test_is_not_valid(): void
    {
        self::assertFalse(GameStates::isValid('wrong_status'));
    }

    /**
     * @dataProvider gameStatesProvider
     */
    public function test_is_valid(string $status): void
    {
        self::assertTrue(GameStates::isValid($status));
    }

    public function gameStatesProvider(): Generator
    {
        yield 'WIN' => [GameStates::WIN];

        yield 'DRAW' => [GameStates::DRAW];

        yield 'DEFAULT' => [GameStates::DEFAULT];
    }

    public function test_array_elements(): void
    {
        self::assertSame($this->expectedGameStates(), GameStates::toArray());
    }

    private function expectedGameStates(): array
    {
        return [
            'WIN' => 'The game has been win by %s',
            'DRAW' => 'The game is a draw',
            'DEFAULT' => 'Playing',
        ];
    }
}
