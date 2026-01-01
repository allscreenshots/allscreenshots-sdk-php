<?php

declare(strict_types=1);

namespace Allscreenshots\Sdk\Exceptions;

/**
 * Exception thrown when the API rate limit is exceeded.
 */
class RateLimitException extends AllscreenshotsException
{
    private ?int $retryAfter;

    public function __construct(
        string $message = 'Rate limit exceeded',
        ?int $retryAfter = null,
        ?string $errorCode = 'RATE_LIMIT_EXCEEDED',
        ?\Throwable $previous = null
    ) {
        parent::__construct($message, $errorCode, 429, $previous);
        $this->retryAfter = $retryAfter;
    }

    /**
     * Get the number of seconds to wait before retrying.
     */
    public function getRetryAfter(): ?int
    {
        return $this->retryAfter;
    }
}
