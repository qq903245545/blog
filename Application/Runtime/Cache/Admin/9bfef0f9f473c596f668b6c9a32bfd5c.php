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
            <div class="am-panel-group" id="accordion">
                  <button type="button" class="am-btn am-btn-primary am-btn-block add-type add-category" id="doc-prompt-toggle">新增根分类</button>
<!-- 模态窗口开始 -->
<div class="am-modal am-modal-prompt" tabindex="-1" id="my-prompt">
  <div class="am-modal-dialog">
    <div class="am-modal-hd">输入根分类名称</div>
    <div class="am-modal-bd">
      <!-- 来来来，吐槽点啥吧 -->
      <input type="text" class="am-modal-prompt-input">
    </div>
    <div class="am-modal-footer">
      <span class="am-modal-btn" data-am-modal-cancel>取消</span>
      <span class="am-modal-btn" data-am-modal-confirm>提交</span>
    </div>
  </div>
</div>
<!-- 模态窗口结束 -->
<div id="category_content">
<?php if(is_array($categoryList)): foreach($categoryList as $k=>$vo): ?><div class="am-panel am-panel-default">
    <div class="am-panel-hd">
      <h4 class="am-panel-title h4tga am-inline" data-am-collapse="{parent: '#accordion', target: '#do-not-say-<?php echo ($k+1); ?>'}">
        <?php echo ($vo["category_name"]); ?>  <!-- 根分类名称 -->
      </h4>
      <span>
           <div class="am-comment-actions am-fr">
             <a href="#" title="添加子分类"><i class="am-icon-plus add-son-cat" c_id="<?php echo ($vo["c_id"]); ?>"></i></a><a href="#" title="编辑分类名称"><i class="am-icon-pencil"></i></a> <a href="#" title="删除分类名称"><i class="am-icon-close"></i></a>
        </div>
      </span>
    </div>
    <div id="do-not-say-<?php echo ($k+1); ?>" class="am-panel-collapse am-collapse">
      <div class="am-panel-bd">
         <table class="am-table am-table-hover">
            <thead>
                <tr>
                    <th>分类名称</th>
                    <th>文章数</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody id="<?php echo ($vo["c_id"]); ?>">
          <?php if(is_array($vo["son"])): foreach($vo["son"] as $key=>$val): ?><tr>
                    <td><?php echo ($val["category_name"]); ?></td>
                    <td><span class="am-badge am-badge-secondary am-radius">3</span></td>
                    <td><button type="button" class="am-btn am-btn-danger am-btn-xs">删除</button><button type="button" class="am-btn am-btn-primary am-btn-xs">编辑</button></td>
                </tr><?php endforeach; endif; ?>
            </tbody>
        </table>
      </div>
    </div>
  </div><?php endforeach; endif; ?>
</div>
   
</div>  
        </div>
      </div>
    </div>

    <footer class="admin-content-footer">
      <hr>
      <p class="am-padding-left">© 2014 AllMobilize, Inc. Licensed under MIT license.</p>
    </footer>
  </div>
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

<script>
$(function() {
  // 添加根分类
  $('.add-category').on('click', function() {
      $('#my-prompt').modal({
        relatedTarget: this,
        onConfirm: function(e) {
          if (e.data == "") { 
            alert('请填写内容');
            return false
          } 

          var path = "<?php echo U('Category/categoryAdd');?>";
          $.post(path, {category_name: e.data}, function(data) {
            if (!data.code) {
                alert(data.message);
                return false;
             }
             var text_length =  $(".h4tga").size();
             text_length += 1;
             var str = '<div class="am-panel am-panel-default">';
             str += '<div class="am-panel-hd">';
             str += '<h4 class="am-panel-title h4tga am-inline" data-am-collapse="{parent: \'#accordion\', target: \'#do-not-say-'+text_length+'\'}">';
             str += e.data; 
             str += '</h4>';

             str += '<div class="am-comment-actions am-fr">';
             str += '<span><a href="#" title="添加子分类"><i class="am-icon-plus add-son-cat" c_id="'+data.cId+'"></i></a><a href="#" title="编辑分类名称"><i class="am-icon-pencil c_id="'+data.cId+'"></i></a> <a href="#" title="删除分类名称"><i class="am-icon-close"></i></a></div></span></div>';

             str += '<div id="do-not-say-'+text_length+'" class="am-panel-collapse am-collapse">';

             str += '<div id="do-not-say-4" class="am-panel-collapse am-collapse am-in" style="">';
             str += '<div class="am-panel-bd">';
             str += '<table class="am-table am-table-hover">';
             str += '<thead>';
             str += '<tr><th>分类名称</th><th>文章数</th><th>操作</th></tr>';
             str += '</thead>';
             str += '<tbody id="'+data.cId+'">';
             str += '</tbody>';
             str += '</table>';
             str += '</div>';
             str += '</div>';

             str += '</div></div>';
             $('#category_content').append(str);
          },"json");
        },
      });
    });


  //添加子分类
  $(document).on("click",".add-son-cat",function(){
      var plus_dom = $( this );
      var c_id = plus_dom.attr('c_id');
      var str = '<tr>';
      str += '<td><input type="text"/></td>';
      str += '<td><span class="am-badge am-badge-secondary am-radius">3</span></td>';
      str += '<td><button type="button" class="am-btn am-btn-danger am-btn-xs">删除</button><button type="button" class="am-btn am-btn-primary am-btn-xs">编辑</button></td>';
      str += '</tr>';
      var input_dom =  $("#"+c_id);
      alert(c_id);             
      input_dom.append(str);

      $(":input").blur(function(){
        var category_name = $(this).val();
        var path = "<?php echo U('Category/categorySonAdd');?>";
          $.post(path, {category_name: category_name,c_id: c_id}, function(data) {
            if (!data.code) {
                alert(data.message);
                return false;
             }
             input_dom.find(":input").parent().html(category_name);
          },"json");
      });
  });

})
</script>
</body>
</html>