<?php 
namespace Admin\Model;
use Think\Model;
class CategoryModel extends Model {
	/**
	 * 查询文章所有分类
	 * @return array 分类数组
	 */
	public function selectCategory($whereList = ""){
		$category = M('Category'); //实例化分类表
		return $category->where($whereList)->select();
	}

	/**
	 * 添加分类数据
	 * @param array $data 对应字段数据
	 * @return  成功返回自增id失败返回false
	 */
	public function addCategory($data){
		$category = M('Category'); //实例化分类表
		return $category->data($data)->add();
	}

	/**
	 * 查询分类ID分类信息
	 * @return array 查询到的数据
	 */
	public function selectIdcategory($cId){
		return M('Category')->where("c_id={$cId}")->find(); //查询当前分类内容
	}

	/**
	 * 查询该分类下的子分类
	 * @param  id $catSonId 要查询该分类的id
	 * @return array           该子分类id
	 */
	public function allCategory($catSonId){
		return M('Category')->field('c_id')->where("c_id={$catSonId}")->select();
	}

}
 ?>