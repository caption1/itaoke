<?php
/**
 * TOP API: itaoke.aliactivity.get request
 * @author Itaoke itaoke.org
 */
class ItaokeAppCouponGetRequest
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

	public function setType($type)
	{
		$this->type = $type;
		$this->apiParas["type"] = $type;
	}
	
	public function getType()
	{
		return $this->type;
	}
	
	public function setCat($cat)
	{
		$this->cat = $cat;
		$this->apiParas["cat"] = $cat;
	}

	public function getCat()
	{
		return $this->cat;
	}
	
	public function setP($page_no)
	{
		$this->p = $page_no;
		$this->apiParas["p"] = $page_no;
	}

	public function getP()
	{
		return $this->p;
	}
	public function setSort($sort)
	{
		$this->sort = $sort;
		$this->apiParas["sort"] = $sort;
	}
	
	public function getSort()
	{
		return $this->sort;
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
		return "itaoke.app.coupon.get";
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