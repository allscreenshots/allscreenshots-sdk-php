<?php

declare(strict_types=1);

namespace Allscreenshots\Sdk\Models;

/**
 * Response model for synchronous compose operations.
 */
class ComposeResponse
{
    public function __construct(
        private ?string $url = null,
        private ?string $storageUrl = null,
        private ?string $expiresAt = null,
        private ?int $width = null,
        private ?int $height = null,
        private ?string $format = null,
        private ?int $fileSize = null,
        private ?int $renderTimeMs = null,
        private ?string $layout = null,
        private ?ComposeMetadata $metadata = null,
    ) {}

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function getStorageUrl(): ?string
    {
        return $this->storageUrl;
    }

    public function getExpiresAt(): ?string
    {
        return $this->expiresAt;
    }

    public function getWidth(): ?int
    {
        return $this->width;
    }

    public function getHeight(): ?int
    {
        return $this->height;
    }

    public function getFormat(): ?string
    {
        return $this->format;
    }

    public function getFileSize(): ?int
    {
        return $this->fileSize;
    }

    public function getRenderTimeMs(): ?int
    {
        return $this->renderTimeMs;
    }

    public function getLayout(): ?string
    {
        return $this->layout;
    }

    public function getMetadata(): ?ComposeMetadata
    {
        return $this->metadata;
    }

    /**
     * @param array<string, mixed> $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            url: $data['url'] ?? null,
            storageUrl: $data['storageUrl'] ?? null,
            expiresAt: $data['expiresAt'] ?? null,
            width: $data['width'] ?? null,
            height: $data['height'] ?? null,
            format: $data['format'] ?? null,
            fileSize: $data['fileSize'] ?? null,
            renderTimeMs: $data['renderTimeMs'] ?? null,
            layout: $data['layout'] ?? null,
            metadata: isset($data['metadata']) ? ComposeMetadata::fromArray($data['metadata']) : null,
        );
    }
}
