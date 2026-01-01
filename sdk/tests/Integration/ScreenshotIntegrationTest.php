<?php

declare(strict_types=1);

namespace Allscreenshots\Sdk\Tests\Integration;

use Allscreenshots\Sdk\Client\AllscreenshotsClient;
use Allscreenshots\Sdk\Exceptions\AllscreenshotsException;
use Allscreenshots\Sdk\Exceptions\ValidationException;
use Allscreenshots\Sdk\Models\ScreenshotRequest;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

/**
 * Integration tests for the Allscreenshots SDK.
 *
 * These tests require a valid API key set in the ALLSCREENSHOTS_API_KEY environment variable.
 */
class ScreenshotIntegrationTest extends TestCase
{
    private static AllscreenshotsClient $client;
    /** @var array<string, array<string, mixed>> */
    private static array $testResults = [];
    private static float $testStartTime;

    public static function setUpBeforeClass(): void
    {
        $apiKey = getenv('ALLSCREENSHOTS_API_KEY');
        if ($apiKey === false || $apiKey === '') {
            self::markTestSkipped(
                'ALLSCREENSHOTS_API_KEY environment variable is required for integration tests'
            );
        }

        self::$client = AllscreenshotsClient::builder()
            ->apiKey($apiKey)
            ->timeout(120)
            ->build();

        self::$testStartTime = microtime(true);
    }

    public static function tearDownAfterClass(): void
    {
        self::generateHtmlReport();
    }

    /**
     * @return array<string, array{testId: string, testName: string, url: string, device: string, fullPage: bool, expectSuccess: bool}>
     */
    public static function screenshotTestCases(): array
    {
        return [
            'IT-001' => [
                'testId' => 'IT-001',
                'testName' => 'Basic Desktop Screenshot',
                'url' => 'https://github.com',
                'device' => 'Desktop HD',
                'fullPage' => false,
                'expectSuccess' => true,
            ],
            'IT-002' => [
                'testId' => 'IT-002',
                'testName' => 'Basic Mobile Screenshot',
                'url' => 'https://github.com',
                'device' => 'iPhone 14',
                'fullPage' => false,
                'expectSuccess' => true,
            ],
            'IT-003' => [
                'testId' => 'IT-003',
                'testName' => 'Basic Tablet Screenshot',
                'url' => 'https://github.com',
                'device' => 'iPad',
                'fullPage' => false,
                'expectSuccess' => true,
            ],
            'IT-004' => [
                'testId' => 'IT-004',
                'testName' => 'Full Page Desktop',
                'url' => 'https://github.com',
                'device' => 'Desktop HD',
                'fullPage' => true,
                'expectSuccess' => true,
            ],
            'IT-005' => [
                'testId' => 'IT-005',
                'testName' => 'Full Page Mobile',
                'url' => 'https://github.com',
                'device' => 'iPhone 14',
                'fullPage' => true,
                'expectSuccess' => true,
            ],
            'IT-006' => [
                'testId' => 'IT-006',
                'testName' => 'Complex Page',
                'url' => 'https://github.com/anthropics/claude-code',
                'device' => 'Desktop HD',
                'fullPage' => false,
                'expectSuccess' => true,
            ],
            'IT-007' => [
                'testId' => 'IT-007',
                'testName' => 'Invalid URL',
                'url' => 'not-a-valid-url',
                'device' => 'Desktop HD',
                'fullPage' => false,
                'expectSuccess' => false,
            ],
            'IT-008' => [
                'testId' => 'IT-008',
                'testName' => 'Unreachable URL',
                'url' => 'https://this-domain-does-not-exist-12345.com',
                'device' => 'Desktop HD',
                'fullPage' => false,
                'expectSuccess' => false,
            ],
        ];
    }

    /**
     * @param array{testId: string, testName: string, url: string, device: string, fullPage: bool, expectSuccess: bool} $testCase
     */
    #[Test]
    #[DataProvider('screenshotTestCases')]
    public function it_handles_screenshot_test_case(array $testCase): void
    {
        $startTime = microtime(true);
        $result = [
            'testId' => $testCase['testId'],
            'testName' => $testCase['testName'],
            'url' => $testCase['url'],
            'device' => $testCase['device'],
            'fullPage' => $testCase['fullPage'],
            'passed' => false,
            'imageData' => null,
            'errorMessage' => null,
            'executionTimeMs' => 0,
        ];

        try {
            $request = new ScreenshotRequest($testCase['url']);
            $request->setDevice($testCase['device']);
            $request->setFullPage($testCase['fullPage']);

            $imageData = self::$client->screenshot($request);

            if ($testCase['expectSuccess']) {
                $this->assertNotEmpty($imageData, 'Screenshot should return image data');
                $this->assertGreaterThan(100, strlen($imageData), 'Image data should be substantial');
                $result['passed'] = true;
                $result['imageData'] = base64_encode($imageData);
            } else {
                $this->fail('Expected an error but got success');
            }
        } catch (ValidationException $e) {
            if (!$testCase['expectSuccess']) {
                $result['passed'] = true;
                $result['errorMessage'] = 'Validation error (expected): ' . $e->getMessage();
            } else {
                $result['errorMessage'] = 'Unexpected validation error: ' . $e->getMessage();
                $this->fail($result['errorMessage']);
            }
        } catch (AllscreenshotsException $e) {
            if (!$testCase['expectSuccess']) {
                $result['passed'] = true;
                $result['errorMessage'] = 'Error handled gracefully: ' . $e->getMessage();
            } else {
                $result['errorMessage'] = 'Unexpected error: ' . $e->getMessage();
                $this->fail($result['errorMessage']);
            }
        } catch (\Throwable $e) {
            $result['errorMessage'] = 'Unexpected exception: ' . $e->getMessage();
            if (!$testCase['expectSuccess']) {
                $result['passed'] = true;
            } else {
                $this->fail($result['errorMessage']);
            }
        } finally {
            $result['executionTimeMs'] = (int) ((microtime(true) - $startTime) * 1000);
            self::$testResults[$testCase['testId']] = $result;
        }
    }

