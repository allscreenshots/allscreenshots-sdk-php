<?php

declare(strict_types=1);

namespace Allscreenshots\Sdk\Client;

use Allscreenshots\Sdk\Exceptions\AllscreenshotsException;
use Allscreenshots\Sdk\Exceptions\AuthenticationException;
use Allscreenshots\Sdk\Exceptions\NetworkException;
use Allscreenshots\Sdk\Exceptions\NotFoundException;
use Allscreenshots\Sdk\Exceptions\RateLimitException;
use Allscreenshots\Sdk\Exceptions\ServerException;
use Allscreenshots\Sdk\Exceptions\ValidationException;
use Allscreenshots\Sdk\Models\AsyncJobCreatedResponse;
use Allscreenshots\Sdk\Models\BulkJobSummary;
use Allscreenshots\Sdk\Models\BulkRequest;
use Allscreenshots\Sdk\Models\BulkResponse;
use Allscreenshots\Sdk\Models\BulkStatusResponse;
use Allscreenshots\Sdk\Models\ComposeJobStatusResponse;
use Allscreenshots\Sdk\Models\ComposeJobSummaryResponse;
use Allscreenshots\Sdk\Models\ComposeRequest;
use Allscreenshots\Sdk\Models\ComposeResponse;
use Allscreenshots\Sdk\Models\CreateScheduleRequest;
use Allscreenshots\Sdk\Models\JobResponse;
use Allscreenshots\Sdk\Models\LayoutPreviewResponse;
use Allscreenshots\Sdk\Models\QuotaStatusResponse;
use Allscreenshots\Sdk\Models\ScheduleHistoryResponse;
use Allscreenshots\Sdk\Models\ScheduleListResponse;
use Allscreenshots\Sdk\Models\ScheduleResponse;
use Allscreenshots\Sdk\Models\ScreenshotRequest;
use Allscreenshots\Sdk\Models\UpdateScheduleRequest;
use Allscreenshots\Sdk\Models\UsageResponse;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\RequestException;
use Psr\Http\Message\ResponseInterface;

/**
 * Main client for interacting with the Allscreenshots API.
 *
 * Use AllscreenshotsClient::builder() to create and configure an instance.
 *
 * Example:
 * ```php
 * $client = AllscreenshotsClient::builder()
 *     ->apiKey('your-api-key')
 *     ->build();
 *
 * // Take a screenshot
 * $imageData = $client->screenshot(new ScreenshotRequest('https://example.com'));
 * file_put_contents('screenshot.png', $imageData);
 * ```
 */
class AllscreenshotsClient
{
    private const SDK_VERSION = '1.0.0';
    private const USER_AGENT = 'allscreenshots-sdk-php/' . self::SDK_VERSION;

    public function __construct(
        private readonly string $apiKey,
        private readonly string $baseUrl,
        private readonly ClientInterface $httpClient,
        private readonly int $maxRetries = 3,
        private readonly float $retryBaseDelay = 1.0,
        private readonly float $retryMaxDelay = 30.0,
    ) {}

    /**
     * Create a new builder instance for configuring the client.
     *
     * @return AllscreenshotsClientBuilder
     */
    public static function builder(): AllscreenshotsClientBuilder
    {
        return new AllscreenshotsClientBuilder();
    }

    // ========================================
    // Screenshots
    // ========================================

    /**
     * Take a screenshot synchronously.
     *
     * Returns the raw image data as a string.
     *
     * Example:
     * ```php
     * $request = new ScreenshotRequest('https://github.com');
     * $request->setDevice('Desktop HD');
     * $request->setFullPage(true);
     *
     * $imageData = $client->screenshot($request);
     * file_put_contents('screenshot.png', $imageData);
     * ```
     *
     * @param ScreenshotRequest $request The screenshot request
     * @return string Raw image data
     * @throws AllscreenshotsException On API or network errors
     */
    public function screenshot(ScreenshotRequest $request): string
    {
        $response = $this->post('/v1/screenshots', $request->jsonSerialize(), false);
        return (string) $response->getBody();
    }

