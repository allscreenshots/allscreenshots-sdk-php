# Allscreenshots\Sdk\UsageApi



All URIs are relative to https://api.allscreenshots.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**getActivity()**](UsageApi.md#getActivity) | **GET** /v1/usage/activity |  |
| [**getQuota()**](UsageApi.md#getQuota) | **GET** /v1/usage/quota |  |
| [**getUsage()**](UsageApi.md#getUsage) | **GET** /v1/usage |  |
| [**getUsageByKey()**](UsageApi.md#getUsageByKey) | **GET** /v1/usage/keys |  |


## `getActivity()`

```php
getActivity($days, $api_key_ids): \Allscreenshots\Sdk\Model\DailyCaptureCountResponse[]
```



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = Allscreenshots\Sdk\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Allscreenshots\Sdk\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');


$apiInstance = new Allscreenshots\Sdk\Api\UsageApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$days = 120; // int
$api_key_ids = array('api_key_ids_example'); // string[]

try {
    $result = $apiInstance->getActivity($days, $api_key_ids);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling UsageApi->getActivity: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **days** | **int**|  | [optional] [default to 120] |
| **api_key_ids** | [**string[]**](../Model/string.md)|  | [optional] |

### Return type

[**\Allscreenshots\Sdk\Model\DailyCaptureCountResponse[]**](../Model/DailyCaptureCountResponse.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getQuota()`

```php
getQuota(): \Allscreenshots\Sdk\Model\QuotaStatusResponse
```



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = Allscreenshots\Sdk\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Allscreenshots\Sdk\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');


$apiInstance = new Allscreenshots\Sdk\Api\UsageApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->getQuota();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling UsageApi->getQuota: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\Allscreenshots\Sdk\Model\QuotaStatusResponse**](../Model/QuotaStatusResponse.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getUsage()`

```php
getUsage(): \Allscreenshots\Sdk\Model\UsageResponse
```



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = Allscreenshots\Sdk\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Allscreenshots\Sdk\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');


$apiInstance = new Allscreenshots\Sdk\Api\UsageApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->getUsage();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling UsageApi->getUsage: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\Allscreenshots\Sdk\Model\UsageResponse**](../Model/UsageResponse.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getUsageByKey()`

```php
getUsageByKey(): \Allscreenshots\Sdk\Model\ApiKeyUsageResponse
```



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = Allscreenshots\Sdk\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Allscreenshots\Sdk\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');


$apiInstance = new Allscreenshots\Sdk\Api\UsageApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->getUsageByKey();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling UsageApi->getUsageByKey: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\Allscreenshots\Sdk\Model\ApiKeyUsageResponse**](../Model/ApiKeyUsageResponse.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
