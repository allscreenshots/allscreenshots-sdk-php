<?php

declare(strict_types=1);

namespace Allscreenshots\Sdk\Models;

/**
 * Detailed job info for bulk status responses.
 */
class BulkJobDetailInfo
{
    public function __construct(
        private string $id,
        private string $url,
        private string $status,
        private ?string $resultUrl = null,
        private ?string $storageUrl = null,
        private ?string $format = null,
        private ?int $width = null,
        private ?int $height = null,
        private ?int $fileSize = null,
        private ?int $renderTimeMs = null,
        private ?string $errorCode = null,
        private ?string $errorMessage = null,
        private ?string $createdAt = null,
        private ?string $completedAt = null,
    ) {}

    public function getId(): string
    {
        return $this->id;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getResultUrl(): ?string
    {
        return $this->resultUrl;
    }

    public function getStorageUrl(): ?string
    {
        return $this->storageUrl;
    }

    public function getFormat(): ?string
    {
        return $this->format;
    }

    public function getWidth(): ?int
    {
        return $this->width;
    }

    public function getHeight(): ?int
    {
        return $this->height;
    }

    public function getFileSize(): ?int
    {
        return $this->fileSize;
    }

    public function getRenderTimeMs(): ?int
    {
        return $this->renderTimeMs;
    }

    public function getErrorCode(): ?string
    {
        return $this->errorCode;
    }

    public function getErrorMessage(): ?string
    {
        return $this->errorMessage;
    }

    public function getCreatedAt(): ?string
    {
        return $this->createdAt;
    }

    public function getCompletedAt(): ?string
    {
        return $this->completedAt;
    }

    /**
     * @param array<string, mixed> $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'],
            url: $data['url'],
            status: $data['status'],
            resultUrl: $data['resultUrl'] ?? null,
            storageUrl: $data['storageUrl'] ?? null,
            format: $data['format'] ?? null,
            width: $data['width'] ?? null,
            height: $data['height'] ?? null,
            fileSize: $data['fileSize'] ?? null,
            renderTimeMs: $data['renderTimeMs'] ?? null,
            errorCode: $data['errorCode'] ?? null,
            errorMessage: $data['errorMessage'] ?? null,
            createdAt: $data['createdAt'] ?? null,
            completedAt: $data['completedAt'] ?? null,
        );
    }
}
