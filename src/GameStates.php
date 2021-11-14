<?php

namespace App;

final class GameStates
{
    public const WIN = 'The game has been win by %s';
    public const DRAW = 'The game is a draw';
    public const DEFAULT = 'Playing';

    public static function toArray(): array
    {
        return (new \ReflectionClass(__CLASS__))->getConstants();
    }

    public static function isValid(string $value): bool
    {
        return \in_array($value, self::toArray(), true);
    }
}