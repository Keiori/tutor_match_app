<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
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
        DB::table('users')->insert([
            [
                'family_name' => '生徒',
                'first_name' => 'その１',
                'sex' => 0,
                'grade' => 0,
                'email' => 'student.first@gmail.com',
                'password' => Hash::make('student1'),
            ],
            [
                'family_name' => '生徒',
                'first_name' => 'その２',
                'sex' => 1,
                'grade' => 1,
                'email' => 'student.second@gmail.com',
                'password' => Hash::make('student2'),
            ],
            [
                'family_name' => '生徒',
                'first_name' => 'その３',
                'sex' => 0,
                'grade' => 2,
                'email' => 'student.third@gmail.com',
                'password' => Hash::make('student3'),
            ],
            [
                'family_name' => '生徒',
                'first_name' => 'その４',
                'sex' => 1,
                'grade' => 3,
                'email' => 'student.fourth@gmail.com',
                'password' => Hash::make('student4'),
            ],
            [
                'family_name' => '生徒',
                'first_name' => 'その５',
                'sex' => 0,
                'grade' => 4,
                'email' => 'student.fifth@gmail.com',
                'password' => Hash::make('student5'),
            ],
            [
                'family_name' => '生徒',
                'first_name' => 'その６',
                'sex' => 1,
                'grade' => 5,
                'email' => 'student.sixth@gmail.com',
                'password' => Hash::make('student6'),
            ],
        ]);
    }
}
