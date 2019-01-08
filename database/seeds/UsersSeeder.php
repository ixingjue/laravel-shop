<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 通过 factory 方法生成 100 个用户并保存到数据库中
        factory(\App\Models\User::class, 100)->create();
        $user = \App\Models\User::query()->find(1);
        $user->email = '826739558@qq.com';
        $user->password = bcrypt('password');
        $user->save();
    }
}