    /**
     * Take a screenshot asynchronously.
     *
     * Returns job information that can be polled for completion.
     *
     * Example:
     * ```php
     * $request = new ScreenshotRequest('https://github.com');
     * $job = $client->screenshotAsync($request);
     *
     * // Poll for completion
     * while (!$client->getJob($job->getId())->isCompleted()) {
     *     sleep(1);
     * }
     *
     * $imageData = $client->getJobResult($job->getId());
     * ```
     *
     * @param ScreenshotRequest $request The screenshot request
     * @return AsyncJobCreatedResponse Job information
     * @throws AllscreenshotsException On API or network errors
     */
    public function screenshotAsync(ScreenshotRequest $request): AsyncJobCreatedResponse
    {
        $data = $this->postJson('/v1/screenshots/async', $request->jsonSerialize());
        return AsyncJobCreatedResponse::fromArray($data);
    }

    /**
     * List all screenshot jobs.
     *
     * @return JobResponse[] Array of job responses
     * @throws AllscreenshotsException On API or network errors
     */
    public function listJobs(): array
    {
        $data = $this->getJson('/v1/screenshots/jobs');
        return array_map(fn(array $job) => JobResponse::fromArray($job), $data);
    }

    /**
     * Get a specific job by ID.
     *
     * @param string $id The job ID
     * @return JobResponse The job response
     * @throws AllscreenshotsException On API or network errors
     */
    public function getJob(string $id): JobResponse
    {
        $data = $this->getJson("/v1/screenshots/jobs/{$id}");
        return JobResponse::fromArray($data);
    }

    /**
     * Get the result image for a completed job.
     *
     * @param string $id The job ID
     * @return string Raw image data
     * @throws AllscreenshotsException On API or network errors
     */
    public function getJobResult(string $id): string
    {
        $response = $this->get("/v1/screenshots/jobs/{$id}/result");
        return (string) $response->getBody();
    }

    /**
     * Cancel a job.
     *
     * @param string $id The job ID
     * @return JobResponse The updated job response
     * @throws AllscreenshotsException On API or network errors
     */
    public function cancelJob(string $id): JobResponse
    {
        $data = $this->postJson("/v1/screenshots/jobs/{$id}/cancel", []);
        return JobResponse::fromArray($data);
    }

    // ========================================
    // Bulk Screenshots
    // ========================================

    /**
     * Create a bulk screenshot job.
     *
     * Example:
     * ```php
     * $request = new BulkRequest([
     *     new BulkUrlRequest('https://example.com'),
     *     new BulkUrlRequest('https://github.com'),
     * ]);
     *
     * $bulk = $client->bulkScreenshot($request);
     * echo "Created bulk job: " . $bulk->getId();
     * ```
     *
     * @param BulkRequest $request The bulk request
     * @return BulkResponse The bulk response
     * @throws AllscreenshotsException On API or network errors
     */
    public function bulkScreenshot(BulkRequest $request): BulkResponse
    {
        $data = $this->postJson('/v1/screenshots/bulk', $request->jsonSerialize());
        return BulkResponse::fromArray($data);
    }

    /**
     * List all bulk jobs.
     *
     * @return BulkJobSummary[] Array of bulk job summaries
     * @throws AllscreenshotsException On API or network errors
     */
    public function listBulkJobs(): array
    {
        $data = $this->getJson('/v1/screenshots/bulk');
        return array_map(fn(array $job) => BulkJobSummary::fromArray($job), $data);
    }

    /**
     * Get a specific bulk job by ID.
     *
     * @param string $id The bulk job ID
     * @return BulkStatusResponse The bulk status response
     * @throws AllscreenshotsException On API or network errors
     */
    public function getBulkJob(string $id): BulkStatusResponse
    {
        $data = $this->getJson("/v1/screenshots/bulk/{$id}");
        return BulkStatusResponse::fromArray($data);
    }

    /**
     * Cancel a bulk job.
     *
     * @param string $id The bulk job ID
     * @return BulkJobSummary The updated bulk job summary
     * @throws AllscreenshotsException On API or network errors
     */
    public function cancelBulkJob(string $id): BulkJobSummary
    {
        $data = $this->postJson("/v1/screenshots/bulk/{$id}/cancel", []);
        return BulkJobSummary::fromArray($data);
    }

    // ========================================
    // Compose
    // ========================================

