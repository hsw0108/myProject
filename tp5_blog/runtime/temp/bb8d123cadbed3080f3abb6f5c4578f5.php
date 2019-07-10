<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:71:"E:\wamp64\www\tp5_blog\public/../application/admin\view\group\edit.html";i:1515421458;s:65:"E:\wamp64\www\tp5_blog\public/../application/admin\view\base.html";i:1515507774;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>博客网后台管理系统</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link href="__ADMIN__/bootstrap-3.3.0-dist/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="__ADMIN__/css/site.css" rel="stylesheet">
    <link href="__ADMIN__/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="__ADMIN__/js/jquery.min.js"></script>
    <script src="__ADMIN__/bootstrap-3.3.0-dist/dist/js/bootstrap.min.js"></script>

    <!--[if lt IE 9]>
    <script src="http://cdn.bootcss.com/html5shiv/r29/html5.min.js"></script>
    <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script>
        window.hdjs={};
        //组件目录必须绝对路径(在网站根目录时不用设置)
        window.hdjs.base = '__STATIC__/node_modules/hdjs';
        //上传文件后台地址
        window.hdjs.uploader = "<?php echo url('system/component/uploader'); ?>?";
        //获取文件列表的后台地址
        window.hdjs.filesLists = "<?php echo url('system/component/filesLists'); ?>?";
    </script>
    <script src="__STATIC__/node_modules/hdjs/static/requirejs/require.js"></script>
    <script src="__STATIC__/node_modules/hdjs/static/requirejs/config.js"></script>
    <script>
        if (navigator.appName == 'Microsoft Internet Explorer') {
            if (navigator.userAgent.indexOf("MSIE 5.0") > 0 || navigator.userAgent.indexOf("MSIE 6.0") > 0 || navigator.userAgent.indexOf("MSIE 7.0") > 0) {
                alert('您使用的 IE 浏览器版本过低, 推荐使用 Chrome 浏览器或 IE8 及以上版本浏览器.');
            }
        }
    </script>
    <style>
        i {
            color: #337ab7;
        }
    </style>

</head>
<body>
<div class="container-fluid admin-top">
    <!--导航-->
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <h4 style="display: inline;line-height: 50px;float: left;margin: 0px"><a href="index.html" style="color: white;margin-left: -14px">博客网</a>
                </h4>
                <div class="navbar-header">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="http://www.kancloud.cn/manual/thinkphp5/118003" target="_blank"><i class="fa fa-w fa-file-code-o"></i>
                                在线文档</a>
                        </li>
                        <li>
                            <a href="http://fontawesome.dashgame.com/" target="_blank"><i
                                    class="fa fa-w fa-hand-o-right"></i> 图标库</a>
                        </li>
                        <li>
                            <a href="<?php echo 'http://'.$_SERVER['HTTP_HOST'];?>" target="_blank"><i
                                    class="fa fa-w fa-desktop"></i> 网站首页</a>
                        </li>
                    </ul>
                </div>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <i class="fa fa-w fa-user"></i>
                            <?php echo session('admin_username'); ?>
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo url('entry/pass'); ?>">修改密码</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="">退出</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!--导航end-->
</div>
<!--主体-->
<div class="container-fluid admin_menu">
    <div class="row">
        <div class="col-xs-12 col-sm-3 col-lg-2 left-menu">
            <div class="panel panel-default" id="menus">
                <!--栏目菜单-->
                <div class="panel-heading" role="button" data-toggle="collapse" href="#collapseExample"
                     aria-expanded="false" aria-controls="collapseExample"
                     style="border-top: 1px solid #ddd;border-radius: 0%">
                    <h4 class="panel-title">栏目管理</h4>
                    <a class="panel-collapse" data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <i class="fa fa-chevron-circle-down"></i>
                    </a>
                </div>
                <ul class="list-group menus collapse in" id="collapseExample">
                    <a href="<?php echo url('category/index'); ?>" class="list-group-item">
                        <i class="fa fa-certificate" aria-hidden="true"></i>
                        <span class="pull-right" href=""></span>
                        栏目列表
                    </a>
                </ul>
                <!--栏目菜单 end-->

                <!--标签菜单-->
                <div class="panel-heading" role="button" data-toggle="collapse" href="#collapseExample2"
                     aria-expanded="false" aria-controls="collapseExample">
                    <h4 class="panel-title">标签管理</h4>
                    <a class="panel-collapse" data-toggle="collapse" href="#collapseExample2" aria-expanded="true">
                        <i class="fa fa-chevron-circle-down"></i>
                    </a>
                </div>
                <ul class="list-group menus collapse in" id="collapseExample2">
                    <a href="<?php echo url('tag/index'); ?>" class="list-group-item">
                        <i class="fa fa-tags" aria-hidden="true"></i>
                        <span class="pull-right" href=""></span>
                        标签列表
                    </a>

                </ul>
                <!--标签菜单 end-->

                <!--文章菜单-->
                <div class="panel-heading" role="button" data-toggle="collapse" href="#collapseExample3"
                     aria-expanded="false" aria-controls="collapseExample">
                    <h4 class="panel-title">文章管理</h4>
                    <a class="panel-collapse" data-toggle="collapse" href="#collapseExample3" aria-expanded="true">
                        <i class="fa fa-chevron-circle-down"></i>
                    </a>
                </div>
                <ul class="list-group menus collapse in" id="collapseExample3">
                    <a href="<?php echo url('article/index'); ?>" class="list-group-item">
                        <i class="fa fa-book" aria-hidden="true"></i>
                        <span class="pull-right" href=""></span>
                        文章列表
                    </a>
                    <a href="<?php echo url('article/recycle'); ?>" class="list-group-item">
                        <i class="fa fa-hourglass-3" aria-hidden="true"></i>
                        <span class="pull-right" href=""></span>
                        文章回收站
                    </a>
                </ul>
                <!--文章菜单 end-->
                <!--友情菜单-->
                <div class="panel-heading" role="button" data-toggle="collapse" href="#collapseExample3"
                     aria-expanded="false" aria-controls="collapseExample">
                    <h4 class="panel-title">友链管理</h4>
                    <a class="panel-collapse" data-toggle="collapse" href="#collapseExample3" aria-expanded="true">
                        <i class="fa fa-chevron-circle-down"></i>
                    </a>
                </div>
                <ul class="list-group menus collapse in" id="collapseExample4">
                    <a href="<?php echo url('link/index'); ?>" class="list-group-item">
                        <i class="fa fa-paper-plane" aria-hidden="true"></i>
                        <span class="pull-right" href=""></span>
                        友链首页
                    </a>
                </ul>
                <!--友情链接end-->
                <div class="panel-heading" role="button" data-toggle="collapse" href="#collapseExample3"
                     aria-expanded="false" aria-controls="collapseExample">
                    <h4 class="panel-title">站点管理</h4>
                    <a class="panel-collapse" data-toggle="collapse" href="#collapseExample3" aria-expanded="true">
                        <i class="fa fa-chevron-circle-down"></i>
                    </a>
                </div>
                <ul class="list-group menus collapse in" id="collapseExample5">
                    <a href="<?php echo url('webset/index'); ?>" class="list-group-item">
                        <i class="fa fa-wrench" aria-hidden="true"></i>
                        <span class="pull-right" href=""></span>
                        网站配置
                    </a>
                </ul>
                <div class="panel-heading" role="button" data-toggle="collapse" href="#collapseExample3"
                     aria-expanded="false" aria-controls="collapseExample">
                    <h4 class="panel-title">权限管理</h4>
                    <a class="panel-collapse" data-toggle="collapse" href="#collapseExample3" aria-expanded="true">
                        <i class="fa fa-chevron-circle-down"></i>
                    </a>
                </div>
                <ul class="list-group menus collapse in" id="collapseExample6">
                    <a href="<?php echo url('admin/index'); ?>" class="list-group-item">
                        <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                        <span class="pull-right" href=""></span>
                        用户管理
                    </a>
                    <a href="<?php echo url('rules/index'); ?>" class="list-group-item">
                        <i class="fa fa-vcard" aria-hidden="true"></i>
                        <span class="pull-right" href=""></span>
                        规则管理
                    </a>
                    <a href="<?php echo url('group/index'); ?>" class="list-group-item">
                        <i class="fa fa-users" aria-hidden="true"></i>
                        <span class="pull-right" href=""></span>
                        用户组管理
                    </a>
                </ul>
            </div>
        </div>
        <!--右侧主体区域部分 start-->
        <div class="col-xs-12 col-sm-9 col-lg-10">
            
