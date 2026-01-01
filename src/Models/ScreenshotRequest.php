<?php

declare(strict_types=1);

namespace Allscreenshots\Sdk\Models;

/**
 * Request model for taking a screenshot.
 */
class ScreenshotRequest implements \JsonSerializable
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
        /** @var string[]|null */
        private ?array $hideSelectors = null,
        private ?string $selector = null,
        private ?bool $blockAds = null,
        private ?bool $blockCookieBanners = null,
        private ?string $blockLevel = null,
        private ?string $webhookUrl = null,
        private ?string $webhookSecret = null,
        private ?string $responseType = null,
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

    public function getViewport(): ?ViewportConfig
    {
        return $this->viewport;
    }

    public function setViewport(?ViewportConfig $viewport): self
    {
        $this->viewport = $viewport;
        return $this;
    }

    public function getDevice(): ?string
    {
        return $this->device;
    }

    public function setDevice(?string $device): self
    {
        $this->device = $device;
        return $this;
    }

    public function getFormat(): ?string
    {
        return $this->format;
    }

    public function setFormat(?string $format): self
    {
        $this->format = $format;
        return $this;
    }

    public function isFullPage(): ?bool
    {
        return $this->fullPage;
    }

    public function setFullPage(?bool $fullPage): self
    {
        $this->fullPage = $fullPage;
        return $this;
    }

    public function getQuality(): ?int
    {
        return $this->quality;
    }

    public function setQuality(?int $quality): self
    {
        $this->quality = $quality;
        return $this;
    }

    public function getDelay(): ?int
    {
        return $this->delay;
    }

    public function setDelay(?int $delay): self
    {
        $this->delay = $delay;
        return $this;
    }

    public function getWaitFor(): ?string
    {
        return $this->waitFor;
    }

    public function setWaitFor(?string $waitFor): self
    {
        $this->waitFor = $waitFor;
        return $this;
    }

    public function getWaitUntil(): ?string
    {
        return $this->waitUntil;
    }

    public function setWaitUntil(?string $waitUntil): self
    {
        $this->waitUntil = $waitUntil;
        return $this;
    }

    public function getTimeout(): ?int
    {
        return $this->timeout;
    }

    public function setTimeout(?int $timeout): self
    {
        $this->timeout = $timeout;
        return $this;
    }

    public function isDarkMode(): ?bool
    {
        return $this->darkMode;
    }

    public function setDarkMode(?bool $darkMode): self
    {
        $this->darkMode = $darkMode;
        return $this;
    }

    public function getCustomCss(): ?string
    {
        return $this->customCss;
    }

    public function setCustomCss(?string $customCss): self
    {
        $this->customCss = $customCss;
        return $this;
    }

    /**
     * @return string[]|null
     */
    public function getHideSelectors(): ?array
    {
        return $this->hideSelectors;
    }

    /**
     * @param string[]|null $hideSelectors
     */
    public function setHideSelectors(?array $hideSelectors): self
    {
        $this->hideSelectors = $hideSelectors;
        return $this;
    }

    public function getSelector(): ?string
    {
        return $this->selector;
    }

    public function setSelector(?string $selector): self
    {
        $this->selector = $selector;
        return $this;
    }

    public function isBlockAds(): ?bool
    {
        return $this->blockAds;
    }

    public function setBlockAds(?bool $blockAds): self
    {
        $this->blockAds = $blockAds;
        return $this;
    }

    public function isBlockCookieBanners(): ?bool
    {
        return $this->blockCookieBanners;
    }

    public function setBlockCookieBanners(?bool $blockCookieBanners): self
    {
        $this->blockCookieBanners = $blockCookieBanners;
        return $this;
    }

    public function getBlockLevel(): ?string
    {
        return $this->blockLevel;
    }

    public function setBlockLevel(?string $blockLevel): self
    {
        $this->blockLevel = $blockLevel;
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

    public function getResponseType(): ?string
    {
        return $this->responseType;
    }

    public function setResponseType(?string $responseType): self
    {
        $this->responseType = $responseType;
        return $this;
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = ['url' => $this->url];

        if ($this->viewport !== null) {
            $data['viewport'] = $this->viewport->jsonSerialize();
        }
        if ($this->device !== null) {
            $data['device'] = $this->device;
        }
        if ($this->format !== null) {
            $data['format'] = $this->format;
        }
        if ($this->fullPage !== null) {
            $data['fullPage'] = $this->fullPage;
        }
        if ($this->quality !== null) {
            $data['quality'] = $this->quality;
        }
        if ($this->delay !== null) {
            $data['delay'] = $this->delay;
        }
        if ($this->waitFor !== null) {
            $data['waitFor'] = $this->waitFor;
        }
        if ($this->waitUntil !== null) {
            $data['waitUntil'] = $this->waitUntil;
        }
        if ($this->timeout !== null) {
            $data['timeout'] = $this->timeout;
        }
        if ($this->darkMode !== null) {
            $data['darkMode'] = $this->darkMode;
        }
        if ($this->customCss !== null) {
            $data['customCss'] = $this->customCss;
        }
        if ($this->hideSelectors !== null) {
            $data['hideSelectors'] = $this->hideSelectors;
        }
        if ($this->selector !== null) {
            $data['selector'] = $this->selector;
        }
        if ($this->blockAds !== null) {
            $data['blockAds'] = $this->blockAds;
        }
        if ($this->blockCookieBanners !== null) {
            $data['blockCookieBanners'] = $this->blockCookieBanners;
        }
        if ($this->blockLevel !== null) {
            $data['blockLevel'] = $this->blockLevel;
        }
        if ($this->webhookUrl !== null) {
            $data['webhookUrl'] = $this->webhookUrl;
        }
        if ($this->webhookSecret !== null) {
            $data['webhookSecret'] = $this->webhookSecret;
        }
        if ($this->responseType !== null) {
            $data['responseType'] = $this->responseType;
        }

        return $data;
    }
}
