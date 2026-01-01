<?php

declare(strict_types=1);

namespace Allscreenshots\Sdk\Models;

/**
 * Response model for compose job status.
 */
class ComposeJobStatusResponse
{
    public function __construct(
        private string $jobId,
        private string $status,
        private ?int $progress = null,
        private ?int $totalCaptures = null,
        private ?int $completedCaptures = null,
        private ?ComposeResponse $result = null,
        private ?string $errorCode = null,
        private ?string $errorMessage = null,
        private ?string $createdAt = null,
        private ?string $completedAt = null,
    ) {}

    public function getJobId(): string
    {
        return $this->jobId;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getProgress(): ?int
    {
        return $this->progress;
    }

    public function getTotalCaptures(): ?int
    {
        return $this->totalCaptures;
    }

    public function getCompletedCaptures(): ?int
    {
        return $this->completedCaptures;
    }

    public function getResult(): ?ComposeResponse
    {
        return $this->result;
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

    public function isCompleted(): bool
    {
        return $this->status === 'COMPLETED';
    }

    public function isFailed(): bool
    {
        return $this->status === 'FAILED';
    }

    /**
     * @param array<string, mixed> $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            jobId: $data['jobId'],
            status: $data['status'],
            progress: $data['progress'] ?? null,
            totalCaptures: $data['totalCaptures'] ?? null,
            completedCaptures: $data['completedCaptures'] ?? null,
            result: isset($data['result']) ? ComposeResponse::fromArray($data['result']) : null,
            errorCode: $data['errorCode'] ?? null,
            errorMessage: $data['errorMessage'] ?? null,
            createdAt: $data['createdAt'] ?? null,
            completedAt: $data['completedAt'] ?? null,
        );
    }
}
