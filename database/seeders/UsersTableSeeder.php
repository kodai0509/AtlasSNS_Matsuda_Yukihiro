<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Usersテーブルに初期ユーザー登録
        DB::table('users')->insert([
            ['id' => '1','username' =>'Atlas一郎','email' => 'At01@example','password'=> bcrypt('W$7jK8qL&2xZ'),'icon_image' => 'icon1.png'],

            ['id' => '2','username' =>'Atlas二郎','email' => 'At02@example','password' => bcrypt('T1h@U2vX#9rP'),'icon_image' => 'icon1.png'],

            ['id' => '3','username' =>'Atlas三郎','email' => 'At03@example','password' => bcrypt('3a%F7Qz!K2jB'),'icon_image' => 'icon1.png'],

            ['id' => '4','username' =>'Atlas四郎','email' => 'At04@example','password' => bcrypt('R5!hT7lX*6yZ'),'icon_image' => 'icon1.png'],

            ['id' => '5','username' =>'Atlas五郎','email' => 'At05@example','password' => bcrypt('Z1y^N9mK&5tW'),'icon_image' => 'icon1.png']
        ]);
    }
}
