<?php

declare(strict_types=1);

namespace Allscreenshots\Sdk\Tests\Unit\Models;

use Allscreenshots\Sdk\Models\ScreenshotRequest;
use Allscreenshots\Sdk\Models\ViewportConfig;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class ScreenshotRequestTest extends TestCase
{
    #[Test]
    public function it_serializes_minimal_request(): void
    {
        $request = new ScreenshotRequest('https://example.com');

        $json = $request->jsonSerialize();

        $this->assertSame(['url' => 'https://example.com'], $json);
    }

    #[Test]
    public function it_serializes_full_request(): void
    {
        $request = new ScreenshotRequest(
            url: 'https://example.com',
            device: 'Desktop HD',
            fullPage: true,
            format: 'png',
            quality: 90,
        );
        $request->setViewport(new ViewportConfig(1920, 1080, 2));
        $request->setDelay(1000);
        $request->setDarkMode(true);
        $request->setBlockAds(true);

        $json = $request->jsonSerialize();

        $this->assertSame('https://example.com', $json['url']);
        $this->assertSame('Desktop HD', $json['device']);
        $this->assertTrue($json['fullPage']);
        $this->assertSame('png', $json['format']);
        $this->assertSame(90, $json['quality']);
        $this->assertSame(1000, $json['delay']);
        $this->assertTrue($json['darkMode']);
        $this->assertTrue($json['blockAds']);
        $this->assertSame(['width' => 1920, 'height' => 1080, 'deviceScaleFactor' => 2], $json['viewport']);
    }

    #[Test]
    public function it_supports_fluent_setters(): void
    {
        $request = new ScreenshotRequest('https://example.com');

        $result = $request
            ->setDevice('iPhone 14')
            ->setFullPage(true)
            ->setFormat('jpeg')
            ->setQuality(80);

        $this->assertSame($request, $result);
        $this->assertSame('iPhone 14', $request->getDevice());
        $this->assertTrue($request->isFullPage());
        $this->assertSame('jpeg', $request->getFormat());
        $this->assertSame(80, $request->getQuality());
    }

    #[Test]
    public function it_handles_hide_selectors(): void
    {
        $request = new ScreenshotRequest('https://example.com');
        $request->setHideSelectors(['.cookie-banner', '.ads']);

        $json = $request->jsonSerialize();

        $this->assertSame(['.cookie-banner', '.ads'], $json['hideSelectors']);
    }
}
