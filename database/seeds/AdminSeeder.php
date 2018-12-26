<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = factory(\App\Admin::class, 2)->create();
        $user = $users[0];
        $user->name = 'admin';
        $user->nickname = '星网';
        $user->save();
        \Spatie\Permission\Models\Role::create([
            'title' => '管理员',
            'name' => 'admin',
            'guard_name' => 'admin'
        ]);
        $user->assignRole('admin');
    }
}
