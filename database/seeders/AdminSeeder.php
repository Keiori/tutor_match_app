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
            [
                'family_name' => '先生',
                'first_name' => 'その参',
                'sex' => 0,
                'age' => 21,
                'institution' => 0,
                'grade' => 2,
                'email' => 'teacher.third@gmail.com',
                'password' => Hash::make('teacher3'),
            ],
            [
                'family_name' => '先生',
                'first_name' => 'その四',
                'sex' => 1,
                'age' => 22,
                'institution' => 0,
                'grade' => 3,
                'email' => 'teacher.fourth@gmail.com',
                'password' => Hash::make('teacher4'),
            ],
            [
                'family_name' => '先生',
                'first_name' => 'その五',
                'sex' => 0,
                'age' => 23,
                'institution' => 1,
                'grade' => 4,
                'email' => 'teacher.fifth@gmail.com',
                'password' => Hash::make('teacher5'),
            ],
            [
                'family_name' => '先生',
                'first_name' => 'その六',
                'sex' => 1,
                'age' => 24,
                'institution' => 1,
                'grade' => 5,
                'email' => 'teacher.sixth@gmail.com',
                'password' => Hash::make('teacher6'),
            ],
            [
                'family_name' => '先生',
                'first_name' => 'その七',
                'sex' => 1,
                'age' => 25,
                'institution' => 2,
                'grade' => 6,
                'email' => 'teacher.seventh@gmail.com',
                'password' => Hash::make('teacher7'),
            ],
        ]);
    }
}
