<?php

namespace App\Tests;

use App\Integrations\Notion\App\NotionApiConnector;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use function PHPUnit\Framework\assertEquals;

class NotionApiConnectorTest extends KernelTestCase
{

    private ?NotionApiConnector $notionApi;

    protected function setUp(): void
    {
        self::bootKernel();
        $this->notionApi = static::getContainer()->get(NotionApiConnector::class);
    }

    public function testA()
    {

        $a = $this->notionApi->extracted();
        assertEquals(1, $a );
    }
    public function testB()
    {

        $a = $this->notionApi->getPage('323c39f9356e8033bd55cc6f66a7d655');

        assertEquals(1, $a );
    }
}