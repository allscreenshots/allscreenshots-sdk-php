<?php
require __DIR__ . '/../vendor/autoload.php';
use Allscreenshots\Sdk\Configuration;
use Allscreenshots\Sdk\ApiClient;
use Allscreenshots\Sdk\Api\ScreenshotApi;
use Allscreenshots\Sdk\Api\JobApi;
use Allscreenshots\Sdk\Api\UsageApi;
use Allscreenshots\Sdk\Model\ScreenshotRequest;
use Allscreenshots\Sdk\Model\ScreenshotJsonResponse;
use Allscreenshots\Sdk\ObjectSerializer;
function envValue($name,$fallback){return getenv($name)?:$fallback;}
$config=(new Configuration())->setHost(envValue('ALLSCREENSHOTS_BASE_URL','https://api.allscreenshots.com'))->setApiKey('X-API-Key',getenv('ALLSCREENSHOTS_API_KEY'));
$http=new GuzzleHttp\Client(['timeout'=>180]);$screenshots=new ScreenshotApi($http,$config);$jobs=new JobApi($http,$config);$mode=$argv[1]??'quota';
if($mode==='quota'){echo json_encode($q=(new UsageApi($http,$config))->getQuota(),JSON_THROW_ON_ERROR)."\n";exit;}
$request=new ScreenshotRequest(['url'=>envValue('ALLSCREENSHOTS_URL','https://example.com'),'response_type'=>'URL','format'=>'png']);
$key=envValue('ALLSCREENSHOTS_IDEMPOTENCY_KEY',bin2hex(random_bytes(16)));
if($mode==='sync'){
 $raw=$screenshots->captureSync($request,$key);$metadata=ObjectSerializer::deserialize(json_decode(file_get_contents($raw->getPathname()),false,512,JSON_THROW_ON_ERROR),ScreenshotJsonResponse::class,[]);
 $parts=explode('/',parse_url($metadata->getResultUrl(),PHP_URL_PATH));$file=$screenshots->getSyncCaptureResult($parts[count($parts)-2]);
}elseif($mode==='async'){
 $job=$jobs->createAsyncJob($request,$key);$deadline=microtime(true)+180;
 while(true){$status=$jobs->getJobStatus($job->getId());$state=$status->getStatus();if($state==='COMPLETED')break;if(in_array($state,['FAILED','CANCELLED']))throw new RuntimeException('Capture failed');if(microtime(true)>$deadline)throw new RuntimeException('Polling timed out');sleep(2);}
 $file=$jobs->getJobResult($job->getId());
}else throw new InvalidArgumentException('Expected quota, sync, or async');
$output=envValue('ALLSCREENSHOTS_OUTPUT','capture.png');copy($file->getPathname(),$output);echo json_encode(['output'=>$output],JSON_THROW_ON_ERROR)."\n";
