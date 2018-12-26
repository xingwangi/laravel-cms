<?php
/** .-------------------------------------------------------------------
 * |      Site: www.hdcms.com  www.houdunren.com
 * |      Date: 2018/7/2 上午12:54
 * |    Author: 向军大叔 <2300071698@qq.com>
 * '-------------------------------------------------------------------*/
/**
 * 权限配置
 * 为了避免其他模块有同名的权限，权限标识要以 '控制器@方法' 开始
 */
return [
    [
        'group' => '系统管理',
        'permissions' => [
            ['title' => '微信配置', 'name' => 'Modules\Admin\Http\Controllers\WechatController@create', 'guard' => 'admin'],
            ['title' => '网站配置', 'name' => 'Modules\Admin\Http\Controllers\SystemController@create', 'guard' => 'admin'],
            ['title' => '邮件配置', 'name' => 'Modules\Admin\Http\Controllers\UserController@create', 'guard' => 'admin'],
            ['title' => '权限配置', 'name' => 'Modules\Admin\Http\Controllers\RoleController@create', 'guard' => 'admin'],
        ],
    ],


];
