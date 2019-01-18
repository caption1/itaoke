<?php
/**
 * TOP API: itaoke.aliactivity.get request
 * @author Itaoke itaoke.org
 */
class ItaokeDetailRequest
{
	private $fields;

	private $pid;	

	private $apiParas = array();
	
	public function setFields($fields)
	{
		$this->apiParas['fields'] = $fields;
	}
	
	public function getFields()
	{
		return $this->fields;
	}

	public function setNum_iid($num_iid)
	{
		$this->num_iid = $num_iid;
		$this->apiParas["num_iid"] = $num_iid;
	}

	public function getApiMethodName()
	{
		return "itaoke.item.detail.get";
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