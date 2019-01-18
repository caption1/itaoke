<?php
/**
 * TOP API: itaoke.taoquan.get request
 * @author Itaoke itaoke.org
 * 2014-05-12 16:19:00
 */
class ItaokeTaoQuanGetRequest{

	private $sid;
	private $apiParas = array();

	public function setSid($sid)
	{
		$this->sid = $sid;
		$this->apiParas["sid"] = $sid;
	}

	public function getSid()
	{
		return $this->sid;
	} 
	

	public function getApiMethodName()
	{
		return "itaoke.taoquan.get";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
