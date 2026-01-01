<?php

declare(strict_types=1);

namespace Allscreenshots\Sdk\Exceptions;

/**
 * Exception thrown when a requested resource is not found.
 */
class NotFoundException extends AllscreenshotsException
{
    public function __construct(
        string $message = 'Resource not found',
        ?string $errorCode = 'NOT_FOUND',
        ?\Throwable $previous = null
    ) {
        parent::__construct($message, $errorCode, 404, $previous);
    }
}
