<div class="col-xs-12 col-sm-3 col-lg-2 left-menu">

    <!--扩展模块动作 start-->
    <div class="panel panel-default" style="border-top: 1px solid #ccc;">
        <!--系统菜单-->

        @foreach(app('hd-menu')->all() as$moduleName  =>$groups)
            <div class="panel-heading">
                <h4 class="panel-title" id="admin"><span
                        class="glyphicon glyphicon-user"></span>{{$moduleName}}</h4>
            </div>
            <ul class="list-group menus" style="display: none">
                @foreach($groups as $group)
                    @if(\HDModule::hadPermission($group['permission'],'admin'))
                        <div class="dropdown panel-heading">
                            <button type="button" class="btn dropdown-toggle" id="dropdownMenu1"
                                    data-toggle="dropdown"><i
                                    class="{{$group['icon']}}"></i>{{$group['title']}}
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                                @foreach($group['menus'] as $menu)
                                    @if(\HDModule::hadPermission($menu['permission'],'admin'))
                                        <li>
                                            <a href="{{$menu['url']}}">{{$menu['title']}}</a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    @endif
                @endforeach
            </ul>

        @endforeach
        <script>
            // 菜单切换
            $(".panel-title").click(function () {
                $(".list-group").hide();
                $(this).parent().next().toggle(500);
            });
        </script>

    </div>
</div>
