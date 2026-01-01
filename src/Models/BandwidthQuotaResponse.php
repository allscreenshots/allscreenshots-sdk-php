<?php

declare(strict_types=1);

namespace Allscreenshots\Sdk\Models;

/**
 * Bandwidth quota response.
 */
class BandwidthQuotaResponse
{
    public function __construct(
        private int $limitBytes,
        private string $limitFormatted,
        private int $usedBytes,
        private string $usedFormatted,
        private int $remainingBytes,
        private string $remainingFormatted,
        private int $percentUsed,
    ) {}

    public function getLimitBytes(): int
    {
        return $this->limitBytes;
    }

    public function getLimitFormatted(): string
    {
        return $this->limitFormatted;
    }

    public function getUsedBytes(): int
    {
        return $this->usedBytes;
    }

    public function getUsedFormatted(): string
    {
        return $this->usedFormatted;
    }

    public function getRemainingBytes(): int
    {
        return $this->remainingBytes;
    }

    public function getRemainingFormatted(): string
    {
        return $this->remainingFormatted;
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
            limitBytes: $data['limitBytes'],
            limitFormatted: $data['limitFormatted'],
            usedBytes: $data['usedBytes'],
            usedFormatted: $data['usedFormatted'],
            remainingBytes: $data['remainingBytes'],
            remainingFormatted: $data['remainingFormatted'],
            percentUsed: $data['percentUsed'],
        );
    }
}
