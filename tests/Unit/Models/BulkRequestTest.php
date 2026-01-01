<?php

declare(strict_types=1);

namespace Allscreenshots\Sdk\Tests\Unit\Models;

use Allscreenshots\Sdk\Models\BulkDefaults;
use Allscreenshots\Sdk\Models\BulkRequest;
use Allscreenshots\Sdk\Models\BulkUrlRequest;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class BulkRequestTest extends TestCase
{
    #[Test]
    public function it_serializes_bulk_request(): void
    {
        $request = new BulkRequest([
            new BulkUrlRequest('https://example.com'),
            new BulkUrlRequest('https://github.com'),
        ]);

        $json = $request->jsonSerialize();

        $this->assertCount(2, $json['urls']);
        $this->assertSame('https://example.com', $json['urls'][0]['url']);
        $this->assertSame('https://github.com', $json['urls'][1]['url']);
    }

    #[Test]
    public function it_serializes_with_defaults(): void
    {
        $request = new BulkRequest(
            urls: [new BulkUrlRequest('https://example.com')],
            defaults: new BulkDefaults(device: 'Desktop HD', fullPage: true),
        );

        $json = $request->jsonSerialize();

        $this->assertArrayHasKey('defaults', $json);
        $this->assertSame('Desktop HD', $json['defaults']['device']);
        $this->assertTrue($json['defaults']['fullPage']);
    }

    #[Test]
    public function it_supports_adding_urls(): void
    {
        $request = new BulkRequest([]);
        $request->addUrl(new BulkUrlRequest('https://example.com'));
        $request->addUrl(new BulkUrlRequest('https://github.com'));

        $this->assertCount(2, $request->getUrls());
    }

    #[Test]
    public function it_serializes_webhook_settings(): void
    {
        $request = new BulkRequest(
            urls: [new BulkUrlRequest('https://example.com')],
            webhookUrl: 'https://webhook.example.com',
            webhookSecret: 'secret123',
        );

        $json = $request->jsonSerialize();

        $this->assertSame('https://webhook.example.com', $json['webhookUrl']);
        $this->assertSame('secret123', $json['webhookSecret']);
    }
}
