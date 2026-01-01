<?php

declare(strict_types=1);

namespace Allscreenshots\Sdk\Models;

/**
 * Summary model for compose jobs.
 */
class ComposeJobSummaryResponse
{
    public function __construct(
        private string $jobId,
        private string $status,
        private ?int $totalCaptures = null,
        private ?int $completedCaptures = null,
        private ?int $failedCaptures = null,
        private ?int $progress = null,
        private ?string $layoutType = null,
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

    public function getTotalCaptures(): ?int
    {
        return $this->totalCaptures;
    }

    public function getCompletedCaptures(): ?int
    {
        return $this->completedCaptures;
    }

    public function getFailedCaptures(): ?int
    {
        return $this->failedCaptures;
    }

    public function getProgress(): ?int
    {
        return $this->progress;
    }

    public function getLayoutType(): ?string
    {
        return $this->layoutType;
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
            jobId: $data['jobId'],
            status: $data['status'],
            totalCaptures: $data['totalCaptures'] ?? null,
            completedCaptures: $data['completedCaptures'] ?? null,
            failedCaptures: $data['failedCaptures'] ?? null,
            progress: $data['progress'] ?? null,
            layoutType: $data['layoutType'] ?? null,
            createdAt: $data['createdAt'] ?? null,
            completedAt: $data['completedAt'] ?? null,
        );
    }
}
