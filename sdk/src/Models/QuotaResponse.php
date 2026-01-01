<?php

declare(strict_types=1);

namespace Allscreenshots\Sdk\Models;

/**
 * Quota response.
 */
class QuotaResponse
{
    public function __construct(
        private int $screenshotsLimit,
        private int $bandwidthLimit,
        private string $bandwidthFormatted,
    ) {}

    public function getScreenshotsLimit(): int
    {
        return $this->screenshotsLimit;
    }

    public function getBandwidthLimit(): int
    {
        return $this->bandwidthLimit;
    }

    public function getBandwidthFormatted(): string
    {
        return $this->bandwidthFormatted;
    }

    /**
     * @param array<string, mixed> $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            screenshotsLimit: $data['screenshotsLimit'] ?? $data['screenshots'] ?? 0,
            bandwidthLimit: $data['bandwidthLimit'] ?? $data['bandwidth'] ?? 0,
            bandwidthFormatted: $data['bandwidthFormatted'] ?? '',
        );
    }
}
