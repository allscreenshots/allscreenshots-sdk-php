<?php

declare(strict_types=1);

namespace Allscreenshots\Sdk\Models;

/**
 * Response model for usage statistics.
 */
class UsageResponse
{
    /**
     * @param PeriodUsageResponse[] $history
     */
    public function __construct(
        private string $tier,
        private PeriodUsageResponse $currentPeriod,
        private QuotaResponse $quota,
        private array $history,
        private TotalsResponse $totals,
    ) {}

    public function getTier(): string
    {
        return $this->tier;
    }

    public function getCurrentPeriod(): PeriodUsageResponse
    {
        return $this->currentPeriod;
    }

    public function getQuota(): QuotaResponse
    {
        return $this->quota;
    }

    /**
     * @return PeriodUsageResponse[]
     */
    public function getHistory(): array
    {
        return $this->history;
    }

    public function getTotals(): TotalsResponse
    {
        return $this->totals;
    }

    /**
     * @param array<string, mixed> $data
     */
    public static function fromArray(array $data): self
    {
        $history = array_map(
            fn(array $h) => PeriodUsageResponse::fromArray($h),
            $data['history'] ?? []
        );

        return new self(
            tier: $data['tier'],
            currentPeriod: PeriodUsageResponse::fromArray($data['currentPeriod']),
            quota: QuotaResponse::fromArray($data['quota']),
            history: $history,
            totals: TotalsResponse::fromArray($data['totals']),
        );
    }
}
