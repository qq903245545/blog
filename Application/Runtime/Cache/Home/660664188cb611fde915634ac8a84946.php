<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
  <meta charset="UTF-8">
  <title>Sidebar | Amaze UI Example</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="format-detection" content="telephone=no">
  <meta name="renderer" content="webkit">
  <meta http-equiv="Cache-Control" content="no-siteapp" />
  <link rel="alternate icon" type="image/png" href="/blog/Public/assets/i/favicon.png">
  <link rel="stylesheet" href="/blog/Public/assets/css/amazeui.min.css"/>
  <link rel="stylesheet" href="/blog/Public/assets/css/app.css">
  <style>
    @media only screen and (min-width: 641px) {
      .am-offcanvas {
        display: block;
        position: static;
        background: none;
      }

      .am-offcanvas-bar {
        position: static;
        width: auto;
        background: none;
        -webkit-transform: translate3d(0, 0, 0);
        -ms-transform: translate3d(0, 0, 0);
        transform: translate3d(0, 0, 0);
      }
      .am-offcanvas-bar:after {
        content: none;
      }

    }

    @media only screen and (max-width: 640px) {
      .am-offcanvas-bar .am-nav>li>a {
        color:#ccc;
        border-radius: 0;
        border-top: 1px solid rgba(0,0,0,.3);
        box-shadow: inset 0 1px 0 rgba(255,255,255,.05)
      }

      .am-offcanvas-bar .am-nav>li>a:hover {
        background: #404040;
        color: #fff
      }

      .am-offcanvas-bar .am-nav>li.am-nav-header {
        color: #777;
        background: #404040;
        box-shadow: inset 0 1px 0 rgba(255,255,255,.05);
        text-shadow: 0 1px 0 rgba(0,0,0,.5);
        border-top: 1px solid rgba(0,0,0,.3);
        font-weight: 400;
        font-size: 75%
      }

      .am-offcanvas-bar .am-nav>li.am-active>a {
        background: #1a1a1a;
        color: #fff;
        box-shadow: inset 0 1px 3px rgba(0,0,0,.3)
      }

      .am-offcanvas-bar .am-nav>li+li {
        margin-top: 0;
      }
    }

    .my-head {
      margin-top: 40px;
      text-align: center;
    }

    .my-button {
      position: fixed;
      top: 0;
      right: 0;
      border-radius: 0;
    }
    .my-sidebar {
      padding-right: 0;
      border-right: 1px solid #eeeeee;
    }

    .my-footer {
      border-top: 1px solid #eeeeee;
      padding: 10px 0;
      margin-top: 10px;
      text-align: center;
    }
  </style>
</head>
<body>
<header class="am-g my-head">
  <div class="am-u-sm-12 am-article">
    <h1 class="am-article-title"><?php echo ($blogContent['article_name']); ?></h1>
    <p class="am-article-meta">小鱼</p>
  </div>
</header>
<hr class="am-article-divider"/>
<div class="am-g am-g-fixed" >
    <div class="am-g">
      <div class="am-u-sm-11 am-u-sm-centered">
        <div class="am-cf am-article am-scrollable-horizontal">
              <?php echo htmlspecialchars_decode($blogContent['article_content']);?>
              <!-- 内容 -->
        </div>
        <hr/>
        <ul class="am-comments-list">
          <li class="am-comment">
            <a href="#link-to-user-home">
              <img src="http://s.amazeui.org/media/i/demos/bw-2014-06-19.jpg?imageView/1/w/96/h/96/q/80" alt="" class="am-comment-avatar" width="48" height="48">
            </a>
            <div class="am-comment-main">
              <header class="am-comment-hd">
                <div class="am-comment-meta">
                  <a href="#link-to-user" class="am-comment-author">某人</a> 评论于 <time datetime="2013-07-27T04:54:29-07:00" title="2013年7月27日 下午7:54 格林尼治标准时间+0800">2014-7-12 15:30</time>
                </div>
              </header>
              <div class="am-comment-bd">
                <p>《永远的蝴蝶》一文，还吸收散文特长，多采用第一人称，淡化情节，体现一种思想寄托和艺术追求。</p>
              </div>
            </div>
          </li>
          <li class="am-comment">
            <a href="#link-to-user-home">
              <img src="http://s.amazeui.org/media/i/demos/bw-2014-06-19.jpg?imageView/1/w/96/h/96/q/80" alt="" class="am-comment-avatar" width="48" height="48">
            </a>
            <div class="am-comment-main">
              <header class="am-comment-hd">
                <div class="am-comment-meta">
                  <a href="#link-to-user" class="am-comment-author">路人甲</a> 评论于 <time datetime="2013-07-27T04:54:29-07:00" title="2013年7月27日 下午7:54 格林尼治标准时间+0800">2014-7-13 0:03</time>
                </div>
              </header>
              <div class="am-comment-bd">
                <p>感觉仿佛是自身的遭遇一样，催人泪下</p>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </div>
</div>
  

<!-- footer start -->
<div class="amz-toolbar" id="amz-toolbar" style="right: 122px;">
    <a href="#top" title="回到顶部" class="am-icon-btn am-icon-arrow-up am-active" id="amz-go-top"></a> 
</div>
<footer class="blog-footer ">
    <div class="blog-text-center">© 2017 宏宇的博客| 京ICP备11008151号 | 京公网安备11010802014853</div>    
</footer>
<style>
.amz-toolbar {
    position: fixed;
    right: 10px;
    bottom: 100px;
    z-index: 999;
}
</style>
<!-- footer end  -->

<script src="/blog/Public/assets/js/jquery.min.js"></script>
<script src="/blog/Public/assets/js/amazeui.min.js"></script>
</body>
</html>