<?php

declare(strict_types=1);

namespace App;

final class Player
{
    private string $symbol;

    private string $name;

    public function __construct(string $symbol, ?string $name = null)
    {
        $this->symbol = $symbol;
        $this->name = $name ?? $symbol;
    }

    public function symbol(): string
    {
        return $this->symbol;
    }

    public function name(): string
    {
        return $this->name;
    }
}
