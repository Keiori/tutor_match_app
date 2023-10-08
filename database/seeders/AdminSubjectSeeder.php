<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admin_subject')->insert([
            [
                'admin_id' => 1,
                'subject_id' => 1
            ],
            [
                'admin_id' => 2,
                'subject_id' => 1
            ],
            [
                'admin_id' => 1,
                'subject_id' => 2
            ],
            [
                'admin_id' => 3,
                'subject_id' => 2
            ],
        ]);
    }
}
