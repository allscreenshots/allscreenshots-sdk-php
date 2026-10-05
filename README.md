# Allscreenshots Php SDK

Generated from the public API implemented by https://api.allscreenshots.com. Visit https://allscreenshots.com for an account and API key.

The package is at this repository root. The browser demo is in [sample-app](sample-app/README.md). Run `python3 tools/verify.py --build --fixture` to build and check quota, sync/async capture, binary downloads, replay safety, and error handling without spending credits.

Capture and download operations with mixed content types return raw bodies (php native bytes/blob/file/response). This avoids corrupting binary images through JSON decoding. For responseType URL or BASE64, decode the raw JSON into the generated `ScreenshotJsonResponse` model; the demo shows URL capture and a download through the same SDK. Other endpoints return generated typed models.

`sdk-provenance.json` records the canonical contract, generator, configuration, template, dependency, and toolchain hashes. Do not edit generated sources; update the backend contract or generation inputs in `api.allscreenshots.com/sdk-generation`.

## API reference

# AllscreenshotsSdk

Capture websites, manage jobs, compose images, schedule captures, crawl sites, and read usage.


## Installation & Usage

### Requirements

PHP 8.1 and later.

### Composer

To install the bindings via [Composer](https://getcomposer.org/), add the following to `composer.json`:

```json
{
  "repositories": [
    {
      "type": "vcs",
      "url": "https://github.com/allscreenshots/allscreenshots-sdk-php.git"
    }
  ],
  "require": {
    "allscreenshots/allscreenshots-sdk-php": "*@dev"
  }
}
```

Then run `composer install`

### Manual Installation

Download the files and include `autoload.php`:

```php
<?php
require_once('/path/to/AllscreenshotsSdk/vendor/autoload.php');
```

## Getting Started

Please follow the [installation procedure](#installation--usage) and then run the following:

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



// Configure API key authorization: ApiKey
$config = Allscreenshots\Sdk\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Allscreenshots\Sdk\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');


$apiInstance = new Allscreenshots\Sdk\Api\BulkApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string

try {
    $result = $apiInstance->cancelBulkJob($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BulkApi->cancelBulkJob: ', $e->getMessage(), PHP_EOL;
}

```

## API Endpoints

All URIs are relative to *https://api.allscreenshots.com*

Class | Method | HTTP request | Description
------------ | ------------- | ------------- | -------------
*BulkApi* | [**cancelBulkJob**](docs/Api/BulkApi.md#cancelbulkjob) | **POST** /v1/screenshots/bulk/{id}/cancel | 
*BulkApi* | [**createBulkJob**](docs/Api/BulkApi.md#createbulkjob) | **POST** /v1/screenshots/bulk | 
*BulkApi* | [**getBulkJobStatus**](docs/Api/BulkApi.md#getbulkjobstatus) | **GET** /v1/screenshots/bulk/{id} | 
*BulkApi* | [**listBulkJobs**](docs/Api/BulkApi.md#listbulkjobs) | **GET** /v1/screenshots/bulk | 
*ComposeApi* | [**compose**](docs/Api/ComposeApi.md#compose) | **POST** /v1/screenshots/compose | 
*ComposeApi* | [**getComposeJobStatus**](docs/Api/ComposeApi.md#getcomposejobstatus) | **GET** /v1/screenshots/compose/jobs/{jobId} | 
*ComposeApi* | [**getLayoutPreview**](docs/Api/ComposeApi.md#getlayoutpreview) | **GET** /v1/screenshots/compose/preview | 
*ComposeApi* | [**listComposeJobs**](docs/Api/ComposeApi.md#listcomposejobs) | **GET** /v1/screenshots/compose/jobs | 
*CrawlApi* | [**callList**](docs/Api/CrawlApi.md#calllist) | **GET** /v1/crawls | 
*CrawlApi* | [**cancel**](docs/Api/CrawlApi.md#cancel) | **POST** /v1/crawls/{id}/cancel | 
*CrawlApi* | [**create**](docs/Api/CrawlApi.md#create) | **POST** /v1/crawls | 
*CrawlApi* | [**delete**](docs/Api/CrawlApi.md#delete) | **DELETE** /v1/crawls/{id} | 
*CrawlApi* | [**get**](docs/Api/CrawlApi.md#get) | **GET** /v1/crawls/{id} | 
*CrawlApi* | [**output**](docs/Api/CrawlApi.md#output) | **GET** /v1/crawls/{id}/pages/{pageId}/outputs/{output} | 
*CrawlApi* | [**pages**](docs/Api/CrawlApi.md#pages) | **GET** /v1/crawls/{id}/pages | 
*JobApi* | [**cancelJob**](docs/Api/JobApi.md#canceljob) | **POST** /v1/screenshots/jobs/{id}/cancel | 
*JobApi* | [**createAsyncJob**](docs/Api/JobApi.md#createasyncjob) | **POST** /v1/screenshots/async | 
*JobApi* | [**getJobOutputResult**](docs/Api/JobApi.md#getjoboutputresult) | **GET** /v1/screenshots/jobs/{id}/result/{outputId} | 
*JobApi* | [**getJobResult**](docs/Api/JobApi.md#getjobresult) | **GET** /v1/screenshots/jobs/{id}/result | 
*JobApi* | [**getJobStatus**](docs/Api/JobApi.md#getjobstatus) | **GET** /v1/screenshots/jobs/{id} | 
*JobApi* | [**listJobs**](docs/Api/JobApi.md#listjobs) | **GET** /v1/screenshots/jobs | 
*ScheduleApi* | [**createSchedule**](docs/Api/ScheduleApi.md#createschedule) | **POST** /v1/schedules | 
*ScheduleApi* | [**deleteSchedule**](docs/Api/ScheduleApi.md#deleteschedule) | **DELETE** /v1/schedules/{id} | 
*ScheduleApi* | [**getExecutionHistory**](docs/Api/ScheduleApi.md#getexecutionhistory) | **GET** /v1/schedules/{id}/history | 
*ScheduleApi* | [**getSchedule**](docs/Api/ScheduleApi.md#getschedule) | **GET** /v1/schedules/{id} | 
*ScheduleApi* | [**listSchedules**](docs/Api/ScheduleApi.md#listschedules) | **GET** /v1/schedules | 
*ScheduleApi* | [**pauseSchedule**](docs/Api/ScheduleApi.md#pauseschedule) | **POST** /v1/schedules/{id}/pause | 
*ScheduleApi* | [**resumeSchedule**](docs/Api/ScheduleApi.md#resumeschedule) | **POST** /v1/schedules/{id}/resume | 
*ScheduleApi* | [**triggerSchedule**](docs/Api/ScheduleApi.md#triggerschedule) | **POST** /v1/schedules/{id}/trigger | 
*ScheduleApi* | [**updateSchedule**](docs/Api/ScheduleApi.md#updateschedule) | **PUT** /v1/schedules/{id} | 
*ScreenshotApi* | [**captureSync**](docs/Api/ScreenshotApi.md#capturesync) | **POST** /v1/screenshots | 
*ScreenshotApi* | [**getSyncCaptureOutputResult**](docs/Api/ScreenshotApi.md#getsynccaptureoutputresult) | **GET** /v1/screenshots/captures/{id}/result/{outputId} | 
*ScreenshotApi* | [**getSyncCaptureResult**](docs/Api/ScreenshotApi.md#getsynccaptureresult) | **GET** /v1/screenshots/captures/{id}/result | 
*ScreenshotApi* | [**submissionStatus**](docs/Api/ScreenshotApi.md#submissionstatus) | **GET** /v1/screenshots/submissions/{key} | 
*UsageApi* | [**getActivity**](docs/Api/UsageApi.md#getactivity) | **GET** /v1/usage/activity | 
*UsageApi* | [**getQuota**](docs/Api/UsageApi.md#getquota) | **GET** /v1/usage/quota | 
*UsageApi* | [**getUsage**](docs/Api/UsageApi.md#getusage) | **GET** /v1/usage | 
*UsageApi* | [**getUsageByKey**](docs/Api/UsageApi.md#getusagebykey) | **GET** /v1/usage/keys | 

## Models

- [ApiKeyUsageDetail](docs/Model/ApiKeyUsageDetail.md)
- [ApiKeyUsageResponse](docs/Model/ApiKeyUsageResponse.md)
- [AsyncJobCreatedResponse](docs/Model/AsyncJobCreatedResponse.md)
- [BandwidthQuotaResponse](docs/Model/BandwidthQuotaResponse.md)
- [BorderConfig](docs/Model/BorderConfig.md)
- [BrowserCookieRequest](docs/Model/BrowserCookieRequest.md)
- [BrowserHeaderRequest](docs/Model/BrowserHeaderRequest.md)
- [BrowserSessionRequest](docs/Model/BrowserSessionRequest.md)
- [BrowserStorageOriginRequest](docs/Model/BrowserStorageOriginRequest.md)
- [BulkDefaults](docs/Model/BulkDefaults.md)
- [BulkJobDetailInfo](docs/Model/BulkJobDetailInfo.md)
- [BulkJobInfo](docs/Model/BulkJobInfo.md)
- [BulkJobSummary](docs/Model/BulkJobSummary.md)
- [BulkRequest](docs/Model/BulkRequest.md)
- [BulkResponse](docs/Model/BulkResponse.md)
- [BulkStatusResponse](docs/Model/BulkStatusResponse.md)
- [BulkUrlOptions](docs/Model/BulkUrlOptions.md)
- [BulkUrlRequest](docs/Model/BulkUrlRequest.md)
- [CaptureDefaults](docs/Model/CaptureDefaults.md)
- [CaptureInfo](docs/Model/CaptureInfo.md)
- [CaptureItem](docs/Model/CaptureItem.md)
- [CaptureUsageCounts](docs/Model/CaptureUsageCounts.md)
- [ClickAction](docs/Model/ClickAction.md)
- [ComposeJobCreatedResponse](docs/Model/ComposeJobCreatedResponse.md)
- [ComposeJobStatusResponse](docs/Model/ComposeJobStatusResponse.md)
- [ComposeJobSummaryResponse](docs/Model/ComposeJobSummaryResponse.md)
- [ComposeMetadata](docs/Model/ComposeMetadata.md)
- [ComposeOutputConfig](docs/Model/ComposeOutputConfig.md)
- [ComposeRequest](docs/Model/ComposeRequest.md)
- [ComposeResponse](docs/Model/ComposeResponse.md)
- [CrawlCreatedResponse](docs/Model/CrawlCreatedResponse.md)
- [CrawlListResponse](docs/Model/CrawlListResponse.md)
- [CrawlPageOutputResponse](docs/Model/CrawlPageOutputResponse.md)
- [CrawlPageResponse](docs/Model/CrawlPageResponse.md)
- [CrawlPagesResponse](docs/Model/CrawlPagesResponse.md)
- [CrawlProgressResponse](docs/Model/CrawlProgressResponse.md)
- [CrawlRequest](docs/Model/CrawlRequest.md)
- [CrawlResponse](docs/Model/CrawlResponse.md)
- [CreateScheduleRequest](docs/Model/CreateScheduleRequest.md)
- [CreditBalanceResponse](docs/Model/CreditBalanceResponse.md)
- [DailyCaptureCountResponse](docs/Model/DailyCaptureCountResponse.md)
- [DeliveryDestination](docs/Model/DeliveryDestination.md)
- [EmailDestination](docs/Model/EmailDestination.md)
- [ErrorDetail](docs/Model/ErrorDetail.md)
- [ErrorResponse](docs/Model/ErrorResponse.md)
- [HoverAction](docs/Model/HoverAction.md)
- [HtmlOutputSpec](docs/Model/HtmlOutputSpec.md)
- [JobResponse](docs/Model/JobResponse.md)
- [JsonFieldSpec](docs/Model/JsonFieldSpec.md)
- [JsonOutputSpec](docs/Model/JsonOutputSpec.md)
- [LabelConfig](docs/Model/LabelConfig.md)
- [LayoutPreviewResponse](docs/Model/LayoutPreviewResponse.md)
- [MarkdownOutputSpec](docs/Model/MarkdownOutputSpec.md)
- [MultiOutputResponse](docs/Model/MultiOutputResponse.md)
- [OutputInfo](docs/Model/OutputInfo.md)
- [OutputSpec](docs/Model/OutputSpec.md)
- [PageAction](docs/Model/PageAction.md)
- [PdfOutputSpec](docs/Model/PdfOutputSpec.md)
- [PeriodUsageResponse](docs/Model/PeriodUsageResponse.md)
- [PlacementPreview](docs/Model/PlacementPreview.md)
- [PressAction](docs/Model/PressAction.md)
- [QuotaDetailResponse](docs/Model/QuotaDetailResponse.md)
- [QuotaResponse](docs/Model/QuotaResponse.md)
- [QuotaStatusResponse](docs/Model/QuotaStatusResponse.md)
- [ScheduleExecutionResponse](docs/Model/ScheduleExecutionResponse.md)
- [ScheduleHistoryResponse](docs/Model/ScheduleHistoryResponse.md)
- [ScheduleListResponse](docs/Model/ScheduleListResponse.md)
- [ScheduleResponse](docs/Model/ScheduleResponse.md)
- [ScheduleScreenshotOptions](docs/Model/ScheduleScreenshotOptions.md)
- [ScreenshotJsonResponse](docs/Model/ScreenshotJsonResponse.md)
- [ScreenshotOutputSpec](docs/Model/ScreenshotOutputSpec.md)
- [ScreenshotRequest](docs/Model/ScreenshotRequest.md)
- [ScrollAction](docs/Model/ScrollAction.md)
- [SelectAction](docs/Model/SelectAction.md)
- [ShadowConfig](docs/Model/ShadowConfig.md)
- [TotalsResponse](docs/Model/TotalsResponse.md)
- [TypeAction](docs/Model/TypeAction.md)
- [UpdateScheduleRequest](docs/Model/UpdateScheduleRequest.md)
- [UsageOrganizationResponse](docs/Model/UsageOrganizationResponse.md)
- [UsageResponse](docs/Model/UsageResponse.md)
- [VariantConfig](docs/Model/VariantConfig.md)
- [ViewportConfig](docs/Model/ViewportConfig.md)
- [WaitAction](docs/Model/WaitAction.md)
- [WebhookDestination](docs/Model/WebhookDestination.md)

## Authorization

Authentication schemes defined for the API:
### ApiKey

- **Type**: API key
- **API key parameter name**: X-API-Key
- **Location**: HTTP header


## Tests

To run the tests, use:

```bash
composer install
vendor/bin/phpunit
```

## Author



## About this package

This PHP package is automatically generated by the [OpenAPI Generator](https://openapi-generator.tech) project:

- API version: `1.0.0`
    - Package version: `2.0.0`
    - Generator version: `7.25.0`
- Build package: `org.openapitools.codegen.languages.PhpClientCodegen`
