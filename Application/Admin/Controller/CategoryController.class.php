<?php
namespace Admin\Controller;
use Think\Controller;
class CategoryController extends Controller {
    public function index(){
    	$categoryData = D('Category')->selectCategory();
		$categoryList = formatCategoryData($categoryData);
		$this->assign('categoryList',$categoryList);
    	$this->display();
    }

    /**
     * 添加根分类
     * @return string 格式好的json数据
     */
    public function categoryAdd(){
    	$categoryName = I('post.category_name');
    	if (!empty($categoryName)) {
    		$res = D('Category')->addCategory(array('category_name'=>$categoryName,'cat_son_id'=>0));
    		if ($res){
    			$data['code'] = 1;
    			$data['message'] = '添加根分类成功';
    			$data['cId'] = $res;
    		}else{
    			$data['code'] = 0;
    			$data['message'] = '添加根分类失败';
    		}
    	}
    	echo json_encode($data);
    }

    /**
     * 添加子分类
     * @return string 格式好的json数据
     */
    public function categorySonAdd(){
    	if (IS_AJAX){
    		$categoryName = I('post.category_name');
    		$cId = I('post.c_id');
    		$res = D('Category')->addCategory(array('category_name'=>$categoryName,'cat_son_id'=>$cId));
    		if ($res){
    			$data['code'] = 1;
    			$data['message'] = '子分类添加成功';
    			$data['cId'] = $res;
    		}else{
    			$data['code'] = 0;
    			$data['message'] = '子分类添加失败';
    		}
    	}
    	echo json_encode($data);
    }
}