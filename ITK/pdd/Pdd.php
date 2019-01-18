<?php


class Pdd
{
    public $appkey  ;    //  你的client_id
    
    public $secretKey  ;   //  你的client_secret
    
    
    public function execute($apiType, $param)
    {
        $param['client_id'] = $this->appkey;
        $param['type'] = $apiType;
        $param['data_type'] = 'JSON';
        $param['timestamp'] = self::getMillisecond();
        ksort($param);    //  排序
        $str = '';      //  拼接的字符串
        foreach ($param as $k => $v) $str .= $k . $v;
        $sign = strtoupper(md5($this->secretKey. $str . $this->secretKey));    //  生成签名    MD5加密转大写
        $param['sign'] = $sign;
        $url = 'http://gw-api.pinduoduo.com/api/router';
        return self::curl_post($url, $param);
    }
 
    //  post请求
    public static function curl_post($url, $curlPost)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_REFERER, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $curlPost);
        $result = curl_exec($ch);
        curl_close($ch);
        return json_decode($result);
    }
 
    //  获取13位时间戳
    private static function getMillisecond()
    {
        list($t1, $t2) = explode(' ', microtime());
        return sprintf('%.0f', (floatval($t1) + floatval($t2)) * 1000);
    }
}
