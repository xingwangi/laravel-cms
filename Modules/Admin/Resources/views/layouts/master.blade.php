<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>laravel-cms</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <script src="/js/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/vue.min.js"></script>
    <script src="/js/jquery.pjax.min.js"></script>
    <script src="{{asset('plugin/pjax/pjax.js')}}"></script>
    <link rel="stylesheet" href="{{asset('plugin/pjax/pjax.css')}}">

    <style>
        .system {
            /*background: url(system_bg.jpg);*/
        }
    </style>
</head>
<body class="system">

<div class="container-fluid">
    <!--导航-->
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <ul class="nav navbar-nav">

                    <li class="active">
                        <a href="?s=system/site/lists">
                            返回系统
                        </a>
                    </li>


                    <li class="top_menu ">
                        <a href="http://www.runoob.com/" target="_blank" class="quickMenuLink">
                            参考手册</a>
                    </li>
                    <li class="top_menu">
                        <a href="https://laravel-china.org/docs/laravel/5.7/installation/2242" target="_blank"
                           class="quickMenuLink">
                            <i class="'fa-w fa fa-cubes"></i> laravel手册 </a>
                    </li>
                    <li class="top_menu">

                        <a href="?s=site/entry/home&amp;siteid=1&amp;mark=feature" class="quickMenuLink">
                            <i class="'fa-w fa fa-comments-o"></i> 系统设置 </a>
                    </li>
                    <li class="top_menu">

                        <a href="?s=site/entry/home&amp;siteid=1&amp;mark=package" class="quickMenuLink">
                            <i class="'fa-w fa fa-arrows"></i> 扩展模块 </a>
                    </li>
                </ul>

            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">

                    <li class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"
                           style="display:block; max-width:150px; white-space:nowrap; overflow:hidden; text-overflow:ellipsis; "
                           aria-expanded="false">
                            <i class="fa fa-group"></i> 星网 <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="?s=system/site/edit&amp;siteid=1"><i class="fa fa-weixin fa-fw"></i>
                                    编辑当前账号资料
                                </a>
                            </li>
                            <li><a href="?s=system/site/lists"><i class="fa fa-cogs fa-fw"></i> 管理se其它公众号</a></li>
                            <li><a href="javascript:;" onclick="updateSiteCache()"><i class="fa fa-sitemap"></i> 更新站点缓存</a>
                            </li>
                        </ul>

                    </li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <i class="fa fa-w fa-user"></i>
                            {{auth()->user()->nickname}} <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="/admin/password/reset">我的帐号</a></li>
                            <li><a href="?s=system/manage/menu">系统选项</a></li>

                            <li role="separator" class="divider">
                            <li>
                                <a href="javascript:void(0);" class="dropdown-item"
                                   onclick="event.preventDefault();document.getElementById('logout').submit()">
                                    <span class="icon mdi mdi-power"></span> 退出
                                </a>
                            </li>
                            <form action="/admin/logout " method="post" id="logout">
                                @csrf
                            </form>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!--导航end-->
    <div class="row">
        <!--主体-->
        <div class="container-fluid admin_menu">
            <div class="row">
                @include('admin::layouts._menus')

                <div class="col-xs-12 col-sm-9 col-lg-10">

                    <div class="main-content container-fluid" id="pjax-container">
                        <!--pjax加载动画-->
                        <div id="loading">
                            <div class="spinner">
                                <div class="rect1"></div>
                                <div class="rect2"></div>
                                <div class="rect3"></div>
                                <div class="rect4"></div>
                                <div class="rect5"></div>
                            </div>
                        </div>
                        <!--pjax加载动画 结束-->
                        <div id="app">
                            @include('layouts._validate')
                            @include('layouts._message')
                            @yield('content')
                        </div>
                    </div>

                </div>


            </div>

        </div>
    </div>

</div>
<div class="panel-footer clearfix">
    <div class="col-xs-6">
        友情链接：
    </div>
    <div class="col-xs-6 text-right">
        <a href="?s=system/site/access_setting&amp;siteid=1">
            <i class="fa fa-key"></i> 设置权限
        </a>&nbsp;&nbsp;&nbsp;
        <a href="?s=system/site/wechat&amp;step=wechat&amp;siteid=1">
            <i class="fa fa-comment-o"></i> 微信公众号
        </a>&nbsp;&nbsp;&nbsp;
        <a href="?s=system/permission/users&amp;siteid=1">
            <i class="fa fa-user"></i>操作员管理
        </a>&nbsp;&nbsp;&nbsp;
        <a href="javascript:;" onclick="delSite(1,'星网')">
            <i class="fa fa-trash"></i> 删除
        </a>&nbsp;&nbsp;&nbsp;
        <a href="?s=system/site/edit&amp;siteid=1">
            <i class="fa fa-pencil-square-o"></i> 编辑
        </a>
    </div>
</div>
<div class="jumbotron text-center" style="margin-bottom:0">
    <div class="text-muted footer">
        <a href="http://www.houdunwang.com">高端培训</a>
        <a href="http://www.hdphp.com">开源框架</a>
        <a href="http://bbs.houdunwang.com">后盾论坛</a>
        <br>
        Powered by hdcms V2.0 Build: 20180406022308 © 2014-2019
        www.hdcms.com
        runtime: 0.1
    </div>
</div>
</body>
</html>
