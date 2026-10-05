# Allscreenshots\Sdk\JobApi



All URIs are relative to https://api.allscreenshots.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**cancelJob()**](JobApi.md#cancelJob) | **POST** /v1/screenshots/jobs/{id}/cancel |  |
| [**createAsyncJob()**](JobApi.md#createAsyncJob) | **POST** /v1/screenshots/async |  |
| [**getJobOutputResult()**](JobApi.md#getJobOutputResult) | **GET** /v1/screenshots/jobs/{id}/result/{outputId} |  |
| [**getJobResult()**](JobApi.md#getJobResult) | **GET** /v1/screenshots/jobs/{id}/result |  |
| [**getJobStatus()**](JobApi.md#getJobStatus) | **GET** /v1/screenshots/jobs/{id} |  |
| [**listJobs()**](JobApi.md#listJobs) | **GET** /v1/screenshots/jobs |  |


## `cancelJob()`

```php
cancelJob($id): \Allscreenshots\Sdk\Model\JobResponse
```



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = Allscreenshots\Sdk\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Allscreenshots\Sdk\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');


$apiInstance = new Allscreenshots\Sdk\Api\JobApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string

try {
    $result = $apiInstance->cancelJob($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling JobApi->cancelJob: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**|  | |

### Return type

[**\Allscreenshots\Sdk\Model\JobResponse**](../Model/JobResponse.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `createAsyncJob()`

```php
createAsyncJob($screenshot_request, $idempotency_key): \Allscreenshots\Sdk\Model\AsyncJobCreatedResponse
```



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = Allscreenshots\Sdk\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Allscreenshots\Sdk\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');


$apiInstance = new Allscreenshots\Sdk\Api\JobApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$screenshot_request = new \Allscreenshots\Sdk\Model\ScreenshotRequest(); // \Allscreenshots\Sdk\Model\ScreenshotRequest
$idempotency_key = 'idempotency_key_example'; // string | Unique submission key. Supported for responseType=url; reuse with the same body to recover the original result.

try {
    $result = $apiInstance->createAsyncJob($screenshot_request, $idempotency_key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling JobApi->createAsyncJob: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **screenshot_request** | [**\Allscreenshots\Sdk\Model\ScreenshotRequest**](../Model/ScreenshotRequest.md)|  | |
| **idempotency_key** | **string**| Unique submission key. Supported for responseType&#x3D;url; reuse with the same body to recover the original result. | [optional] |

### Return type

[**\Allscreenshots\Sdk\Model\AsyncJobCreatedResponse**](../Model/AsyncJobCreatedResponse.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getJobOutputResult()`

```php
getJobOutputResult($id, $output_id): \SplFileObject
```



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = Allscreenshots\Sdk\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Allscreenshots\Sdk\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');


$apiInstance = new Allscreenshots\Sdk\Api\JobApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string
$output_id = 'output_id_example'; // string

try {
    $result = $apiInstance->getJobOutputResult($id, $output_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling JobApi->getJobOutputResult: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**|  | |
| **output_id** | **string**|  | |

### Return type

**\SplFileObject**

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/octet-stream`, `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getJobResult()`

```php
getJobResult($id): \SplFileObject
```



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = Allscreenshots\Sdk\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Allscreenshots\Sdk\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');


$apiInstance = new Allscreenshots\Sdk\Api\JobApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string

try {
    $result = $apiInstance->getJobResult($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling JobApi->getJobResult: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**|  | |

### Return type

**\SplFileObject**

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/octet-stream`, `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getJobStatus()`

```php
getJobStatus($id): \Allscreenshots\Sdk\Model\JobResponse
```



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = Allscreenshots\Sdk\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Allscreenshots\Sdk\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');


$apiInstance = new Allscreenshots\Sdk\Api\JobApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string

try {
    $result = $apiInstance->getJobStatus($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling JobApi->getJobStatus: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**|  | |

### Return type

[**\Allscreenshots\Sdk\Model\JobResponse**](../Model/JobResponse.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listJobs()`

```php
listJobs(): \Allscreenshots\Sdk\Model\JobResponse[]
```



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = Allscreenshots\Sdk\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Allscreenshots\Sdk\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');


$apiInstance = new Allscreenshots\Sdk\Api\JobApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->listJobs();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling JobApi->listJobs: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\Allscreenshots\Sdk\Model\JobResponse[]**](../Model/JobResponse.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
