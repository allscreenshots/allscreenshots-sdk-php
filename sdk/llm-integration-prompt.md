# Allscreenshots PHP SDK - LLM integration prompt

Use this prompt to help LLMs assist with integrating the Allscreenshots PHP SDK into your project.

---

## SDK overview

The Allscreenshots PHP SDK provides a simple interface for capturing website screenshots programmatically. It supports:

- Synchronous and asynchronous screenshot capture
- Bulk screenshot operations
- Compose (combining multiple screenshots)
- Scheduled screenshots
- Usage and quota monitoring

## Installation

```bash
composer require allscreenshots/sdk
```

## Basic usage

```php
<?php

use Allscreenshots\Sdk\Client\AllscreenshotsClient;
use Allscreenshots\Sdk\Models\ScreenshotRequest;

// Create client (uses ALLSCREENSHOTS_API_KEY env var)
$client = AllscreenshotsClient::builder()->build();

// Or with explicit API key
$client = AllscreenshotsClient::builder()
    ->apiKey('your-api-key')
    ->build();

// Take a screenshot
$request = new ScreenshotRequest('https://example.com');
$request->setDevice('Desktop HD');
$request->setFullPage(true);

$imageData = $client->screenshot($request);
file_put_contents('screenshot.png', $imageData);
```

## Key classes

### Client
- `AllscreenshotsClient` - Main API client
- `AllscreenshotsClientBuilder` - Builder for client configuration

### Request models
- `ScreenshotRequest` - Single screenshot parameters
- `BulkRequest`, `BulkUrlRequest`, `BulkDefaults` - Bulk operations
- `ComposeRequest`, `CaptureItem`, `ComposeOutputConfig` - Compose operations
- `CreateScheduleRequest`, `UpdateScheduleRequest` - Schedule management

### Response models
- `JobResponse`, `AsyncJobCreatedResponse` - Job status
- `BulkResponse`, `BulkStatusResponse` - Bulk results
- `ComposeResponse`, `ComposeJobStatusResponse` - Compose results
- `ScheduleResponse`, `ScheduleHistoryResponse` - Schedule info
- `UsageResponse`, `QuotaStatusResponse` - Usage stats

### Exceptions
- `AllscreenshotsException` - Base exception
- `AuthenticationException` - Auth failures (401/403)
- `ValidationException` - Invalid input (400)
- `RateLimitException` - Rate limited (429)
- `NotFoundException` - Not found (404)
- `ServerException` - Server errors (5xx)
- `NetworkException` - Connection failures

## Common patterns

### Screenshot with options
```php
$request = new ScreenshotRequest('https://example.com');
$request->setDevice('iPhone 14');
$request->setFormat('jpeg');
$request->setQuality(85);
$request->setDarkMode(true);
$request->setBlockAds(true);
$request->setBlockCookieBanners(true);
```

### Custom viewport
```php
use Allscreenshots\Sdk\Models\ViewportConfig;

$request = new ScreenshotRequest('https://example.com');
$request->setViewport(new ViewportConfig(1920, 1080, 2));
```

### Async with polling
```php
$job = $client->screenshotAsync($request);
do {
    sleep(1);
    $status = $client->getJob($job->getId());
} while (!$status->isCompleted() && !$status->isFailed());
$imageData = $client->getJobResult($job->getId());
```

### Error handling
```php
try {
    $imageData = $client->screenshot($request);
} catch (ValidationException $e) {
    // Handle invalid input
} catch (RateLimitException $e) {
    // Wait and retry
    sleep($e->getRetryAfter() ?? 60);
} catch (AllscreenshotsException $e) {
    // Handle other errors
}
```

## Device presets
- `Desktop HD` (1920x1080)
- `Desktop` (1366x768)
- `iPhone 14` (390x844)
- `iPhone 14 Pro Max` (430x932)
- `iPad` (810x1080)
- `iPad Pro` (1024x1366)

## Output formats
- `png` (default)
- `jpeg` / `jpg`
- `webp`
- `pdf`
