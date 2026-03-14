<?php

namespace App\Integrations\Notion\Infrastructure\Service;

use App\Integrations\Notion\App\NotionApiConnector;
use App\Integrations\Notion\Infrastructure\Factory\BlockFactory;
use App\Integrations\Notion\Infrastructure\Models\BlockModel;
use App\Integrations\Notion\Infrastructure\Models\PageModel;
use App\Integrations\Notion\NotionInterface;

class NotionService implements NotionInterface
{
    public function __construct(
        private readonly NotionApiConnector $notionApiConnector
    )
    {
    }

    public function getPage(string $pageID): PageModel
    {
        $pageModel = $this->notionApiConnector->getPage($pageID);
        $this->loadChildrenBlocks($pageID, $pageModel);
        return $pageModel;
    }

    public function loadChildrenBlocks(string $pageID, PageModel &$pageModel): void
    {
        $children = $this->notionApiConnector->getPageContent($pageID);

        foreach ($children['results'] as $apiResponse) {
            $blockType = $apiResponse['type'];
            $blockModel = BlockFactory::get($blockType, $apiResponse);
            if (null === $blockModel) {
                continue;
            }
            $pageModel->addBlock($blockModel);
        }
    }
}