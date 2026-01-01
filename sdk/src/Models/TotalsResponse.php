<?php

declare(strict_types=1);

namespace Allscreenshots\Sdk\Models;

/**
 * Totals response.
 */
class TotalsResponse
{
    public function __construct(
        private int $screenshotsCount,
        private int $bandwidthBytes,
        private string $bandwidthFormatted,
    ) {}

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
            screenshotsCount: $data['screenshotsCount'],
            bandwidthBytes: $data['bandwidthBytes'],
            bandwidthFormatted: $data['bandwidthFormatted'],
        );
    }
}
