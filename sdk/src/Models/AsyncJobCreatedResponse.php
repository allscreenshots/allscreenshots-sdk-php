<?php

declare(strict_types=1);

namespace Allscreenshots\Sdk\Models;

/**
 * Response model for an async job creation.
 */
class AsyncJobCreatedResponse
{
    public function __construct(
        private string $id,
        private string $status,
        private ?string $statusUrl = null,
        private ?string $createdAt = null,
    ) {}

    public function getId(): string
    {
        return $this->id;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getStatusUrl(): ?string
    {
        return $this->statusUrl;
    }

    public function getCreatedAt(): ?string
    {
        return $this->createdAt;
    }

    /**
     * @param array<string, mixed> $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'],
            status: $data['status'],
            statusUrl: $data['statusUrl'] ?? null,
            createdAt: $data['createdAt'] ?? null,
        );
    }
}
