<?php

namespace App\Integrations\Notion\Infrastructure\Factory;

class BlockFactory
{

    private static $blockType;

    public static function get(string $type, array $apiResponse)
    {
        self::$blockType = $type;
        if (method_exists(BlockFactory::class, $type)) {
            return self::$type($apiResponse);
        }
        return null;
    }

    public static function to_do($apiResponse)
    {
        $content = '';
        $rich_text = $apiResponse[self::$blockType]['rich_text'];
        foreach ($rich_text as $text) {
            $content .= $text['text']['content'];

        }
        return $content;
    }
}