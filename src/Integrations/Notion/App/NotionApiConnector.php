<?php

namespace App\Integrations\Notion\App;

use App\Integrations\Notion\Infrastructure\Models\PageModel;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class NotionApiConnector
{

    private const NOTION_API_URL = 'https://api.notion.com/v1';
    private const NOTION_VERSION = '2022-06-28';

    public function __construct(
        private readonly HttpClientInterface $httpClient
    )
    {
    }

    public function getPage(string $pageId): PageModel
    {
        $response = $this->httpClient->request('GET', self::NOTION_API_URL . "/pages/{$pageId}", [
            'headers' => $this->getHeaders(),
        ]);

        $page = $response->toArray();
        $content = $this->getPageContent($pageId);

        return new PageModel($page, $content);
    }
    public function getPageContent(string $pageId): array
    {
        $response = $this->httpClient->request('GET', self::NOTION_API_URL . "/blocks/{$pageId}/children", [
            'headers' => $this->getHeaders(),
        ]);

        return $response->toArray();
    }

    private function getHeaders(): array
    {
        return [
            'Authorization' => "Bearer " . $_ENV['NOTION_SECRET'],
            'Notion-Version' => self::NOTION_VERSION,
            'Content-Type' => 'application/json',
        ];
    }
}