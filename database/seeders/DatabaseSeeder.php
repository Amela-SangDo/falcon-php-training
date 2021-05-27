<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        \App\Models\User::factory(10)->create()->each(function($user) {
            $user->password = bcrypt('123456');
            $user->save();
        });
    }
}
