<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'    =>'Ahmet',
            'email'   =>'ahmtkn@gmail.com',
            'password'=>bcrypt('123456')
        ]);

        User::create([
            'name'    =>'Hüseyin',
            'email'   =>'hsyntkn@gmail.com',
            'password'=>bcrypt('123456')
        ]);

        User::create([
            'name'    =>'Yusuf',
            'email'   =>'ysftkn@gmail.com',
            'password'=>bcrypt('123456')
        ]);
    }
}
