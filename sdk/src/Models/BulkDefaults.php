<?php

declare(strict_types=1);

namespace Allscreenshots\Sdk\Models;

/**
 * Default options for bulk screenshot requests.
 */
class BulkDefaults implements \JsonSerializable
{
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
}
