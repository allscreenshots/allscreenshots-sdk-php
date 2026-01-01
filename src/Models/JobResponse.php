<?php

declare(strict_types=1);

namespace Allscreenshots\Sdk\Models;

/**
 * Response model for a screenshot job.
 */
class JobResponse
{
    public function __construct(
        private string $id,
        private string $status,
        private ?string $url = null,
        private ?string $resultUrl = null,
        private ?string $errorCode = null,
        private ?string $errorMessage = null,
        private ?string $createdAt = null,
        private ?string $startedAt = null,
        private ?string $completedAt = null,
        private ?string $expiresAt = null,
        /** @var array<string, mixed>|null */
        private ?array $metadata = null,
    ) {}

    public function getId(): string
    {
        return $this->id;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function getResultUrl(): ?string
    {
        return $this->resultUrl;
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

    public function getStartedAt(): ?string
    {
        return $this->startedAt;
    }

    public function getCompletedAt(): ?string
    {
        return $this->completedAt;
    }

    public function getExpiresAt(): ?string
    {
        return $this->expiresAt;
    }

    /**
     * @return array<string, mixed>|null
     */
    public function getMetadata(): ?array
    {
        return $this->metadata;
    }

    public function isCompleted(): bool
    {
        return $this->status === 'COMPLETED';
    }

    public function isFailed(): bool
    {
        return $this->status === 'FAILED';
    }

    public function isQueued(): bool
    {
        return $this->status === 'QUEUED';
    }

    public function isProcessing(): bool
    {
        return $this->status === 'PROCESSING';
    }

    public function isCancelled(): bool
    {
        return $this->status === 'CANCELLED';
    }

    /**
     * @param array<string, mixed> $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'],
            status: $data['status'],
            url: $data['url'] ?? null,
            resultUrl: $data['resultUrl'] ?? null,
            errorCode: $data['errorCode'] ?? null,
            errorMessage: $data['errorMessage'] ?? null,
            createdAt: $data['createdAt'] ?? null,
            startedAt: $data['startedAt'] ?? null,
            completedAt: $data['completedAt'] ?? null,
            expiresAt: $data['expiresAt'] ?? null,
            metadata: $data['metadata'] ?? null,
        );
    }
}
