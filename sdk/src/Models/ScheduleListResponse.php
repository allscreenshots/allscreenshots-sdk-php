<?php

declare(strict_types=1);

namespace Allscreenshots\Sdk\Models;

/**
 * Response model for listing schedules.
 */
class ScheduleListResponse
{
    /**
     * @param ScheduleResponse[] $schedules
     */
    public function __construct(
        private array $schedules,
        private int $total,
    ) {}

    /**
     * @return ScheduleResponse[]
     */
    public function getSchedules(): array
    {
        return $this->schedules;
    }

    public function getTotal(): int
    {
        return $this->total;
    }

    /**
     * @param array<string, mixed> $data
     */
    public static function fromArray(array $data): self
    {
        $schedules = array_map(
            fn(array $s) => ScheduleResponse::fromArray($s),
            $data['schedules'] ?? []
        );

        return new self(
            schedules: $schedules,
            total: $data['total'] ?? count($schedules),
        );
    }
}
