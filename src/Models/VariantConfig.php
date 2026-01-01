<?php

declare(strict_types=1);

namespace Allscreenshots\Sdk\Models;

/**
 * Variant configuration for compose requests.
 */
class VariantConfig implements \JsonSerializable
{
    public function __construct(
        private ?string $id = null,
        private ?string $label = null,
        private ?ViewportConfig $viewport = null,
        private ?string $device = null,
        private ?bool $fullPage = null,
        private ?bool $darkMode = null,
        private ?int $delay = null,
        private ?string $customCss = null,
    ) {}

    public function getId(): ?string
    {
        return $this->id;
    }

    public function setId(?string $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(?string $label): self
    {
        $this->label = $label;
        return $this;
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];

        if ($this->id !== null) {
            $data['id'] = $this->id;
        }
        if ($this->label !== null) {
            $data['label'] = $this->label;
        }
        if ($this->viewport !== null) {
            $data['viewport'] = $this->viewport->jsonSerialize();
        }
        if ($this->device !== null) {
            $data['device'] = $this->device;
        }
        if ($this->fullPage !== null) {
            $data['fullPage'] = $this->fullPage;
        }
        if ($this->darkMode !== null) {
            $data['darkMode'] = $this->darkMode;
        }
        if ($this->delay !== null) {
            $data['delay'] = $this->delay;
        }
        if ($this->customCss !== null) {
            $data['customCss'] = $this->customCss;
        }

        return $data;
    }
}
