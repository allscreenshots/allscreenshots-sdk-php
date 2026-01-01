<?php

declare(strict_types=1);

namespace Allscreenshots\Sdk\Tests\Unit\Exceptions;

use Allscreenshots\Sdk\Exceptions\AllscreenshotsException;
use Allscreenshots\Sdk\Exceptions\AuthenticationException;
use Allscreenshots\Sdk\Exceptions\NetworkException;
use Allscreenshots\Sdk\Exceptions\NotFoundException;
use Allscreenshots\Sdk\Exceptions\RateLimitException;
use Allscreenshots\Sdk\Exceptions\ServerException;
use Allscreenshots\Sdk\Exceptions\ValidationException;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class ExceptionsTest extends TestCase
{
    #[Test]
    public function base_exception_has_error_code(): void
    {
        $exception = new AllscreenshotsException('Test error', 'TEST_CODE', 400);

        $this->assertSame('Test error', $exception->getMessage());
        $this->assertSame('TEST_CODE', $exception->getErrorCode());
        $this->assertSame(400, $exception->getCode());
    }

    #[Test]
    public function authentication_exception_has_defaults(): void
    {
        $exception = new AuthenticationException();

        $this->assertSame('Authentication failed', $exception->getMessage());
        $this->assertSame('AUTHENTICATION_ERROR', $exception->getErrorCode());
        $this->assertSame(401, $exception->getCode());
    }

    #[Test]
    public function validation_exception_has_errors(): void
    {
        $errors = ['url' => 'Invalid URL format'];
        $exception = new ValidationException('Validation failed', $errors);

        $this->assertSame($errors, $exception->getErrors());
        $this->assertSame(400, $exception->getCode());
    }

    #[Test]
    public function rate_limit_exception_has_retry_after(): void
    {
        $exception = new RateLimitException('Rate limit exceeded', 30);

        $this->assertSame(30, $exception->getRetryAfter());
        $this->assertSame(429, $exception->getCode());
    }

    #[Test]
    public function not_found_exception_has_defaults(): void
    {
        $exception = new NotFoundException();

        $this->assertSame('Resource not found', $exception->getMessage());
        $this->assertSame(404, $exception->getCode());
    }

    #[Test]
    public function server_exception_has_custom_code(): void
    {
        $exception = new ServerException('Gateway timeout', 'GATEWAY_TIMEOUT', 504);

        $this->assertSame(504, $exception->getCode());
        $this->assertSame('GATEWAY_TIMEOUT', $exception->getErrorCode());
    }

    #[Test]
    public function network_exception_has_defaults(): void
    {
        $exception = new NetworkException();

        $this->assertSame('Network error', $exception->getMessage());
        $this->assertSame('NETWORK_ERROR', $exception->getErrorCode());
    }
}
