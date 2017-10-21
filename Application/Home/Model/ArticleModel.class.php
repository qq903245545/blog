<?php 
namespace Home\Model;
use Think\Model;
class ArticleModel extends Model {
	/**
	 * 查找前台首页文章 加载更多
	 * @return array 查找的文章数据
	 */
	public function homeArticleSelect($page){
		if($page > 1){
			$page = $page*2-2;
		}
		return M('Article')->order('article_time')->limit($page,2)->select();
	}

	/**
	 * 查询博文内容
	 * @param  int $id 要查询的博文id
	 * @return array     查到的博文信息
	 */
	public function blogContent($id,$array=array()){
		return M('Article')->field($array)->where("a_id={$id}")->find();
	}

	/**
	 * 查询分类下文章内容
	 * @param  int $id    分类id
	 * @param  array  $array 查询字段
	 * @return array  二维数组
	 */
	public function cateContent($id,$array=array()){
		return M('Article')->field($array)->where("article_category_id={$id}")->select();
	}

	/**
	 * 查询最新文章
	 * @param  array  $array 字段条件
	 * @return array       最新文章数据
	 */
	public function articleSortTime($array=array()){
		return M('Article')->field($array)->order('article_time desc')->limit(20)->select();
	}

	/**
	 * 查询顶级分类
	 * @return array 二维数组
	 */
	public function selectCategogy($id=0){
		return M('Category')->where("cat_son_id=$id")->select();
	}

	/**
	 * 搜索文章
	 * @param  string $key 搜索关键字
	 * @return array     搜索到的数据
	 */
	public function searchWord($key){
		return M('Article')->query(" SELECT * FROM article WHERE article_name LIKE '%$key%' ");
	}
}