    /**
     * Compose multiple screenshots into a single image.
     *
     * When async is false, returns ComposeResponse.
     * When async is true, returns ComposeJobStatusResponse.
     *
     * Example:
     * ```php
     * $request = new ComposeRequest();
     * $request->addCapture(new CaptureItem('https://example.com'));
     * $request->addCapture(new CaptureItem('https://github.com'));
     * $request->setOutput((new ComposeOutputConfig())->setLayout('GRID'));
     *
     * $result = $client->compose($request);
     * ```
     *
     * @param ComposeRequest $request The compose request
     * @return ComposeResponse|ComposeJobStatusResponse The compose response
     * @throws AllscreenshotsException On API or network errors
     */
    public function compose(ComposeRequest $request): ComposeResponse|ComposeJobStatusResponse
    {
        $data = $this->postJson('/v1/screenshots/compose', $request->jsonSerialize());

        if (isset($data['jobId'])) {
            return ComposeJobStatusResponse::fromArray($data);
        }

        return ComposeResponse::fromArray($data);
    }

    /**
     * Preview compose layout placement.
     *
     * @param string $layout Layout type
     * @param int $imageCount Number of images
     * @param int|null $canvasWidth Canvas width
     * @param int|null $canvasHeight Canvas height
     * @param string|null $aspectRatios Aspect ratios
     * @return LayoutPreviewResponse The layout preview
     * @throws AllscreenshotsException On API or network errors
     */
    public function previewComposeLayout(
        string $layout,
        int $imageCount,
        ?int $canvasWidth = null,
        ?int $canvasHeight = null,
        ?string $aspectRatios = null,
    ): LayoutPreviewResponse {
        $query = [
            'layout' => $layout,
            'image_count' => $imageCount,
        ];

        if ($canvasWidth !== null) {
            $query['canvas_width'] = $canvasWidth;
        }
        if ($canvasHeight !== null) {
            $query['canvas_height'] = $canvasHeight;
        }
        if ($aspectRatios !== null) {
            $query['aspect_ratios'] = $aspectRatios;
        }

        $data = $this->getJson('/v1/screenshots/compose/preview?' . http_build_query($query));
        return LayoutPreviewResponse::fromArray($data);
    }

    /**
     * List compose jobs.
     *
     * @return ComposeJobSummaryResponse[] Array of compose job summaries
     * @throws AllscreenshotsException On API or network errors
     */
    public function listComposeJobs(): array
    {
        $data = $this->getJson('/v1/screenshots/compose/jobs');
        return array_map(fn(array $job) => ComposeJobSummaryResponse::fromArray($job), $data);
    }

    /**
     * Get a compose job by ID.
     *
     * @param string $jobId The compose job ID
     * @return ComposeJobStatusResponse The compose job status
     * @throws AllscreenshotsException On API or network errors
     */
    public function getComposeJob(string $jobId): ComposeJobStatusResponse
    {
        $data = $this->getJson("/v1/screenshots/compose/jobs/{$jobId}");
        return ComposeJobStatusResponse::fromArray($data);
    }

    // ========================================
    // Schedules
    // ========================================

    /**
     * Create a new schedule.
     *
     * Example:
     * ```php
     * $request = new CreateScheduleRequest(
     *     name: 'Daily screenshot',
     *     url: 'https://example.com',
     *     schedule: '0 9 * * *', // Daily at 9am
     * );
     *
     * $schedule = $client->createSchedule($request);
     * ```
     *
     * @param CreateScheduleRequest $request The schedule request
     * @return ScheduleResponse The created schedule
     * @throws AllscreenshotsException On API or network errors
     */
    public function createSchedule(CreateScheduleRequest $request): ScheduleResponse
    {
        $data = $this->postJson('/v1/schedules', $request->jsonSerialize());
        return ScheduleResponse::fromArray($data);
    }

    /**
     * List all schedules.
     *
     * @return ScheduleListResponse The list of schedules
     * @throws AllscreenshotsException On API or network errors
     */
    public function listSchedules(): ScheduleListResponse
    {
        $data = $this->getJson('/v1/schedules');
        return ScheduleListResponse::fromArray($data);
    }

    /**
     * Get a schedule by ID.
     *
     * @param string $id The schedule ID
     * @return ScheduleResponse The schedule
     * @throws AllscreenshotsException On API or network errors
     */
    public function getSchedule(string $id): ScheduleResponse
    {
        $data = $this->getJson("/v1/schedules/{$id}");
        return ScheduleResponse::fromArray($data);
    }

