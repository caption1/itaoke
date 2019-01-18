<?php
/**
 * TOP API: itaoke.aliactivity.get request
 * @author Itaoke itaoke.org
 */
class ItaokeCouponBrandGetRequest
{
	private $fields;

	private $pid;	

	private $apiParas = array();
	
	public function setFields($fields)
	{
		$this->fields = $fields;
		$this->apiParas["fields"] = $fields;
	}
	

	public function getFields()
	{
		return $this->fields;
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

	public function setChannel($channel)
	{
		$this->channel = $channel;
		$this->apiParas["channel"] = $channel;
	}

	public function getChannel()
	{
		return $this->channel;
	}
	
	public function setPage_no($page_no)
	{
		$this->page_no = $page_no;
		$this->apiParas["page_no"] = $page_no;
	}

	public function getPage_no()
	{
		return $this->page_no;
	}

	public function setPage_size($page_size)
	{
		$this->page_size = $page_size;
		$this->apiParas["page_size"] = $page_size;
	}

	public function getPage_size()
	{
		return $this->page_size;
	}
	
	public function getApiMethodName()
	{
		return "itaoke.coupon.brand.get";
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