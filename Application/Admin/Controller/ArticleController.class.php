<?php
namespace Admin\Controller;
use Think\Controller;
class ArticleController extends CommonController {
	/**
	 * 文章主页
	 */
    public function index(){
    	$articleList = D('Article')->articleSelect();
    	$categoryData = D('Category')->selectCategory();
		$categoryList = formatCategoryData($categoryData);
		$this->assign('categoryList',$categoryList);
    	$this->assign('articleList',$articleList);
    	$this->display();
    }

    public function ajaxSelectCategory(){
        $cId = I('c_id');
        $res = D('Category')->selectIdcategory($cId);
        if ($res['cat_son_id'] !=0 ) {  //查找二级分类文章
            $articleData = D('Article')->categoryArticleSelect($res['c_id']);
        } else {  //查找顶级分类包括子分类下的文章
            $allList = D('Category')->allCategory($res['cat_son_id']);  //查找该分类下的子分类
            echo json_encode($allList);die;
        }

        foreach ($articleData as $key => $value) {
            $articleData[$key]['article_time'] = date('Y-m-d H:i:s',$value['article_time']);
        }
        die(json_encode($articleData));
    }


    /**
     * 文章添加
     */
    public function ArticleAdd(){
    	if (IS_POST) {
    		$data = I('post.');

    		$imgPath = $this->uploadFile(); //文件上传方法
    		$data['article_img'] = $imgPath;
    		$data['article_time'] = time(); //文章添加时间
            $Article = D('Article');

            if (!$Article->create()){
                 // 如果创建失败 表示验证没有通过 输出错误提示信息
                 exit($Article->getError());
            }else{
                 // 验证通过 可以进行其他数据操作
                 $res = $Article->articleAdd($data);
                if ($res) {
                    $this->success('新增成功',U('Article/index'));
                }
            }
    	} else {
    		$categoryData = D('Category')->selectCategory();
			$categoryList = formatCategoryData($categoryData);
			$this->assign('categoryList',$categoryList);
    		$this->display();
    	}
    }

}