    /**
     * Update a schedule.
     *
     * @param string $id The schedule ID
     * @param UpdateScheduleRequest $request The update request
     * @return ScheduleResponse The updated schedule
     * @throws AllscreenshotsException On API or network errors
     */
    public function updateSchedule(string $id, UpdateScheduleRequest $request): ScheduleResponse
    {
        $data = $this->putJson("/v1/schedules/{$id}", $request->jsonSerialize());
        return ScheduleResponse::fromArray($data);
    }

    /**
     * Delete a schedule.
     *
     * @param string $id The schedule ID
     * @throws AllscreenshotsException On API or network errors
     */
    public function deleteSchedule(string $id): void
    {
        $this->delete("/v1/schedules/{$id}");
    }

    /**
     * Pause a schedule.
     *
     * @param string $id The schedule ID
     * @return ScheduleResponse The updated schedule
     * @throws AllscreenshotsException On API or network errors
     */
    public function pauseSchedule(string $id): ScheduleResponse
    {
        $data = $this->postJson("/v1/schedules/{$id}/pause", []);
        return ScheduleResponse::fromArray($data);
    }

    /**
     * Resume a schedule.
     *
     * @param string $id The schedule ID
     * @return ScheduleResponse The updated schedule
     * @throws AllscreenshotsException On API or network errors
     */
    public function resumeSchedule(string $id): ScheduleResponse
    {
        $data = $this->postJson("/v1/schedules/{$id}/resume", []);
        return ScheduleResponse::fromArray($data);
    }

    /**
     * Manually trigger a schedule.
     *
     * @param string $id The schedule ID
     * @return ScheduleResponse The updated schedule
     * @throws AllscreenshotsException On API or network errors
     */
    public function triggerSchedule(string $id): ScheduleResponse
    {
        $data = $this->postJson("/v1/schedules/{$id}/trigger", []);
        return ScheduleResponse::fromArray($data);
    }

    /**
     * Get schedule execution history.
     *
     * @param string $id The schedule ID
     * @param int|null $limit Maximum number of executions to return
     * @return ScheduleHistoryResponse The execution history
     * @throws AllscreenshotsException On API or network errors
     */
    public function getScheduleHistory(string $id, ?int $limit = null): ScheduleHistoryResponse
    {
        $path = "/v1/schedules/{$id}/history";
        if ($limit !== null) {
            $path .= "?limit={$limit}";
        }
        $data = $this->getJson($path);
        return ScheduleHistoryResponse::fromArray($data);
    }

    // ========================================
    // Usage
    // ========================================

    /**
     * Get usage statistics.
     *
     * @return UsageResponse Usage statistics
     * @throws AllscreenshotsException On API or network errors
     */
    public function getUsage(): UsageResponse
    {
        $data = $this->getJson('/v1/usage');
        return UsageResponse::fromArray($data);
    }

    /**
     * Get quota status.
     *
     * @return QuotaStatusResponse Quota status
     * @throws AllscreenshotsException On API or network errors
     */
    public function getQuota(): QuotaStatusResponse
    {
        $data = $this->getJson('/v1/usage/quota');
        return QuotaStatusResponse::fromArray($data);
    }

    // ========================================
    // HTTP Methods
    // ========================================

    /**
     * @return array<string, mixed>
     */
    private function getJson(string $path): array
    {
        $response = $this->get($path);
        return $this->parseJsonResponse($response);
    }

    private function get(string $path): ResponseInterface
    {
        return $this->request('GET', $path);
    }

    /**
     * @param array<string, mixed> $data
     * @return array<string, mixed>
     */
    private function postJson(string $path, array $data): array
    {
        $response = $this->post($path, $data, true);
        return $this->parseJsonResponse($response);
    }

    /**
     * @param array<string, mixed> $data
     */
    private function post(string $path, array $data, bool $expectJson): ResponseInterface
    {
        return $this->request('POST', $path, $data);
    }

    /**
     * @param array<string, mixed> $data
     * @return array<string, mixed>
     */
    private function putJson(string $path, array $data): array
    {
        $response = $this->request('PUT', $path, $data);
        return $this->parseJsonResponse($response);
    }

    private function delete(string $path): void
    {
        $this->request('DELETE', $path);
    }

