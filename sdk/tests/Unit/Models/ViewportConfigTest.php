<?php

declare(strict_types=1);

namespace Allscreenshots\Sdk\Tests\Unit\Models;

use Allscreenshots\Sdk\Models\ViewportConfig;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class ViewportConfigTest extends TestCase
{
    #[Test]
    public function it_serializes_full_config(): void
    {
        $config = new ViewportConfig(1920, 1080, 2);

        $json = $config->jsonSerialize();

        $this->assertSame([
            'width' => 1920,
            'height' => 1080,
            'deviceScaleFactor' => 2,
        ], $json);
    }

    #[Test]
    public function it_serializes_partial_config(): void
    {
        $config = new ViewportConfig(width: 1920);

        $json = $config->jsonSerialize();

        $this->assertSame(['width' => 1920], $json);
    }

    #[Test]
    public function it_creates_from_array(): void
    {
        $data = [
            'width' => 1280,
            'height' => 720,
            'deviceScaleFactor' => 1,
        ];

        $config = ViewportConfig::fromArray($data);

        $this->assertSame(1280, $config->getWidth());
        $this->assertSame(720, $config->getHeight());
        $this->assertSame(1, $config->getDeviceScaleFactor());
    }

    #[Test]
    public function it_supports_fluent_setters(): void
    {
        $config = new ViewportConfig();

        $result = $config
            ->setWidth(1920)
            ->setHeight(1080)
            ->setDeviceScaleFactor(2);

        $this->assertSame($config, $result);
        $this->assertSame(1920, $config->getWidth());
        $this->assertSame(1080, $config->getHeight());
        $this->assertSame(2, $config->getDeviceScaleFactor());
    }
}
