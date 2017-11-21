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
	 * 查找所有文章
	 * @return array 查找的文章数据
	 */
	public function articleSelect(){
		return M('Article')->field(array('a_id','article_name','article_time'))->select();
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
	 * 查询一个分类下的文章
	 * @param  int $cId 文章id
	 * @return array      文章分类内容
	 */
	public function categoryArticleSelect($cId){
		return M('Article')->field(array('a_id','article_name','article_time'))->where("article_category_id={$cId}")->select(); //查询当前分类内容
	}

	/**
	 * 查询多个二级分类下的文章
	 * @param  array $arr 要查询该分类的id
	 * @return array      所有二级分类下的文章
	 */
	public function allCategoryArticle($arr){
		$map['article_category_id']  = array('in',$arr);
		return M('Article')->field(array('a_id','article_name','article_time'))->where($map)->select();
	}

	/**
	 * 单挑就删除文章
	 * @param  int $aId 要删除的文章ID
	 * @return array      所有二级分类下的文章
	 */
	public function delArticle($aId){
		return M('Article')->where("a_id=$aId")->delete(); // 删除id为5的用户数据
	}
}
