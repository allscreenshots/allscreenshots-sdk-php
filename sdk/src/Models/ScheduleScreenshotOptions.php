<?php

declare(strict_types=1);

namespace Allscreenshots\Sdk\Models;

/**
 * Screenshot options for scheduled captures.
 */
class ScheduleScreenshotOptions implements \JsonSerializable
{
    /**
     * @param string[]|null $hideSelectors
     */
    public function __construct(
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
        private ?array $hideSelectors = null,
        private ?bool $blockAds = null,
        private ?bool $blockCookieBanners = null,
        private ?string $blockLevel = null,
    ) {}

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];

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
        if ($this->blockAds !== null) {
            $data['blockAds'] = $this->blockAds;
        }
        if ($this->blockCookieBanners !== null) {
            $data['blockCookieBanners'] = $this->blockCookieBanners;
        }
        if ($this->blockLevel !== null) {
            $data['blockLevel'] = $this->blockLevel;
        }

        return $data;
    }

    /**
     * @param array<string, mixed> $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            viewport: isset($data['viewport']) ? ViewportConfig::fromArray($data['viewport']) : null,
            device: $data['device'] ?? null,
            format: $data['format'] ?? null,
            fullPage: $data['fullPage'] ?? null,
            quality: $data['quality'] ?? null,
            delay: $data['delay'] ?? null,
            waitFor: $data['waitFor'] ?? null,
            waitUntil: $data['waitUntil'] ?? null,
            timeout: $data['timeout'] ?? null,
            darkMode: $data['darkMode'] ?? null,
            customCss: $data['customCss'] ?? null,
            hideSelectors: $data['hideSelectors'] ?? null,
            blockAds: $data['blockAds'] ?? null,
            blockCookieBanners: $data['blockCookieBanners'] ?? null,
            blockLevel: $data['blockLevel'] ?? null,
        );
    }
}
