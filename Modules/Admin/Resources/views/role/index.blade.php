@extends('admin::layouts.master')
@section('content')
    @component('components.tabs',['title'=>'角色管理'])
        @slot('nav')
            <br>
            <a href="javascript:;" class="btn btn-primary">角色列表</a>
            <button class="btn btn-success " data-toggle="modal" data-target="#addRole">
                <i class="fa fa-plus"></i>  添加角色
            </button>
        @endslot
        @slot('body')
            @component('components.modal',['id'=>"addRole",'url'=>'/admin/role','title'=>'添加角色'])
                <div class="form-group">
                    <label for="inputID" class="col-sm-2 control-label">角色名称:</label>
                    <div class="col-sm-10">
                        <input type="text" name="title" id="inputID" placeholder="请输入中文角色名称" class="form-control"
                               value="{{old('title')}}" title="">
                    </div>
                </div>

                <br>
                <div class="form-group">
                    <label for="inputID" class="col-sm-2 control-label">角色标识:</label>
                    <div class="col-sm-10">
                        <input type="text" name="name" id="inputID" class="form-control" value="{{old('name')}}"
                               placeholder="必须为英文字母">
                    </div>
                </div>
            @endcomponent
            <div class="panel-body">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>编号</th>
                        <th>角色名称</th>
                        <th>角色标识</th>
                        <th>创建时间</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($roles as $key =>$role)
                        <tr>
                            <td>{{$role->id}}</td>
                            <td>{{$role->title}}</td>
                            <td>{{$role->name}}</td>
                            <td>{{$role->created_at}}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="/admin/role/permission/{{$role->id}}" class="btn btn-primary btn-sm">权限</a>
                                    <button type="button" class="btn btn-danger btn-sm">删除</button>
                                    <button type="button" data-toggle="modal" data-target="#editRole{{$role['id']}}"
                                            class="btn btn-success btn-sm">编辑
                                    </button>
                                </div>
                                @component('components.modal',['id'=>"editRole{$role['id']}",'url'=>"/admin/role/{$role['id']}",'method'=>"PUT",'title'=>"编辑{$role['title']}"])
                                    <div class="form-group">
                                        <label for="inputID" class="col-sm-2 control-label">角色名称:</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="title" id="inputID" placeholder="请输入中文角色名称"
                                                   class="form-control"
                                                   value="{{$role->title}}" title="">
                                        </div>
                                    </div>

                                    <br>
                                    <div class="form-group">
                                        <label for="inputID" class="col-sm-2 control-label">角色标识:</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="name" id="inputID" class="form-control"
                                                   value="{{$role->name}}"
                                                   placeholder="必须为英文字母">
                                        </div>
                                    </div>
                                @endcomponent
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>

            </div>
        @endslot
    @endcomponent
@endsection

