<?php

namespace App\Integrations\Notion\Infrastructure\Factory;

use App\Integrations\Notion\Infrastructure\Models\BlocksType\DatabaseBlockModel;
use App\Integrations\Notion\Infrastructure\Models\BlocksType\TodoBlockModel;
use App\Integrations\Notion\Infrastructure\Models\BlocksType\ToggleBlockModel;

class BlockFactory
{
    const CLASS_AVAILABLE =
        [
            'to_do' => TodoBlockModel::class,
            'toggle' => ToggleBlockModel::class,
            'child_database' => DatabaseBlockModel::class
        ];

    private static $blockType;

    public static function get(string $type, array $apiResponse)
    {
        self::$blockType = $type;
        $className = self::CLASS_AVAILABLE[$type] ?? null;
        if (null === $className) {
            return null;
        }
        $block = new $className($apiResponse);
        return $block;
    }

}