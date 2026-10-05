# Allscreenshots\Sdk\ScreenshotApi



All URIs are relative to https://api.allscreenshots.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**captureSync()**](ScreenshotApi.md#captureSync) | **POST** /v1/screenshots |  |
| [**getSyncCaptureOutputResult()**](ScreenshotApi.md#getSyncCaptureOutputResult) | **GET** /v1/screenshots/captures/{id}/result/{outputId} |  |
| [**getSyncCaptureResult()**](ScreenshotApi.md#getSyncCaptureResult) | **GET** /v1/screenshots/captures/{id}/result |  |
| [**submissionStatus()**](ScreenshotApi.md#submissionStatus) | **GET** /v1/screenshots/submissions/{key} |  |


## `captureSync()`

```php
captureSync($screenshot_request, $idempotency_key): \SplFileObject
```



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = Allscreenshots\Sdk\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Allscreenshots\Sdk\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');


$apiInstance = new Allscreenshots\Sdk\Api\ScreenshotApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$screenshot_request = new \Allscreenshots\Sdk\Model\ScreenshotRequest(); // \Allscreenshots\Sdk\Model\ScreenshotRequest
$idempotency_key = 'idempotency_key_example'; // string | Unique submission key. Supported for responseType=url; reuse with the same body to recover the original result.

try {
    $result = $apiInstance->captureSync($screenshot_request, $idempotency_key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ScreenshotApi->captureSync: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **screenshot_request** | [**\Allscreenshots\Sdk\Model\ScreenshotRequest**](../Model/ScreenshotRequest.md)|  | |
| **idempotency_key** | **string**| Unique submission key. Supported for responseType&#x3D;url; reuse with the same body to recover the original result. | [optional] |

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

## `getSyncCaptureOutputResult()`

```php
getSyncCaptureOutputResult($id, $output_id): \SplFileObject
```



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = Allscreenshots\Sdk\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Allscreenshots\Sdk\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');


$apiInstance = new Allscreenshots\Sdk\Api\ScreenshotApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string
$output_id = 'output_id_example'; // string

try {
    $result = $apiInstance->getSyncCaptureOutputResult($id, $output_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ScreenshotApi->getSyncCaptureOutputResult: ', $e->getMessage(), PHP_EOL;
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

## `getSyncCaptureResult()`

```php
getSyncCaptureResult($id): \SplFileObject
```



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = Allscreenshots\Sdk\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Allscreenshots\Sdk\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');


$apiInstance = new Allscreenshots\Sdk\Api\ScreenshotApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string

try {
    $result = $apiInstance->getSyncCaptureResult($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ScreenshotApi->getSyncCaptureResult: ', $e->getMessage(), PHP_EOL;
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

## `submissionStatus()`

```php
submissionStatus($key): object
```



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = Allscreenshots\Sdk\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Allscreenshots\Sdk\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');


$apiInstance = new Allscreenshots\Sdk\Api\ScreenshotApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$key = 'key_example'; // string

try {
    $result = $apiInstance->submissionStatus($key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ScreenshotApi->submissionStatus: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **key** | **string**|  | |

### Return type

**object**

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
