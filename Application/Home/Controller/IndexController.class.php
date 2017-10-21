<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $page = I('post.page',0);
        $res = D('Article')->homeArticleSelect($page);
        foreach ($res as $key => $value) {
            $str = $res[$key]['article_content'];
            if (IS_AJAX) {
                $res[$key]['article_time'] = date('Y/m/d',$res[$key]['article_time']);
            }
            $str = htmlTagSubstr($str);
            $res[$key]['article_content']=$str;
        }
        if (IS_AJAX) {
            echo json_encode($res);
        } else {
            $this->assign('articleList',$res);
            $this->display();
        }

    }
}