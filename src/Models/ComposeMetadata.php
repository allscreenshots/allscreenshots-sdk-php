<?php

declare(strict_types=1);

namespace Allscreenshots\Sdk\Models;

/**
 * Metadata for compose responses.
 */
class ComposeMetadata
{
    /**
     * @param array<string, mixed>|null $captures
     */
    public function __construct(
        private ?int $captureCount = null,
        private ?array $captures = null,
    ) {}

    public function getCaptureCount(): ?int
    {
        return $this->captureCount;
    }

    /**
     * @return array<string, mixed>|null
     */
    public function getCaptures(): ?array
    {
        return $this->captures;
    }

    /**
     * @param array<string, mixed> $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            captureCount: $data['captureCount'] ?? null,
            captures: $data['captures'] ?? null,
        );
    }
}
