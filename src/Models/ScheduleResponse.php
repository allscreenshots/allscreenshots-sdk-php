<?php

declare(strict_types=1);

namespace Allscreenshots\Sdk\Models;

/**
 * Response model for schedule operations.
 */
class ScheduleResponse
{
    /**
     * @param array<string, mixed>|null $options
     */
    public function __construct(
        private string $id,
        private string $name,
        private string $url,
        private string $schedule,
        private ?string $scheduleDescription = null,
        private ?string $timezone = null,
        private ?string $status = null,
        private ?array $options = null,
        private ?string $webhookUrl = null,
        private ?int $retentionDays = null,
        private ?string $startsAt = null,
        private ?string $endsAt = null,
        private ?string $lastExecutedAt = null,
        private ?string $nextExecutionAt = null,
        private ?int $executionCount = null,
        private ?int $successCount = null,
        private ?int $failureCount = null,
        private ?string $createdAt = null,
        private ?string $updatedAt = null,
    ) {}

    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function getSchedule(): string
    {
        return $this->schedule;
    }

    public function getScheduleDescription(): ?string
    {
        return $this->scheduleDescription;
    }

    public function getTimezone(): ?string
    {
        return $this->timezone;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * @return array<string, mixed>|null
     */
    public function getOptions(): ?array
    {
        return $this->options;
    }

    public function getWebhookUrl(): ?string
    {
        return $this->webhookUrl;
    }

    public function getRetentionDays(): ?int
    {
        return $this->retentionDays;
    }

    public function getStartsAt(): ?string
    {
        return $this->startsAt;
    }

    public function getEndsAt(): ?string
    {
        return $this->endsAt;
    }

    public function getLastExecutedAt(): ?string
    {
        return $this->lastExecutedAt;
    }

    public function getNextExecutionAt(): ?string
    {
        return $this->nextExecutionAt;
    }

    public function getExecutionCount(): ?int
    {
        return $this->executionCount;
    }

    public function getSuccessCount(): ?int
    {
        return $this->successCount;
    }

    public function getFailureCount(): ?int
    {
        return $this->failureCount;
    }

    public function getCreatedAt(): ?string
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): ?string
    {
        return $this->updatedAt;
    }

    /**
     * @param array<string, mixed> $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'],
            name: $data['name'],
            url: $data['url'],
            schedule: $data['schedule'],
            scheduleDescription: $data['scheduleDescription'] ?? null,
            timezone: $data['timezone'] ?? null,
            status: $data['status'] ?? null,
            options: $data['options'] ?? null,
            webhookUrl: $data['webhookUrl'] ?? null,
            retentionDays: $data['retentionDays'] ?? null,
            startsAt: $data['startsAt'] ?? null,
            endsAt: $data['endsAt'] ?? null,
            lastExecutedAt: $data['lastExecutedAt'] ?? null,
            nextExecutionAt: $data['nextExecutionAt'] ?? null,
            executionCount: $data['executionCount'] ?? null,
            successCount: $data['successCount'] ?? null,
            failureCount: $data['failureCount'] ?? null,
            createdAt: $data['createdAt'] ?? null,
            updatedAt: $data['updatedAt'] ?? null,
        );
    }
}
