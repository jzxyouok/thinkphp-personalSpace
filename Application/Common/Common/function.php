<?php
function check_verify($code, $id = ''){
    $Verify = new \Think\Verify();
    $Verify->fontSize = 18;  
    $Verify->length   = 4;  
    $Verify->useNoise = false;  
    $Verify->codeSet = '0123456789';  
    $Verify->imageW = 130;  
    $Verify->imageH = 50;  
    return $Verify->check($code, $id);
}
/*   短信发送验证码   */
//生成随机验证码
function rand_number() {
    $min=100000;
    $max=999999;
    return sprintf("%0".strlen($max)."d", mt_rand($min,$max));
 } 

// 时间戳
date_default_timezone_set("Asia/Shanghai");

/**
 * 创建url
 *
 * @param funAndOperate
 *            请求的功能和操作
 * @return
 */
  function createUrls($funAndOperate)
{
    // global $BASE_URL, $ACCOUNT_SID, $AUTH_TOKEN;
    // 时间戳
    date_default_timezone_set("Asia/Shanghai");
    $timestamp = date("YmdHis");

    return "https://api.miaodiyun.com/20150822/" . $funAndOperate;
    //参数参照位置 return $BASE_URL . $funAndOperate;
}

//改造完成
function createSigs()
{
    // global $ACCOUNT_SID, $AUTH_TOKEN;
    $timestamp = date("YmdHis");
    // 签名
    // $sig = md5("0cf6b476b65b438b8c16a4bdc0aeac05" . "c30e0fe4c67e46e380f7c3a0e551d23d" . $timestamp);
    $sig = md5($ACCOUNT_SID . $AUTH_TOKEN . $timestamp);
    return $sig;
}
// 改造完成
function createBasicAuthDatas($ACCOUNT_SID,$AUTH_TOKEN)
{
    // global $ACCOUNT_SID, $AUTH_TOKEN;
    $timestamp = date("YmdHis");
    // 签名
    $sig = md5($ACCOUNT_SID . $AUTH_TOKEN . $timestamp);
    // $sig = md5("0cf6b476b65b438b8c16a4bdc0aeac05" . "c30e0fe4c67e46e380f7c3a0e551d23d" . $timestamp);
    // return array("accountSid" => "0cf6b476b65b438b8c16a4bdc0aeac05", "timestamp" => $timestamp, "sig" => $sig, "respDataType"=> "JSON");
     return array("accountSid" => $ACCOUNT_SID, "timestamp" => $timestamp, "sig" => $sig, "respDataType"=> "JSON");
}

/**
 * 创建请求头
 * @param body
 * @return
 */
//改造完成
function createHeaderss()
{
    // global $CONTENT_TYPE, $ACCEPT;
    $headers = array('Content-type: ' . "application/x-www-form-urlencoded", 'Accept: ' . "application/json");
    //参数参照位置 $headers = array('Content-type: ' . $CONTENT_TYPE, 'Accept: ' . $ACCEPT);
    return $headers;
}

/**
 * post请求
 *
 * @param funAndOperate
 *            功能和操作
 * @param body
 *            要post的数据
 * @return
 * @throws IOException
 */
//改造完成
function posts($funAndOperate,$body)
{
    global $CONTENT_TYPE, $ACCEPT;
    // 构造请求数据
    $url = createUrls($funAndOperate);
    $headers = createHeaderss();

/*
    echo("url:<br/>" . $url . "\n");
    echo("<br/><br/>body:<br/>" . json_encode($body));
    echo("<br/><br/>headers:<br/>");
    var_dump($headers);
*/
    // 要求post请求的消息体为&拼接的字符串，所以做下面转换
    $fields_string = "";
    foreach ($body as $key => $value) {
        $fields_string .= $key . '=' . $value . '&';
    }
    rtrim($fields_string, '&');

    // 提交请求
    $con = curl_init();
    curl_setopt($con, CURLOPT_URL, $url);
    curl_setopt($con, CURLOPT_SSL_VERIFYHOST, FALSE);
    curl_setopt($con, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($con, CURLOPT_HEADER, 0);
    curl_setopt($con, CURLOPT_POST, 1);
    curl_setopt($con, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($con, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($con, CURLOPT_POSTFIELDS, $fields_string);
    $result = curl_exec($con);
    curl_close($con);
//解析JSON获得状态码
$de_json = json_decode($result,TRUE);
$dt_record=$de_json['respCode'];
$my_string = json_encode($de_json['respCode']);
$message=str_replace(array('"'),"",$my_string);
//
    return "" . $message;
}



///

?>