    private static function generateHtmlReport(): void
    {
        $totalTests = count(self::$testResults);
        $passedTests = count(array_filter(self::$testResults, fn($r) => $r['passed']));
        $failedTests = $totalTests - $passedTests;
        $totalExecutionTime = (int) ((microtime(true) - self::$testStartTime) * 1000);

        $timestamp = date('Y-m-d H:i:s T');
        $phpVersion = PHP_VERSION;
        $osInfo = php_uname();

        $html = <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Allscreenshots PHP SDK - Integration Test Report</title>
    <style>
        * { box-sizing: border-box; }
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, sans-serif;
            margin: 0;
            padding: 20px;
            background: #f5f5f5;
            color: #333;
        }
        .container { max-width: 1200px; margin: 0 auto; }
        .header {
            background: #fff;
            padding: 24px;
            border-radius: 8px;
            margin-bottom: 20px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }
        .header h1 { margin: 0 0 8px 0; font-size: 24px; }
        .header p { margin: 0; color: #666; }
        .summary {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 16px;
            margin-bottom: 20px;
        }
        .summary-card {
            background: #fff;
            padding: 16px;
            border-radius: 8px;
            text-align: center;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }
        .summary-card .value { font-size: 32px; font-weight: bold; }
        .summary-card .label { color: #666; font-size: 14px; }
        .summary-card.passed .value { color: #22c55e; }
        .summary-card.failed .value { color: #ef4444; }
        .test-card {
            background: #fff;
            border-radius: 8px;
            margin-bottom: 16px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            overflow: hidden;
        }
        .test-header {
            padding: 16px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #eee;
        }
        .test-title { display: flex; align-items: center; gap: 12px; }
        .test-id { font-weight: bold; color: #666; }
        .test-name { font-weight: 500; }
        .badge {
            padding: 4px 12px;
            border-radius: 16px;
            font-size: 12px;
            font-weight: 600;
        }
        .badge.pass { background: #dcfce7; color: #166534; }
        .badge.fail { background: #fee2e2; color: #991b1b; }
        .test-details { padding: 16px; }
        .test-params {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 8px;
            margin-bottom: 16px;
        }
        .param { font-size: 14px; }
        .param-label { color: #666; }
        .test-image {
            max-width: 100%;
            border: 1px solid #eee;
            border-radius: 4px;
        }
        .error-message {
            background: #fef2f2;
            border: 1px solid #fecaca;
            padding: 12px;
            border-radius: 4px;
            color: #991b1b;
            font-size: 14px;
        }
        .footer {
            background: #fff;
            padding: 16px;
            border-radius: 8px;
            margin-top: 20px;
            font-size: 14px;
            color: #666;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Allscreenshots PHP SDK - Integration test report</h1>
            <p>Test run: {$timestamp}</p>
        </div>

        <div class="summary">
            <div class="summary-card">
                <div class="value">{$totalTests}</div>
                <div class="label">Total tests</div>
            </div>
            <div class="summary-card passed">
                <div class="value">{$passedTests}</div>
                <div class="label">Passed</div>
            </div>
            <div class="summary-card failed">
                <div class="value">{$failedTests}</div>
                <div class="label">Failed</div>
            </div>
            <div class="summary-card">
                <div class="value">{$totalExecutionTime}ms</div>
                <div class="label">Total time</div>
            </div>
        </div>

HTML;

        foreach (self::$testResults as $result) {
            $badgeClass = $result['passed'] ? 'pass' : 'fail';
            $badgeText = $result['passed'] ? 'PASSED' : 'FAILED';
            $fullPageText = $result['fullPage'] ? 'Yes' : 'No';

            $html .= <<<HTML
        <div class="test-card">
            <div class="test-header">
                <div class="test-title">
                    <span class="test-id">{$result['testId']}</span>
                    <span class="test-name">{$result['testName']}</span>
                </div>
                <span class="badge {$badgeClass}">{$badgeText}</span>
            </div>
            <div class="test-details">
                <div class="test-params">
                    <div class="param"><span class="param-label">URL:</span> {$result['url']}</div>
                    <div class="param"><span class="param-label">Device:</span> {$result['device']}</div>
                    <div class="param"><span class="param-label">Full page:</span> {$fullPageText}</div>
                    <div class="param"><span class="param-label">Time:</span> {$result['executionTimeMs']}ms</div>
                </div>
HTML;

            if ($result['imageData'] !== null) {
                $html .= <<<HTML
                <img class="test-image" src="data:image/png;base64,{$result['imageData']}" alt="Screenshot">
HTML;
            }

            if ($result['errorMessage'] !== null) {
                $html .= <<<HTML
                <div class="error-message">{$result['errorMessage']}</div>
HTML;
            }

            $html .= <<<HTML
            </div>
        </div>
HTML;
        }

        $html .= <<<HTML
        <div class="footer">
            <strong>Environment:</strong> PHP {$phpVersion} | {$osInfo}
        </div>
    </div>
</body>
</html>
HTML;

        $reportPath = __DIR__ . '/../../test-report.html';
        file_put_contents($reportPath, $html);
        echo "\nIntegration test report generated: {$reportPath}\n";
    }
}
