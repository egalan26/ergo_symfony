<?php

namespace App\Integrations\Notion\Infrastructure\Models;

class BlockModel extends BaseNotionModel
{

    const AVAILABLE_TYPES = [
        'to_do'
    ];
    private string $type;
    private mixed $content = '';

    public function __construct(array $apiResponse)
    {

        $this->id = $apiResponse['id'];
        $this->loadContentAndType($apiResponse);
    }

    /**
     * @param array $apiResponse
     * @return void
     */
    public function loadContentAndType(array $apiResponse): void
    {
        foreach (self::AVAILABLE_TYPES as $blockType) {
            if ($blockType ?? false) {
                $this->type = $blockType;
                $rich_text = $apiResponse[$blockType]['rich_text'];
                foreach ($rich_text as $text) {
                    $this->content .= $text['text']['content'];

                }
            }
        }
    }

    /**
     * @param string $type
     * @return BlockModel
     */
    public function setType(string $type): BlockModel
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param mixed $content
     * @return BlockModel
     */
    public function setContent(mixed $content): BlockModel
    {
        $this->content = $content;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getContent(): mixed
    {
        return $this->content;
    }
}