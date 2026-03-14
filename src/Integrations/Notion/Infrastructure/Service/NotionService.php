<?php

namespace App\Integrations\Notion\Infrastructure\Service;

use App\Integrations\Notion\App\NotionApiConnector;
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
        return $this->notionApiConnector->getPage($pageID);
    }
}