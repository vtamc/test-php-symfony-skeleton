<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\User;
use Symfony\Component\Security\Http\Attribute\CurrentUser;

class AppApiLoginController extends AbstractController
{
    #[Route('/api/login', name: 'app_api_login')]
    public function index(#[CurrentUser] ?User $user): JsonResponse
    {
        if (null === $user) {
            return $this->json([
                'message' => 'missing credentials',
            ], JsonResponse::HTTP_UNAUTHORIZED);
        }

        $token = '';

        return $this->json([
            'user'  => $user->getUserIdentifier(),
            'token' => $token,
        ]);
    }
}
