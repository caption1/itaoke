<?php
/**
 * TOP API: itaoke.check.get request
 * @author Itaoke itaoke.org
 */
class ItaokeCheckRequest
{
	private $fields;

	private $pid;	

	private $apiParas = array();
	
	public function setFields($fields)
	{
		$this->fields = $fields;
		$this->apiParas["auth"] = $fields;
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
		return "itaoke.check.auth";
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