<?php

declare(strict_types=1);

namespace Allscreenshots\Sdk\Models;

/**
 * Request model for compose operations.
 */
class ComposeRequest implements \JsonSerializable
{
    /**
     * @param CaptureItem[]|null $captures
     * @param VariantConfig[]|null $variants
     */
    public function __construct(
        private ?array $captures = null,
        private ?string $url = null,
        private ?array $variants = null,
        private ?CaptureDefaults $defaults = null,
        private ?ComposeOutputConfig $output = null,
        private ?bool $async = null,
        private ?string $webhookUrl = null,
        private ?string $webhookSecret = null,
    ) {}

    /**
     * @return CaptureItem[]|null
     */
    public function getCaptures(): ?array
    {
        return $this->captures;
    }

    /**
     * @param CaptureItem[]|null $captures
     */
    public function setCaptures(?array $captures): self
    {
        $this->captures = $captures;
        return $this;
    }

    public function addCapture(CaptureItem $capture): self
    {
        if ($this->captures === null) {
            $this->captures = [];
        }
        $this->captures[] = $capture;
        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(?string $url): self
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @return VariantConfig[]|null
     */
    public function getVariants(): ?array
    {
        return $this->variants;
    }

    /**
     * @param VariantConfig[]|null $variants
     */
    public function setVariants(?array $variants): self
    {
        $this->variants = $variants;
        return $this;
    }

    public function addVariant(VariantConfig $variant): self
    {
        if ($this->variants === null) {
            $this->variants = [];
        }
        $this->variants[] = $variant;
        return $this;
    }

    public function getDefaults(): ?CaptureDefaults
    {
        return $this->defaults;
    }

    public function setDefaults(?CaptureDefaults $defaults): self
    {
        $this->defaults = $defaults;
        return $this;
    }

    public function getOutput(): ?ComposeOutputConfig
    {
        return $this->output;
    }

    public function setOutput(?ComposeOutputConfig $output): self
    {
        $this->output = $output;
        return $this;
    }

    public function isAsync(): ?bool
    {
        return $this->async;
    }

    public function setAsync(?bool $async): self
    {
        $this->async = $async;
        return $this;
    }

    public function getWebhookUrl(): ?string
    {
        return $this->webhookUrl;
    }

    public function setWebhookUrl(?string $webhookUrl): self
    {
        $this->webhookUrl = $webhookUrl;
        return $this;
    }

    public function getWebhookSecret(): ?string
    {
        return $this->webhookSecret;
    }

    public function setWebhookSecret(?string $webhookSecret): self
    {
        $this->webhookSecret = $webhookSecret;
        return $this;
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];

        if ($this->captures !== null) {
            $data['captures'] = array_map(fn(CaptureItem $c) => $c->jsonSerialize(), $this->captures);
        }
        if ($this->url !== null) {
            $data['url'] = $this->url;
        }
        if ($this->variants !== null) {
            $data['variants'] = array_map(fn(VariantConfig $v) => $v->jsonSerialize(), $this->variants);
        }
        if ($this->defaults !== null) {
            $data['defaults'] = $this->defaults->jsonSerialize();
        }
        if ($this->output !== null) {
            $data['output'] = $this->output->jsonSerialize();
        }
        if ($this->async !== null) {
            $data['async'] = $this->async;
        }
        if ($this->webhookUrl !== null) {
            $data['webhookUrl'] = $this->webhookUrl;
        }
        if ($this->webhookSecret !== null) {
            $data['webhookSecret'] = $this->webhookSecret;
        }

        return $data;
    }
}
