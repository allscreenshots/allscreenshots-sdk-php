<?php

declare(strict_types=1);

namespace Allscreenshots\Sdk\Models;

/**
 * Response model for schedule execution.
 */
class ScheduleExecutionResponse
{
    public function __construct(
        private string $id,
        private ?string $executedAt = null,
        private ?string $status = null,
        private ?string $resultUrl = null,
        private ?string $storageUrl = null,
        private ?int $fileSize = null,
        private ?int $renderTimeMs = null,
        private ?string $errorCode = null,
        private ?string $errorMessage = null,
        private ?string $expiresAt = null,
    ) {}

    public function getId(): string
    {
        return $this->id;
    }

    public function getExecutedAt(): ?string
    {
        return $this->executedAt;
    }

    public function getStatus(): ?string
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

    public function getExpiresAt(): ?string
    {
        return $this->expiresAt;
    }

    /**
     * @param array<string, mixed> $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'],
            executedAt: $data['executedAt'] ?? null,
            status: $data['status'] ?? null,
            resultUrl: $data['resultUrl'] ?? null,
            storageUrl: $data['storageUrl'] ?? null,
            fileSize: $data['fileSize'] ?? null,
            renderTimeMs: $data['renderTimeMs'] ?? null,
            errorCode: $data['errorCode'] ?? null,
            errorMessage: $data['errorMessage'] ?? null,
            expiresAt: $data['expiresAt'] ?? null,
        );
    }
}
