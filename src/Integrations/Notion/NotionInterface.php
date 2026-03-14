<?php

namespace App\Integrations\Notion;

use App\Integrations\Notion\Infrastructure\Models\PageModel;

interface NotionInterface
{

    public function getPage(string $pageID): PageModel;
    public function loadChildrenBlocks(string $pageID, PageModel &$pageModel): void;
}