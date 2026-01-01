<?php

declare(strict_types=1);

namespace Allscreenshots\Sdk\Models;

/**
 * Response model for quota status.
 */
class QuotaStatusResponse
{
    public function __construct(
        private string $tier,
        private QuotaDetailResponse $screenshots,
        private BandwidthQuotaResponse $bandwidth,
        private ?string $periodEnds = null,
    ) {}

    public function getTier(): string
    {
        return $this->tier;
    }

    public function getScreenshots(): QuotaDetailResponse
    {
        return $this->screenshots;
    }

    public function getBandwidth(): BandwidthQuotaResponse
    {
        return $this->bandwidth;
    }

    public function getPeriodEnds(): ?string
    {
        return $this->periodEnds;
    }

    /**
     * @param array<string, mixed> $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            tier: $data['tier'],
            screenshots: QuotaDetailResponse::fromArray($data['screenshots']),
            bandwidth: BandwidthQuotaResponse::fromArray($data['bandwidth']),
            periodEnds: $data['periodEnds'] ?? null,
        );
    }
}
