<?php
/**
 * TOP API: itaoke.aliactivity.get request
 * @author Itaoke itaoke.org
 */
class ItaokeTaotokenRequest
{
	private $fields;

	private $pid;	

	private $apiParas = array();
	
	public function setFields($fields)
	{
		$this->fields = $fields;
		$this->apiParas["pid"] = $fields['pid'];
		$this->apiParas["pic"] = $fields['pic'];
		$this->apiParas["qurl"] = $fields['qurl'];
		$this->apiParas["num_iid"] = $fields['num_iid'];
		$this->apiParas["title"] = $fields['title'];
		$this->apiParas["dx"] = $fields['dx'];
		$this->apiParas["turl"] = $fields['turl'];//如果存在则直接获取token
	}
	
	public function getFields()
	{
		return $this->fields;
	}

	public function setCookie($cookie)
	{
		$this->apiParas["cookie"] = $cookie;
	}
	
	public function setPid($pid)
	{
		$this->pid = $pid;
		$this->apiParas["pid"] = $pid;
	}

	public function getPid()
	{
		return $this->pid;
	}

	public function setTime($time)
	{
		$this->time = $time;
		$this->apiParas["time"] = $time;
	}

	public function getTime()
	{
		return $this->time;
	}


	public function getApiMethodName()
	{
		return "itaoke.Taotoken.transform";
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