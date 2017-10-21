<?php 
/**
 * 对分类数据进行树排序
 * @param  array  $categoryData 要排序的数组
 * @param  integer $parentId     根分类id
 * @return array               处理好的数组
 */
function formatCategoryData($categoryData,$parentId = 0){
	$temp = array();
	foreach ($categoryData as $key => $value) {
		if ($value['cat_son_id'] == $parentId) {
			$temp[] = $value;
		}
	}

	foreach ($categoryData as $key => $value) {
		foreach ($temp as $k => $v) {
			if ($value['cat_son_id'] == $v['c_id']) {
				$temp[$k]['son'][] = $value;
			}
		}
	}
		return $temp;
}



    /**
     * 字符串截取，支持中文和其他编码
     * @static
     * @access public
     * @param string $str 需要转换的字符串
     * @param string $start 开始位置
     * @param string $length 截取长度
     * @param string $charset 编码格式
     * @param string $suffix 截断显示字符
     * @return string
     */
	function msubstr($str, $start=0, $length, $charset="utf-8", $suffix=true) {
        if(function_exists("mb_substr"))
            $slice = mb_substr($str, $start, $length, $charset);
        elseif(function_exists('iconv_substr')) {
            $slice = iconv_substr($str,$start,$length,$charset);
        }else{
            $re['utf-8']   = "/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|[\xe0-\xef][\x80-\xbf]{2}|[\xf0-\xff][\x80-\xbf]{3}/";
            $re['gb2312'] = "/[\x01-\x7f]|[\xb0-\xf7][\xa0-\xfe]/";
            $re['gbk']    = "/[\x01-\x7f]|[\x81-\xfe][\x40-\xfe]/";
            $re['big5']   = "/[\x01-\x7f]|[\x81-\xfe]([\x40-\x7e]|\xa1-\xfe])/";
            preg_match_all($re[$charset], $str, $match);
            $slice = join("",array_slice($match[0], $start, $length));
        }
 
        return ($suffix && (mb_strlen($str,$charset) > $length)) ? $slice.'...' : $slice;
    }

    /**
     * 实现博客内容文本截取
     * @param  string $str 要截取的文本内容
     * @return string      格式好的文本内容
     */
    function htmlTagSubstr($str){
        $str = htmlspecialchars_decode($str);
        $str = str_replace("&nbsp;","",$str);
        $str = strip_tags($str);
        return $str = mb_substr($str, 0, 100,"utf-8");
    }