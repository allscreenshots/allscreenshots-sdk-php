# CrawlRequest

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**block_ads** | **bool** |  | [optional] [default to true]
**block_cookie_banners** | **bool** |  | [optional] [default to true]
**block_popups** | **bool** |  | [optional] [default to true]
**crawl_delay_ms** | **int** |  | [optional] [default to 500]
**dark_mode** | **bool** |  | [optional] [default to false]
**depth** | **int** |  | [optional] [default to 2]
**exclude_patterns** | **string[]** |  | [optional]
**format** | **string** |  | [optional] [default to 'png']
**full_page** | **bool** |  | [optional] [default to true]
**include_patterns** | **string[]** |  | [optional]
**include_subdomains** | **bool** |  | [optional] [default to false]
**limit** | **int** |  | [optional] [default to 25]
**outputs** | [**\Allscreenshots\Sdk\Model\OutputSpec[]**](OutputSpec.md) |  | [optional]
**quality** | **int** |  | [optional] [default to 80]
**render_delay** | **int** |  | [optional] [default to 0]
**timeout** | **int** |  | [optional] [default to 30000]
**url** | **string** |  |
**viewport** | [**\Allscreenshots\Sdk\Model\ViewportConfig**](ViewportConfig.md) |  | [optional]
**wait_until** | **string** |  | [optional] [default to 'domcontentloaded']

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
