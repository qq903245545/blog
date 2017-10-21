<?php
namespace Home\Controller;
use Think\Controller;
class ArticleController extends Controller {
    /**
     * 文章详细内容
     */
    public function ArticleContent(){
        if (IS_GET) {
            $aId = I('get.a_id',0);
            $res = D('Article')->blogContent($aId);
            $this->assign('blogContent',$res);
        }
        $this->display();
    }

    /**
     * 文章分类
     */
    public function ArticleCategory(){
        $cateList = D('Article')->selectCategogy();
        $newContent = D('Article')->articleSortTime(array('a_id','article_name','article_time'));
        $temp = array();
        $temp[0]['category_name'] = "近期文章";
        $temp[0]['cateData'] = $newContent;
        $temp[0]['sum'] = count($newContent);
        $this->assign('cateData',$temp);
        $this->assign('data',$cateList);
        $this->display();
    }

    /**
     * 查询子分类
     */
    public function ArticleSonCate(){
        $cId = I('get.cId');
        $cateList = D('Article')->selectCategogy($cId);
        foreach ($cateList as $key => $value) {
            
            $data = D('Article')->cateContent($value['c_id'],array('a_id','article_name','article_time'));
            $cateList[$key]['cateData'] = $data;
            $cateList[$key]['sum'] = count($data);
        }

        $tppCateList = D('Article')->selectCategogy();
        $this->assign('data',$tppCateList);

        $this->assign('cateData',$cateList);
        $this->display('ArticleCategory');
    }

    /**
     * 搜索文章
     */
    public function SearchArticle(){
        $searchWord = I('post.search_word');
        $searchData = D('Article')->searchWord($searchWord);
        $cateList = D('Article')->selectCategogy();
        $temp = array();
        $temp[0]['category_name'] = "搜索结果";
        $temp[0]['cateData'] = $searchData;
        $temp[0]['sum'] = count($searchData);
        $this->assign('cateData',$temp);
        $this->assign('data',$cateList);
        $this->display('ArticleCategory');
    }
}