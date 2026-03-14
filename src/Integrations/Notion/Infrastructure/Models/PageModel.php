<?php

namespace App\Integrations\Notion\Infrastructure\Models;

class PageModel extends BaseNotionModel
{

    private array $blockList = [];

    public function __construct(array $apiResponse, array $children)
    {

        foreach ($children['results'] as $block) {
            $this->addBlock(new BlockModel($block));
        }
        $this->id = $apiResponse['id'];
        dd($this);
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