<div class="col-xs-12 col-sm-9 col-lg-10">
    <ol class="breadcrumb" style="background-color: #f9f9f9;padding:8px ;margin-bottom:10px;">
        <li>
            <a ><i class="fa fa-cogs"></i>
                用户组管理</a>
        </li>
        <li class="active">
            <a >用户组添加</a>
        </li>

    </ol>
    <ul class="nav nav-tabs" role="tablist">
        <li><a href="<?php echo url('index'); ?>">用户组列表</a></li>
        <li class="active"><a href="<?php echo url('edit'); ?>">编辑用户组</a></li>
    </ul>
    <form class="form-horizontal" id="form" action="" method="post">
        <input type="hidden" name="id" value="<?php echo input('param.id'); ?>">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">编辑用户组</h3>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">用户组名</label>
                    <div class="col-sm-9">
                        <input type="text" id="title" value="<?php echo $oldData['title']; ?>" name="title"  class="form-control" placeholder="请输入用户组中文名称">
                    </div>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    分配权限
                    |
                    <input type="checkbox" id="all">全选
                </h3>
            </div>
            <?php if(is_array($rules) || $rules instanceof \think\Collection || $rules instanceof \think\Paginator): if( count($rules)==0 ) : echo "" ;else: foreach($rules as $k=>$vo): ?>
            <div class="panel-body">
                <div class="panel panel-default">
                    <div class="panel-heading father-all">
                        <h3 class="panel-title">
                            <?php echo $k; ?>
                            |
                            <input type="checkbox" class="son-all">全选
                        </h3>
                    </div>
                    <div class="panel-body">
                        <div class="checkbox">
                            <?php if(is_array($vo) || $vo instanceof \think\Collection || $vo instanceof \think\Paginator): if( count($vo)==0 ) : echo "" ;else: foreach($vo as $key=>$val): ?>
                            <label>
                                <input type="checkbox" name="rules[]" value="<?php echo $val['id']; ?>" <?php if(in_array($val['id'],$oldData['rules'])): ?>checked<?php endif; ?>><?php echo $val['title']; ?>
                            </label>&nbsp;&nbsp;
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
        <button class="btn btn-primary" type="submit">确定</button>
    </form>
    <script  type="text/javascript">
        $(function () {
            $('#all').click(function () {
                $(this).parents('.panel-default').find('.panel-body input[type=checkbox]').prop('checked',$(this).prop('checked'));
            })
            $('.son-all').click(function () {
                $(this).parents('.father-all').siblings('.panel-body').find('input[type=checkbox]').prop('checked',$(this).prop('checked'))
            })
        })
    </script>
</div>


        </div>
    </div>
    <!--右侧主体区域部分结束 end-->
</div>
</div>
</body>
</html>
