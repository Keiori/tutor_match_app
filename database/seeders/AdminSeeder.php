<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            [
                'family_name' => '先生',
                'first_name' => 'その壱',
                'sex' => 0,
                'age' => 19,
                'institution' => 0,
                'grade' => 0,
                'email' => 'teacher.first@gmail.com',
                'password' => Hash::make('teacher1'),
            ],
            [
                'family_name' => '先生',
                'first_name' => 'その弍',
                'sex' => 1,
                'age' => 20,
                'institution' => 0,
                'grade' => 1,
                'email' => 'teacher.second@gmail.com',
                'password' => Hash::make('teacher2'),
            ],
        ]);
    }
}
