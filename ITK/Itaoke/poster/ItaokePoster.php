<?php

include 'phpqrcode/phpqrcode.php';
/**
 * itaoke
 */
class ItaokePoster
{

	public $config = array(
    			'image'=>array(array('url'=> '',              		//图片资源路径
    							'left'=>220,
    							'top'=>-173,
    							'stream'=>0,                         //图片资源是否是字符串图像流
    							'right'=>0,
    							'bottom'=>0,
    							'width'=>200,
    							'height'=>200,
    							'opacity'=>100),),
    			'background'=>'',
    );
	
	public function __construct($config = array() ){
		$this->config['background'] = $config['background'];
		$this->config['qr'] = $config['qr'] ? $config['qr'] : 'qr/';
		$filname = self::createQR($config['url'] ,$config['logo'] ,$config['uid'], $this->config['qr']);
		$this->config['image'][0]['url'] = C("itk_site_url").$filname;

        if ($config['left']) $this->config['image'][0]['left'] = $config['left'];
        if ($config['top']) $this->config['image'][0]['top'] = $config['top'];
        if ($config['stream']) $this->config['image'][0]['stream'] = $config['stream'];
        if ($config['right']) $this->config['image'][0]['right'] = $config['right'];
        if ($config['bottom']) $this->config['image'][0]['bottom'] = $config['bottom'];
        if ($config['width']) $this->config['image'][0]['width'] = $config['width'];
        if ($config['height'])$this->config['image'][0]['height'] = $config['height'];
        if ($config['opacity']) $this->config['image'][0]['opacity'] = $config['opacity'];
	}
	
	
	/**
	 * 生成推广二维码返回推广二维码地址
	 * @param string $url
	 * @param string $logo
	 * @param number $uid
	 */
	function createQR($url='',$logo='',$uid=0, $qr = 'qr/'){
		$value = $url;                  //二维码内容
		$errorCorrectionLevel = 'H';    //容错级别
		$matrixPointSize = 10;           //生成图片大小
		$paths =C('itk_attach_path');
		$path = $paths. $qr;
		!is_dir($path) && mkdir($path, 0777, true);
		//生成二维码图片
		$filename = $path.'/ewm_'.md5($uid).'.png';
		if(file_exists($filename))	return $filename;
		QRcode::png($value,$filename , $errorCorrectionLevel, $matrixPointSize, 2);
		$QR = $filename;            //已经生成的原始二维码图
		if ($logo) {
			$QR = imagecreatefromstring(file_get_contents($QR));        //目标图象连接资源。
			$logo = imagecreatefromstring(file_get_contents($logo));    //源图象连接资源。
			$QR_width = imagesx($QR);           //二维码图片宽度
			$QR_height = imagesy($QR);          //二维码图片高度
			$logo_width = imagesx($logo);       //logo图片宽度
			$logo_height = imagesy($logo);      //logo图片高度
			$logo_qr_width = $QR_width / 4;     //组合之后logo的宽度(占二维码的1/5)
			$scale = $logo_width/$logo_qr_width;    //logo的宽度缩放比(本身宽度/组合后的宽度)
			$logo_qr_height = $logo_height/$scale;  //组合之后logo的高度
			$from_width = ($QR_width - $logo_qr_width) / 2;   //组合之后logo左上角所在坐标点
			imagecopyresampled($QR, $logo, $from_width, $from_width, 0, 0, $logo_qr_width,$logo_qr_height, $logo_width, $logo_height);
		}
		//输出图片
		imagepng($QR, $filename);
		imagedestroy($QR);
		imagedestroy($logo);
		return $filename;
	}
	
	public function createPoster($filename=""){
		//如果要看报什么错，可以先注释调这个header
		if(empty($filename)) header("content-type: image/png");

		$imageDefault = array(
				'left'=>0,
				'top'=>0,
				'right'=>0,
				'bottom'=>0,
				'width'=>100,
				'height'=>100,
				'opacity'=>100
		);
		$textDefault =  array(
				'text'=>'',
				'left'=>0,
				'top'=>0,
				'fontSize'=>32,             //字号
				'fontColor'=>'255,255,255', //字体颜色
				'angle'=>0,
		);

		$background = $this->config['background'];//海报最底层得背景

		
		//背景方法
		$backgroundInfo = getimagesize($background);
		$backgroundFun = 'imagecreatefrom'.image_type_to_extension($backgroundInfo[2], false);
		$background = $backgroundFun($background);
	
		$backgroundWidth = imagesx($background);    //背景宽度
		$backgroundHeight = imagesy($background);   //背景高度
	
		$imageRes = imageCreatetruecolor($backgroundWidth,$backgroundHeight);
		$color = imagecolorallocate($imageRes, 0, 0, 0);
		imagefill($imageRes, 0, 0, $color);
	
		// imageColorTransparent($imageRes, $color);    //颜色透明
	
		imagecopyresampled($imageRes,$background,0,0,0,0,imagesx($background),imagesy($background),imagesx($background),imagesy($background));
		//处理了图片
		if(!empty($this->config['image'])){
			foreach ($this->config['image'] as $key => $val) {
				$val = array_merge($imageDefault,$val);
				$info = getimagesize($val['url']);
				$function = 'imagecreatefrom'.image_type_to_extension($info[2], false);
				if($val['stream']){     //如果传的是字符串图像流
					$info = getimagesizefromstring($val['url']);
					$function = 'imagecreatefromstring';
				}
				$res = $function($val['url']);
				$resWidth = $info[0];
				$resHeight = $info[1];
				//建立画板 ，缩放图片至指定尺寸
				$canvas=imagecreatetruecolor($val['width'], $val['height']);
				imagefill($canvas, 0, 0, $color);
				//关键函数，参数（目标资源，源，目标资源的开始坐标x,y, 源资源的开始坐标x,y,目标资源的宽高w,h,源资源的宽高w,h）
				imagecopyresampled($canvas, $res, 0, 0, 0, 0, $val['width'], $val['height'],$resWidth,$resHeight);
				$val['left'] = $val['left']<0?$backgroundWidth- abs($val['left']) - $val['width']:$val['left'];
				$val['top'] = $val['top']<0?$backgroundHeight- abs($val['top']) - $val['height']:$val['top'];
				//放置图像
				imagecopymerge($imageRes,$canvas, $val['left'],$val['top'],$val['right'],$val['bottom'],$val['width'],$val['height'],$val['opacity']);//左，上，右，下，宽度，高度，透明度
			}
		}
	
		//处理文字
		if(!empty($this->config['text'])){
			foreach ($this->config['text'] as $key => $val) {
				$val = array_merge($textDefault,$val);
				list($R,$G,$B) = explode(',', $val['fontColor']);
				$fontColor = imagecolorallocate($imageRes, $R, $G, $B);
				$val['left'] = $val['left']<0?$backgroundWidth- abs($val['left']):$val['left'];
				$val['top'] = $val['top']<0?$backgroundHeight- abs($val['top']):$val['top'];
				imagettftext($imageRes,$val['fontSize'],$val['angle'],$val['left'],$val['top'],$fontColor,$val['fontPath'],$val['text']);
			}
		}
	
		//生成图片
		if(!empty($filename)){
			$res = imagejpeg ($imageRes,$filename,90); //保存到本地
			imagedestroy($imageRes);
			if(!$res) return false;
			return $filename;
		}else{
			imagejpeg ($imageRes);          //在浏览器上显示
			imagedestroy($imageRes);
		}
	}
}
