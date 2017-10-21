<?php 
namespace Admin\Model;
use Think\Model;
class ArticleModel extends Model {
	/**
	 * 静态验证
	 */
	protected $_validate = array(
     array('article_name','require','文章标题不能为空'), 
     array('article_content','require','文章内容不能为空'), 
     array('article_category_id','require','文章分类不能为空'), 
   );

	/**
	 * 查找所以文章
	 * @return array 查找的文章数据
	 */
	public function articleSelect(){
		return M('Article')->select();
	}

	/**
	 * 添加文章
	 * @param  array $data 要添加的数据
	 * @return 成功返回自增id失败返回false 
	 */
	public function articleAdd($data){
		$article = M('Article'); //实例化文章表
		return $article->add($data);
	}

	/**
	 * 查询单条文章
	 * @param  int $cId 文章id
	 * @return array      文章分类内容
	 */
	public function categoryArticleSelect($cId){
		return M('Article')->where("article_category_id={$cId}")->select(); //查询当前分类内容
	}
}
