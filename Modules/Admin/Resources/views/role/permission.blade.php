@extends('admin::layouts.master')
@section('content')

    @component('components.tabs',['title'=>$role->title.'权限设置'])
        @slot('nav')
            <br>
            <a href="/admin/role" class="btn btn-primary">角色列表</a>
            <a href="#" class="btn btn-pinterest">权限设置</a>
        @endslot
        @slot('body')
            <div class="col-lg-12">
                <form action="/admin/role/permissionStore/{{$role['id']}}" method="post" class="form-horizontal" >
                    @csrf
                    <div class="panel panel-default">
                        <div class="panel-body">
                            @foreach($modules as $key =>$module)
                                <div class="panel-body">
                                    @foreach($module['rules'] as $key =>$rule)
                                        <div class="panel-body">
                                            <div class="col-sm-10">
                                                <h3>{{$rule['group']}}</h3>
                                                @foreach($rule['permissions'] as $key =>$permission)
                                                    <label class="radio-inline">
                                                        <input type="checkbox" name="name[]"
                                                               {{$role->hasPermissionTo($permission['name'])?'checked':''}}
                                                               value="{{$permission['name']}}"> {{$permission['title']}}
                                                    </label>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endforeach
                                    @endforeach
                                    <div class="form-group">
                                        <label for="inputID" class="col-sm-2 control-label"></label>
                                        <div class="col-sm-10">
                                            <input type="submit" value="提交" class="btn btn-success">
                                            <input type="reset" value="重置" class="btn btn-danger">
                                        </div>
                                    </div>
                                </div>

                        </div>
                    </div>


                </form>

            </div>

        @endslot

    @endcomponent



@endsection

