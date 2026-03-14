<?php

namespace App\Integrations\Notion\Infrastructure\Models;

use App\Integrations\Notion\Infrastructure\Factory\BlockFactory;

class BlockModel extends BaseNotionModel
{



    private string $type;
    private mixed $content = '';

    public function __construct(array $apiResponse)
    {

        $this->id = $apiResponse['id'];
        $this->loadContent($apiResponse);
    }

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

    public function loadContent(array $apiResponse)
    {
        $this->setContent('CONTENT NOT LOADED : Implement pending');
    }

}