<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html class="no-js fixed-layout">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Amaze UI Admin index Examples</title>
  <meta name="description" content="这是一个 index 页面">
  <meta name="keywords" content="index">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="renderer" content="webkit">
  <meta http-equiv="Cache-Control" content="no-siteapp" />
  <link rel="icon" type="image/png" href="/Public/assets/i/favicon.png">
  <link rel="apple-touch-icon-precomposed" href="/Public/assets/i/app-icon72x72@2x.png">
  <meta name="apple-mobile-web-app-title" content="Amaze UI" />
  <link rel="stylesheet" href="/Public/assets/css/amazeui.min.css"/>
  <link rel="stylesheet" href="/Public/assets/css/admin.css">
</head>
<body>
<!--[if lte IE 9]>
<p class="browsehappy">你正在使用<strong>过时</strong>的浏览器，Amaze UI 暂不支持。 请 <a href="http://browsehappy.com/" target="_blank">升级浏览器</a>
  以获得更好的体验！</p>
<![endif]-->

<!-- header start -->
 <header class="am-topbar am-topbar-inverse admin-header">
  <div class="am-topbar-brand">
    <strong>Amaze UI</strong> <small>后台管理模板</small>
  </div>

  <button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-success am-show-sm-only" data-am-collapse="{target: '#topbar-collapse'}"><span class="am-sr-only">导航切换</span> <span class="am-icon-bars"></span></button>

  <div class="am-collapse am-topbar-collapse" id="topbar-collapse">

    <ul class="am-nav am-nav-pills am-topbar-nav am-topbar-right admin-header-list">
<!--       <li><a href="javascript:;"><span class="am-icon-envelope-o"></span> 收件箱 <span class="am-badge am-badge-warning">5</span></a></li>
 -->      <li class="am-dropdown" data-am-dropdown>
        <a class="am-dropdown-toggle" data-am-dropdown-toggle href="javascript:;">
          <span class="am-icon-users"></span> 管理员 <span class="am-icon-caret-down"></span>
        </a>
        <ul class="am-dropdown-content">
          <li><a href="#"><span class="am-icon-user"></span> 资料</a></li>
          <li><a href="#"><span class="am-icon-cog"></span> 设置</a></li>
          <li><a href="#"><span class="am-icon-power-off"></span> 退出</a></li>
        </ul>
      </li>
      <li class="am-hide-sm-only"><a href="javascript:;" id="admin-fullscreen"><span class="am-icon-arrows-alt"></span> <span class="admin-fullText">开启全屏</span></a></li>
    </ul>
  </div>
</header>
<!-- header end-->

