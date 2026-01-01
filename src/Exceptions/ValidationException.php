<?php

declare(strict_types=1);

namespace Allscreenshots\Sdk\Exceptions;

/**
 * Exception thrown when request validation fails.
 *
 * This occurs when the request parameters are invalid.
 */
class ValidationException extends AllscreenshotsException
{
    /** @var array<string, mixed> */
    private array $errors;

    /**
     * @param array<string, mixed> $errors
     */
    public function __construct(
        string $message = 'Validation failed',
        array $errors = [],
        ?string $errorCode = 'VALIDATION_ERROR',
        ?\Throwable $previous = null
    ) {
        parent::__construct($message, $errorCode, 400, $previous);
        $this->errors = $errors;
    }

    /**
     * Get the validation errors.
     *
     * @return array<string, mixed>
     */
    public function getErrors(): array
    {
        return $this->errors;
    }
}
