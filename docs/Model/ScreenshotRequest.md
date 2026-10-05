# ScreenshotRequest

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**actions** | [**\Allscreenshots\Sdk\Model\PageAction[]**](PageAction.md) |  | [optional]
**block_ads** | **bool** |  | [optional] [default to true]
**block_cookie_banners** | **bool** |  | [optional] [default to true]
**block_level** | **string** |  | [optional] [default to 'none']
**block_popups** | **bool** |  | [optional] [default to true]
**custom_css** | **string** |  | [optional]
**dark_mode** | **bool** |  | [optional] [default to false]
**delay** | **int** |  | [optional] [default to 0]
**device** | **string** |  | [optional]
**format** | **string** |  | [optional] [default to 'png']
**freeze_fixed** | **bool** |  | [optional] [default to true]
**full_page** | **bool** |  | [optional] [default to false]
**full_page_mode** | **string** |  | [optional] [default to 'stitch']
**hide_selectors** | **string[]** |  | [optional]
**max_height** | **int** |  | [optional]
**max_sections** | **int** |  | [optional] [default to 50]
**outputs** | [**\Allscreenshots\Sdk\Model\OutputSpec[]**](OutputSpec.md) |  | [optional]
**quality** | **int** |  | [optional] [default to 80]
**response_type** | **string** |  | [optional] [default to 'BINARY']
**scroll_interval** | **int** |  | [optional] [default to 150]
**selector** | **string** |  | [optional]
**session** | [**\Allscreenshots\Sdk\Model\BrowserSessionRequest**](BrowserSessionRequest.md) |  | [optional]
**stealth_mode** | **bool** |  | [optional] [default to false]
**timeout** | **int** |  | [optional] [default to 30000]
**url** | **string** |  |
**viewport** | [**\Allscreenshots\Sdk\Model\ViewportConfig**](ViewportConfig.md) |  | [optional]
**wait_for** | **string** |  | [optional]
**wait_until** | **string** |  | [optional] [default to 'domcontentloaded']
**webhook_secret** | **string** |  | [optional]
**webhook_url** | **string** |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
