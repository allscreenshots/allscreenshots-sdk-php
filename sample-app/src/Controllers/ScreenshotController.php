<?php

declare(strict_types=1);

namespace App\Controllers;

use Allscreenshots\Sdk\Client\AllscreenshotsClient;
use Allscreenshots\Sdk\Exceptions\AllscreenshotsException;
use Allscreenshots\Sdk\Models\ScreenshotRequest;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class ScreenshotController
{
    public function capture(Request $request, Response $response): Response
    {
        $data = $request->getParsedBody();

        $url = $data['url'] ?? '';
        $device = $data['device'] ?? 'Desktop HD';
        $fullPage = isset($data['fullPage']) && $data['fullPage'] === 'true';

        // Validate URL
        if (empty($url)) {
            return $this->jsonError($response, 'URL is required', 400);
        }

        // Add protocol if missing
        if (!preg_match('/^https?:\/\//', $url)) {
            $url = 'https://' . $url;
        }

        try {
            $apiKey = $_ENV['ALLSCREENSHOTS_API_KEY'] ?? getenv('ALLSCREENSHOTS_API_KEY');

            if (empty($apiKey)) {
                return $this->jsonError(
                    $response,
                    'ALLSCREENSHOTS_API_KEY environment variable is not set',
                    500
                );
            }

            $client = AllscreenshotsClient::builder()
                ->apiKey($apiKey)
                ->timeout(120)
                ->build();

            $screenshotRequest = new ScreenshotRequest($url);
            $screenshotRequest->setDevice($device);
            $screenshotRequest->setFullPage($fullPage);
            $screenshotRequest->setFormat('png');

            $imageData = $client->screenshot($screenshotRequest);

            $base64Image = base64_encode($imageData);

            $response->getBody()->write(json_encode([
                'success' => true,
                'image' => 'data:image/png;base64,' . $base64Image,
                'url' => $url,
                'device' => $device,
                'fullPage' => $fullPage,
            ]));

            return $response
                ->withHeader('Content-Type', 'application/json')
                ->withStatus(200);
        } catch (AllscreenshotsException $e) {
            return $this->jsonError(
                $response,
                $e->getMessage(),
                $e->getCode() ?: 500
            );
        } catch (\Throwable $e) {
            return $this->jsonError(
                $response,
                'An unexpected error occurred: ' . $e->getMessage(),
                500
            );
        }
    }

    private function jsonError(Response $response, string $message, int $status): Response
    {
        $response->getBody()->write(json_encode([
            'success' => false,
            'error' => $message,
        ]));

        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus($status);
    }
}
