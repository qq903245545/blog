<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <title>BLOG  | Amaze UI Examples</title>
  <meta name="renderer" content="webkit">
  <meta http-equiv="Cache-Control" content="no-siteapp"/>
  <link rel="icon" type="image/png" href="/Public/assets/i/favicon.png">
  <meta name="mobile-web-app-capable" content="yes">
  <link rel="icon" sizes="192x192" href="/Public/assets/i/app-icon72x72@2x.png">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <meta name="apple-mobile-web-app-title" content="Amaze UI"/>
  <link rel="apple-touch-icon-precomposed" href="/Public/assets/i/app-icon72x72@2x.png">
  <meta name="msapplication-TileImage" content="/Public/assets/i/app-icon72x72   2x.png">
  <meta name="msapplication-TileColor" content="#0e90d2">
  <link rel="stylesheet" href="/Public/assets/css/amazeui.min.css">
  <link rel="stylesheet" href="/Public/assets/css/app.css">

<link href="/Public/assets/css/main.css" rel="stylesheet" type="text/css">
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

<body id="blog">

<!-- header start -->
<header class="am-g  blog-text-center blog-header">
    <div class="am-u-sm-8 am-u-sm-centered">
        <img width="80" src="http://p1.qzone.la/upload/5/c7b07bda-bd9c-495a-ad02-fa8103c85110.jpg" alt="Amaze UI Logo" class="am-circle" />
        <h2 class="am-hide-sm-only">不积跬步，无以至千里</h2>
    </div>
</header>
<nav class="am-g am-g-fixed blog-fixed blog-nav">
<button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-success am-show-sm-only blog-button" data-am-collapse="{target: '#blog-collapse'}" ><span class="am-sr-only">导航切换</span> <span class="am-icon-bars"></span></button>

  <div class="am-collapse am-topbar-collapse" id="blog-collapse">
    <ul class="am-nav am-nav-pills am-topbar-nav">
      <li class="am-active"><a href="<?php echo U('Index/index');?>">首页</a></li>
      <li><a href="<?php echo U('Article/ArticleCategory');?>" target="">博文</a></li>
    </ul>
    <form class="am-topbar-form am-topbar-right am-form-inline" role="search" method="post" action="<?php echo U('Article/SearchArticle');?>">
      <div class="am-form-group">
        <input type="text" class="am-form-field am-input-sm" placeholder="搜索" name="search_word">
      </div>
    </form>
  </div>
</nav>
<hr>
<!-- header end -->


<!-- content srart -->
<div class="am-g am-g-fixed" >
  <div class="am-u-md-9 am-u-md-push-3">
    <div class="am-g">
      <div class="am-u-sm-11 am-u-sm-centered">

<main id="main" class="main">
  <div class="main-inner">
    <div class="content-wrap">
     <div id="content" class="content">
            

  <section id="posts" class="posts-collapse">

  <?php if(is_array($cateData)): foreach($cateData as $key=>$catVal): ?><div class="collection-title">
      <h2>
        <?php echo ($catVal["category_name"]); ?>
        <small><span class="am-badge am-radius am-badge-success"><?php echo ($catVal["sum"]); ?></span></small>
      </h2>
    </div>
    <?php if(is_array($catVal["cateData"])): foreach($catVal["cateData"] as $key=>$cateList): ?><article class="post post-type-normal" itemscope="" itemtype="http://schema.org/Article" style="opacity: 1; display: block; transform: translateY(0px);">
    <header class="post-header">

      <h2 class="post-title">
        
            <a class="post-title-link" href="<?php echo U('Article/ArticleContent',array('a_id'=>$cateList['a_id']));?>" itemprop="url" target="_brank">
              
                <span itemprop="name"><?php echo ($cateList["article_name"]); ?></span>
              
            </a>
        
      </h2>

      <div class="post-meta">
        <time class="post-time" itemprop="dateCreated">
          <?php echo date('m-d',$cateList['article_time']);?>
        </time>
      </div>

    </header>
  </article><?php endforeach; endif; endforeach; endif; ?>

          </section>
        </div>
      </div>
    </div>
  </main>

      </div>
    </div>
  </div>
  <div class="am-u-md-3 am-u-md-pull-9 my-sidebar" id="content-height">
    <div class="am-offcanvas" id="sidebar">
      <div class="am-offcanvas-bar">
        <ul class="am-nav">
          <!-- <li><a href="#" class="am-icon-home am-icon-md">&nbsp;主页</a></li> -->
          <li class="am-nav-header">分类</li>
          <?php if(is_array($data)): foreach($data as $key=>$val): ?><li>
            <!-- <span class="am-badge am-radius am-badge-success">55</span> -->
              <a href="<?php echo U('Article/ArticleSonCate',array('cId'=>$val['c_id']));?>"><?php echo ($val["category_name"]); ?> </a>
          </li><?php endforeach; endif; ?>

        </ul>
      </div>
    </div>
  </div>
  <a href="#sidebar" class="am-btn am-btn-sm am-btn-success am-icon-bars am-show-sm-only my-button" data-am-offcanvas><span class="am-sr-only">侧栏导航</span></a>
</div>
<!-- content end -->
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

<script src="/Public/assets/js/jquery.min.js"></script>
<script src="/Public/assets/js/amazeui.min.js"></script>

</body>
</html>