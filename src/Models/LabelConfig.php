<?php

declare(strict_types=1);

namespace Allscreenshots\Sdk\Models;

/**
 * Label configuration for compose output.
 */
class LabelConfig implements \JsonSerializable
{
    public function __construct(
        private ?bool $show = null,
        private ?string $position = null,
        private ?string $fontSize = null,
        private ?string $fontColor = null,
        private ?string $backgroundColor = null,
    ) {}

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];

        if ($this->show !== null) {
            $data['show'] = $this->show;
        }
        if ($this->position !== null) {
            $data['position'] = $this->position;
        }
        if ($this->fontSize !== null) {
            $data['fontSize'] = $this->fontSize;
        }
        if ($this->fontColor !== null) {
            $data['fontColor'] = $this->fontColor;
        }
        if ($this->backgroundColor !== null) {
            $data['backgroundColor'] = $this->backgroundColor;
        }

        return $data;
    }
}