    /**
     * @param array<string, mixed>|null $data
     */
    private function request(string $method, string $path, ?array $data = null): ResponseInterface
    {
        $attempt = 0;
        $lastException = null;

        while ($attempt <= $this->maxRetries) {
            try {
                $options = [
                    'headers' => [
                        'X-API-Key' => $this->apiKey,
                        'User-Agent' => self::USER_AGENT,
                        'Accept' => 'application/json',
                    ],
                ];

                if ($data !== null) {
                    $options['headers']['Content-Type'] = 'application/json';
                    $options['body'] = json_encode($data);
                }

                $response = $this->httpClient->request($method, $this->baseUrl . $path, $options);

                return $response;
            } catch (ConnectException $e) {
                $lastException = new NetworkException(
                    'Failed to connect to the API: ' . $e->getMessage(),
                    'NETWORK_ERROR',
                    $e
                );

                if ($attempt < $this->maxRetries) {
                    $this->sleep($this->calculateBackoff($attempt));
                    $attempt++;
                    continue;
                }

                throw $lastException;
            } catch (RequestException $e) {
                $response = $e->getResponse();

                if ($response === null) {
                    throw new NetworkException(
                        'Request failed: ' . $e->getMessage(),
                        'NETWORK_ERROR',
                        $e
                    );
                }

                $statusCode = $response->getStatusCode();
                $body = (string) $response->getBody();

                // Parse error response
                $errorData = [];
                try {
                    $errorData = json_decode($body, true) ?? [];
                } catch (\Throwable) {
                    // Ignore JSON parse errors
                }

                $errorMessage = $errorData['message'] ?? $errorData['error'] ?? 'Unknown error';
                // Ensure errorMessage is a string (API may return array)
                if (is_array($errorMessage)) {
                    $errorMessage = json_encode($errorMessage) ?: 'Unknown error';
                }
                $errorCode = $errorData['code'] ?? $errorData['errorCode'] ?? null;
                // Ensure errorCode is a string or null
                if ($errorCode !== null && !is_string($errorCode)) {
                    $errorCode = is_array($errorCode) ? json_encode($errorCode) : (string) $errorCode;
                }

                // Handle specific status codes
                $exception = match ($statusCode) {
                    400 => new ValidationException(
                        $errorMessage,
                        $errorData['errors'] ?? [],
                        $errorCode,
                        $e
                    ),
                    401, 403 => new AuthenticationException($errorMessage, $errorCode, $e),
                    404 => new NotFoundException($errorMessage, $errorCode, $e),
                    429 => new RateLimitException(
                        $errorMessage,
                        isset($errorData['retryAfter']) ? (int) $errorData['retryAfter'] : null,
                        $errorCode,
                        $e
                    ),
                    500, 502, 503, 504 => new ServerException($errorMessage, $errorCode, $statusCode, $e),
                    default => new AllscreenshotsException($errorMessage, $errorCode, $statusCode, $e),
                };

                // Retry on server errors and rate limits
                if (($statusCode >= 500 || $statusCode === 429) && $attempt < $this->maxRetries) {
                    $delay = $this->calculateBackoff($attempt);

                    // Use Retry-After header if available
                    if ($statusCode === 429 && $exception instanceof RateLimitException) {
                        $retryAfter = $exception->getRetryAfter();
                        if ($retryAfter !== null) {
                            $delay = (float) $retryAfter;
                        }
                    }

                    $this->sleep($delay);
                    $attempt++;
                    $lastException = $exception;
                    continue;
                }

                throw $exception;
            }
        }

        throw $lastException ?? new AllscreenshotsException('Max retries exceeded');
    }

    /**
     * @return array<string, mixed>
     */
    private function parseJsonResponse(ResponseInterface $response): array
    {
        $body = (string) $response->getBody();

        if ($body === '') {
            return [];
        }

        try {
            $data = json_decode($body, true, 512, JSON_THROW_ON_ERROR);
            return is_array($data) ? $data : [];
        } catch (\JsonException $e) {
            throw new AllscreenshotsException(
                'Failed to parse JSON response: ' . $e->getMessage(),
                'PARSE_ERROR',
                0,
                $e
            );
        }
    }

    private function calculateBackoff(int $attempt): float
    {
        $delay = $this->retryBaseDelay * (2 ** $attempt);
        $jitter = $delay * 0.1 * (mt_rand() / mt_getrandmax());
        return min($delay + $jitter, $this->retryMaxDelay);
    }

    private function sleep(float $seconds): void
    {
        usleep((int) ($seconds * 1_000_000));
    }
}
