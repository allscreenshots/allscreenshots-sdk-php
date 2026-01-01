<?php

declare(strict_types=1);

namespace Allscreenshots\Sdk\Models;

/**
 * Output configuration for compose requests.
 */
class ComposeOutputConfig implements \JsonSerializable
{
    public function __construct(
        private ?string $layout = null,
        private ?string $format = null,
        private ?int $quality = null,
        private ?int $columns = null,
        private ?int $spacing = null,
        private ?int $padding = null,
        private ?string $background = null,
        private ?string $alignment = null,
        private ?int $maxWidth = null,
        private ?int $maxHeight = null,
        private ?int $thumbnailWidth = null,
        private ?LabelConfig $labels = null,
        private ?BorderConfig $border = null,
        private ?ShadowConfig $shadow = null,
    ) {}

    public function getLayout(): ?string
    {
        return $this->layout;
    }

    public function setLayout(?string $layout): self
    {
        $this->layout = $layout;
        return $this;
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];

        if ($this->layout !== null) {
            $data['layout'] = $this->layout;
        }
        if ($this->format !== null) {
            $data['format'] = $this->format;
        }
        if ($this->quality !== null) {
            $data['quality'] = $this->quality;
        }
        if ($this->columns !== null) {
            $data['columns'] = $this->columns;
        }
        if ($this->spacing !== null) {
            $data['spacing'] = $this->spacing;
        }
        if ($this->padding !== null) {
            $data['padding'] = $this->padding;
        }
        if ($this->background !== null) {
            $data['background'] = $this->background;
        }
        if ($this->alignment !== null) {
            $data['alignment'] = $this->alignment;
        }
        if ($this->maxWidth !== null) {
            $data['maxWidth'] = $this->maxWidth;
        }
        if ($this->maxHeight !== null) {
            $data['maxHeight'] = $this->maxHeight;
        }
        if ($this->thumbnailWidth !== null) {
            $data['thumbnailWidth'] = $this->thumbnailWidth;
        }
        if ($this->labels !== null) {
            $data['labels'] = $this->labels->jsonSerialize();
        }
        if ($this->border !== null) {
            $data['border'] = $this->border->jsonSerialize();
        }
        if ($this->shadow !== null) {
            $data['shadow'] = $this->shadow->jsonSerialize();
        }

        return $data;
    }
}
