<?php
define('DEMO_CURL_VERBOSE', false);

# 填写网页上申请的appkey 如 $apiKey="g8eBUMSokVB1BHGmgxxxxxx"
$apiKey = "XdYRNcUNT5d2mmQ8TNZ8hy82";
# 填写网页上申请的APP SECRET 如 $secretKey="94dc99566550d87f8fa8ece112xxxxx"
$secretKey = "svspk0PBPgMRWFvT4gEcKKnqP3mLK9B3";

# text 的内容为"欢迎使用百度语音合成"的urlencode,utf-8 编码
# 可以百度搜索"urlencode"
$text = "今天午餐是";

$text2 = iconv("UTF-8", "GBK", $text);
echo "text length :" . mb_strlen($text2, "GBK") . "\n";

# 发音人选择, 基础音库：0为度小美，1为度小宇，3为度逍遥，4为度丫丫，
# 精品音库：5为度小娇，103为度米朵，106为度博文，110为度小童，111为度小萌，默认为度小美
$per = 0;
#语速，取值0-15，默认为5中语速
$spd = 5;
#音调，取值0-15，默认为5中语调
$pit = 5;
#音量，取值0-9，默认为5中音量
$vol = 5;
// 下载的文件格式, 3：mp3(default) 4： pcm-16k 5： pcm-8k 6. wav
$aue = 3;

$formats = array(3 => 'mp3', 4 => 'pcm', 5 => 'pcm', 6 => 'wav');
$format = $formats[$aue];

$cuid = "123456PHP";

/** 公共模块获取token开始 */

// $auth_url = "https://aip.baidubce.com/oauth/2.0/token?grant_type=client_credentials&client_id=" . $apiKey . "&client_secret=" . $secretKey;
// $ch = curl_init();
// curl_setopt($ch, CURLOPT_URL, $auth_url);
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
// curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
// curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); //信任任何证书
// curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0); // 检查证书中是否设置域名,0不验证
// curl_setopt($ch, CURLOPT_VERBOSE, DEMO_CURL_VERBOSE);
// $res = curl_exec($ch);
// if (curl_errno($ch)) {
//   print curl_error($ch);
// }
// curl_close($ch);

// echo "Token URL response is " . $res . "\n";
// $response = json_decode($res, true);

// if (!isset($response['access_token'])) {
//   echo "ERROR TO OBTAIN TOKEN\n";
//   exit(1);
// }
// if (!isset($response['scope'])) {
//   echo "ERROR TO OBTAIN scopes\n";
//   exit(2);
// }

// if (!in_array('audio_tts_post', explode(" ", $response['scope']))) {
//   echo "DO NOT have tts permission\n";
//   // 请至网页上应用内开通语音合成权限
//   exit(3);
// }

// $token = $response['access_token'];
// echo "token = $token ; expireInSeconds: ${response['expires_in']}\n\n";
/** 公共模块获取token结束 */

/** 拼接参数开始 **/
// tex=$text&lan=zh&ctp=1&cuid=$cuid&tok=$token&per=$per&spd=$spd&pit=$pit&vol=$vol
// $params = array(
//   'tex' => urlencode($text), // 为避免+等特殊字符没有编码，此处需要2次urlencode。
//   'per' => $per,
//   'spd' => $spd,
//   'pit' => $pit,
//   'vol' => $vol,
//   'aue' => $aue,
//   'cuid' => $cuid,
//   'tok' => $token,
//   'lan' => 'zh', //固定参数
//   'ctp' => 1, // 固定参数
// );
// $paramsStr = http_build_query($params);
// $url = 'http://tsn.baidu.com/text2audio';
// $urltest = $url . '?' . $paramsStr;
// echo $urltest . "\n"; // 反馈请带上此url

$paramsStr = http_build_query(['lan' => 'cte', 'text' => '今天嘅晚餐系牛肉丸汤，炒牛河，烧鹅，黑芝麻糖包', 'spd' => 3]);
$url = 'https://fanyi.baidu.com/gettts';
$urltest = $url . '?' . $paramsStr;
/** 拼接参数结束 **/

$g_has_error = true;
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // 信任任何证书  
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2); // 检查证书中是否设置域名
curl_setopt($ch, CURLOPT_POSTFIELDS, $paramsStr);
function read_header($ch, $header)
{
  global $g_has_error;

  $comps = explode(":", $header);
  // 正常返回的头部 Content-Type: audio/*
  // 有错误的如 Content-Type: application/json
  if (count($comps) >= 2) {
    if (strcasecmp(trim($comps[0]), "Content-Type") == 0) {
      if (strpos($comps[1], "audio/") > 0) {
        $g_has_error = false;
      } else {
        echo $header . " , has error \n";
      }
    }
  }
  return strlen($header);
}
curl_setopt($ch, CURLOPT_HEADERFUNCTION, 'read_header');
$data = curl_exec($ch);
if (curl_errno($ch)) {
  echo curl_error($ch);
  exit(2);
}
curl_close($ch);

$file = $g_has_error ? "result.txt" : "result." . $format;
file_put_contents($file, $data);
echo "\n$file saved successed, please open it \n";
