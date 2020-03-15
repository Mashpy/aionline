<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        Model::unguard();
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        $this->command->info('----- Running Role Type Data Seeder -----');
        $this->call(RoleTypeSeeder::class);
        $this->call(UserSeeder::class);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        $this->command->info('----- Seeding Completed -----');
        Model::reguard();
    }
}
