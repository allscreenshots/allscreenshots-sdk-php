<?php

declare(strict_types=1);

namespace Allscreenshots\Sdk\Models;

/**
 * Summary model for bulk jobs.
 */
class BulkJobSummary
{
    public function __construct(
        private string $id,
        private string $status,
        private int $totalJobs,
        private int $completedJobs,
        private int $failedJobs,
        private int $progress,
        private ?string $createdAt = null,
        private ?string $completedAt = null,
    ) {}

    public function getId(): string
    {
        return $this->id;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getTotalJobs(): int
    {
        return $this->totalJobs;
    }

    public function getCompletedJobs(): int
    {
        return $this->completedJobs;
    }

    public function getFailedJobs(): int
    {
        return $this->failedJobs;
    }

    public function getProgress(): int
    {
        return $this->progress;
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
            status: $data['status'],
            totalJobs: $data['totalJobs'],
            completedJobs: $data['completedJobs'],
            failedJobs: $data['failedJobs'],
            progress: $data['progress'],
            createdAt: $data['createdAt'] ?? null,
            completedAt: $data['completedAt'] ?? null,
        );
    }
}
