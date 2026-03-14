<?php

namespace App\Core\Domain;

class CoreUtils
{
    public static function snakeToPascalCase(string $snake): string
    {
        return str_replace('_', '', ucwords($snake, '_'));
    }

}