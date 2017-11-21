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

    /**
     *Ajax各个分类下的内容
     */
    public function ajaxSelectCategory(){
        $cId = I('c_id','');
        if (!empty($cId)){
            $res = D('Category')->selectIdcategory($cId);
            if ($res['cat_son_id'] !=0 ) {  //查找二级分类文章
                $articleData = D('Article')->categoryArticleSelect($res['c_id']);
            } else {  //查找顶级分类包括子分类下的文章
                $allList = D('Category')->allCategory($res['c_id']);  //查找该分类下的子分类
                if (!empty($allList)) {
                    $articleData = D('Article')->allCategoryArticle($allList); //二级分类下多所有文章
                }
            }

            foreach ($articleData as $key => $value) {
                $articleData[$key]['article_time'] = date('Y-m-d H:i:s',$value['article_time']);
            }
            exit(json_encode($articleData)); //返回json文章数据格式
        }
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

    public function articleDel(){
        $aId = I('aId','','int');
        if ($aId) {
            $res = D('Article')->delArticle($aId);
            $this->success('删除成功','/index.php/Admin/Article/index',3);
        }
    }

}