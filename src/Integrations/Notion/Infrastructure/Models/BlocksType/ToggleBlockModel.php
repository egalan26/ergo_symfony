<?php

namespace App\Integrations\Notion\Infrastructure\Models\BlocksType;

use App\Integrations\Notion\Infrastructure\Models\BlockModel;

class ToggleBlockModel extends BlockModel
{

    private $blockType = 'toggle';

    #[\Override]
    public function loadContent(array $apiResponse): void
    {
        $content = '';
        $rich_text = $apiResponse[$this->blockType]['rich_text'];
        foreach ($rich_text as $text) {
            $content .= $text['text']['content'];

        }
        $this->setContent($content);

    }

    /**
     * @return string
     */
    public function getBlockType(): string
    {
        return $this->blockType;
    }
}