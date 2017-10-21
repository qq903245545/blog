<?php
namespace Admin\Controller;
use Think\Controller;
class CommonController extends Controller {
	
	/**
	 * 单文件上传
	 * @return string 上传成功返回图片存放路径
	 */
	function uploadFile(){
		$upload = new \Think\Upload();// 实例化上传类
	    $upload->maxSize   =     3145728 ;// 设置附件上传大小
	    $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
	    $upload->rootPath  =     "./Public/images/"; // 设置附件上传根目录
	    $upload->savePath  =     ''; // 设置附件上传（子）目录
	    // 上传文件 
	    $info   =   $upload->upload();

	    if(!$info) {// 上传错误提示错误信息
	        $this->error($upload->getError());
	    }
	    $imginfo = $info['article_img'];
	    $imgPath = "/images/{$imginfo['savepath']}{$imginfo['savename']}";
	    return $imgPath;
	}
}