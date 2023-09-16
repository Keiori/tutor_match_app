<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

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
            [
                'family_name' => '生徒',
                'first_name' => 'その一',
                'sex' => 2,
                'grade' => 3,
                'email' => 'student.first@gmail.com',
                'password' => 'student1',
            ],
        ]);
    }
}
