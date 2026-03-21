<?php

namespace App\Integrations\Notion\Infrastructure\Models\BlocksType;

use App\Integrations\Notion\Infrastructure\Models\BlockModel;

class TodoBlockModel extends BlockModel
{
    private $blockType = 'to_do';
    private bool $checked = false;
    private ?string $color = null;

    #[\Override]
    public function loadContent(array $apiResponse): void
    {
        $content = '';
        $rich_text = $apiResponse[$this->blockType]['rich_text'] ?? [];
        foreach ($rich_text as $text) {
            $content .= $text['text']['content'] ?? '';
        }
        $this->setContent($content);

        // Set the checked status
        $this->checked = $apiResponse[$this->blockType]['checked'] ?? false;

        // Set the color if available
        $this->color = $apiResponse[$this->blockType]['color'] ?? null;
    }

    /**
     * @return string
     */
    public function getBlockType(): string
    {
        return $this->blockType;
    }

    /**
     * @return bool
     */
    public function isChecked(): bool
    {
        return $this->checked;
    }

    /**
     * @return string|null
     */
    public function getColor(): ?string
    {
        return $this->color;
    }
}