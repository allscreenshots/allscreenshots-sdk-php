<?php

declare(strict_types=1);

namespace Allscreenshots\Sdk\Models;

/**
 * Response model for layout preview.
 */
class LayoutPreviewResponse
{
    /**
     * @param PlacementPreview[] $placements
     * @param array<string, mixed>|null $metadata
     */
    public function __construct(
        private string $layout,
        private string $resolvedLayout,
        private int $canvasWidth,
        private int $canvasHeight,
        private array $placements,
        private ?array $metadata = null,
    ) {}

    public function getLayout(): string
    {
        return $this->layout;
    }

    public function getResolvedLayout(): string
    {
        return $this->resolvedLayout;
    }

    public function getCanvasWidth(): int
    {
        return $this->canvasWidth;
    }

    public function getCanvasHeight(): int
    {
        return $this->canvasHeight;
    }

    /**
     * @return PlacementPreview[]
     */
    public function getPlacements(): array
    {
        return $this->placements;
    }

    /**
     * @return array<string, mixed>|null
     */
    public function getMetadata(): ?array
    {
        return $this->metadata;
    }

    /**
     * @param array<string, mixed> $data
     */
    public static function fromArray(array $data): self
    {
        $placements = array_map(
            fn(array $p) => PlacementPreview::fromArray($p),
            $data['placements'] ?? []
        );

        return new self(
            layout: $data['layout'],
            resolvedLayout: $data['resolvedLayout'],
            canvasWidth: $data['canvasWidth'],
            canvasHeight: $data['canvasHeight'],
            placements: $placements,
            metadata: $data['metadata'] ?? null,
        );
    }
}
