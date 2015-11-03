<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>K5 - @yield('title')</title>
    <meta name="description" content="这是一个form页面">
    <meta name="keywords" content="form">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="icon" type="image/png" href="/i/favicon.png">
    <link rel="apple-touch-icon-precomposed" href="/i/app-icon72x72@2x.png">
    <meta name="apple-mobile-web-app-title" content="Amaze UI" />
    <link rel="stylesheet" href="/css/amazeui.min.css" />
    <link rel="stylesheet" href="/css/admin.css">
    @yield('head-assets')
    <!--[if lte IE 9]>
    <p class="browsehappy">你正在使用<strong>过时</strong>的浏览器，Amaze UI 暂不支持。 请 <a href="http://browsehappy.com/" target="_blank">升级浏览器</a> 以获得更好的体验！</p>
    <![endif]-->
</head>

<body>
    <header class="am-topbar admin-header">
        <div class="am-topbar-brand">
            <strong>人才交流中心</strong>
            <small>后台管理</small>
        </div>
        <button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-primary am-show-sm-only" data-am-collapse="{target: '#topbar-collapse'}">
            <span class="am-sr-only">导航切换</span>
            <span class="am-icon-bars"></span>
        </button>
        <div class="am-collapse am-topbar-collapse" id="topbar-collapse">
            <ul class="am-nav am-nav-pills am-topbar-nav am-topbar-right admin-header-list">
                <li class="am-header-information"> 欢迎您登录</li>
                <li class="am-dropdown" data-am-dropdown>
                    <a class="am-dropdown-toggle" data-am-dropdown-toggle href="javascript:;">
                        <span class="am-icon-users"> {{ Session::get('user.name') }}</span>
                        <span class="am-icon-caret-down"></span>
                    </a>
                    <ul class="am-dropdown-content">
                        <li>
                            <a href="/admin/account/profile">
                                <span class="am-icon-user"></span> 个人资料</a>
                        </li>
                        <li>
                            <a href="/admin/account/password">
                                <span class="am-icon-cog"></span> 修改密码</a>
                        </li>
                        <li>
                            <a href="/auth/logout">
                                <span class="am-icon-power-off"></span> 退出登录</a>
                        </li>
                    </ul>
                </li>
                <li class="am-hide-sm-only">
                    <a href="javascript:;" id="admin-fullscreen">
                        <span class="am-icon-arrows-alt"></span>
                        <span class="admin-fullText">开启全屏</span>
                    </a>
                </li>
            </ul>
        </div>
    </header>
    <div class="w1200 mt20">
        <div class="am-cf admin-main">
            <!-- sidebar start -->
            <div class="admin-sidebar am-offcanvas" id="admin-offcanvas">
                <div class="am-offcanvas-bar admin-offcanvas-bar">
                    <ul class="am-list admin-sidebar-list">
                        @if (in_array('summary', Session::get('user.permission')))
                        <li>
                            <a class="am-cf" href="/admin/summary">
                                <span class="am-icon-area-chart"></span> 数据汇总
                                <span class="am-fr am-margin-right"></span>
                            </a>
                        </li>
                        @endif
                        @if (in_array('enterprise', Session::get('user.permission')))
                        <li>
                            <a href="/admin/enterprise" class="am-cf">
                                <span class="am-icon-check am-icon-file-text"></span> 企业信息</a>
                        </li>
                        @endif
                        @if (in_array('personnel', Session::get('user.permission')))
                        <li>
                            <a href="/admin/personnel">
                                <span class="am-icon-file"></span> 人才信息</a>
                        </li>
                        @endif
                        @if (in_array('log', Session::get('user.permission')))
                        <li class="admin-parent">
                            <a data-am-collapse="{target: '#collapse-nav1'}">
                                <span class="am-icon-calendar"></span> 日志记录
                                <span class="am-icon-angle-right am-fr am-margin-right"></span>
                            </a>
                            <ul class="am-list am-collapse admin-sidebar-sub" id="collapse-nav1">
                                <li>
                                    <a href="/admin/log/visit">
                                        <span class="am-icon-table"></span> 回访记录</a>
                                </li>
                            </ul>
                        </li>
                        @endif
                        @if (in_array('message', Session::get('user.permission')))
                        <li>
                            <a href="/admin/message">
                                <span class="am-icon-pencil-square-o"></span> 留言板管理</a>
                        </li>
                        @endif
                        @if (in_array('article', Session::get('user.permission')) || in_array('account', Session::get('user.permission')))
                        <li class="#">
                            <a data-am-collapse="{target: '#collapse-nav2'}">
                                <span class="am-icon-puzzle-piece"></span> 系统管理
                                <span class="am-icon-angle-right am-fr am-margin-right"></span>
                            </a>
                            <ul class="am-list am-collapse admin-sidebar-sub" id="collapse-nav2">
                                @if (in_array('article', Session::get('user.permission')))
                                <li>
                                    <a href="/admin/article">
                                        <span class="am-icon-list-alt"></span> 前台文章</a>
                                </li>
                                @endif
                                @if (in_array('account', Session::get('user.permission')))
                                <li>
                                    <a href="/admin/account">
                                        <span class="am-icon-table"></span> 账号管理</a>
                                </li>
                                @endif
                            </ul>
                        </li>
                        @endif
                    </ul>
                    <div class="am-panel am-panel-default admin-sidebar-panel">
                        <div class="am-panel-bd">
                            <p>
                                <span class="am-icon-bookmark"></span> 公告</p>
                            <p>时光静好，与君语；细水流年，与君同。</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- sidebar end -->
            <!-- content start -->
            <div class="admin-content">
              @yield('content')
            </div>
            <!-- content end -->
        </div>
    </div>


