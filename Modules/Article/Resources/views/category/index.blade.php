@extends('admin::layouts.master')
@section('content')
    @component('components.tabs',['title'=>'文章配置'])
        @slot('nav')
            <br>
            <a href="javascript:;" class="btn btn-primary">栏目列表</a>
            <a href="/article/category/create" class="btn btn-success ">
                <i class="fa fa-plus"></i> 添加栏目
            </a>
        @endslot
        @slot('body')
            <div class="panel-body">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>编号</th>
                        <th>栏目名称</th>
                        <th>创建时间</th>
                        <th>修改时间</th>
                        <th class="text-right">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $key =>$v)
                        <tr>
                            <td>{{$v['id']}}</td>
                            <td>{!! $v['_name'] !!}</td>
                            <td>{{$v['created_at']}}</td>
                            <td>{{$v['updated_at']}}</td>
                            <td class="text-right">
                                <div class="btn-group">
                                    <a href="/article/category/{{$v['id']}}/edit" class="btn btn-default btn-sm">编辑</a>
                                    <button type="button" onclick="del({{$v['id']}},this)"
                                            class="btn btn-danger btn-sm">删除
                                    </button>
                                    <form action="/article/category/{{$v['id']}}" hidden="" method="POST">
                                        @csrf @method("DELETE")
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
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


