<?php

namespace App\Integrations\Notion\Infrastructure\Models\BlocksType;

interface DatabaseBlockInterface
{

    public function loadDatabase($apiResponse);
}