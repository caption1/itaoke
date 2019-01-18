<?php
/**
 * TOP API: taobao.tbk.tpwd.create request
 * 
 * @author auto create
 * @since 1.0, 2017.08.23
 */
class ItaokeSpreadGetRequest
{
	/** 
	 * 扩展字段JSON格式
	 **/
	private $ext;
	
	/** 
	 * 口令弹框logoURL
	 **/
	private $logo;
	
	/** 
	 * 口令弹框内容
	 **/
	private $text;
	
	/** 
	 * 口令跳转目标页
	 **/
	private $url;
	
	/** 
	 * 生成口令的淘宝用户ID
	 **/
	private $userId;
	
	private $apiParas = array();
	
	public function setUrl($url)
	{
		$this->url = $url;
		$this->apiParas["url"] = urlencode($url);
	}

	public function getUrl()
	{
		return urldecode($this->url);
	}


	public function getApiMethodName()
	{
		return "itaoke.spread.get";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		RequestCheckUtil::checkNotNull($this->url,"url");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
