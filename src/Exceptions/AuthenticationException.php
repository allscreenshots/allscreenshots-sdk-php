<?php

declare(strict_types=1);

namespace Allscreenshots\Sdk\Exceptions;

/**
 * Exception thrown when API authentication fails.
 *
 * This occurs when the API key is invalid, missing, or expired.
 */
class AuthenticationException extends AllscreenshotsException
{
    public function __construct(
        string $message = 'Authentication failed',
        ?string $errorCode = 'AUTHENTICATION_ERROR',
        ?\Throwable $previous = null
    ) {
        parent::__construct($message, $errorCode, 401, $previous);
    }
}
