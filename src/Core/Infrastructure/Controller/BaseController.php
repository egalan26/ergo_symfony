<?php

namespace App\Core\Infrastructure\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/')]
abstract class BaseController extends AbstractController
{
    #[Route('/', name: 'default')]
    public function index(): JsonResponse
    {
        return $this->json([]);
    }
}
