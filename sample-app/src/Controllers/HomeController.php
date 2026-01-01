<?php

declare(strict_types=1);

namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\Twig;

class HomeController
{
    public function __construct(
        private readonly Twig $twig,
    ) {}

    public function index(Request $request, Response $response): Response
    {
        return $this->twig->render($response, 'home.twig', [
            'devices' => [
                'Desktop HD' => 'Desktop HD (1920x1080)',
                'Desktop' => 'Desktop (1366x768)',
                'iPhone 14' => 'iPhone 14 (390x844)',
                'iPhone 14 Pro Max' => 'iPhone 14 Pro Max (430x932)',
                'iPad' => 'iPad (810x1080)',
                'iPad Pro' => 'iPad Pro (1024x1366)',
            ],
        ]);
    }
}
