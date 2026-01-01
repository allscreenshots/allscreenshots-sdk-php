<?php

declare(strict_types=1);

namespace Allscreenshots\Sdk\Models;

/**
 * Detailed status response for bulk jobs.
 */
class BulkStatusResponse
{
    /**
     * @param BulkJobDetailInfo[] $jobs
     */
    public function __construct(
        private string $id,
        private string $status,
        private int $totalJobs,
        private int $completedJobs,
        private int $failedJobs,
        private int $progress,
        private array $jobs,
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

    /**
     * @return BulkJobDetailInfo[]
     */
    public function getJobs(): array
    {
        return $this->jobs;
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
        $jobs = array_map(
            fn(array $job) => BulkJobDetailInfo::fromArray($job),
            $data['jobs'] ?? []
        );

        return new self(
            id: $data['id'],
            status: $data['status'],
            totalJobs: $data['totalJobs'],
            completedJobs: $data['completedJobs'],
            failedJobs: $data['failedJobs'],
            progress: $data['progress'],
            jobs: $jobs,
            createdAt: $data['createdAt'] ?? null,
            completedAt: $data['completedAt'] ?? null,
        );
    }
}
