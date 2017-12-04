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
      <!-- 表单开始 -->
      <form action="<?php echo U('Article/ArticleAdd');?>" method="post" enctype="multipart/form-data">
      <p><input type="text" class="am-form-field am-round" placeholder="填写文章标题" name="article_name" value="<?php echo ($articleData["article_name"]); ?>" required/></p>
        <!-- 加载编辑器的容器 -->
        <script id="container" name="article_content" type="text/plain">
            <?php echo htmlspecialchars_decode($articleData['article_content']);?>
        </script>
        <hr/>
        <div class="am-g">
            <div class="am-u-sm-6">
                <select data-am-selected="{maxHeight: 100}" name="article_category_id">
                <?php if(is_array($categoryList)): foreach($categoryList as $key=>$val): ?><option value="<?php echo ($val["c_id"]); ?>" disabled="false"><?php echo ($val["category_name"]); ?></option>
                  <?php if(is_array($val["son"])): foreach($val["son"] as $key=>$v): ?><option value="<?php echo ($v["c_id"]); ?>" <?php if($v["c_id"] == $articleData['article_category_id']): ?>selected="selected"<?php endif; ?>>---<?php echo ($v["category_name"]); ?></option><?php endforeach; endif; endforeach; endif; ?>
                </select>
            </div>
            <div class="am-u-sm-6">
                <div class="am-form-group am-form-file am-fr">
                  <button type="button" class="am-btn am-btn-default am-btn-sm">
                    <i class="am-icon-cloud-upload"></i> 选择要上传的图片</button>
                  <input type="file" multiple name="article_img">
                   <img style="margin-top: 5px;margin-left: 5px;" src="/Public<?php echo ($articleData['article_img']); ?>" alt="丢失的图片" class="am-img-responsive" width="150" height="60">
                </div>
            </div>
        </div>
         <div class="blog-button">
            <button type="button" class="am-btn am-btn-primary am-round">保存草稿</button>
           <button type="submint" class="am-btn am-btn-success am-round">立即修改</button>
         </div>
        </form>
         <!-- 表单结束 -->
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
<script src="/Public/assets/js/jquery.min.js"></script>
<script src="/Public/assets/js/amazeui.min.js"></script>
<script src="/Public/assets/js/app.js"></script>

      <!-- ueditor编辑器 -->
    <!-- 配置文件 -->
    <script type="text/javascript" src="/Public/ueditor/ueditor.config.js"></script>
    <!-- 编辑器源码文件 -->
    <script type="text/javascript" src="/Public/ueditor/ueditor.all.js"></script>
    <!-- 实例化编辑器 -->
    <script type="text/javascript">
        var ue = UE.getEditor('container');
        editor.setContent('esfefefe');
    </script>
</body>
</html>