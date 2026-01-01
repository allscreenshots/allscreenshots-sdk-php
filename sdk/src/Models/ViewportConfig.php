<?php

declare(strict_types=1);

namespace Allscreenshots\Sdk\Models;

/**
 * Viewport configuration for screenshot capture.
 */
class ViewportConfig implements \JsonSerializable
{
    public function __construct(
        private ?int $width = null,
        private ?int $height = null,
        private ?int $deviceScaleFactor = null,
    ) {}

    public function getWidth(): ?int
    {
        return $this->width;
    }

    public function setWidth(?int $width): self
    {
        $this->width = $width;
        return $this;
    }

    public function getHeight(): ?int
    {
        return $this->height;
    }

    public function setHeight(?int $height): self
    {
        $this->height = $height;
        return $this;
    }

    public function getDeviceScaleFactor(): ?int
    {
        return $this->deviceScaleFactor;
    }

    public function setDeviceScaleFactor(?int $deviceScaleFactor): self
    {
        $this->deviceScaleFactor = $deviceScaleFactor;
        return $this;
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        if ($this->width !== null) {
            $data['width'] = $this->width;
        }
        if ($this->height !== null) {
            $data['height'] = $this->height;
        }
        if ($this->deviceScaleFactor !== null) {
            $data['deviceScaleFactor'] = $this->deviceScaleFactor;
        }
        return $data;
    }

    /**
     * @param array<string, mixed> $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            width: $data['width'] ?? null,
            height: $data['height'] ?? null,
            deviceScaleFactor: $data['deviceScaleFactor'] ?? null,
        );
    }
}
