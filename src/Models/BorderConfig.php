<?php

declare(strict_types=1);

namespace Allscreenshots\Sdk\Models;

/**
 * Border configuration for compose output.
 */
class BorderConfig implements \JsonSerializable
{
    public function __construct(
        private ?int $width = null,
        private ?string $color = null,
        private ?int $radius = null,
    ) {}

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];

        if ($this->width !== null) {
            $data['width'] = $this->width;
        }
        if ($this->color !== null) {
            $data['color'] = $this->color;
        }
        if ($this->radius !== null) {
            $data['radius'] = $this->radius;
        }

        return $data;
    }
}
