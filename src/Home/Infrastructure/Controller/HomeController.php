<?php

namespace App\Home\Infrastructure\Controller;

use App\Core\Infrastructure\Controller\BaseController;
use App\Integrations\Notion\NotionInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/home')]
final class HomeController extends BaseController
{
    public function __construct(
        private readonly NotionInterface $notion
    )
    {
    }

    #[Route('/index', name: 'index')]
    public function index(): JsonResponse
    {
//        $page = $this->notion->getPage('323c39f9356e8033bd55cc6f66a7d655');
        $pageID = '323c39f9356e8012aa76d34fe4ec8048';

        $page = $this->notion->getPage($pageID);
        $this->notion->loadChildrenBlocks($pageID, $page);

        return $this->json($page);
    }
}
