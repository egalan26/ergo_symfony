<?php

namespace App\Integrations\Notion\Infrastructure\Models;

use App\Integrations\Notion\Infrastructure\Factory\BlockFactory;

class BlockModel extends BaseNotionModel
{

    const AVAILABLE_TYPES = [
        'to_do',
        'toggle'
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
            if (!isset($apiResponse[$blockType])){
                continue;
            }
            if ($blockType ?? false) {
                $this->type = $blockType;

                $this->content = BlockFactory::get($blockType, $apiResponse);
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