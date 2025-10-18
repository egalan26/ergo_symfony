<?php

namespace App\Security\Controller;

use App\Core\Controller\BaseController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/security')]
final class SecurityController extends BaseController
{
    #[Route('/login', name: 'login')]
    public function index(): JsonResponse
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/BaseController.php',
        ]);
    }
}
