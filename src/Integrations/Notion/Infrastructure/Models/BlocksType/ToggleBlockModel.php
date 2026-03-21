<?php

namespace App\Integrations\Notion\Infrastructure\Models\BlocksType;

use App\Integrations\Notion\Infrastructure\Models\BlockModel;

class ToggleBlockModel extends BlockModel
{
    private $blockType = 'toggle';
    private $color;
    private $children = [];

    #[\Override]
    public function loadContent(array $apiResponse): void
    {
        $content = '';
        $rich_text = $apiResponse[$this->blockType]['rich_text'] ?? [];
        foreach ($rich_text as $text) {
            $content .= $text['text']['content'] ?? '';
        }
        $this->setContent($content);

        // Set color if available
        $this->color = $apiResponse[$this->blockType]['color'] ?? null;

        // Load children blocks if available
        $this->children = $apiResponse[$this->blockType]['children'] ?? [];
    }

    /**
     * @return string
     */
    public function getBlockType(): string
    {
        return $this->blockType;
    }

    /**
     * @return string|null
     */
    public function getColor(): ?string
    {
        return $this->color;
    }

    /**
     * @return array
     */
    public function getChildren(): array
    {
        return $this->children;
    }
}