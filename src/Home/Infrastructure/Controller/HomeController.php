<?php

namespace App\Home\Infrastructure\Controller;

use App\Core\Infrastructure\Controller\BaseController;
use App\Integrations\Notion\NotionInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/home')]
final class HomeController extends BaseController
{


    #[Route('/')]
    public function test()
    {
        return new JsonResponse('okss');
    }


}
