<?php
/**
 * itaoke
 */
class ItaokeJdPidGetRequest
{
	/** 
	 * mm_xxx_xxx_xxx的第三位
	 **/
	private $adzoneId;
	
	/** 
	 * 后台类目ID，用,分割，最大10个，该ID可以通过taobao.itemcats.get接口获取到
	 **/
	private $cat;
	
	/** 
	 * 折扣价范围上限，单位：元
	 **/
	private $endPrice;
	
	/** 
	 * 淘客佣金比率上限，如：1234表示12.34%
	 **/
	private $endTkRate;
	
	/** 
	 * 是否有优惠券，设置为true表示该商品有优惠券，设置为false或不设置表示不判断这个属性
	 **/
	private $hasCoupon;
	
	/** 
	 * 是否海外商品，设置为true表示该商品是属于海外商品，设置为false或不设置表示不判断这个属性
	 **/
	private $isOverseas;
	
	/** 
	 * 是否商城商品，设置为true表示该商品是属于淘宝商城商品，设置为false或不设置表示不判断这个属性
	 **/
	private $isTmall;
	
	/** 
	 * 所在地
	 **/
	private $itemloc;
	
	/** 
	 * 第几页，默认：１
	 **/
	private $pageNo;
	
	/** 
	 * 页大小，默认20，1~100
	 **/
	private $pageSize;
	
	/** 
	 * 链接形式：1：PC，2：无线，默认：１
	 **/
	private $platform;
	
	/** 
	 * 查询词
	 **/
	private $q;
	
	/** 
	 * 排序_des（降序），排序_asc（升序），销量（total_sales），淘客佣金比率（tk_rate）， 累计推广量（tk_total_sales），总支出佣金（tk_total_commi），价格（price）
	 **/
	private $sort;
	
	/** 
	 * 店铺dsr评分，筛选高于等于当前设置的店铺dsr评分的商品0-50000之间
	 **/
	private $startDsr;
	
	/** 
	 * 折扣价范围下限，单位：元
	 **/
	private $startPrice;
	
	/** 
	 * 淘客佣金比率下限，如：1234表示12.34%
	 **/
	private $startTkRate;
	
	private $apiParas = array();
	
	public function setUnionId($unionId)
	{
	    $this->unionId = $unionId;
		$this->apiParas["unionId"] = $unionId;
	}

	public function getUnionId()
	{
	    return $this->unionId;
	}
		
	public function setkey($key)
	{
	    $this->key = $key;
	    $this->apiParas["key"] = $key;
	}

	public function getKey()
	{
	    return $this->key;
	}


	public function setUnionType($unionType)
	{
	    $this->unionType = $unionType;
		$this->apiParas["unionType"] = $unionType;
	}

	public function getUnionType()
	{
	    return $this->unionType;
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

	public function setSiteId($siteId)
	{
	    $this->siteId = $siteId;
	    $this->apiParas["siteId"] = $siteId;
	}
	
	public function getSiteId()
	{
	    return $this->siteId;
	}

	public function setSpaceNameList($spaceNameList)
	{
	    $this->spaceNameList = $spaceNameList;
	    $this->apiParas["spaceNameList"] = $spaceNameList;
	}
	
	public function getSpaceNameList()
	{
	    return $this->spaceNameList;
	}
	
	public function getApiMethodName()
	{
		return "itaoke.jd.pid.create";
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
