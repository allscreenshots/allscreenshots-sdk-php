<?php

declare(strict_types=1);

namespace Allscreenshots\Sdk\Models;

/**
 * Shadow configuration for compose output.
 */
class ShadowConfig implements \JsonSerializable
{
    public function __construct(
        private ?bool $enabled = null,
        private ?int $offsetX = null,
        private ?int $offsetY = null,
        private ?int $blur = null,
        private ?string $color = null,
    ) {}

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];

        if ($this->enabled !== null) {
            $data['enabled'] = $this->enabled;
        }
        if ($this->offsetX !== null) {
            $data['offsetX'] = $this->offsetX;
        }
        if ($this->offsetY !== null) {
            $data['offsetY'] = $this->offsetY;
        }
        if ($this->blur !== null) {
            $data['blur'] = $this->blur;
        }
        if ($this->color !== null) {
            $data['color'] = $this->color;
        }

        return $data;
    }
}
