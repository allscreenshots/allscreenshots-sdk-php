<?php

declare(strict_types=1);

namespace Allscreenshots\Sdk\Exceptions;

use Exception;

/**
 * Base exception for all Allscreenshots SDK errors.
 */
class AllscreenshotsException extends Exception
{
    protected ?string $errorCode;

    public function __construct(
        string $message = '',
        ?string $errorCode = null,
        int $code = 0,
        ?\Throwable $previous = null
    ) {
        parent::__construct($message, $code, $previous);
        $this->errorCode = $errorCode;
    }

    /**
     * Get the error code from the API response.
     */
    public function getErrorCode(): ?string
    {
        return $this->errorCode;
    }
}
