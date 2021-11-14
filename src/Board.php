<?php

declare(strict_types=1);

namespace App;

use InvalidArgumentException;

final class Board
{
    private const BOARD_SIZE = 3;

    /** @var list<list<?string>> */
    private $currentBoard;

    public static function create(): self
    {
        return new self(self::createRows());
    }

    /**
     * @param list<list<?string>> $board
     */
    private function __construct(array $board)
    {
        $this->currentBoard = $board;
    }

    /**
     * @return list<list<?string>>
     */
    public function currentBoard(): array
    {
        return $this->currentBoard;
    }

    public function addPoint(string $symbol, Point $point): void
    {
        if (isset($this->currentBoard[$point->x()][$point->y()])) {
            throw new InvalidArgumentException('Point already chosen!');
        }

        $this->currentBoard[$point->x()][$point->y()] = $symbol;
    }

    public function checkIfWinner(): bool
    {
        return ($this->currentBoard[0][0] === $this->currentBoard[0][1] && $this->currentBoard[0][1] === $this->currentBoard[0][2])
            || ($this->currentBoard[1][0] === $this->currentBoard[1][1] && $this->currentBoard[1][1] === $this->currentBoard[1][2])
            || ($this->currentBoard[2][0] === $this->currentBoard[2][1] && $this->currentBoard[2][1] === $this->currentBoard[2][2])
            || ($this->currentBoard[0][0] === $this->currentBoard[1][0] && $this->currentBoard[1][0] === $this->currentBoard[2][0])
            || ($this->currentBoard[0][1] === $this->currentBoard[1][1] && $this->currentBoard[1][1] === $this->currentBoard[2][1])
            || ($this->currentBoard[0][2] === $this->currentBoard[1][2] && $this->currentBoard[1][2] === $this->currentBoard[2][2])
            || ($this->currentBoard[0][0] === $this->currentBoard[1][1] && $this->currentBoard[1][1] === $this->currentBoard[2][2])
            || ($this->currentBoard[0][2] === $this->currentBoard[1][1] && $this->currentBoard[1][1] === $this->currentBoard[2][0]);
    }

    /**
     * @return list<list<?string>>
     */
    private static function createRows(): array
    {
        $rows = [];

        for ($i = 0; $i < self::BOARD_SIZE; $i++) {
            $rows[] = array_fill(0, self::BOARD_SIZE, null);
        }

        return $rows;
    }
}
