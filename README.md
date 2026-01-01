# Allscreenshots PHP SDK

Official PHP SDK for the [Allscreenshots API](https://allscreenshots.com) - capture website screenshots programmatically.

## Requirements

- PHP 8.1 or higher
- Composer

## Installation

### Via Composer

```bash
composer require allscreenshots/sdk
```

### Manual installation

1. Download the latest release
2. Extract and include the autoloader:

```php
require_once 'path/to/allscreenshots-sdk-php/vendor/autoload.php';
```

## Quick start

```php
<?php

use Allscreenshots\Sdk\Client\AllscreenshotsClient;
use Allscreenshots\Sdk\Models\ScreenshotRequest;

// Create a client (reads API key from ALLSCREENSHOTS_API_KEY environment variable)
$client = AllscreenshotsClient::builder()->build();

// Or explicitly set the API key
$client = AllscreenshotsClient::builder()
    ->apiKey('your-api-key')
    ->build();

// Take a screenshot
$request = new ScreenshotRequest('https://github.com');
$imageData = $client->screenshot($request);

// Save to file
file_put_contents('screenshot.png', $imageData);
```

## Configuration

The client can be configured using the builder pattern:

```php
$client = AllscreenshotsClient::builder()
    ->apiKey('your-api-key')           // API key (or use ALLSCREENSHOTS_API_KEY env var)
    ->baseUrl('https://api.custom.com') // Custom API base URL
    ->timeout(120)                      // Request timeout in seconds
    ->connectTimeout(30)                // Connection timeout in seconds
    ->maxRetries(5)                     // Maximum retry attempts
    ->retryBaseDelay(2.0)               // Base delay for exponential backoff
    ->retryMaxDelay(60.0)               // Maximum retry delay
    ->build();
```

## API reference

### Screenshots

#### Take a screenshot (synchronous)

```php
use Allscreenshots\Sdk\Models\ScreenshotRequest;
use Allscreenshots\Sdk\Models\ViewportConfig;

$request = new ScreenshotRequest('https://github.com');
$request->setDevice('Desktop HD');        // Device preset
$request->setFullPage(true);              // Capture full page
$request->setFormat('png');               // Output format (png, jpeg, webp, pdf)
$request->setQuality(90);                 // Image quality (1-100)
$request->setDarkMode(true);              // Enable dark mode
$request->setDelay(1000);                 // Wait before capture (ms)
$request->setBlockAds(true);              // Block advertisements
$request->setBlockCookieBanners(true);    // Block cookie banners

// Or use a custom viewport
$request->setViewport(new ViewportConfig(1920, 1080, 2));

$imageData = $client->screenshot($request);
file_put_contents('screenshot.png', $imageData);
```

#### Take a screenshot (asynchronous)

```php
$request = new ScreenshotRequest('https://github.com');
$job = $client->screenshotAsync($request);

echo "Job created: " . $job->getId() . "\n";

// Poll for completion
do {
    sleep(1);
    $status = $client->getJob($job->getId());
} while (!$status->isCompleted() && !$status->isFailed());

if ($status->isCompleted()) {
    $imageData = $client->getJobResult($job->getId());
    file_put_contents('screenshot.png', $imageData);
} else {
    echo "Job failed: " . $status->getErrorMessage() . "\n";
}
```

### Bulk screenshots

```php
use Allscreenshots\Sdk\Models\BulkRequest;
use Allscreenshots\Sdk\Models\BulkUrlRequest;
use Allscreenshots\Sdk\Models\BulkDefaults;

$request = new BulkRequest(
    urls: [
        new BulkUrlRequest('https://github.com'),
        new BulkUrlRequest('https://google.com'),
        new BulkUrlRequest('https://twitter.com'),
    ],
    defaults: new BulkDefaults(device: 'Desktop HD', fullPage: true),
);

$bulk = $client->bulkScreenshot($request);
echo "Bulk job created: " . $bulk->getId() . "\n";

// Check status
$status = $client->getBulkJob($bulk->getId());
echo "Progress: " . $status->getProgress() . "%\n";
```

### Compose (multiple screenshots)

```php
use Allscreenshots\Sdk\Models\ComposeRequest;
use Allscreenshots\Sdk\Models\CaptureItem;
use Allscreenshots\Sdk\Models\ComposeOutputConfig;

$request = new ComposeRequest();
$request->addCapture(new CaptureItem('https://github.com'));
$request->addCapture(new CaptureItem('https://google.com'));
$request->setOutput(
    (new ComposeOutputConfig())
        ->setLayout('GRID')
);

$result = $client->compose($request);
echo "Composed image URL: " . $result->getUrl() . "\n";
```

### Schedules

```php
use Allscreenshots\Sdk\Models\CreateScheduleRequest;
use Allscreenshots\Sdk\Models\UpdateScheduleRequest;

// Create a schedule
$request = new CreateScheduleRequest(
    name: 'Daily screenshot',
    url: 'https://github.com',
    schedule: '0 9 * * *', // Daily at 9am (cron expression)
);
$schedule = $client->createSchedule($request);

// List schedules
$list = $client->listSchedules();
foreach ($list->getSchedules() as $s) {
    echo $s->getName() . ": " . $s->getNextExecutionAt() . "\n";
}

// Pause/resume
$client->pauseSchedule($schedule->getId());
$client->resumeSchedule($schedule->getId());

// Trigger manually
$client->triggerSchedule($schedule->getId());

// Get history
$history = $client->getScheduleHistory($schedule->getId(), limit: 10);

// Delete
$client->deleteSchedule($schedule->getId());
```

### Usage and quotas

```php
// Get usage statistics
$usage = $client->getUsage();
echo "Tier: " . $usage->getTier() . "\n";
echo "Screenshots this period: " . $usage->getCurrentPeriod()->getScreenshotsCount() . "\n";

// Get quota status
$quota = $client->getQuota();
echo "Remaining screenshots: " . $quota->getScreenshots()->getRemaining() . "\n";
echo "Remaining bandwidth: " . $quota->getBandwidth()->getRemainingFormatted() . "\n";
```

## Error handling

The SDK throws specific exceptions for different error types:

```php
use Allscreenshots\Sdk\Exceptions\AllscreenshotsException;
use Allscreenshots\Sdk\Exceptions\AuthenticationException;
use Allscreenshots\Sdk\Exceptions\ValidationException;
use Allscreenshots\Sdk\Exceptions\RateLimitException;
use Allscreenshots\Sdk\Exceptions\NotFoundException;
use Allscreenshots\Sdk\Exceptions\ServerException;
use Allscreenshots\Sdk\Exceptions\NetworkException;

try {
    $imageData = $client->screenshot($request);
} catch (AuthenticationException $e) {
    // Invalid or missing API key (401/403)
    echo "Auth error: " . $e->getMessage() . "\n";
} catch (ValidationException $e) {
    // Invalid request parameters (400)
    echo "Validation error: " . $e->getMessage() . "\n";
    print_r($e->getErrors());
} catch (RateLimitException $e) {
    // Rate limit exceeded (429)
    echo "Rate limited. Retry after: " . $e->getRetryAfter() . " seconds\n";
} catch (NotFoundException $e) {
    // Resource not found (404)
    echo "Not found: " . $e->getMessage() . "\n";
} catch (ServerException $e) {
    // Server error (5xx)
    echo "Server error: " . $e->getMessage() . "\n";
} catch (NetworkException $e) {
    // Network/connection error
    echo "Network error: " . $e->getMessage() . "\n";
} catch (AllscreenshotsException $e) {
    // Any other API error
    echo "Error: " . $e->getMessage() . "\n";
    echo "Error code: " . $e->getErrorCode() . "\n";
}
```

## Device presets

The following device presets are available:

- `Desktop HD` - 1920x1080
- `Desktop` - 1366x768
- `Laptop` - 1280x800
- `iPhone 14` - 390x844
- `iPhone 14 Pro Max` - 430x932
- `iPhone SE` - 375x667
- `iPad` - 810x1080
- `iPad Pro` - 1024x1366
- `Samsung Galaxy S21` - 360x800
- `Pixel 7` - 412x915

## Development

### Running tests

```bash
# Install dependencies
composer install

# Run unit tests
composer test:unit

# Run integration tests (requires ALLSCREENSHOTS_API_KEY)
ALLSCREENSHOTS_API_KEY=your-key composer test:integration

# Run all tests
composer test
```

### Linting and static analysis

```bash
# Check code style
composer lint

# Fix code style
composer lint:fix

# Run PHPStan
composer analyze
```

## License

Apache License 2.0 - see [LICENSE](LICENSE) for details.
