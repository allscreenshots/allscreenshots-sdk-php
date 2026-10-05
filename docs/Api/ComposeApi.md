# Allscreenshots\Sdk\ComposeApi



All URIs are relative to https://api.allscreenshots.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**compose()**](ComposeApi.md#compose) | **POST** /v1/screenshots/compose |  |
| [**getComposeJobStatus()**](ComposeApi.md#getComposeJobStatus) | **GET** /v1/screenshots/compose/jobs/{jobId} |  |
| [**getLayoutPreview()**](ComposeApi.md#getLayoutPreview) | **GET** /v1/screenshots/compose/preview |  |
| [**listComposeJobs()**](ComposeApi.md#listComposeJobs) | **GET** /v1/screenshots/compose/jobs |  |


## `compose()`

```php
compose($compose_request): \SplFileObject
```



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = Allscreenshots\Sdk\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Allscreenshots\Sdk\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');


$apiInstance = new Allscreenshots\Sdk\Api\ComposeApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$compose_request = new \Allscreenshots\Sdk\Model\ComposeRequest(); // \Allscreenshots\Sdk\Model\ComposeRequest

try {
    $result = $apiInstance->compose($compose_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ComposeApi->compose: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **compose_request** | [**\Allscreenshots\Sdk\Model\ComposeRequest**](../Model/ComposeRequest.md)|  | |

### Return type

**\SplFileObject**

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/octet-stream`, `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getComposeJobStatus()`

```php
getComposeJobStatus($job_id): \Allscreenshots\Sdk\Model\ComposeJobStatusResponse
```



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = Allscreenshots\Sdk\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Allscreenshots\Sdk\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');


$apiInstance = new Allscreenshots\Sdk\Api\ComposeApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$job_id = 'job_id_example'; // string

try {
    $result = $apiInstance->getComposeJobStatus($job_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ComposeApi->getComposeJobStatus: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **job_id** | **string**|  | |

### Return type

[**\Allscreenshots\Sdk\Model\ComposeJobStatusResponse**](../Model/ComposeJobStatusResponse.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getLayoutPreview()`

```php
getLayoutPreview($layout, $image_count, $canvas_width, $canvas_height, $aspect_ratios): \Allscreenshots\Sdk\Model\LayoutPreviewResponse
```



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = Allscreenshots\Sdk\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Allscreenshots\Sdk\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');


$apiInstance = new Allscreenshots\Sdk\Api\ComposeApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$layout = 'layout_example'; // string
$image_count = 56; // int
$canvas_width = 1200; // int
$canvas_height = 800; // int
$aspect_ratios = array(3.4); // float[]

try {
    $result = $apiInstance->getLayoutPreview($layout, $image_count, $canvas_width, $canvas_height, $aspect_ratios);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ComposeApi->getLayoutPreview: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **layout** | **string**|  | |
| **image_count** | **int**|  | |
| **canvas_width** | **int**|  | [optional] [default to 1200] |
| **canvas_height** | **int**|  | [optional] [default to 800] |
| **aspect_ratios** | [**float[]**](../Model/float.md)|  | [optional] |

### Return type

[**\Allscreenshots\Sdk\Model\LayoutPreviewResponse**](../Model/LayoutPreviewResponse.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listComposeJobs()`

```php
listComposeJobs(): \Allscreenshots\Sdk\Model\ComposeJobSummaryResponse[]
```



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = Allscreenshots\Sdk\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Allscreenshots\Sdk\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');


$apiInstance = new Allscreenshots\Sdk\Api\ComposeApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->listComposeJobs();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ComposeApi->listComposeJobs: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\Allscreenshots\Sdk\Model\ComposeJobSummaryResponse[]**](../Model/ComposeJobSummaryResponse.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
