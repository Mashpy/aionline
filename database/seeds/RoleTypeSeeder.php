<?php

use Illuminate\Database\Seeder;
use App\Models\RoleType;
use App\User;

class RoleTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RoleType::truncate();
        $role_type_list = [
            [
                'id' => 1,
                'name' => 'admin'
            ],
            [
                'id' => 2,
                'name' => 'author'
            ]
        ];

        $role_type = DB::table('role_types')->insert($role_type_list);

        $user = User::first();
        if($user){
            $user->role_type_id = '1';
            $user->update();
        }
    }
}
