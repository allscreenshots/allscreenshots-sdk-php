<?php

declare(strict_types=1);

namespace Allscreenshots\Sdk\Exceptions;

/**
 * Exception thrown when a network error occurs.
 */
class NetworkException extends AllscreenshotsException
{
    public function __construct(
        string $message = 'Network error',
        ?string $errorCode = 'NETWORK_ERROR',
        ?\Throwable $previous = null
    ) {
        parent::__construct($message, $errorCode, 0, $previous);
    }
}
