<?php

declare(strict_types=1);

namespace App\Controller\Api;

use App\Service\Dashboard\DashboardProvider;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

class DashboardController extends AbstractController
{
    #[Route('/api/dashboards', name: 'api_dashboard', methods: ['GET'])]
    public function index(
        DashboardProvider $dashboardProvider,
    ): JsonResponse
    {
        return $this->json($dashboardProvider->getDashboards());
    }
}
