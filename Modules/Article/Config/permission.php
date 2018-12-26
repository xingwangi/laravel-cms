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
        'group' => '文章管理',
        'permissions' => [
            ['title' => '栏目管理', 'name' => 'Article::category article', 'guard' => 'admin'],
            ['title' => '文章管理', 'name' => 'Article::content man', 'guard' => 'admin'],
        ],
    ],
];
