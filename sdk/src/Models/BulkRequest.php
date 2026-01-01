<?php

declare(strict_types=1);

namespace Allscreenshots\Sdk\Models;

/**
 * Request model for bulk screenshot operations.
 */
class BulkRequest implements \JsonSerializable
{
    /**
     * @param BulkUrlRequest[] $urls
     */
    public function __construct(
        private array $urls,
        private ?BulkDefaults $defaults = null,
        private ?string $webhookUrl = null,
        private ?string $webhookSecret = null,
    ) {}

    /**
     * @return BulkUrlRequest[]
     */
    public function getUrls(): array
    {
        return $this->urls;
    }

    /**
     * @param BulkUrlRequest[] $urls
     */
    public function setUrls(array $urls): self
    {
        $this->urls = $urls;
        return $this;
    }

    public function addUrl(BulkUrlRequest $url): self
    {
        $this->urls[] = $url;
        return $this;
    }

    public function getDefaults(): ?BulkDefaults
    {
        return $this->defaults;
    }

    public function setDefaults(?BulkDefaults $defaults): self
    {
        $this->defaults = $defaults;
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
        $data = [
            'urls' => array_map(fn(BulkUrlRequest $url) => $url->jsonSerialize(), $this->urls),
        ];

        if ($this->defaults !== null) {
            $data['defaults'] = $this->defaults->jsonSerialize();
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