<div class="am-cf admin-main">
  <!-- sidebar start -->
   <div class="admin-sidebar am-offcanvas" id="admin-offcanvas">
    <div class="am-offcanvas-bar admin-offcanvas-bar">
      <ul class="am-list admin-sidebar-list">
        <li><a href="admin-index.html"><span class="am-icon-home"></span> 首页</a></li>
        <li class="admin-parent">
          <a class="am-cf" data-am-collapse="{target: '#collapse-nav'}"><span class="am-icon-file"></span>内容<span class="am-icon-angle-right am-fr am-margin-right"></span></a>
          <ul class="am-list am-collapse admin-sidebar-sub am-in" id="collapse-nav">
           <!--  <li><a href="admin-user.html" class="am-cf"><span class="am-icon-check"></span> 个人资料<span class="am-icon-star am-fr am-margin-right admin-icon-yellow"></span></a></li> -->
            <li><a href="<?php echo U('Article/index');?>">文章管理</a></li>
            <li><a href="<?php echo U('Category/index');?>">分类管理</a></li>
          </ul>
        </li>
   
        <li><a href="#"><span class="am-icon-sign-out"></span> 注销</a></li>
      </ul>

      <div class="am-panel am-panel-default admin-sidebar-panel">
        <div class="am-panel-bd">
          <p><span class="am-icon-bookmark"></span> 公告</p>
          <p>时光静好，与君语；细水流年，与君同。—— Amaze UI</p>
        </div>
      </div>

      <div class="am-panel am-panel-default admin-sidebar-panel">
        <div class="am-panel-bd">
          <p><span class="am-icon-tag"></span> wiki</p>
          <p>Welcome to the Amaze UI wiki!</p>
        </div>
      </div>
    </div>
  </div>
  <!-- sidebar end -->

  <!-- content start -->
  <div class="admin-content">
    <div class="admin-content-body">
      <div class="am-cf am-padding">
      <select name="article_category_id" id="select-type">
          <option value="" selected="selected">---请选择分类---</option>
        <!-- <select data-am-selected="{maxHeight: 100}" name="article_category_id"> -->
          <?php if(is_array($categoryList)): foreach($categoryList as $key=>$val): ?><option value="<?php echo ($val["c_id"]); ?>"><?php echo ($val["category_name"]); ?></option>
            <?php if(is_array($val["son"])): foreach($val["son"] as $key=>$v): ?><option value="<?php echo ($v["c_id"]); ?>">---<?php echo ($v["category_name"]); ?></option><?php endforeach; endif; endforeach; endif; ?>
        </select>
      <a class="am-btn am-btn-primary am-round am-fr" href="<?php echo U('Article/ArticleAdd');?>"><i class="am-icon-plus"></i>写新文章</a>
      <hr>
            <table class="am-table">
    <thead>
        <tr>
            <th>标题</th>
            <th>状态</th>
            <th>发表时间</th>
            <th>阅读</th>
            <th>评论</th>
            <th>操作</th>
        </tr>
    </thead>
    <tbody id="article-list">
        <?php if(is_array($articleList)): foreach($articleList as $key=>$val): ?><tr>
            <td><?php echo ($val["article_name"]); ?></td>
            <td><a href="#"><span class="am-icon-eye-slash "></span></a></td>
            <td><?php echo date("Y-m-d H:i:s",$val['article_time']);?></td>
            <td>2012-10-01</td>
            <td>Amaze UI</td>
            <td>
              <div class="am-btn-group am-btn-group-xs">
                <button type="button" class="am-btn am-btn-default">编辑</button>
                <button type="button" class="am-btn am-btn-default">置顶</button>
                <button type="button" class="am-btn am-btn-default">删除</button>
                <button type="button" class="am-btn am-btn-default">分类</button>
              </div>
            </td>
        </tr><?php endforeach; endif; ?>
    </tbody>
</table>
        </div>
      </div>
    </div>

    <footer class="admin-content-footer">
      <hr>
      <p class="am-padding-left">© 2014 AllMobilize, Inc. Licensed under MIT license.</p>
    </footer>
  <!-- content end -->
</div>

<a href="#" class="am-icon-btn am-icon-th-list am-show-sm-only admin-menu" data-am-offcanvas="{target: '#admin-offcanvas'}"></a>

<!--[if lt IE 9]>
<script src="http://libs.baidu.com/jquery/1.11.1/jquery.min.js"></script>
<script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
<script src="/Public/assets/js/amazeui.ie8polyfill.min.js"></scrfipt>
<![endif]-->

<!--[if (gte IE 9)|!(IE)]><!-->
<script src="/Public/assets/js/jquery.min.js"></script>
<!--<![endif]-->
<script src="/Public/assets/js/amazeui.min.js"></script>
<script src="/Public/assets/js/app.js"></script>

<!-- 自定义jquery -->
<script>
$(function(){
  $("#select-type").change(function(){
    var c_id = $(this).val();
    var path = "<?php echo U('Article/ajaxSelectCategory');?>"
    $.post(path,{c_id:c_id},function(data){
      var str = "";
      for (var i = 0; i < data.length; i++) {
          str += "<tr>";
            str += "<td>"+data[i].article_name+"</td>";
            str += "<td><a href='#'><span class='am-icon-eye-slash'></span></a></td>";
            str += "<td>"+data[i].article_time+"</td>";
            str += "<td>"+data[i].article_name+"</td>";
            str += "<td>"+data[i].article_name+"</td>";
            str += "<td>";
            str += "<div class='am-btn-group am-btn-group-xs'>";
              str += "<button type='button' class='am-btn am-btn-default'>编辑</button>";
              str += "<button type='button' class='am-btn am-btn-default'>置顶</button>";
              str += "<button type='button' class='am-btn am-btn-default'>删除</button>";
              str += "<button type='button' class='am-btn am-btn-default'>分类</button>";
            str += "</div>";
            str += "</td>";
          str += "<tr/>"
      }
        $("#article-list").html(str);
    },"json")
  })
})
</script>
</body>
</html>