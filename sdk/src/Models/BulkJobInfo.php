<?php

declare(strict_types=1);

namespace Allscreenshots\Sdk\Models;

/**
 * Basic job info for bulk responses.
 */
class BulkJobInfo
{
    public function __construct(
        private string $id,
        private string $url,
        private string $status,
    ) {}

    public function getId(): string
    {
        return $this->id;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param array<string, mixed> $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'],
            url: $data['url'],
            status: $data['status'],
        );
    }
}
