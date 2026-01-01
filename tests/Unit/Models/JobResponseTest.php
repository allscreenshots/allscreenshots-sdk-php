<?php

declare(strict_types=1);

namespace Allscreenshots\Sdk\Tests\Unit\Models;

use Allscreenshots\Sdk\Models\JobResponse;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class JobResponseTest extends TestCase
{
    #[Test]
    public function it_creates_from_array(): void
    {
        $data = [
            'id' => 'job-123',
            'status' => 'COMPLETED',
            'url' => 'https://example.com',
            'resultUrl' => 'https://storage.example.com/result.png',
            'createdAt' => '2024-01-01T00:00:00Z',
            'completedAt' => '2024-01-01T00:00:05Z',
        ];

        $job = JobResponse::fromArray($data);

        $this->assertSame('job-123', $job->getId());
        $this->assertSame('COMPLETED', $job->getStatus());
        $this->assertSame('https://example.com', $job->getUrl());
        $this->assertSame('https://storage.example.com/result.png', $job->getResultUrl());
        $this->assertTrue($job->isCompleted());
        $this->assertFalse($job->isFailed());
    }

    #[Test]
    public function it_handles_all_statuses(): void
    {
        $statuses = [
            'QUEUED' => 'isQueued',
            'PROCESSING' => 'isProcessing',
            'COMPLETED' => 'isCompleted',
            'FAILED' => 'isFailed',
            'CANCELLED' => 'isCancelled',
        ];

        foreach ($statuses as $status => $method) {
            $job = JobResponse::fromArray(['id' => 'job-1', 'status' => $status]);
            $this->assertTrue($job->$method(), "Status {$status} should return true for {$method}");
        }
    }

    #[Test]
    public function it_handles_error_fields(): void
    {
        $data = [
            'id' => 'job-123',
            'status' => 'FAILED',
            'errorCode' => 'TIMEOUT',
            'errorMessage' => 'Page load timeout',
        ];

        $job = JobResponse::fromArray($data);

        $this->assertSame('TIMEOUT', $job->getErrorCode());
        $this->assertSame('Page load timeout', $job->getErrorMessage());
        $this->assertTrue($job->isFailed());
    }
}
