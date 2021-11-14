<?php

declare(strict_types=1);

namespace App;

final class Board
{
    private const BOARD_SIZE = 3;

    /** @var list<list<?string>> */
    private $board;

    public static function create(): self
    {
        return new self(self::createRows());
    }

    /**
     * @param list<list<?string>> $board
     */
    private function __construct(array $board)
    {
        $this->board = $board;
    }

    /**
     * @return list<list<?string>>
     */
    public function getBoard(): array
    {
        return $this->board;
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
