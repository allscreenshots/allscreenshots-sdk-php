<?php

declare(strict_types=1);

namespace Allscreenshots\Sdk\Models;

/**
 * Request model for a single URL in a bulk request.
 */
class BulkUrlRequest implements \JsonSerializable
{
    public function __construct(
        private string $url,
        private ?ViewportConfig $viewport = null,
        private ?string $device = null,
        private ?string $format = null,
        private ?bool $fullPage = null,
        private ?int $quality = null,
        private ?int $delay = null,
        private ?string $waitFor = null,
        private ?string $waitUntil = null,
        private ?int $timeout = null,
        private ?bool $darkMode = null,
        private ?string $customCss = null,
        private ?bool $blockAds = null,
        private ?bool $blockCookieBanners = null,
        private ?string $blockLevel = null,
    ) {}

    public function getUrl(): string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = ['url' => $this->url];
        $options = [];

        if ($this->viewport !== null) {
            $options['viewport'] = $this->viewport->jsonSerialize();
        }
        if ($this->device !== null) {
            $options['device'] = $this->device;
        }
        if ($this->format !== null) {
            $options['format'] = $this->format;
        }
        if ($this->fullPage !== null) {
            $options['fullPage'] = $this->fullPage;
        }
        if ($this->quality !== null) {
            $options['quality'] = $this->quality;
        }
        if ($this->delay !== null) {
            $options['delay'] = $this->delay;
        }
        if ($this->waitFor !== null) {
            $options['waitFor'] = $this->waitFor;
        }
        if ($this->waitUntil !== null) {
            $options['waitUntil'] = $this->waitUntil;
        }
        if ($this->timeout !== null) {
            $options['timeout'] = $this->timeout;
        }
        if ($this->darkMode !== null) {
            $options['darkMode'] = $this->darkMode;
        }
        if ($this->customCss !== null) {
            $options['customCss'] = $this->customCss;
        }
        if ($this->blockAds !== null) {
            $options['blockAds'] = $this->blockAds;
        }
        if ($this->blockCookieBanners !== null) {
            $options['blockCookieBanners'] = $this->blockCookieBanners;
        }
        if ($this->blockLevel !== null) {
            $options['blockLevel'] = $this->blockLevel;
        }

        if (!empty($options)) {
            $data['options'] = $options;
        }

        return $data;
    }
}
