<?php

declare(strict_types=1);

namespace Allscreenshots\Sdk\Exceptions;

/**
 * Exception thrown when a server error occurs.
 */
class ServerException extends AllscreenshotsException
{
    public function __construct(
        string $message = 'Server error',
        ?string $errorCode = 'SERVER_ERROR',
        int $code = 500,
        ?\Throwable $previous = null
    ) {
        parent::__construct($message, $errorCode, $code, $previous);
    }
}
