<?php

declare(strict_types=1);

namespace Allscreenshots\Sdk\Models;

/**
 * Request model for creating a schedule.
 */
class CreateScheduleRequest implements \JsonSerializable
{
    public function __construct(
        private string $name,
        private string $url,
        private string $schedule,
        private ?string $timezone = null,
        private ?ScheduleScreenshotOptions $options = null,
        private ?string $webhookUrl = null,
        private ?string $webhookSecret = null,
        private ?int $retentionDays = null,
        private ?string $startsAt = null,
        private ?string $endsAt = null,
    ) {}

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;
        return $this;
    }

    public function getSchedule(): string
    {
        return $this->schedule;
    }

    public function setSchedule(string $schedule): self
    {
        $this->schedule = $schedule;
        return $this;
    }

    public function getTimezone(): ?string
    {
        return $this->timezone;
    }

    public function setTimezone(?string $timezone): self
    {
        $this->timezone = $timezone;
        return $this;
    }

    public function getOptions(): ?ScheduleScreenshotOptions
    {
        return $this->options;
    }

    public function setOptions(?ScheduleScreenshotOptions $options): self
    {
        $this->options = $options;
        return $this;
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [
            'name' => $this->name,
            'url' => $this->url,
            'schedule' => $this->schedule,
        ];

        if ($this->timezone !== null) {
            $data['timezone'] = $this->timezone;
        }
        if ($this->options !== null) {
            $data['options'] = $this->options->jsonSerialize();
        }
        if ($this->webhookUrl !== null) {
            $data['webhookUrl'] = $this->webhookUrl;
        }
        if ($this->webhookSecret !== null) {
            $data['webhookSecret'] = $this->webhookSecret;
        }
        if ($this->retentionDays !== null) {
            $data['retentionDays'] = $this->retentionDays;
        }
        if ($this->startsAt !== null) {
            $data['startsAt'] = $this->startsAt;
        }
        if ($this->endsAt !== null) {
            $data['endsAt'] = $this->endsAt;
        }

        return $data;
    }
}
