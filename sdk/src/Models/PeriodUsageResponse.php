<?php

declare(strict_types=1);

namespace Allscreenshots\Sdk\Models;

/**
 * Period usage response.
 */
class PeriodUsageResponse
{
    public function __construct(
        private string $periodStart,
        private string $periodEnd,
        private int $screenshotsCount,
        private int $bandwidthBytes,
        private string $bandwidthFormatted,
    ) {}

    public function getPeriodStart(): string
    {
        return $this->periodStart;
    }

    public function getPeriodEnd(): string
    {
        return $this->periodEnd;
    }

    public function getScreenshotsCount(): int
    {
        return $this->screenshotsCount;
    }

    public function getBandwidthBytes(): int
    {
        return $this->bandwidthBytes;
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
            periodStart: $data['periodStart'],
            periodEnd: $data['periodEnd'],
            screenshotsCount: $data['screenshotsCount'],
            bandwidthBytes: $data['bandwidthBytes'],
            bandwidthFormatted: $data['bandwidthFormatted'],
        );
    }
}
