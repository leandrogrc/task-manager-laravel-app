<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            'name' => 'Leandro',
            'username' => 'leandro',
            'password' => bcrypt('123123')
        ];

        DB::table('users')->insert($users);
    }
}
