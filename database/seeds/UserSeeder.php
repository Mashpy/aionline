<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        $user_list = [
            [
                'id' => 1,
                'name' => 'Mashpy Rahman',
                'email' => 'mashpysays@gmail.com',
                'password' => Hash::make('12345678'),
                'role_type_id' => 1
            ],
            [
                'id' => 2,
                'name' => 'Hasan Parvez',
                'email' => 'hasanparvez2017@gmail.com',
                'password' => Hash::make('12345678'),
                'role_type_id' => 1
            ],
            [
                'id' => 3,
                'name' => 'Mohaimen',
                'email' => 'mohaimen707@gmail.com',
                'password' => Hash::make('12345678'),
                'role_type_id' => 1
            ],
        ];

        $role_type = DB::table('users')->insert($user_list);
    }
}
