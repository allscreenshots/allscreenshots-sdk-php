<?php

declare(strict_types=1);

namespace Allscreenshots\Sdk\Models;

/**
 * Placement preview for layout preview.
 */
class PlacementPreview
{
    public function __construct(
        private int $index,
        private int $x,
        private int $y,
        private int $width,
        private int $height,
        private ?string $label = null,
    ) {}

    public function getIndex(): int
    {
        return $this->index;
    }

    public function getX(): int
    {
        return $this->x;
    }

    public function getY(): int
    {
        return $this->y;
    }

    public function getWidth(): int
    {
        return $this->width;
    }

    public function getHeight(): int
    {
        return $this->height;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    /**
     * @param array<string, mixed> $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            index: $data['index'],
            x: $data['x'],
            y: $data['y'],
            width: $data['width'],
            height: $data['height'],
            label: $data['label'] ?? null,
        );
    }
}
