# Allscreenshots\Sdk\ScheduleApi



All URIs are relative to https://api.allscreenshots.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**createSchedule()**](ScheduleApi.md#createSchedule) | **POST** /v1/schedules |  |
| [**deleteSchedule()**](ScheduleApi.md#deleteSchedule) | **DELETE** /v1/schedules/{id} |  |
| [**getExecutionHistory()**](ScheduleApi.md#getExecutionHistory) | **GET** /v1/schedules/{id}/history |  |
| [**getSchedule()**](ScheduleApi.md#getSchedule) | **GET** /v1/schedules/{id} |  |
| [**listSchedules()**](ScheduleApi.md#listSchedules) | **GET** /v1/schedules |  |
| [**pauseSchedule()**](ScheduleApi.md#pauseSchedule) | **POST** /v1/schedules/{id}/pause |  |
| [**resumeSchedule()**](ScheduleApi.md#resumeSchedule) | **POST** /v1/schedules/{id}/resume |  |
| [**triggerSchedule()**](ScheduleApi.md#triggerSchedule) | **POST** /v1/schedules/{id}/trigger |  |
| [**updateSchedule()**](ScheduleApi.md#updateSchedule) | **PUT** /v1/schedules/{id} |  |


## `createSchedule()`

```php
createSchedule($create_schedule_request): \Allscreenshots\Sdk\Model\ScheduleResponse
```



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = Allscreenshots\Sdk\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Allscreenshots\Sdk\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');


$apiInstance = new Allscreenshots\Sdk\Api\ScheduleApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$create_schedule_request = new \Allscreenshots\Sdk\Model\CreateScheduleRequest(); // \Allscreenshots\Sdk\Model\CreateScheduleRequest

try {
    $result = $apiInstance->createSchedule($create_schedule_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ScheduleApi->createSchedule: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **create_schedule_request** | [**\Allscreenshots\Sdk\Model\CreateScheduleRequest**](../Model/CreateScheduleRequest.md)|  | |

### Return type

[**\Allscreenshots\Sdk\Model\ScheduleResponse**](../Model/ScheduleResponse.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deleteSchedule()`

```php
deleteSchedule($id)
```



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = Allscreenshots\Sdk\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Allscreenshots\Sdk\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');


$apiInstance = new Allscreenshots\Sdk\Api\ScheduleApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string

try {
    $apiInstance->deleteSchedule($id);
} catch (Exception $e) {
    echo 'Exception when calling ScheduleApi->deleteSchedule: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**|  | |

### Return type

void (empty response body)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getExecutionHistory()`

```php
getExecutionHistory($id, $limit): \Allscreenshots\Sdk\Model\ScheduleHistoryResponse
```



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = Allscreenshots\Sdk\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Allscreenshots\Sdk\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');


$apiInstance = new Allscreenshots\Sdk\Api\ScheduleApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string
$limit = 50; // int

try {
    $result = $apiInstance->getExecutionHistory($id, $limit);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ScheduleApi->getExecutionHistory: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**|  | |
| **limit** | **int**|  | [optional] [default to 50] |

### Return type

[**\Allscreenshots\Sdk\Model\ScheduleHistoryResponse**](../Model/ScheduleHistoryResponse.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getSchedule()`

```php
getSchedule($id): \Allscreenshots\Sdk\Model\ScheduleResponse
```



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = Allscreenshots\Sdk\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Allscreenshots\Sdk\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');


$apiInstance = new Allscreenshots\Sdk\Api\ScheduleApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string

try {
    $result = $apiInstance->getSchedule($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ScheduleApi->getSchedule: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**|  | |

### Return type

[**\Allscreenshots\Sdk\Model\ScheduleResponse**](../Model/ScheduleResponse.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listSchedules()`

```php
listSchedules(): \Allscreenshots\Sdk\Model\ScheduleListResponse
```



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = Allscreenshots\Sdk\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Allscreenshots\Sdk\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');


$apiInstance = new Allscreenshots\Sdk\Api\ScheduleApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->listSchedules();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ScheduleApi->listSchedules: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\Allscreenshots\Sdk\Model\ScheduleListResponse**](../Model/ScheduleListResponse.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `pauseSchedule()`

```php
pauseSchedule($id): \Allscreenshots\Sdk\Model\ScheduleResponse
```



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = Allscreenshots\Sdk\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Allscreenshots\Sdk\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');


$apiInstance = new Allscreenshots\Sdk\Api\ScheduleApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string

try {
    $result = $apiInstance->pauseSchedule($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ScheduleApi->pauseSchedule: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**|  | |

### Return type

[**\Allscreenshots\Sdk\Model\ScheduleResponse**](../Model/ScheduleResponse.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `resumeSchedule()`

```php
resumeSchedule($id): \Allscreenshots\Sdk\Model\ScheduleResponse
```



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = Allscreenshots\Sdk\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Allscreenshots\Sdk\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');


$apiInstance = new Allscreenshots\Sdk\Api\ScheduleApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string

try {
    $result = $apiInstance->resumeSchedule($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ScheduleApi->resumeSchedule: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**|  | |

### Return type

[**\Allscreenshots\Sdk\Model\ScheduleResponse**](../Model/ScheduleResponse.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `triggerSchedule()`

```php
triggerSchedule($id): \Allscreenshots\Sdk\Model\ScheduleResponse
```



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = Allscreenshots\Sdk\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Allscreenshots\Sdk\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');


$apiInstance = new Allscreenshots\Sdk\Api\ScheduleApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string

try {
    $result = $apiInstance->triggerSchedule($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ScheduleApi->triggerSchedule: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**|  | |

### Return type

[**\Allscreenshots\Sdk\Model\ScheduleResponse**](../Model/ScheduleResponse.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateSchedule()`

```php
updateSchedule($id, $update_schedule_request): \Allscreenshots\Sdk\Model\ScheduleResponse
```



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = Allscreenshots\Sdk\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Allscreenshots\Sdk\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');


$apiInstance = new Allscreenshots\Sdk\Api\ScheduleApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string
$update_schedule_request = new \Allscreenshots\Sdk\Model\UpdateScheduleRequest(); // \Allscreenshots\Sdk\Model\UpdateScheduleRequest

try {
    $result = $apiInstance->updateSchedule($id, $update_schedule_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ScheduleApi->updateSchedule: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**|  | |
| **update_schedule_request** | [**\Allscreenshots\Sdk\Model\UpdateScheduleRequest**](../Model/UpdateScheduleRequest.md)|  | |

### Return type

[**\Allscreenshots\Sdk\Model\ScheduleResponse**](../Model/ScheduleResponse.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
