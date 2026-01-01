<?php

declare(strict_types=1);

namespace Allscreenshots\Sdk\Tests\Unit\Client;

use Allscreenshots\Sdk\Client\AllscreenshotsClient;
use Allscreenshots\Sdk\Client\AllscreenshotsClientBuilder;
use GuzzleHttp\Client as GuzzleClient;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class AllscreenshotsClientBuilderTest extends TestCase
{
    #[Test]
    public function it_builds_client_with_api_key(): void
    {
        $client = AllscreenshotsClient::builder()
            ->apiKey('test-api-key')
            ->build();

        $this->assertInstanceOf(AllscreenshotsClient::class, $client);
    }

    #[Test]
    public function it_throws_when_api_key_missing(): void
    {
        // Clear environment variable
        putenv('ALLSCREENSHOTS_API_KEY');

        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('API key is required');

        AllscreenshotsClient::builder()->build();
    }

    #[Test]
    public function it_reads_api_key_from_environment(): void
    {
        putenv('ALLSCREENSHOTS_API_KEY=env-api-key');

        $client = AllscreenshotsClient::builder()->build();

        $this->assertInstanceOf(AllscreenshotsClient::class, $client);

        // Clean up
        putenv('ALLSCREENSHOTS_API_KEY');
    }

    #[Test]
    public function it_allows_custom_base_url(): void
    {
        $builder = new AllscreenshotsClientBuilder();
        $result = $builder
            ->apiKey('test-key')
            ->baseUrl('https://custom.api.com/');

        $this->assertSame($builder, $result);
    }

    #[Test]
    public function it_allows_custom_timeouts(): void
    {
        $builder = new AllscreenshotsClientBuilder();
        $result = $builder
            ->apiKey('test-key')
            ->timeout(120)
            ->connectTimeout(30);

        $this->assertSame($builder, $result);
    }

    #[Test]
    public function it_allows_custom_retry_settings(): void
    {
        $builder = new AllscreenshotsClientBuilder();
        $result = $builder
            ->apiKey('test-key')
            ->maxRetries(5)
            ->retryBaseDelay(2.0)
            ->retryMaxDelay(60.0);

        $this->assertSame($builder, $result);
    }

    #[Test]
    public function it_allows_custom_http_client(): void
    {
        $httpClient = new GuzzleClient();

        $builder = new AllscreenshotsClientBuilder();
        $result = $builder
            ->apiKey('test-key')
            ->httpClient($httpClient);

        $this->assertSame($builder, $result);
    }
}
