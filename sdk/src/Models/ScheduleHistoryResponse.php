<?php

declare(strict_types=1);

namespace Allscreenshots\Sdk\Models;

/**
 * Response model for schedule history.
 */
class ScheduleHistoryResponse
{
    /**
     * @param ScheduleExecutionResponse[] $executions
     */
    public function __construct(
        private string $scheduleId,
        private int $totalExecutions,
        private array $executions,
    ) {}

    public function getScheduleId(): string
    {
        return $this->scheduleId;
    }

    public function getTotalExecutions(): int
    {
        return $this->totalExecutions;
    }

    /**
     * @return ScheduleExecutionResponse[]
     */
    public function getExecutions(): array
    {
        return $this->executions;
    }

    /**
     * @param array<string, mixed> $data
     */
    public static function fromArray(array $data): self
    {
        $executions = array_map(
            fn(array $e) => ScheduleExecutionResponse::fromArray($e),
            $data['executions'] ?? []
        );

        return new self(
            scheduleId: $data['scheduleId'],
            totalExecutions: $data['totalExecutions'] ?? count($executions),
            executions: $executions,
        );
    }
}
