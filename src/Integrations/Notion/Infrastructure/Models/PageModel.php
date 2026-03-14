<?php

namespace App\Integrations\Notion\Infrastructure\Models;

class PageModel extends BaseNotionModel
{

    private array $blockList = [];

    public function __construct(array $apiResponse)
    {
        $this->id = $apiResponse['id'];
    }

    public function addBlock(BlockModel $blockModel)
    {
        $this->blockList[] = $blockModel;

    }

    /**
     * @return array
     */
    public function getBlockList(): array
    {
        return $this->blockList;
    }
}