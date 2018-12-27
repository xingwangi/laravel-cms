@extends('admin::layouts.master')
@section('content')
    @component('components.tabs',['title'=>'文章配置'])
        @slot('nav')
            <br>
            <a href="/article/category" class="btn btn-primary">栏目列表</a>
            <a href="#" class="btn btn-success ">
                <i class="fa fa-plus"></i> 添加栏目
            </a>
        @endslot
        @slot('body')
            <div class="panel-body">
                <form class="form-horizontal" method="post" action="/article/category">
                    @csrf
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">栏目基本信息</h4>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label class="col-sm-2 control-label star">栏目名称</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" class="form-control" value="{{old('name')}}">
                                    <span class="help-block">网站中显示的网站名称,可以使用中文等任意字符</span>
                                </div>
                            </div>
                            <div class="form-group"><label class="col-sm-2 control-label">父级栏目</label>
                                <div class="col-sm-10">
                                    <select name="pid" class="js-example-basic-single form-control">
                                        <option value="0">顶级栏目</option>
                                        @foreach($data as $key =>$v)
                                            <option value="{{$v['id']}}">{!! $v['_name'] !!}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">保存</button>
                </form>
            </div>
        @endslot
    @endcomponent
    <script>
        function del(id, bt) {
            if (confirm('确认删除吗')) {
                $(bt).next('form').trigger('submit');
            }

        }
    </script>
@endsection


