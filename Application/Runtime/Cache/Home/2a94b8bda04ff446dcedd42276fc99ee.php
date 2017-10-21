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
  <link rel="icon" type="image/png" href="/blog/Public/assets/i/favicon.png">
  <meta name="mobile-web-app-capable" content="yes">
  <link rel="icon" sizes="192x192" href="/blog/Public/assets/i/app-icon72x72@2x.png">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <meta name="apple-mobile-web-app-title" content="Amaze UI"/>
  <link rel="apple-touch-icon-precomposed" href="/blog/Public/assets/i/app-icon72x72@2x.png">
  <meta name="msapplication-TileImage" content="/blog/Public/assets/i/app-icon72x72@2x.png">
  <meta name="msapplication-TileColor" content="#0e90d2">
  <link rel="stylesheet" href="/blog/Public/assets/css/amazeui.min.css">
  <link rel="stylesheet" href="/blog/Public/assets/css/app.css">
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
<div class="am-g am-g-fixed blog-fixed">
    <div class="am-u-md-8 am-u-sm-12">
        <div id="article_list">
         <?php if(is_array($articleList)): foreach($articleList as $key=>$val): ?><article class="am-g blog-entry-article">
                <div class="am-u-lg-6 am-u-md-12 am-u-sm-12 blog-entry-img">
                    <img src="/blog/Public<?php echo ($val["article_img"]); ?>" alt="" class="am-u-sm-12">
                </div>
                <div class="am-u-lg-6 am-u-md-12 am-u-sm-12 blog-entry-text">
                    <span><a href="" class="blog-color">article &nbsp;</a></span>
                    <span> @amazeUI &nbsp;</span>
                    <span><?php echo date("Y/m/d",$val['article_time']);?></span>
                    <h1><a href="<?php echo U('Article/ArticleContent',array('a_id'=>$val['a_id']));?>" target="_slef"><?php echo ($val["article_name"]); ?></a></h1>
                    <p><?php echo $val['article_content'];?>...</p>
                    <p><a href="" class="blog-continue">continue reading</a></p>
                </div>
             </article><?php endforeach; endif; ?>
        </div>
        <div>
            <button type="button" class="am-btn am-btn-success am-round am-btn-block more">加载更多</button>
        </div>
    </div>
       

    <div class="am-u-md-4 am-u-sm-12 blog-sidebar">
        <div class="blog-sidebar-widget blog-bor">
            <h2 class="blog-text-center blog-title"><span>关于博客</span></h2>
        <!--     <img src="/blog/Public/assets/i/f14.jpg" alt="about me" class="blog-entry-img" >
            <p>妹纸</p> -->
            <p>
        我是妹子UI，中国首个开源 HTML5 跨屏前端框架
        </p><p>我不想成为一个庸俗的人。十年百年后，当我们死去，质疑我们的人同样死去，后人看到的是裹足不前、原地打转的你，还是一直奔跑、走到远方的我？</p>
        </div>
        <div class="blog-sidebar-widget blog-bor">
            <h2 class="blog-text-center blog-title"><span>Contact ME</span></h2>
            <p>
                <a href=""><span class="am-icon-qq am-icon-fw am-primary blog-icon"></span></a>
                <a href=""><span class="am-icon-github am-icon-fw blog-icon"></span></a>
                <a href=""><span class="am-icon-weibo am-icon-fw blog-icon"></span></a>
                <a href=""><span class="am-icon-reddit am-icon-fw blog-icon"></span></a>
                <a href=""><span class="am-icon-weixin am-icon-fw blog-icon"></span></a>
            </p>
        </div>
        <div class="blog-clear-margin blog-sidebar-widget blog-bor am-g ">
            <h2 class="blog-title"><span>TAG</span></h2>
            <div class="am-u-sm-12 blog-clear-padding">
            <a href="" class="blog-tag">amaze</a>
            <a href="" class="blog-tag">妹纸 UI</a>
            <a href="" class="blog-tag">HTML5</a>
            <a href="" class="blog-tag">这是标签</a>
            <a href="" class="blog-tag">Impossible</a>
            <a href="" class="blog-tag">开源前端框架</a>
            </div>
        </div>
        <div class="blog-sidebar-widget blog-bor">
            <h2 class="blog-title"><span>心情</span></h2>
            <ul class="am-list">
                <li><a href="#">每个人都有一个死角， 自己走不出来，别人也闯不进去。</a></li>
                <li><a href="#">我把最深沉的秘密放在那里。</a></li>
                <li><a href="#">你不懂我，我不怪你。</a></li>
                <li><a href="#">每个人都有一道伤口， 或深或浅，盖上布，以为不存在。</a></li>
            </ul>
        </div>
    </div>
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

<!--[if (gte IE 9)|!(IE)]><!-->
<script src="/blog/Public/assets/js/jquery.min.js"></script>
<!--<![endif]-->
<script src="/blog/Public/assets/js/amazeui.min.js"></script>
<script>
$(function(){
    var page = 2;
    $(".more").click(function(){
        var path = "<?php echo U('Index/index');?>";
        var _this = $(this);
        $.post(path,{page:page},function(data){
            if (data == "") {
                _this.html('没有更多了');
                return false;
            }
            console.log(data);
            var str = '';
            var a_id = "/index.php/Home/Article/ArticleContent/a_id/";
            for (var i = 0; i <= data.length - 1; i++) {
                str += '<article class="am-g blog-entry-article">';
                str += '<div class="am-u-lg-6 am-u-md-12 am-u-sm-12 blog-entry-img">';
                str += '<img src="/blog/Public'+data[i]['article_img']+'" alt="" class="am-u-sm-12">';
                str += '</div>';
                str += '<div class="am-u-lg-6 am-u-md-12 am-u-sm-12 blog-entry-text">';
                str += '<span><a href="" class="blog-color">article &nbsp;</a></span>';
                str += '<span> @amazeUI &nbsp;</span>';
                str += '<span>'+data[i].article_time+'</span>';
                str += "<h1><a href='"+a_id+data[i].a_id+"' target='_slef'>"+data[i].article_name+"</a></h1>";
                str += "<p>"+data[i].article_content+"...</p>";
                str += '<p><a href="" class="blog-continue">continue reading</a></p>';
                str += '</div>';
                str += '</article>';
            }
           
            $("#article_list").append(str);
            page+=1;
        },"json");
    });
})
</script>
<!-- <script src="/blog/Public/assets/js/app.js"></script> -->
</body>
</html>