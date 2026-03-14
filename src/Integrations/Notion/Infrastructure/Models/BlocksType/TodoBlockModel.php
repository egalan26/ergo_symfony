<?php

namespace App\Integrations\Notion\Infrastructure\Models\BlocksType;

use App\Integrations\Notion\Infrastructure\Models\BlockModel;

class TodoBlockModel extends BlockModel
{
    private static $blockType = 'to_do';

    #[\Override]
    public function loadContent(array $apiResponse): void
    {
        $content = '';
        $rich_text = $apiResponse[self::$blockType]['rich_text'];
        foreach ($rich_text as $text) {
            $content .= $text['text']['content'];

        }
        $this->setContent($content);

    }

}