<!--删除弹框-->
  <div class="am-modal am-modal-confirm" tabindex="-1" id="my-confirm">
  <div class="am-modal-dialog">
    <div class="am-modal-hd">Amaze UI</div>
    <div class="am-modal-bd">
      确定删除吗？
    </div>
    <div class="am-modal-footer">
      <span class="am-modal-btn" data-am-modal-cancel>取消</span>
      <span class="am-modal-btn" data-am-modal-confirm id="determine-delete">确定</span>
    </div>
  </div>
</div>
<!--编辑弹框 -->
  <div class="am-modal am-modal-confirm" tabindex="-1" id="my-confirm-edit">
  <div class="am-modal-dialog">
    <div class="am-modal-hd">Amaze UI </div>
    <div class="am-modal-bd">
  <form class="am-form am-form-horizontal am-scoller" id="organization-form">
  </form>
    </div>
    <div class="am-modal-footer">
      <span class="am-modal-btn" data-am-modal-cancel>取消</span>
      <span class="am-modal-btn" data-am-modal-confirm id="deterall-delete">保存</span>
    </div>
  </div>
</div>
<!--删除弹框-->
  <div class="am-modal am-modal-confirm" tabindex="-1" id="my-confirm">
  <div class="am-modal-dialog">
    <div class="am-modal-hd">Amaze UI</div>
    <div class="am-modal-bd">
      确定删除吗？
    </div>
    <div class="am-modal-footer">
      <span class="am-modal-btn" data-am-modal-cancel>取消</span>
      <span class="am-modal-btn" data-am-modal-confirm >确定</span>
    </div>
  </div>
</div>
<!--全局新添加内容-->
  <div class="am-modal am-modal-confirm" tabindex="-1" id="my-confirm-add" >
  <div class="am-modal-dialog">
    <div class="am-modal-hd">Amaze UI</div>
    <div class="am-modal-bd">
   <form class="am-form am-form-horizontal am-scoller" id="all-new-list">
  <div class="am-form-group">
    <label for="doc-ipt-3-name" class="am-u-sm-2 am-form-label am-text-sm am-left-none">姓名</label>
    <div class="am-u-sm-10">
      <input type="text" id="doc-ipt-3-name" placeholder="输入您的姓名" value="">
    </div>
  </div>

  <div class="am-form-group">
    <label for="doc-ipt-3-email" class="am-u-sm-2 am-form-label am-text-sm am-left-none">邮箱</label>
    <div class="am-u-sm-10">
      <input type="email" id="doc-ipt-3-email" placeholder="输入你的电子邮件" value="">
    </div>
  </div>

  <div class="am-form-group">
    <label for="doc-ipt-3-mobile" class="am-u-sm-2 am-form-label am-text-sm am-left-none">电话</label>
    <div class="am-u-sm-10">
      <input type="tel" id="doc-ipt-3-mobile" placeholder="输入您的电话号码" value="">
    </div>
  </div>

  <div class="am-form-group">
    <label for="doc-ipt-3-birthDate" class="am-u-sm-2 am-form-label am-text-sm am-left-none">修改日期</label>
    <div class="am-u-sm-10">
      <input type="date" id="doc-ipt-3-birthDate" value="">
    </div>
  </div>


</form>
    </div>
    <div class="am-modal-footer">
      <span class="am-modal-btn" data-am-modal-cancel>取消</span>
      <span class="am-modal-btn" data-am-modal-confirm >保存</span>
    </div>
  </div>
</div>


@include('admin.delete-confirm-modal')
<!--[if (gte IE 9)|!(IE)]><!-->
<script src="/js/jquery.min.js"></script>
<!--<![endif]-->
<script src="/js/amazeui.min.js"></script>
<script src="/js/app.js"></script>
<script type="text/javascript">
$(function() {
    $('.data-table-delete').click(function(event) {
        event.preventDefault();
        $('#delete-confirm-modal').modal({
            relatedTarget: this,
            onConfirm: function() {
                var item = $(this.relatedTarget).parents('tr');
                $.ajax({
                    type: 'DELETE',
                    data: {id: item.attr('data-id')},
                    success: function() {
                        item.remove();
                    },
                    error: function() {
                        alert('删除失败');
                    }
                });
            },
            onCancel: function() {

            }
        });
    });
});
</script>
@yield('foot-assets')
</body>

</html>