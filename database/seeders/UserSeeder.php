<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Phan Tùng',
            'email' => 'tunghust@gmail.com',
            'password' => Hash::make('tung12345'),
            'role' => '1',
        ]);
    }
}
