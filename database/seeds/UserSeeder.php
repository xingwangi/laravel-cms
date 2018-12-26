<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * 数据填充
     */
    public function run()
    {
        $users = factory(\App\User::class, 10)->create();
        $user = $users[0];
        $user->name='向军大叔';
        $user->email = '2859913655@qq.com';
        $user->save();
    }
}
