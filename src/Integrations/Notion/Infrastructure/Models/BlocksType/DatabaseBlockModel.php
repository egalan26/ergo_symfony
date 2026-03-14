<?php

namespace App\Integrations\Notion\Infrastructure\Models\BlocksType;

use App\Integrations\Notion\Infrastructure\Models\BlockModel;

class DatabaseBlockModel extends BlockModel implements DatabaseBlockInterface
{

    private $blockType = 'child_database';
    private $listOfItems = []; // in database

    #[\Override]
    public function loadContent(array $apiResponse): void
    {
        $databaseInfo = $apiResponse[$this->blockType];
        $this->setContent($databaseInfo['title']);

    }

    /**
     * @return string
     */
    public function getBlockType(): string
    {
        return $this->blockType;
    }

    /**
     * @return array
     */
    public function getListOfItems(): array
    {
        return $this->listOfItems;
    }

    /**
     * @param array $listOfItems
     * @return DatabaseBlockModel
     */
    public function setListOfItems(array $listOfItems): DatabaseBlockModel
    {
        $this->listOfItems = $listOfItems;
        return $this;
    }

    public function loadDatabase($apiResponse)
    {
        dd();
    }
}