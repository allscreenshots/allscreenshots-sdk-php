<?php

declare(strict_types=1);

namespace Allscreenshots\Sdk\Models;

/**
 * Quota detail response.
 */
class QuotaDetailResponse
{
    public function __construct(
        private int $limit,
        private int $used,
        private int $remaining,
        private int $percentUsed,
    ) {}

    public function getLimit(): int
    {
        return $this->limit;
    }

    public function getUsed(): int
    {
        return $this->used;
    }

    public function getRemaining(): int
    {
        return $this->remaining;
    }

    public function getPercentUsed(): int
    {
        return $this->percentUsed;
    }

    /**
     * @param array<string, mixed> $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            limit: $data['limit'],
            used: $data['used'],
            remaining: $data['remaining'],
            percentUsed: $data['percentUsed'],
        );
    }
}
