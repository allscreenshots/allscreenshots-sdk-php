# CreateScheduleRequest

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**alert_on_failure** | **bool** |  | [optional] [default to false]
**auto_pause_after_failures** | **int** |  | [optional]
**destinations** | [**\Allscreenshots\Sdk\Model\DeliveryDestination[]**](DeliveryDestination.md) |  | [optional]
**diff_threshold** | **float** |  | [optional]
**ends_at** | **\DateTime** |  | [optional]
**name** | **string** |  |
**only_on_change** | **bool** |  | [optional] [default to false]
**options** | [**\Allscreenshots\Sdk\Model\ScheduleScreenshotOptions**](ScheduleScreenshotOptions.md) |  | [optional]
**retention_days** | **int** |  | [optional] [default to 30]
**schedule** | **string** |  |
**starts_at** | **\DateTime** |  | [optional]
**timezone** | **string** |  | [optional] [default to 'UTC']
**url** | **string** |  |
**webhook_secret** | **string** |  | [optional]
**webhook_url** | **string** |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
