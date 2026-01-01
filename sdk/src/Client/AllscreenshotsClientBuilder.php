<?php

declare(strict_types=1);

namespace Allscreenshots\Sdk\Client;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\ClientInterface;

/**
 * Builder for configuring and creating an AllscreenshotsClient instance.
 *
 * Example usage:
 * ```php
 * $client = AllscreenshotsClient::builder()
 *     ->apiKey('your-api-key')
 *     ->baseUrl('https://api.allscreenshots.com')
 *     ->timeout(30)
 *     ->maxRetries(3)
 *     ->build();
 * ```
 */
class AllscreenshotsClientBuilder
{
    private ?string $apiKey = null;
    private string $baseUrl = 'https://api.allscreenshots.com';
    private int $timeout = 60;
    private int $connectTimeout = 10;
    private int $maxRetries = 3;
    private float $retryBaseDelay = 1.0;
    private float $retryMaxDelay = 30.0;
    private ?ClientInterface $httpClient = null;

    /**
     * Set the API key for authentication.
     *
     * If not set, the SDK will attempt to read from the ALLSCREENSHOTS_API_KEY environment variable.
     *
     * @param string $apiKey The API key
     * @return $this
     */
    public function apiKey(string $apiKey): self
    {
        $this->apiKey = $apiKey;
        return $this;
    }

    /**
     * Set the base URL for the API.
     *
     * @param string $baseUrl The base URL (default: https://api.allscreenshots.com)
     * @return $this
     */
    public function baseUrl(string $baseUrl): self
    {
        $this->baseUrl = rtrim($baseUrl, '/');
        return $this;
    }

    /**
     * Set the request timeout in seconds.
     *
     * @param int $timeout Timeout in seconds (default: 60)
     * @return $this
     */
    public function timeout(int $timeout): self
    {
        $this->timeout = $timeout;
        return $this;
    }

    /**
     * Set the connection timeout in seconds.
     *
     * @param int $connectTimeout Connection timeout in seconds (default: 10)
     * @return $this
     */
    public function connectTimeout(int $connectTimeout): self
    {
        $this->connectTimeout = $connectTimeout;
        return $this;
    }

    /**
     * Set the maximum number of retry attempts for transient failures.
     *
     * @param int $maxRetries Maximum retry attempts (default: 3)
     * @return $this
     */
    public function maxRetries(int $maxRetries): self
    {
        $this->maxRetries = $maxRetries;
        return $this;
    }

    /**
     * Set the base delay for exponential backoff retry.
     *
     * @param float $retryBaseDelay Base delay in seconds (default: 1.0)
     * @return $this
     */
    public function retryBaseDelay(float $retryBaseDelay): self
    {
        $this->retryBaseDelay = $retryBaseDelay;
        return $this;
    }

    /**
     * Set the maximum delay for exponential backoff retry.
     *
     * @param float $retryMaxDelay Maximum delay in seconds (default: 30.0)
     * @return $this
     */
    public function retryMaxDelay(float $retryMaxDelay): self
    {
        $this->retryMaxDelay = $retryMaxDelay;
        return $this;
    }

    /**
     * Set a custom HTTP client.
     *
     * @param ClientInterface $httpClient Custom Guzzle HTTP client
     * @return $this
     */
    public function httpClient(ClientInterface $httpClient): self
    {
        $this->httpClient = $httpClient;
        return $this;
    }

    /**
     * Build and return the AllscreenshotsClient instance.
     *
     * @return AllscreenshotsClient
     * @throws \InvalidArgumentException If API key is not provided and not available in environment
     */
    public function build(): AllscreenshotsClient
    {
        $apiKey = $this->apiKey ?? getenv('ALLSCREENSHOTS_API_KEY');

        if ($apiKey === false || $apiKey === '') {
            throw new \InvalidArgumentException(
                'API key is required. Set it via builder->apiKey() or ALLSCREENSHOTS_API_KEY environment variable.'
            );
        }

        $httpClient = $this->httpClient ?? new GuzzleClient([
            'timeout' => $this->timeout,
            'connect_timeout' => $this->connectTimeout,
        ]);

        return new AllscreenshotsClient(
            apiKey: $apiKey,
            baseUrl: $this->baseUrl,
            httpClient: $httpClient,
            maxRetries: $this->maxRetries,
            retryBaseDelay: $this->retryBaseDelay,
            retryMaxDelay: $this->retryMaxDelay,
        );
    }
}
